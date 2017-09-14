<?php

class News extends Frontend_Controller
{
    protected $limit = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Categories_Model', 'News_Model']);
    }

    public function index()
    {
        $vars['categories'] = $this->Categories_Model->rows();
        $vars['Categories_Model'] = $this->Categories_Model;
        $vars['news'] = $this->News_Model->rows(['order_by' => 'created_at DESC', 'limit' => $this->limit, 'offset' => $this->input->get('offset')]);

        $config = $this->pagination->bootstrap_material;
        $config['base_url'] = current_url();
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->News_Model->count();
        $this->pagination->initialize($config);
        $vars['news_pagination'] = $this->pagination->create_links();

        $this->render('frontend/news/index', $vars);
    }
}
