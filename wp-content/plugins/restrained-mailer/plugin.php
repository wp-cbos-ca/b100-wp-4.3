<?php
/*
Plugin Name:    Restrained Mailer
Plugin URI:     http://wp.cbos.ca
Description:    Just a contact form and mailer. Shortcode: [mailer]
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

function mailer_style() {
    wp_enqueue_style( 'mailer', plugin_dir_url(__FILE__) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'mailer_style', 25 );

function mailer_script() {
    wp_register_script( 'mailer-js', plugin_dir_url(__FILE__) . 'js/javascript.js', array( 'jquery' ), '1.0', true );
}
add_action( 'init', 'mailer_script' );

function print_mailer_script() {
    global $add_mailer_script;
    if ( $add_mailer_script ) {       
        wp_print_scripts( 'mailer-js' );
    }
}
add_action( 'wp_footer', 'print_mailer_script' );

function mailer_form( $args ){
    global $add_mailer_script;
    $add_mailer_script = true;
    require_once( dirname(__FILE__) . '/includes/data.php' );
    require_once( dirname(__FILE__) . '/includes/mailer.php' );
    require_once( dirname(__FILE__) . '/includes/template.php' );    
    $str = get_mailer_form( $args );
    return $str;
}
add_shortcode( 'mailer', 'mailer_form' );
