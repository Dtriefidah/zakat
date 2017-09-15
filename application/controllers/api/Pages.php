<?php

class Pages extends Frontend_Controller
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
}
