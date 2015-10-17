<?php
/*
Plugin Name: WP Optimization
Plugin URI: http://wp.cbos.ca
Description: Capability and flags for removing script versions, disabling emojis (added in 4.2), enabling local gravatars, removing feed links and disabling the XLM-RPC API.
Author: wp.cbos.ca
Version: 1.0.1
Author URI: http://wp.cbos.ca
*/

defined( 'ABSPATH' ) || die();
  
$_wp_opt = array( 
    'remove_script_version' => 1,
    'deregister_open_sans' => 1,
    'remove_emoji_scripts' => 1,
    'remove_gravatar_useage' => 1,
    'deregister_comment_reply' => 1,
    'remove_rsd_link' => 1,
    'remove_feed_links' => 1,
    'remove_feed_links_extra' => 1,
    'remove_x_pingback' => 1,
    'disable_xmlrpc' => 1,
    'deregister_jquery_ui_core' => 1, //front end
    'deregister_jquery_datepicker' => 1, //front end
    );

if ( $_wp_opt['remove_script_version'] ) {
    function _remove_script_version( $src ){
        $arr = array( 'fonts.googleapis.com', 'analytics.aweber.com' );
        foreach ( $arr as $exclude ) {
            if ( strpos( $src, $exclude ) !== FALSE ){
                return $src;
            }
            else {
                $parts = explode( '?', $src );
                return $parts[0];
            }
        }
    }    
    add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
    add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
}

if ( $_wp_opt['deregister_open_sans'] ) {
    function deregister_open_sans() {
        if ( ! is_user_logged_in() ) {
            wp_deregister_style( 'open-sans' ) ;
        }
    }
    add_action( 'wp_enqueue_scripts', 'deregister_open_sans' );
}

if ( $_wp_opt['remove_emoji_scripts'] ) {
    function remove_emoji_scripts() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );    
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }
    add_action( 'init', 'remove_emoji_scripts' );

    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }
}

if ( $_wp_opt['remove_gravatar_useage'] ) { 
    function remove_gravatar_useage ($avatar, $id_or_email, $size, $default, $alt) {
        $default = get_template_directory_uri() .'/images/avatar.png';
        return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
    }
    add_filter('get_avatar', 'remove_gravatar_useage', 1, 5 );
}
    
if ( $_wp_opt['deregister_comment_reply'] ) { 
    function deregister_comment_reply(){
        wp_deregister_script( 'comment-reply' );
    }
    add_action( 'init','deregister_comment_reply' );
}

if ( $_wp_opt['remove_rsd_link'] ) { 
    remove_action( 'wp_head', 'rsd_link' );
}

if ( $_wp_opt['remove_feed_links'] ) { 
    remove_action( 'wp_head', 'feed_links', 2 );
}

if ( $_wp_opt['remove_feed_links_extra'] ) { 
    function remove_x_pingback($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    }
    remove_action( 'wp_head', 'feed_links_extra', 3 );
}

if ( $_wp_opt['remove_x_pingback'] ) { 
    add_filter( 'wp_headers', 'remove_x_pingback' );
}

if ( $_wp_opt['disable_xmlrpc'] ) { 
    add_filter( 'xmlrpc_enabled', '__return_false' );
}
                                                     
if ( $_wp_opt['disable_xmlrpc'] ) { 
    add_filter( 'xmlrpc_enabled', '__return_false' );    
}

if ( $_wp_opt['deregister_jquery_ui_core'] ) {
    function deregister_jquery_ui_core() {        
        if ( ! is_admin() ) { 
            wp_deregister_script( 'jquery-ui-core' ); 
        }
    }
    add_action('wp_enqueue_scripts', 'deregister_jquery_ui_core', 15 );    
}

if ( $_wp_opt['deregister_jquery_datepicker'] ) {
    function deregister_jquery_datepicker() {        
        if ( ! is_admin() ) { 
            wp_deregister_script('jquery-ui-datepicker'); 
        }
    }
    add_action('wp_enqueue_scripts', 'deregister_jquery_datepicker', 15 );    
}
