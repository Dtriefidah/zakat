<?php

class Products extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_Model');
    }

    public function index($id = 0)
    {
        $response = [];

        if ($id > 0) {
            $response['products'] = $this->Products_Model->row(['id' => $id], 'array');
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
