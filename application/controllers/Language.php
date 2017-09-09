<?php

class Language extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function switch_language($language)
    {
        $language = array_key_exists($language, $this->config->item('language_options')) ? $language : $this->config->item('language');
        $this->session->set_userdata('language', $language);
        redirect($this->agent->referrer());
    }
}
