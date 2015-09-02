<?php

defined( 'ABSPATH' ) || die();

function get_theme_template(){
    $template = array ( 'title' => 'Twenty Fifteen', 'option_name' => 'template', 'option_value' => 'twentyfifteen', 'activate' => 0 );
    return $template;
}

function get_theme_stylesheet(){
    $stylesheet = array ( 'title' => 'Twenty Fifteen Child', 'option_name' => 'stylesheet', 'option_value' => 'twentyfifteen-child', 'activate' => 1 );
    return $stylesheet;
}
