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

        // dump($_POST);
        if ($this->input->post()) {
            if ($this->Contact_Us->validate('contact_us')) {

            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect($this->agent->referrer());
            }
        }
    }

    public function detail($slug = '')
    {
        ($page = $this->Pages_Model->row(['slug' => $slug])) ?: show_404();

        $vars['page'] = $page;

        $this->render('frontend/page/detail/'.$page->template, $vars);
    }
}
