<?php

class Categories extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_Model');
    }

    public function index()
    {
        $vars['categories'] = $this->Categories_Model->rows();
        $this->render('backend/categories/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Categories_Model->validate('create')) {
            $this->Categories_Model->create($this->input->post());
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/categories');
        }

        $vars['Categories_Model'] = $this->Categories_Model;
        $this->render('backend/categories/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Categories_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        redirect('backend/categories');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Categories_Model->validate('update')) {
            $this->Categories_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            redirect('backend/categories');
        }

        $vars['category'] = $this->Categories_Model->row(['id' => $id]);
        $this->render('backend/categories/form', $vars);
    }
}
