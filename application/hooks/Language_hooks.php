<?php

class Language_hooks
{
    function initialize()
    {
        $ci =& get_instance();
        $ci->load->helper('language');

        if ($language = $ci->session->userdata('language')) {
            $ci->config->set_item('language', $language);
        }
        $ci->lang->load('index', $ci->config->item('language'));
    }
}
