<?php

class Page extends Frontend_Controller
{
    protected $limit = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_Model');
    }

    public function index()
    {
        show_404();
    }

    public function detail($slug = '')
    {
        ($page = $this->Pages_Model->row(['slug' => $slug])) ?: show_404();

        $vars['page'] = $page;

        $this->render('frontend/page/detail/'.$page->template, $vars);
    }
}
