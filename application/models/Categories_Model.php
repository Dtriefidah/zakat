<?php

class Categories_Model extends CI_Model
{
    public $controller;
    public $table = 'categories';

    public function __construct()
    {
        parent::__construct();
        $this->controller =& get_instance();
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[255]']);

                break;
            case 'update' :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[255]']);

                break;
            default :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);

                break;
        }
        return $this->controller->form_validation->run();
    }

    public function categories_options()
    {
        $categories = $this->db->from($this->table)->order_by('name ASC')->get()->result_array();
        $options = ['' => '- '.lang('choose_category').' -'] + array_column($categories, 'name', 'id');
        return $options;
    }

    /**
     * @param array $params
     * [
     *      'name' => 'name',
     * ]
     */
    public function create($params = [])
    {
        $data = [
            'name' => $params['name'],
        ];
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['slug'] = url_title($params['name'].' '.$id, '-', true);
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
     *      'user_type' => 'admin' / 'user',
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     * ]
     * @return object
     */
    public function row($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }
        if (isset($params['user_type'])) { $this->db->where('user_type', $params['user_type']); }
        if (isset($params['email'])) { $this->db->where('email', $params['email']); }
        if (isset($params['password'])) { $this->db->where('password', md5($params['password'])); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['address'])) { $this->db->where('address', $params['address']); }
        if (isset($params['phone_number'])) { $this->db->where('phone_number', $params['phone_number']); }

        return $this->db->get()->row();
    }

    /**
     * @param array $params
     * [
     *      'name' => 'name',
     *      'slug' => 'slug',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('name ASC');

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'name' => 'name',
     * ]
     */
    public function update($params = [])
    {
        $data = [];

        if (isset($params['name'])) {
            $data['name'] = $params['name'];
            $data['slug'] = url_title($params['name'].' '.$params['id'], '-', true);
        }
        
        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}