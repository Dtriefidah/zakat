<?php

class Users extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }

    public function index()
    {
        $vars['users'] = $this->Users_Model->rows();
        $this->render('backend/users/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Users_Model->validate('create')) {
            $this->Users_Model->create($this->input->post());
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/users');
        }

        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/users/form', $vars);
    }
}
