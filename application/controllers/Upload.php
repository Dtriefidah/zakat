<?php

class Upload extends CI_Controller
{
    public function index()
    {
        $upload_path = './'.$this->upload->temp_path;
        if (! is_dir($upload_path)) { mkdir($upload_path, 0755, true); }

        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_height'] = 1024;
        // $config['max_width'] = 1024;
        $config['remove_spaces'] = false;
        $config['upload_path'] = $upload_path;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            http_response_code(200);
            $file = $this->upload->data();
            $response['file'] = $file;
            $response['file']['temp_full_path'] = $this->upload->temp_path.'/'.$file['file_name'];
        } else {
            http_response_code(401);
            $response['error'] = strip_tags($this->upload->display_errors());
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
