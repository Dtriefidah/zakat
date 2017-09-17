<?php

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'auth';
        $this->load->model('Users_Model');
    }

    public function sign_in()
    {
        if ($this->input->post() && $this->Users_Model->validate('sign_in')) {
            $user = $this->Users_Model->row(['email' => $this->input->post('email'), 'password' => $this->input->post('password')]);
            $this->session->set_userdata('user', $user);

            $last_url = base64_decode($this->input->get('last_url'));
            $last_url ? redirect($last_url) : redirect();
        }
        $this->render('frontend/auth/sign_in');
    }

    public function sign_out()
    {
        $this->session->unset_userdata('user');
        redirect();
    }

    public function sign_up()
    {
        $_POST['user_type'] = $this->Users_Model->user_type_user;
        if ($this->input->post() && $this->Users_Model->validate('sign_up')) {
            $id = $this->Users_Model->create($this->input->post());
            $user = $this->Users_Model->row(['id' => $id]);
            $this->session->set_userdata('user', $user);
            redirect();
        }
        $this->render('frontend/auth/sign_up');
    }
}
