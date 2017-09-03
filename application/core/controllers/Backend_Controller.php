<?php
class Backend_Controller extends MY_Controller
{
    public $layout = 'default';

    public function __construct()
    {
        parent::__construct();
    }

    public function render($view, $vars = [], $return = FALSE, $layout = 'default')
    {
        $vars['content'] = $this->load->view($view, $vars, true);
        $this->load->view('backend/layouts/'.$this->layout, $vars);
    }
}