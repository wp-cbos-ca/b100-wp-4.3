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
    $cron = is_cron_on() ? 'YES' : 'NO';
    $debug = is_debug_on() ? 'YES' : 'NO';
    $str = '';
    $str .= sprintf( '<p>WP CRON ON: <strong>%s</strong></p>%s', $cron, PHP_EOL );
    $str .= sprintf( '<p>WP DEBUG ON: <strong>%s</strong></p>%s', $debug, PHP_EOL );
    echo $str;
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
