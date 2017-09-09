<?php

class Frontend_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render($view, $vars = [], $return = false)
    {
        $vars['content'] = $this->load->view($view, $vars, true);
        $this->load->view('frontend/layouts/'.$this->layout, $vars);
    }
}
