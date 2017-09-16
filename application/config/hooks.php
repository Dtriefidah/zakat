<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['display_override'] = [
    'class' => 'Minifyhtml',
    'filename' => 'Minifyhtml.php',
    'filepath' => 'hooks',
    'function' => 'output',
];
$hook['post_controller_constructor'] = [
    'class' => 'Language_hooks',
    'filename' => 'Language_hooks.php',
    'filepath' => 'hooks',
    'function' => 'initialize',
];
$hook['post_controller'] = function() {
    $ci =& get_instance();
    if (! $ci->input->is_ajax_request()) { $ci->output->enable_profiler((getenv('PROFILER') == 'true')); }
};
