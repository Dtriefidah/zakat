<?php

class MY_Pagination extends CI_Pagination
{
    public $bootstrap_material = [
        'attributes' => ['class' => 'page-link'],
        'page_query_string' => true,
        'query_string_segment' => 'offset',
        'reuse_query_string' => true,

        // 'first_link' => '‹ First',
        // 'first_tag_open' => '',
        // 'first_tag_close' => '',
        // 'last_link' => 'Last ›',
        // 'last_tag_open' => '">',
        // 'last_tag_close' => ',

        // 'next_link' => '>',
        'next_tag_open' => '<li class="last page-item">',
        'next_tag_close' => '</li>',
        // 'prev_link' => '<',
        'prev_tag_open' => '<li class="first page-item">',
        'prev_tag_close' => '</li>',

        'cur_tag_open' => '<li class="page-item active"><a class="page-link">',
        'cur_tag_close' => '</a></li>',
        'num_tag_open' => '<li class="page-item">',
        'num_tag_close' => '</li>',
    ];
}
