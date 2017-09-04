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
}
