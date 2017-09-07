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

    public function delete($id = 0)
    {
        $this->Answers_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        redirect('backend/answers');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Answers_Model->validate('update')) {
            $this->Answers_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            redirect('backend/answers');
        }

        $vars['answer'] = $this->Answers_Model->row(['id' => $id]);
        $vars['Questions_Model'] = $this->Questions_Model;
        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/answers/form', $vars);
    }
}
