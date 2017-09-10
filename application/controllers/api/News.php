<?php

class News extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_Model');
    }

    public function index($id = 0)
    {
        $response = [];

        if ($id > 0) {
            $response['news'] = $this->News_Model->row(['id' => $id], 'array');
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
