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
                $this->controller->form_validation->set_rules('user_type', 'User Type', ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', 'Name', ['trim', 'required', 'max_length[100]']);
                $this->controller->form_validation->set_rules('address', 'Address', ['trim', 'required']);

                $this->controller->form_validation->set_rules('phone_number', 'Phone Number', ['trim', 'required', 'max_length[16]']);

                break;
            case 'sign_in' :
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_length[32]', ['email_callable', [$this, 'check_sign_in']]]);

                break;
            case 'update' :
                $this->controller->form_validation->set_rules('id', 'Id', ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('user_type', 'User Type', ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', 'Name', ['trim', 'required', 'max_length[100]']);

                $this->controller->form_validation->set_rules('address', 'Address', ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', 'Phone Number', ['trim', 'required', 'max_length[16]']);

                break;
            default :
                $this->controller->form_validation->set_rules('id', 'Id', ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('user_type', 'User Type', ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', 'Name', ['trim', 'required', 'max_length[100]']);

                $this->controller->form_validation->set_rules('address', 'Address', ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', 'Phone Number', ['trim', 'required', 'max_length[16]']);

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
     ©*/
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

    public function check_sign_in()
    {
        $count = $this->db->from($this->table)->where(['user_type' => 'admin', 'email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) ])->count_all_results();
        if ($count == 0) {
            $this->controller->form_validation->set_message('email_callable', 'These credentials do not match our records.');
            return false;
        }
        return true;
    }

    public function get_user_type_options()
    {
        return [
            '' => '- Choose User Type -',
            'admin' => 'admin',
            'user' => 'user',
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
}
