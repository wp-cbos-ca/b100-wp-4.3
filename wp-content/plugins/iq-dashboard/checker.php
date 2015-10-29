<?php
  
defined( 'ABSPATH' ) || die();

function get_iq_dashboard_molecule(){
    $molecule = array( 
        'backup' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'address' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'debug' => array( 'run' => 1, 'resp' => array( 'ON', 'OFF' ) ),
        'security' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'mailer' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'wp_cron' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'maintain' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'maps' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'file_edits' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'caching' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'video' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'xmlrpc' => array( 'run' => 1, 'resp' => array( 'PRESENT', 'ABSENT' ) ),
        'optimization' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'social' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        'analytics' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ) ),
        );
    return $molecule;
}

function is_backup_on(){
    if ( is_plugin_active( 'backupwordpress/backupwordpress.php' ) ) {
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

function is_wp_cron_on(){
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

if ( ! empty( $cache_enabled ) && $cache_enabled ) { 
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
