<?php

class News extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Categories_Model', 'News_Model']);
    }

    public function index()
    {
        $vars['news'] = $this->News_Model->rows();
        $this->render('backend/news/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->News_Model->validate('create')) {
            $this->News_Model->create($this->input->post());
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/news');
        }

        $vars['Categories_Model'] = $this->Categories_Model;
        $this->render('backend/news/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->News_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        redirect('backend/news');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->News_Model->validate('update')) {
            $this->News_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            redirect('backend/news');
        }

        $vars['Categories_Model'] = $this->Categories_Model;
        $vars['news'] = $this->News_Model->row(['id' => $id]);
        $this->render('backend/news/form', $vars);
    }
}
