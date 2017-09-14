<?php

class News_Model extends CI_Model
{
    public $ci;
    public $table = 'news';

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

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim']);
                $this->ci->form_validation->set_rules('image', lang('name'), ['trim', 'max_length[255]']);

                $this->ci->form_validation->set_rules('created_at', lang('created_at'), ['trim', 'required']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'category_id' => 'category_id',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'created_at' => 'created_at',
     *      'order_by' => 'n.created_at DESC',
     * ]
     * @return object
     */
    public function count($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['category_id'])) { $this->db->where('category_id', $params['category_id']); }
        if (isset($params['title'])) { $this->db->where('title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }
        if (isset($params['image'])) { $this->db->where('image', $params['image']); }
        if (isset($params['created_at'])) { $this->db->where('created_at', $params['created_at']); }

        return $this->db->count_all_results();
    }

    /**
     * @param array $params
     * [
     *      'category_id' => '1',
     *      'title' => 'title',
     *      'content' => 'content',
     *      'image' => 'image',
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['category_id'])) { $data['category_id'] = $params['category_id']; }
        if (isset($params['title'])) { $data['title'] = $params['title']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['slug'] = url_title($params['title'].' '.$id, '-', true);
        $data['image'] = $this->file_upload($params['image'], $this->upload->news_path.'/'.$id);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return $id;
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
        delete_files($this->upload->news_path.'/'.$id, true); // file_helper
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
     *      'slug' => 'slug',
     *      'return' => 'array' / 'object',
     * ]
     * @return object
     */
    public function row($params = [], $return = 'object')
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }

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
     *      'category_id' => 'category_id',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'image' => 'image',
     *      'created_at' => 'created_at',
     *      'order_by' => 'n.created_at DESC',
     *      'limit' => '10',
     *      'offset' => '0',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->select('n.*');
        $this->db->select('c.name AS category_name');

        $this->db->from($this->table.' AS n');
        $this->db->join($this->Categories_Model->table.' AS c', 'c.id = n.category_id', 'LEFT');

        if (isset($params['category_id'])) { $this->db->where('n.category_id', $params['category_id']); }
        if (isset($params['title'])) { $this->db->where('n.title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('n.slug', $params['slug']); }
        if (isset($params['image'])) { $this->db->where('n.image', $params['image']); }
        if (isset($params['created_at'])) { $this->db->where('n.created_at', $params['created_at']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('n.created_at DESC');
        if (isset($params['limit'])) { $this->db->limit($params['limit'], $params['offset']); }

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'category_id' => 'category_id',
     *      'title' => 'title',
     *      'content' => 'content',
     *      'image' => 'image',
     * ]
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['category_id'])) { $data['category_id'] = $params['category_id']; }
        if (isset($params['title'])) {
            $data['title'] = $params['title'];
            $data['slug'] = url_title($params['title'].' '.$params['id'], '-', true);
        }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        if (isset($params['image'])) { $data['image'] = $this->file_upload($params['image'], $this->upload->news_path.'/'.$params['id']); }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}
