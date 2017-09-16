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
            $this->session->set_flashdata('message', lang('data_has_been_created'));
            redirect('backend/users');
        }

        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/users/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Users_Model->delete($id);
        $this->session->set_flashdata('message', lang('data_has_been_deleted'));
        redirect('backend/users');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Users_Model->validate('update')) {
            $this->Users_Model->update($this->input->post());
            $this->session->set_flashdata('message', lang('data_has_been_updated'));
            redirect('backend/users');
        }

        $vars['user'] = $this->Users_Model->row(['id' => $id]);
        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/users/form', $vars);
    }
}
