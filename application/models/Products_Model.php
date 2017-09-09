<?php

class Products_Model extends CI_Model
{
    public $controller;
    public $table = 'products';

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
                $this->controller->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->controller->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                break;
            case 'update' :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->controller->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                break;
            default :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('type', lang('type'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->controller->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->controller->form_validation->set_rules('price', lang('price'), ['trim', 'required', 'integer', 'max_length[11]']);

                break;
        }
        return $this->controller->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'type' => 'Zakat Agriculture' / 'Zakat Farm Animals' / 'Zakat Gold and Silver' / 'Zakat Money' / 'Zakat Rikaz' / 'Zakat Trading',
     *      'name' => 'name',
     *      'slug' => 'slug',
     *      'price' => '1',
     * ]
     */
    public function create($params = [])
    {
        $data = [
            'type' => $params['type'],
            'name' => $params['name'],
            'price' => $params['price'],
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
     *      'type' => 'Zakat Agriculture' / 'Zakat Farm Animals' / 'Zakat Gold and Silver' / 'Zakat Money' / 'Zakat Rikaz' / 'Zakat Trading',
     *      'name' => 'name',
     *      'slug' => 'slug',
     *      'price' => '1',
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

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }

    public function get_type_options()
    {
        return [
            '' => '- '.lang('choose_type').' -',
            'Zakat Agriculture' => lang('Zakat Agriculture'),
            'Zakat Farm Animals' => lang('Zakat Farm Animals'),
            'Zakat Gold and Silver' => lang('Zakat Gold and Silver'),
            'Zakat Money' => lang('Zakat Money'),
            'Zakat Rikaz' => lang('Zakat Rikaz'),
            'Zakat Trading' => lang('Zakat Trading'),
        ];
    }
}
