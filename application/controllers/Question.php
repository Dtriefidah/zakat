<?php

class Question extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Questions_Model');
    }

    public function index()
    {
        $vars['last_url'] = current_url_with_params();
        $vars['questions'] = $this->Questions_Model->rows();
        dump($vars);
        $this->render('frontend/question/index', $vars);
    }

    public function create()
    {
        ($this->is_login()) ?: redirect('auth/sign_in?last_url='.base64_encode(current_url_with_params()));

        $vars['last_url'] = $last_url = base64_decode($this->input->get('last_url'));

        if ($this->input->post()) {
            $_POST['user_id'] = $this->user->id;
            if ($this->Questions_Model->validate('create')) {
                $this->Questions_Model->create($this->input->post());
                $this->session->set_flashdata('message', lang('question_has_been_created'));

                $last_url = $this->input->get('last_url');
                $last_url ? redirect(base64_decode($last_url)) : redirect('question');
            }
        }

        $this->render('frontend/question/create', $vars);
    }

    // delete
    public function contact_us_post()
    {
        $this->load->model('form/Contact_Us');

        if ($this->input->post() && $this->Contact_Us->validate('contact_us')) {
            $config = $this->email->get_config();

            $this->email->initialize($config);
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to($config['smtp_user']);
            $this->email->cc($this->input->post('email'));
            $this->email->subject(lang('contact_us'));
            $this->email->message($this->input->post('message'));
            ($this->email->send()) ?: show_error($this->email->print_debugger());

            $this->session->set_flashdata('message', lang('message_has_been_sent'));
            redirect('page/hubungi-kami', 'refresh');
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
