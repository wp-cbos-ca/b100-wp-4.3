<?php
  
defined( 'ABSPATH' ) || die();

/**
* As working with widgets the way they are currently set up is quite 
* difficult, the approach taken here is simply to take the output from
* the widgets we wish to modify it, store it exactly as is in an array,
* and then update the option value with that array. This means we are 
* as close to a one to one correspondence as we can get. Note that 
* the individual widget data is "one level down" to allow for the addition
* of an update flag.
* 
*/
function get_widget_theme_data() { 
    $items = array( 'title' => 'Twenty Twelve', 'name' => 'twentytwelve' );
    return $items;
} 

function get_sidebars_widget_data() {
    $items = array(
        'wp_inactive_widgets' =>  array(),
        'sidebar-1' =>  array( 'search-2' ),
        'sidebar-2' =>  array(),
        'sidebar-3' =>  array(),
        'array_version' =>  3,
        );
    return $items;
}

function get_search_widget_data(){
    $items = array( 
        'update' => 1,
        'widget' => array ( 2 => array ( 'title' => '' ), '_multiwidget' => 1, ),
        );
    return $items;
}
