<?php
/*
Plugin Name:    Restrained Mailer
Plugin URI:     http://wp.cbos.ca
Description:    Just a contact form and mailer.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

function contact_form_scripts() {
    wp_enqueue_style( 'contact-form', plugin_dir_url(__FILE__) . 'css/style.css' );
    wp_enqueue_script( 'contact-form-js', plugin_dir_url(__FILE__) . 'js/javascript.js', array( 'jquery' ), '1.0.1', false );
}
add_action( 'wp_enqueue_scripts', 'contact_form_scripts', 25 );

function contact_form( $args ){
    require_once( dirname(__FILE__) . '/includes/data.php' );
    require_once( dirname(__FILE__) . '/includes/mailer.php' );
    require_once( dirname(__FILE__) . '/includes/template.php' );    
    $str = get_contact_form( $args );
    return $str;
}
add_shortcode( 'contact-form', 'contact_form' );
