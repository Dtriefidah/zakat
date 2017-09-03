<?php

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }

    public function sign_in()
    {
        if ($this->input->post() && $this->Users_Model->validate('sign_in')) {
            $user = $this->Users_Model->row(['user_type' => 'admin', 'email' => $this->input->post('email'), 'password' => $this->input->post('password')]);
            $this->session->set_userdata('user', $user);
            redirect('backend/home');
        }
        $this->load->view('backend/auth/sign_in');
    }

    public function sign_out()
    {
        $this->session->unset_userdata('user');
        redirect('backend/auth/sign_in');
    }
}
