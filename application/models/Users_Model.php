<?php

class Users_Model extends CI_Model
{
    public $controller;
    public $table = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->controller =& get_instance();
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->controller->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]', 'is_unique['.$this->table.'.email]']);
                $this->controller->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->controller->form_validation->set_rules('address', lang('address'), ['trim', 'required']);

                $this->controller->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
            case 'sign_in' :
                $this->controller->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]', ['sign_in_callable', [$this, 'sign_in_check']]]);

                break;
            case 'update' :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]', ['email_callable', [$this, 'email_check']]]);
                $this->controller->form_validation->set_rules('password', lang('password'), ['trim', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);

                $this->controller->form_validation->set_rules('address', lang('address'), ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
            default :
                $this->controller->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);

                $this->controller->form_validation->set_rules('address', lang('address'), ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
        }
        return $this->controller->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'user_type' => 'admin' / 'user',
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     * ]
     */
    public function create($params = [])
    {
        $data = [
            'user_type' => $params['user_type'],
            'email' => $params['email'],
            'password' => md5($params['password']),
            'name' => $params['name'],
            'address' => $params['address'],
            'phone_number' => $params['phone_number'],
        ];
        $this->db->insert($this->table, $data);
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    public function email_check()
    {
        $count = $this->db->from($this->table)->where('id !=', $this->input->post('id'))->where('email', $this->input->post('email'))->count_all_results();
        if ($count > 0) {
            $this->controller->form_validation->set_message('email_callable', '{field} '.lang('field_must_contain_a_unique_value').'.');
            return false;
        }
        return true;
    }

    public function get_user_type_options()
    {
        return [
            '' => '- '.lang('choose_user_type').' -',
            'admin' => lang('admin'),
            'user' => lang('user'),
        ];
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
     *      'user_type' => ['admin', 'user'],
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     *      'order_by' => 'email ASC',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['user_type'])) { $this->db->where_in('user_type', $params['user_type']); }
        if (isset($params['email'])) { $this->db->where('email', $params['email']); }
        if (isset($params['password'])) { $this->db->where('password', md5($params['password'])); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['address'])) { $this->db->where('address', $params['address']); }
        if (isset($params['phone_number'])) { $this->db->where('phone_number', $params['phone_number']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('email ASC');

        return $this->db->get()->result();
    }

    public function sign_in_check()
    {
        $count = $this->db->from($this->table)->where(['user_type' => 'admin', 'email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) ])->count_all_results();
        if ($count == 0) {
            $this->controller->form_validation->set_message('sign_in_callable', lang('these_credentials_do_not_match_our_records').'.');
            return false;
        }
        return true;
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
     */
    public function update($params = [])
    {
        $data = [];

        if (isset($params['user_type'])) { $data['user_type'] = $params['user_type']; }
        if (isset($params['email'])) { $data['email'] = $params['email']; }
        if (isset($params['password'])) { $data['password'] = md5($params['password']); }
        if (isset($params['name'])) { $data['name'] = $params['name']; }
        if (isset($params['address'])) { $data['address'] = $params['address']; }
        if (isset($params['phone_number'])) { $data['phone_number'] = $params['phone_number']; }
        if (isset($params['user_type'])) { $data['user_type'] = $params['user_type']; }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }

    public function users_options()
    {
        $categories = $this->db->from($this->table)->order_by('name ASC')->get()->result_array();
        $options = ['' => '- '.lang('choose_user').' -'] + array_column($categories, 'name', 'id');
        return $options;
    }
}
