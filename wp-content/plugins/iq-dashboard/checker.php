<?php
  
defined( 'ABSPATH' ) || die();

function get_iq_dashboard_molecule(){
    $molecule = array( 
        'backup' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A backup plugin is active.' ),
        'address' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'An address plugin is active.' ),
        'debug' => array( 'run' => 1, 'resp' => array( 'ON', 'OFF' ), desc => 'WP DEBUG is &quot;ON&quot;' ),
        'security' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A security plugin is active.' ),
        'mailer' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A contact form plugin with a &quot;mailer&quot; is active.' ),
        'wp_cron' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'The WP &quot;Virtual&quot; CRON is active. Consider using a &quot;real&quot; cron for a faster site.' ),
        'maintain' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A maintenance plugin is active, or you are on scheduled maintenance (SCH).' ),
        'maps' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'An maps plugin is active.' ),
        'file_edits' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'File edits are allowed in the theme and plugin editors. Recommended to turn off for greater security.' ),
        'caching' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A caching plugin is active.' ),
        'video' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A video plugin is active.' ),
        'xmlrpc' => array( 'run' => 1, 'resp' => array( 'PRESENT', 'ABSENT' ), desc => 'The xmlrpc.php file was found. Currently a security risk (as of 10/2015).' ),
        'optimization' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'An optimization plugin is active.' ),
        'social' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'A social plugin is active.' ),
        'analytics' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), desc => 'An analytics plugin is active.' ),
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
