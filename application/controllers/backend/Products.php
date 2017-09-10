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
            $this->session->set_flashdata('message', 'Data has been created');
            redirect('backend/products');
        }

        $vars['Products_Model'] = $this->Products_Model;
        $this->render('backend/products/form', $vars);
    }

    public function delete($id = 0)
    {
        $this->Products_Model->delete($id);
        $this->session->set_flashdata('message', 'Data has been deleted');
        redirect('backend/products');
    }

    public function update($id = 0)
    {
        if ($this->input->post() && $this->Products_Model->validate('update')) {
            $this->Products_Model->update($this->input->post());
            $this->session->set_flashdata('message', 'Data has been updated');
            redirect('backend/products');
        }

        $vars['product'] = $this->Products_Model->row(['id' => $id]);
        $vars['Products_Model'] = $this->Products_Model;
        $this->render('backend/products/form', $vars);
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
