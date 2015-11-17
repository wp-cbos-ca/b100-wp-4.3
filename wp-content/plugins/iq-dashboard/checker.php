<?php
  
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

function is_caching_present(){
    if ( is_plugin_active( 'wp-super-cache/wp-cache.php' ) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_caching_on(){
    global $cache_enabled;
    if ( $cache_enabled === true ) {
        return true;
    }
    else if ( $cache_enabled === false ) {
        return false;
    }
    
    else {
        return null;
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
    if ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT ) {
        return false;
    }
    else {
        return true;
    }
}
