<?php

class News_Model extends CI_Model
{
    public $controller;
    public $table = 'news';

    public function __construct()
    {
        parent::__construct();
        $this->controller =& get_instance();
        $this->load->model('Categories_Model');
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->controller->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);

                break;
            case 'update' :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);

                break;
            default :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('category_id', lang('category'), ['trim', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('content', lang('content'), ['trim']);
                $this->controller->form_validation->set_rules('image', lang('name'), ['trim', 'max_length[255]']);

                $this->controller->form_validation->set_rules('created_at', lang('created_at'), ['trim', 'required']);

                break;
        }
        return $this->controller->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'category_id' => '1',
     *      'title' => 'title',
     *      'content' => 'content',
     * ]
     */
    public function create($params = [])
    {
        $data = [
            'category_id' => $params['category_id'],
            'title' => $params['title'],
            'content' => $params['content'],
            // 'image' => $params['image'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['slug'] = url_title($params['title'].' '.$id, '-', true);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     * ]
     * @return object
     */
    public function row($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }

        return $this->db->get()->row();
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
    public function rows($params = [])
    {
        $this->db->select('n.*');
        $this->db->select('c.name AS category_name');

        $this->db->from($this->table.' AS n');
        $this->db->join($this->Categories_Model->table.' AS c', 'c.id = n.category_id', 'LEFT');

        if (isset($params['category_id'])) { $this->db->where_in('n.category_id', $params['category_id']); }
        if (isset($params['title'])) { $this->db->where('n.title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('n.slug', $params['slug']); }
        if (isset($params['image'])) { $this->db->where('n.image', $params['image']); }
        if (isset($params['created_at'])) { $this->db->where('n.created_at', $params['created_at']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('n.created_at DESC');

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'category_id' => 'category_id',
     *      'title' => 'title',
     *      'content' => 'content',
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

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}
