<?php

class Pages extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pages_Model']);
    }

    public function index()
    {
        $vars['pages'] = $this->Pages_Model->rows();
        $this->render('backend/pages/index', $vars);
    }

    public function create()
    {
        if ($this->input->post() && $this->Pages_Model->validate('create')) {
            $this->Pages_Model->create($this->input->post());
            $this->session->set_flashdata('message', lang('data_has_been_created'));
            redirect('backend/pages');
        }

        $vars['Pages_Model'] = $this->Pages_Model;
        $this->render('backend/pages/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Pages_Model->delete($id);
        $this->session->set_flashdata('message', lang('data_has_been_deleted'));
        redirect('backend/pages');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Pages_Model->validate('update')) {
            $this->Pages_Model->update($this->input->post());
            $this->session->set_flashdata('message', lang('data_has_been_updated'));
            redirect('backend/pages');
        }

        $vars['page'] = $this->Pages_Model->row(['id' => $id]);
        $vars['Pages_Model'] = $this->Pages_Model;
        $this->render('backend/pages/form', $vars);
    }

    public function upload()
    {
        $upload_path = './'.$this->upload->temp_path;
        if (! is_dir($upload_path)) { mkdir($upload_path, 0755, true); }

        $config['allowed_types'] = 'gif|jpg|png';
        $config['upload_path'] = $upload_path;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            http_response_code(200);
            $file = $this->upload->data();
            $response['file'] = $file;
            $response['file']['temp_full_path'] = $this->upload->temp_path.'/'.$file['file_name'];
        } else {
            http_response_code(401);
            $response = strip_tags($this->upload->display_errors());
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
