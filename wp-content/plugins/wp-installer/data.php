<?php

defined( 'ABSPATH' ) || die();

function get_installer_data(){
    $items = array(
        'site'      => array ( 'run' => 1, 'ran' => 0 ),
        'settings'  => array ( 'run' => 0, 'ran' => 0 ),
        'content'   => array ( 'run' => 0, 'ran' => 0 ),
    );
    return $items;
}

function get_site_data(){
    $items = array(
        array( 'name' => 'clean',           'run' => 1, 'ran' => 1 ),
        array( 'name' => 'menus',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'pages',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'users',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'widgets',         'run' => 0, 'ran' => 0 ),
        array( 'name' => 'themes',          'run' => 1, 'ran' => 0 ),
        array( 'name' => 'plugins',         'run' => 1, 'ran' => 1 ),
    );
    return $items;
}

function get_settings_data() {
    $items = array(
        array( 'name' => 'general',     'run' => 1, 'ran' => 0 ),
        array( 'name' => 'writing',     'run' => 1, 'ran' => 0 ),
        array( 'name' => 'reading',     'run' => 1, 'ran' => 0 ),
        array( 'name' => 'discussion',  'run' => 1, 'ran' => 0 ),
        array( 'name' => 'media',       'run' => 1, 'ran' => 0 ),
        array( 'name' => 'permalinks',  'run' => 1, 'ran' => 0 ),
        array( 'name' => 'timezone',    'run' => 1, 'ran' => 0 ),
    );
    return $items;
}

function get_content_data(){
    $items = array(
        array( 'name' => 'posts',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'posts-custom',    'run' => 0, 'ran' => 0 ),
        array( 'name' => 'posts-block',     'run' => 0, 'ran' => 0 ),
        array( 'name' => 'images-featured', 'run' => 0, 'ran' => 0 ),
        array( 'name' => 'categories',      'run' => 0, 'ran' => 0 ),
        array( 'name' => 'category-assign', 'run' => 0, 'ran' => 0 ),
        array( 'name' => 'tags',            'run' => 0, 'ran' => 0 ),
    
    );
    return $items;    
}

