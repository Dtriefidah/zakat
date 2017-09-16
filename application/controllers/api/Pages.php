<?php

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_Model');
    }

    public function index($id = 0)
    {
        $response['page'] = $this->Pages_Model->row(['id' => $id], 'array');

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
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
