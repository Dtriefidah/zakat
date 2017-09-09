<?php

class Answers extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Answers_Model', 'Questions_Model', 'Users_Model']);
    }

    public function index()
    {
        $vars['answers'] = $this->Answers_Model->rows();
        $this->render('backend/answers/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Answers_Model->validate('create')) {
            $this->Answers_Model->create($this->input->post());
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/answers');
        }

        $vars['Questions_Model'] = $this->Questions_Model;
        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/answers/form', $vars);
    }

    public function delete($id = 0, $last_url = '')
    {
        $this->Answers_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        empty($last_url) ? redirect('backend/answers') : redirect(base64_decode($last_url));
    }

    public function update($id = 0, $last_url = '')
    {
        if ($this->input->post() && $this->Answers_Model->validate('update')) {
            $this->Answers_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            empty($last_url) ? redirect('backend/answers') : redirect(base64_decode($last_url));
        }

        $vars['answer'] = $this->Answers_Model->row(['id' => $id]);
        $vars['Questions_Model'] = $this->Questions_Model;
        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/answers/form', $vars);
    }
}