<?php

/*
Plugin Name:    Intelligent Dashboard
Plugin URI:     http://wp.cbos.ca
Description:    Intelligently adds indicators to your dashboard to help you monitor your site.
Version:        0.5.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

define( 'IQ_DASHBOARD_BREAKER_ON', true );

function iq_dashboard() {
    $args = array( 'slug' => 'iq_dashboard', 'title' => 'Intelligent Dashboard', 'function' => 'get_iq_dashboard' );
    wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );                                                                                
}
add_action( 'wp_dashboard_setup', 'iq_dashboard' );

function get_iq_dashboard() {
    
    $backup = is_backup_on() ? 'ON' : 'OFF';
    $security = is_security_on() ? 'ON' : 'OFF';
    $xmlrpc = is_xmlrpc_on() ? 'PRESENT' : 'ABSENT';
    $maintain = is_maintenance_on() ? 'ON' : 'OFF';
    $cron = is_cron_on() ? 'ON' : 'OFF';
    $debug = is_debug_on() ? 'ON' : 'OFF';
    $optimize = is_optimization_on() ? 'ON' : 'OFF';
    
    $caching = is_caching_on() ? 'ON' : 'OFF';
    $file_edits = is_file_edits_on() ? 'ON' : 'OFF';
    $analytics = is_analytics_on() ? 'ON' : 'OFF';
    $address = is_address_on() ? 'ON' : 'OFF';
    $mailer = is_mailer_on() ? 'ON' : 'OFF';
    $map = is_maps_on() ? 'ON' : 'OFF';
    $video = is_video_on() ? 'ON' : 'OFF';
    $social = is_social_on() ? 'ON' : 'OFF';
    
    $str = '<table style="width: 100%;">' . PHP_EOL;
    $str .= '<tr><td style="width: 33%;"></td><td style="width: 33%;"></td><td style="width: 33%;"></td></tr>';
    
    $str .= '<tr><td>';
    $str .= sprintf( 'BACKUP: <strong>%s</strong>', $backup );
    $str .= '</td><td>';
    $str .= sprintf( 'ADDRESS: <strong>%s</strong>', $address );
    $str .= '</td><td>';
    $str .= sprintf( 'WP DEBUG: <strong>%s</strong>', $debug );
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    $str .= sprintf( 'SECURITY: <strong>%s</strong>', $security );
    $str .= '</td><td>';
    $str .= sprintf( 'MAILER: <strong>%s</strong>', $mailer );
    $str .= '</td><td>';
    $str .= sprintf( 'WP CRON: <strong>%s</strong>', $cron );
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    $str .= sprintf( 'MAINTAIN: <strong>%s</strong>', $maintain );
    $str .= '</td><td>';
    $str .= sprintf( 'MAP: <strong>%s</strong>', $map );
    $str .= '</td><td>';
    $str .= sprintf( 'FILE EDITS: <strong>%s</strong>', $file_edits );
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    $str .= sprintf( 'CACHING: <strong>%s</strong>', $caching );
    $str .= '</td><td>';
    $str .= sprintf( 'VIDEO: <strong>%s</strong>', $video );
    $str .= '</td><td>';
    $str .= sprintf( 'XMLRPC: <strong>%s</strong>', $xmlrpc );
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    $str .= sprintf( 'OPTIMIZATION: <strong>%s</strong>', $optimize );
    $str .= '</td><td>';
    $str .= sprintf( 'SOCIAL: <strong>%s</strong>', $social );
    $str .= '</td><td>';
    $str .= sprintf( 'ANALYTICS: <strong>%s</strong>', $analytics );
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    $str .= '</td><td>';
    
    $str .= '</td><td>';
    
    $str .= '</td></tr>';
    
    $str .= '<tr><td>';
    
    $str .= '</td><td>';
    
    $str .= '</td><td>';
    
    $str .= '</td></tr>';
    
    $str .= '</table>';
    echo $str;
}

function is_backup_on(){
    if ( is_plugin_active( 'iq-backup/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_security_on(){
    if ( is_plugin_active( 'sucuri-scanner/sucuri.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_xmlrpc_on(){
    $file = ABSPATH . 'xmlrpc.php';
    if ( file_exists( $file ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_maintenance_on(){
    if ( is_plugin_active( 'wp-maintain/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_cron_on(){
    if ( defined ( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON ) {
        return false;
    }
    else {
        return true;
    }
}

function is_debug_on(){
    if ( WP_DEBUG ) {
        return true;
    }
    else {
        return false;
    }
}

function is_optimization_on(){
    if ( is_plugin_active( 'autoptimize/autoptimize.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

if ( $cache_enabled ) { 
    define( 'WP_SUPER_CACHE_ENABLED', true ); 
} else {
    define( 'WP_SUPER_CACHE_ENABLED', false ); 
}
function is_caching_on(){
    if ( WP_SUPER_CACHE_ENABLED ) {
        return true;
    }
    else {
        return false;
    }
}

function is_analytics_on(){
    if ( is_plugin_active( 'restrained-analytics/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_maps_on(){
    if ( is_plugin_active( 'restrained-maps/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_address_on(){
    if ( is_plugin_active( 'restrained-address/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_mailer_on(){
    if ( is_plugin_active( 'restrained-mailer/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_social_on(){
    if ( is_plugin_active( 'restrained-social/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_video_on(){
    if ( is_plugin_active( 'restrained-video/plugin.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_file_edits_on(){
    if ( DISALLOW_FILE_EDIT ) {
        return false;
    }
    else {
        return true;
    }
}
