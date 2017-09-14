<?php

class Backend_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
        if ($this->is_login() == false) { redirect('backend/auth/sign_in'); }
    }

    public function is_login()
    {
        if ($this->user && $this->user->user_type == $this->Users_Model->user_type_admin) {
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
