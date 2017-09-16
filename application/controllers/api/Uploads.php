<?php

class Uploads extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function summernote()
    {
        $upload_path = './'.$this->upload->summernote_path;
        if (! is_dir($upload_path)) { mkdir($upload_path, 0755, true); }

        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['file_name'] = microtime().'-'.$_FILES['file']['name'];
        $config['upload_path'] = $upload_path;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            http_response_code(200);
            $file = $this->upload->data();
            $file_path = $this->upload->summernote_path.'/'.$file['file_name'];
            $response = [
                'file_name' => $file['file_name'],
                'file_path' => base_url($file_path),
            ];
        } else {
            http_response_code(401);
            $response = strip_tags($this->upload->display_errors());
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
