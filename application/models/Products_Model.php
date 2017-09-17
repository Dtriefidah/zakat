<?php

class Products_Model extends CI_Model
{
    public $ci;
    public $table = 'products';

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
        $this->load->model('Categories_Model');
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->ci->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                $this->ci->form_validation->set_rules('content', lang('content'), ['trim']);
                $this->ci->form_validation->set_rules('images', lang('images'), ['trim']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'type' => 'zakat_fitrah' / 'zakat_maal_agriculture' / 'zakat_maal_farm_animals' / 'zakat_maal_gold_and_silver' / 'zakat_maal_money' / 'zakat_maal_rikaz' / 'zakat_maal_trading'
     *      'name' => 'name',
     *      'price' => '1',
     *      'content' => 'content,'
     *      'images' => ['images'],
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['type'])) { $data['type'] = $params['type']; }
        if (isset($params['name'])) { $data['name'] = $params['name']; }
        if (isset($params['price'])) { $data['price'] = $params['price']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }

        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['slug'] = url_title($params['name'].' '.$id, '-', true);
        $data['images'] = $this->file_upload($params['images'], $this->upload->products_path.'/'.$id);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return $id;
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
        delete_files($this->upload->products_path.'/'.$id, true); // file_helper
    }

    public function file_upload($temp_files = [], $new_path = '')
    {
        $new_files = $new_files_full_path = [];

        foreach ($temp_files as $temp_file) {
            if (file_exists($temp_file)) {
                if (! is_dir($new_path)) { mkdir($new_path, 0755, true); }
                $temp_file_info = get_file_info($temp_file);
                $new_file = $new_path.'/'.$temp_file_info['name'];
                rename($temp_file, $new_file);

                $new_files[] = $temp_file_info['name'];
                $new_files_full_path[] = $new_file;
            }
        }


        foreach (glob($new_path.'/*') as $old_file) {
            if (! in_array(basename($old_file), $new_files)) { unlink($old_file); }
        }

        return json_encode($new_files_full_path);
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'return' => 'array' / 'object',
     * ]
     * @return object
     */
    public function row($params = [], $return = 'object')
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }

        if ($return == 'array') {
            $row = $this->db->get()->row_array();

            $images = json_decode($row['images']);
            $row['images'] = [];

            foreach ($images as $i => $image) {
                $file_info = get_file_info($image);
                $row['images'][$i]['image'] = $image;
                $row['images'][$i]['image_name'] = $file_info['name'];
                $row['images'][$i]['image_size'] = $file_info['size'];
            }
        } else if ($return == 'object') {
            $row = $this->db->get()->row();
        }

        return $row;
    }

    /**
     * @param array $params
     * [
     *      'type' => ['Zakat Agriculture', 'Zakat Farm Animals', 'Zakat Gold and Silver', 'Zakat Money', 'Zakat Rikaz', 'Zakat Trading'],
     *      'name' => 'name',
     *      'slug' => 'slug',
     *      'price' => '1',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['type'])) { $this->db->where_in('type', $params['type']); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }
        if (isset($params['price'])) { $this->db->where('price', $params['price']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('name ASC');

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'type' => 'zakat_fitrah' / 'zakat_maal_agriculture' / 'zakat_maal_farm_animals' / 'zakat_maal_gold_and_silver' / 'zakat_maal_money' / 'zakat_maal_rikaz' / 'zakat_maal_trading'
     *      'name' => 'name',
     *      'price' => '1',
     *      'images' => ['images'],
     * ]
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['type'])) { $data['type'] = $params['type']; }
        if (isset($params['name'])) {
            $data['name'] = $params['name'];
            $data['slug'] = url_title($params['name'].' '.$params['id'], '-', true);
        }
        if (isset($params['price'])) { $data['price'] = $params['price']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        if (isset($params['images'])) { $data['images'] = $this->file_upload($params['images'], $this->upload->products_path.'/'.$params['id']); }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }

    public function get_type_options()
    {
        $type_options = [
            '' => '- '.lang('choose_type').' -',
            'zakat_fitrah' => lang('zakat_fitrah'),
            'zakat_maal_agriculture' => lang('zakat_maal_agriculture'),
            'zakat_maal_farm_animals' => lang('zakat_maal_farm_animals'),
            'zakat_maal_gold_and_silver' => lang('zakat_maal_gold_and_silver'),
            'zakat_maal_money' => lang('zakat_maal_money'),
            'zakat_maal_rikaz' => lang('zakat_maal_rikaz'),
            'zakat_maal_trading' => lang('zakat_maal_trading'),
        ];
        asort($type_options);
        return $type_options;
    }
}
