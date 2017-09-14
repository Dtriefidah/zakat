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

    public function render($view, $vars = [], $return = false)
    {
        $vars['content'] = $this->load->view($view, $vars, true);
        $this->load->view('frontend/layouts/'.$this->layout, $vars);
    }
}

require APPPATH.'core/controllers/Backend_Controller.php';
require APPPATH.'core/controllers/Frontend_Controller.php';
