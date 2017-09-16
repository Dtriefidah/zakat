<?php

class Products extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_Model');
    }

    public function index()
    {
        $vars['products'] = $this->Products_Model->rows();
        $this->render('backend/products/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Products_Model->validate('create')) {
            $this->Products_Model->create($this->input->post());
            $this->session->set_flashdata('message', lang('data_has_been_created'));
            redirect('backend/products');
        }

        $vars['Products_Model'] = $this->Products_Model;
        $this->render('backend/products/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Products_Model->delete($id);
        $this->session->set_flashdata('message', lang('data_has_been_deleted'));
        redirect('backend/products');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Products_Model->validate('update')) {
            $this->Products_Model->update($this->input->post());
            $this->session->set_flashdata('message', lang('data_has_been_updated'));
            redirect('backend/products');
        }

        $vars['product'] = $this->Products_Model->row(['id' => $id]);
        $vars['Products_Model'] = $this->Products_Model;
        $this->render('backend/products/form', $vars);
    }
}
