<?php
/*
Plugin Name: WP Optimization
Plugin URI: http://wp.cbos.ca
Description: Capability and flags for removing script versions, disabling emojis (added in 4.2), enabling local gravatars, and removing feed links.
Author: wp.cbos.ca
Version: 1.0.1
Author URI: http://wp.cbos.ca
*/

defined( 'ABSPATH' ) || die();

$remove_script_version = true;
if ( $remove_script_version ) {
    function _remove_script_version( $src ){
        if ( strpos( $src, 'fonts.googleapis.com' ) !== FALSE ){
            return $src;
        }
        else if ( strpos( $src, 'analytics.aweber.com' ) !== FALSE )  {
            return $src;
        }
        else {
            $parts = explode( '?', $src );
            return $parts[0];
        }
    }    
    add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
    add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
}

$disable_emojis = true;
 if ( $disable_emojis ) {
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

$disable_jquery_ui = true;
if ( $disable_jquery_ui ) {
    function optimize_script_loading() {        
        if ( ! is_admin() ) { 
            wp_deregister_script('jquery-ui-core'); 
            wp_deregister_script('jquery-ui-datepicker'); 
        }
    }
    add_action('wp_enqueue_scripts', 'optimize_script_loading', 15 );
}

$local_gravatar_only = true;
if ( $local_gravatar_only ) {
    //https://wordpress.stackexchange.com/questions/17413/removing-gravatar-com-support-for-wordpress-and-simple-local-avatars
    add_filter('get_avatar', 'remove_gravatar', 1, 5);
    function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {
        $default = get_template_directory_uri() .'/images/avatar.png';
        return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
    }
}

$remove_feed_links = true;
if ( $remove_feed_links ) {
    add_action('init','clean_header');
    add_filter('wp_headers', 'remove_x_pingback');
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    add_action('wp_head', 'custom_restore_feed_link');
    
    function clean_header(){
        wp_deregister_script( 'comment-reply' );
    }

    function remove_x_pingback($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    }

    // Add link to RSS feed to HEAD
    function custom_restore_feed_link() {
        echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' Feed" href="'.get_home_url().'/feed/" />' . "\n";
    }
}
