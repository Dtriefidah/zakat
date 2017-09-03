<?php

class MY_Controller extends CI_Controller
{
    public $layout = 'default';
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }
}

require APPPATH.'core/controllers/Backend_Controller.php';
require APPPATH.'core/controllers/Frontend_Controller.php';
