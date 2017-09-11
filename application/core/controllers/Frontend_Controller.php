<?php

class Frontend_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_login()
    {
        if ($this->user) {
            return true;
        }
        return false;
    }

    public function render($view, $vars = [], $return = false)
    {
        $vars['content'] = $this->load->view($view, $vars, true);
        $vars['is_login'] = $this->is_login();
        $this->load->view('frontend/layouts/'.$this->layout, $vars);
    }
}
