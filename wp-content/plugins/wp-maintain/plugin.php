<?php
/*
Plugin Name:    WP Maintain
Plugin URI:     http://wp.cbos.ca
Description:    Plugin configuration for enhanced maintanence.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

function wpm_add_dashboard_widget() {
    $args = array( 'slug' => 'wpm_dashboard_widget', 'title' => 'WP Maintain', 'function' => 'wpm_function' );
    wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );                                                                                
}
add_action( 'wp_dashboard_setup', 'wpm_add_dashboard_widget' );

function wpm_function() {
    $str = get_maintenance_header();   
    $str .= get_maintenance_plugins();
    $str .= get_maintenance_footer();   
    echo $str;
}

function get_maintenance_header(){
    $str = '<p>Recommended <span class="alignright"><a href="http://wp.cbos.ca/maintain/">Help</a></span></p>';
    return $str;
}

function get_maintenance_footer(){
    $str = '<p><small>For best results, delete after use (Decreases server load and security risk).</small></p>';
    return $str;
}

function get_maintenance_plugins(){
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_maintenance_plugins_data();
    if ( ! empty( $items ) ) {
        $str = '';
        foreach ( $items as $item ) {
            if ( $item['display'] && ! empty( $item['title'] ) ) {
                $str .= sprintf('<p><strong><a href="%s" target="_blank">%s</a>:</strong> [<a href="%s">Details and Install</a>]</p>', 
                    $item['uri'], $item['title'],  get_plugin_detail_link( $item['name'] ), $item['notes'], PHP_EOL 
                );
            }
        }
        return $str;
    }
    else {
        return false;
    }
}

function get_plugin_detail_link( $plugin_name ){
    $query = sprintf('?tab=plugin-information&amp;plugin=%s&amp;TB_iframe=true&amp;width=600&amp;height=550', $plugin_name ); 
    $str = admin_url( '/plugin-install.php' . $query );
    return $str;
}
