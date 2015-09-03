<?php

function get_pages_data() {
    $pages = array ( 
        array ( 
            'build' => 1, 
            'post_title' => 'Home', 'post_name' => 'home', 'guid' => 'home', 'template' => 'front-page',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam risus tortor, commodo a massa non, varius convallis lectus. Suspendisse ut convallis odio. Nulla et eros lacinia, posuere tortor et, gravida nunc. Interdum et malesuada fames ac ante.',
        ),
        array ( 
            'build' => 1,
            'post_title' => 'About Us', 'post_name' => 'about-us', 'guid' => 'about-us', 'template' => 'contact',
            'post_content' => '',
        ),
        array ( 
            'build' => 1,
            'post_title' => 'Contact', 'post_name' => 'contact', 'guid' => 'contact', 'template' => 'contact',
            'post_content' => '',
        ), 
        array ( 
            'build' => 1,
            'post_title' => 'Terms', 'post_name' => 'terms', 'guid' => 'terms', 'template' => 'default',
            'post_content' => '',
        ),  
        array ( 
            'build' => 1,
            'post_title' => 'Privacy', 'post_name' => 'privacy', 'guid' => 'privacy', 'template' => 'default',
            'post_content' => '',
        ), 

    );
    return $pages;
}
