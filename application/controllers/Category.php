<?php

class Category extends Frontend_Controller
{
    protected $limit = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Categories_Model', 'News_Model']);
    }

    public function index($slug = '')
    {
        ($category = $this->Categories_Model->row(['slug' => $slug])) ?: show_404();

        $vars['categories'] = $this->Categories_Model->rows();
        $vars['Categories_Model'] = $this->Categories_Model;
        $vars['category'] = $category;
        $vars['news'] = $this->News_Model->rows(['category_id' => $category->id, 'order_by' => 'created_at DESC', 'limit' => $this->limit, 'offset' => $this->input->get('offset')]);

        $config = $this->pagination->bootstrap_material;
        $config['base_url'] = current_url();
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->News_Model->count(['category_id' => $category->id]);
        $this->pagination->initialize($config);
        $vars['news_pagination'] = $this->pagination->create_links();

        $this->render('frontend/category/index', $vars);
    }
}
