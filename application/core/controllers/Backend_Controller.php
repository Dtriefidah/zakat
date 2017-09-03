<?php
class Backend_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->is_login() == false) { redirect('backend/auth/sign_in'); }
    }

    public function is_login()
    {
        if ($this->user && $this->user->user_type == 'admin') {
            return true;
        }
        return false;
    }

    public function render($view, $vars = [], $return = false)
    {
        $vars['content'] = $this->load->view($view, $vars, true);
        $this->load->view('backend/layouts/'.$this->layout, $vars);
    }
}
