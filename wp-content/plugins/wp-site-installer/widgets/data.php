<?php
  
defined( 'ABSPATH' ) || die();

function get_widget_theme_data() { 
    $items = array( 'title' => 'Twenty Twelve', 'name' => 'twentytwelve' );
    return $items;
} 

function get_sidebars_widget_data() {
    $items = array(
        'wp_inactive_widgets' =>  array(),
        'sidebar-1' =>  array( 0 => 'search-2' ),
        'sidebar-2' =>  array( ),
        'sidebar-3' =>  array( ),
        'array_version' =>  3,
        );
    return $items;
}

function get_widget_configuration_data() {
    $items = array( 
        'inactive' => array( 'delete' => 1 ),
        'existing' => array( 'replace' => 1 ),
     );
     return $items;
}
