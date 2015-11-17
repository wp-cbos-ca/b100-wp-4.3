<?php
/*
Plugin Name:    WP Ice Age
Plugin URI:     http://wp.cbos.ca
Description:    Freezes all core, theme and plugin updates, and hides <strike>all</strike> (most) update notices.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca
License:        GPLv2+
*/

defined( 'ABSPATH' ) || die();

function update_scheduler() {
    remove_action( 'admin_notices', 'update_nag', 3 );
    remove_action( 'admin_notices', 'genesis_update_nag' );
}  
add_action( 'admin_init', 'update_scheduler', 1 );

function wp_disable_updates(){
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_core_update_data();
    wp_run_disable_filter( $items );
    $items = get_theme_update_data();
    wp_run_disable_filter( $items );
    $items = get_plugin_update_data();
    wp_run_disable_filter( $items );
    $items = get_translation_update_data();
    wp_run_disable_filter( $items );
    $items = get_email_update_data();
    wp_run_disable_filter( $items );
}
add_action( 'init', 'wp_disable_updates' );

function wp_run_disable_filter( $items = Array() ){
    if ( ! empty ( $items ) ) foreach ( $items as $item ) {
        if ( $item['engage'] ) {
            if ( $item['disable'] ){
                add_filter( $item['slug'], '__return_false' );
            }
            else {
                add_filter( $item['slug'], '__return_true' );
            }
        }
    }     
}

function admin_footer_text_override () {
    echo '<span id="footer-thankyou">This WordPress installation is currently experiencing an "ice age". Please check back in 10,000 years. Thank you.</span>';
}
add_filter('admin_footer_text', 'admin_footer_text_override');

function admin_footer_version_override() {
    echo sprintf('<p id="footer-upgrade" class="alignright">Version %s</p>%s', get_bloginfo('version'), PHP_EOL );
}
add_filter( 'update_footer', 'admin_footer_version_override', 9999 );

function wp_hide_update_counts(){
    wp_register_style( 'wp-hide-update-notices', plugins_url( 'css/style.css' , __FILE__) );
    wp_enqueue_style( 'wp-hide-update-notices' );
}
add_action('admin_init' , 'wp_hide_update_counts' ); 
