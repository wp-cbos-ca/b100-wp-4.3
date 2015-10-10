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

define( 'WP0_REMOVE_SCRIPT_VERSION', true );
define( 'WP0_DISABLE_EMOJIS', true );
define( 'WP0_LOCAL_GRAVATAR_ONLY', true );
define( 'WP0_REMOVE_FEED_LINKS', true );
define( 'WP0_DISABLE_JQUERY_UI_FRONT_END', false );

if ( WP0_REMOVE_SCRIPT_VERSION ) {
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

if ( WP0_DISABLE_EMOJIS ) {
     //https://geek.hellyer.kiwi/plugins/disable-emojis/
    function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );    
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }
    add_action( 'init', 'disable_emojis' );

    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }
}

if ( WP0_LOCAL_GRAVATAR_ONLY ) {
    //https://wordpress.stackexchange.com/questions/17413/removing-gravatar-com-support-for-wordpress-and-simple-local-avatars    
    function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {
        $default = get_template_directory_uri() .'/images/avatar.png';
        return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
    }
    add_filter('get_avatar', 'remove_gravatar', 1, 5);
}

if ( WP0_REMOVE_FEED_LINKS ) {
    add_action( 'init','clean_header' );
    add_filter( 'wp_headers', 'remove_x_pingback' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    add_filter( 'xmlrpc_enabled', '__return_false' );
    
    function clean_header(){
        wp_deregister_script( 'comment-reply' );
    }

    function remove_x_pingback($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    }    
}

if ( WP0_DISABLE_JQUERY_UI_FRONT_END ) {
    function optimize_script_loading() {        
        if ( ! is_admin() ) { 
            wp_deregister_script('jquery-ui-core'); 
            wp_deregister_script('jquery-ui-datepicker'); 
        }
    }
    add_action('wp_enqueue_scripts', 'optimize_script_loading', 15 );
}
