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

    public function contact_us_post()
    {
        $this->load->model('form/Contact_Us');

        if ($this->input->post() && $this->Contact_Us->validate('contact_us')) {

        }
    }

    public function detail($slug = '')
    {
        ($page = $this->Pages_Model->row(['slug' => $slug])) ?: show_404();

        $vars['page'] = $page;

        $this->detail_post($slug);
        $this->render('frontend/page/detail/'.$page->template, $vars);
    }

    public function detail_post($slug)
    {
        switch ($slug) {
            case 'hubungi-kami' :
                $this->contact_us_post(); break;
        }
    }
}
