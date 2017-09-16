<?php

class Contact_Us extends CI_Model
{
    public $ci;

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'contact_us' :
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->ci->form_validation->set_rules('message', lang('message'), ['trim', 'required']);

                break;
        }
        return $this->ci->form_validation->run();
    }
}
