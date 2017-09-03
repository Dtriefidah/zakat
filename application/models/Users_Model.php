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
            default :
                $this->controller->form_validation->set_rules('id', 'Id', ['trim', 'required', 'integer', 'max_lengh[11]']);
                $this->controller->form_validation->set_rules('user_type', 'User Type', ['trim', 'required']);
                $this->controller->form_validation->set_rules('email', 'Email', ['trim', 'required', 'valid_email', 'max_lengh[100]']);
                $this->controller->form_validation->set_rules('password', 'Password', ['trim', 'required', 'max_lengh[32]']);
                $this->controller->form_validation->set_rules('name', 'Name', ['trim', 'required', 'max_lengh[100]']);
                
                $this->controller->form_validation->set_rules('address', 'Address', ['trim', 'required']);
                $this->controller->form_validation->set_rules('phone_number', 'Phone Number', ['trim', 'required', 'max_lengh[12]']);

                break;
        }
        return $this->controller->form_validation->run();
    }
}
