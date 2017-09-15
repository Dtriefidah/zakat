<?php

class Pages_Model extends CI_Model
{
    public $ci;
    public $table = 'pages';

    public $image_name;
    public $image_size;

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
                $this->ci->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('template', lang('template'), ['trim', 'max_length[255]']);

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('template', lang('template'), ['trim', 'max_length[255]']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim']);
                $this->ci->form_validation->set_rules('image', lang('name'), ['trim', 'max_length[255]']);

                $this->ci->form_validation->set_rules('template', lang('template'), ['trim', 'max_length[255]']);
                $this->ci->form_validation->set_rules('created_at', lang('created_at'), ['trim', 'required']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'title' => 'title',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'template' => 'default',
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['title'])) {
            $data['title'] = $params['title'];
            $data['slug'] = url_title($params['title'], '-', true);
        }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        if (isset($params['template'])) { $data['template'] = $params['template']; }
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['image'] = $this->file_upload($params['image'], $this->upload->pages_path.'/'.$id);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return $id;
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
        delete_files($this->upload->pages_path.'/'.$id, true); // file_helper
    }

    public function file_upload($temp_file = '', $new_path = '')
    {
        $new_file = '';

        if (file_exists($temp_file)) {
            if (! is_dir($new_path)) { mkdir($new_path, 0755, true); }
            $temp_file_info = get_file_info($temp_file);
            $new_file = $new_path.'/'.$temp_file_info['name'];
            rename($temp_file, $new_file);
        }

        foreach (glob($new_path.'/*') as $old_file) {
            if (! in_array(basename($old_file), [basename($new_file)])) { unlink($old_file); }
        }

        return $new_file;
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'template' => 'default',
     *      'created_at' => 'created_at',
     * ]
     * @param array $return' = 'array' / 'object',
     * @return object
     */
    public function row($params = [], $return = 'object')
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }
        if (isset($params['title'])) { $this->db->where('title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }
        if (isset($params['content'])) { $this->db->where('content', $params['content']); }
        if (isset($params['image'])) { $this->db->where('image', $params['image']); }
        if (isset($params['template'])) { $this->db->where('template', $params['template']); }
        if (isset($params['created_at'])) { $this->db->where('created_at', $params['created_at']); }

        if ($return == 'array') {
            $row = $this->db->get()->row_array();

            $file_info = get_file_info($row['image']);
            $row['image_name'] = $file_info['name'];
            $row['image_size'] = $file_info['size'];
        } else if ($return == 'object') {
            $row = $this->db->get()->row();
        }

        return $row;
    }

    /**
     * @param array $params
     * [
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'template' => 'default',
     *      'created_at' => 'created_at',
     *      'order_by' => 'created_at DESC',
     *      'limit' => '10',
     *      'offset' => '0',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['title'])) { $this->db->where('title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }
        if (isset($params['content'])) { $this->db->where('content', $params['content']); }
        if (isset($params['image'])) { $this->db->where('image', $params['image']); }
        if (isset($params['template'])) { $this->db->where('template', $params['template']); }
        if (isset($params['created_at'])) { $this->db->where('created_at', $params['created_at']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('created_at DESC');
        if (isset($params['limit'])) { $this->db->limit($params['limit'], $params['offset']); }

        return $this->db->get()->result();
    }

    public function template_options()
    {
        return [
            'default' => 'default',
        ];
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'title' => 'title',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'template' => 'default',
     * ]
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['title'])) {
            $data['title'] = $params['title'];
            $data['slug'] = url_title($params['title'], '-', true);
        }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        if (isset($params['image'])) { $data['image'] = $this->file_upload($params['image'], $this->upload->pages_path.'/'.$params['id']); }
        if (isset($params['template'])) { $data['template'] = $params['template']; }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}
