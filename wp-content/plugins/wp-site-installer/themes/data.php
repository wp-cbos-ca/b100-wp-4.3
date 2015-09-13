<?php

defined( 'ABSPATH' ) || die();

function get_theme_template(){
    $template = array ( 'title' => 'Twenty Twelve', 'option_name' => 'template', 'option_value' => 'twentytwelve', 'activate' => 1 );
    return $template;
}

function get_theme_stylesheet(){
    $stylesheet = array ( 'title' => 'Twenty Twelve Child', 'option_name' => 'stylesheet', 'option_value' => 'twentytwelve-child', 'activate' => 0 );
    return $stylesheet;
}
