<?php

class Page extends Frontend_Controller
{
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

        $vars = $this->detail_vars($page->template);
        $vars['page'] = $page;

        $this->detail_post($page->template);
        $this->render('frontend/page/detail/'.$page->template, $vars);
    }

    public function detail_post($template)
    {
        switch ($template) {
            case 'contact_us' :
                $this->contact_us_post(); break;
        }
    }

    public function detail_vars($template)
    {
        $vars = [];

        switch ($template) {
            case 'zakat_fitrah' :
                $vars = $this->zakat_fitrah_vars();
                break;
            case 'zakat_maal_gold_and_silver' :
                $vars = $this->zakat_maal_gold_and_silver_vars();
                break;
        }

        return $vars;
    }

    // page detail
    public function contact_us_post()
    {
        $this->load->model('form/Contact_Us');

        if ($this->input->post('send') && $this->Contact_Us->validate('contact_us')) {
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

    public function zakat_fitrah_vars()
    {
        $this->load->model('Products_Model');

        $vars['products'] = $this->Products_Model->rows(['type' => 'zakat_fitrah']);
        return $vars;
    }

    public function zakat_maal_vars()
    {
        $this->load->model('Products_Model');

        $vars['products'] = $this->Products_Model->rows(['type' => 'zakat_fitrah']);
        return $vars;
    }

    public function zakat_maal_gold_and_silver_vars()
    {
        $this->load->model('Products_Model');

        $vars['products'] = $this->Products_Model->rows(['type' => 'zakat_maal_gold_and_silver']);
        return $vars;
    }
}
