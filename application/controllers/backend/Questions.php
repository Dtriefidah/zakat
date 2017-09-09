<?php

class Questions extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Answers_Model', 'Questions_Model', 'Users_Model']);
    }

    public function index()
    {
        $vars['questions'] = $this->Questions_Model->rows();
        $this->render('backend/questions/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Questions_Model->validate('create')) {
            $this->Questions_Model->create($this->input->post());
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/questions');
        }

        $vars['Users_Model'] = $this->Users_Model;
        $this->render('backend/questions/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Questions_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        redirect('backend/questions');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Questions_Model->validate('update')) {
            $this->Questions_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            redirect('backend/questions');
        }

        $vars['answers'] = $this->Answers_Model->rows(['question_id' => $id, 'order_by' => 'created_at ASC']);
        $vars['Users_Model'] = $this->Users_Model;
        $vars['question'] = $this->Questions_Model->row(['id' => $id]);

        $this->render('backend/questions/form', $vars);
    }
}
