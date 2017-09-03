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
            case 'sign_in' :
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_length[32]', ['email_callable', [$this, 'check_sign_in']]]);

                break;
            default :
                $this->controller->form_validation->set_rules('id', 'Id', ['trim', 'required', 'integer', 'max_length[11]']);
                $this->controller->form_validation->set_rules('user_type', 'User Type', ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_length[32]']);
                $this->controller->form_validation->set_rules('name', 'Name', ['trim', 'required', 'max_length[100]']);

                $this->controller->form_validation->set_rules('address', 'Address', ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', 'Phone Number', ['trim', 'required', 'max_length[12]']);

                break;
        }
        return $this->controller->form_validation->run();
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

    public function row($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['user_type'])) { $this->db->where('user_type', $params['user_type']); }
        if (isset($params['email'])) { $this->db->where('email', $params['email']); }
        if (isset($params['password'])) { $this->db->where('password', md5($params['password'])); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['address'])) { $this->db->where('address', $params['address']); }
        if (isset($params['phone_number'])) { $this->db->where('phone_number', $params['phone_number']); }

        return $this->db->get()->row();
    }
}
