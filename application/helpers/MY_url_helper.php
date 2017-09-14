<?php

if ( ! function_exists('current_url_with_params'))
{
	function current_url_with_params()
    {
        $CI =& get_instance();

        $url = $CI->config->site_url($CI->uri->uri_string());
        return ($_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url.'?');
    }
}
