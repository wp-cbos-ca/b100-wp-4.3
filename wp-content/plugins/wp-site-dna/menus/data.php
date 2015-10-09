<?php

defined( 'ABSPATH' ) || die();

function get_menus_data() {
    $menus = array ( 
            0 => array ( 
                'name' => 'Main Menu', 'slug' => 'main-menu', 'build' => 1, 
                'items' => array (
                        0 => array ( 'title' => 'Home', 'slug' => 'home', 'build' => 1 ),
                        1 => array ( 'title' => 'Blog', 'slug' => 'blog', 'build' => 1 ),
                        2 => array ( 'title' => 'About', 'slug' => 'about', 'build' => 1 ),
                        3 => array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
                        )
            ),
            1 => array ( 
                'name' => 'Secondary Menu', 'slug' => 'secondary-menu', 'build' => 0,
                'items' => array (
                        0 => array ( 'title' => 'Home', 'slug' => 'home', 'build' => 1 ),
                        1 => array ( 'title' => 'Blog', 'slug' => 'blog', 'build' => 1 ),
                        2 => array ( 'title' => 'About', 'slug' => 'about', 'build' => 1 ),
                        3 => array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
                        )
            ),
            2 => array ( 
                'name' => 'Footer Menu', 'slug' => 'footer-menu', 'build' => 1,
                'items' => array (
                        0 => array ( 'title' => 'Terms', 'slug' => 'terms', 'build' => 1 ),
                        1 => array ( 'title' => 'Privacy', 'slug' => 'privacy', 'build' => 1 ),
                        2 => array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
            )
        ) 
    );
    return $menus;
}
