<?php
/*
Plugin Name:    Restrained Maps
Plugin URI:     http://wp.cbos.ca
Description:    Displays a Google Map: [map lat=xx lng=xx] or just [map]. Uses Restrained Address lat lng coordinates if installed and defined.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

function restrained_map_scripts() {
    wp_enqueue_style( 'restrained-maps', plugin_dir_url(__FILE__) . 'css/style.css' );
    wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array( 'jquery' ) );
    wp_enqueue_script( 'restrained-maps', plugin_dir_url(__FILE__) . 'js/map.js', array( 'google-maps-api' ) );
}
add_action( 'wp_enqueue_scripts', 'restrained_map_scripts', 15 );


function restrained_maps( ){
    $items = get_restrained_maps_data();
    $str = sprintf( '<div id="map-canvas" class="%s;" style="width: %s; height: %s;"></div>', $items['align'], $items['width'], $items['height']);
    return $str;
}
add_shortcode( 'map', 'restrained_maps', 15 );

function the_map_script_data() {
    echo get_map_script_data();
}
add_action( 'wp_head', 'the_map_script_data', 8 );

function get_map_script_data() {
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_restrained_maps_data();
    $str = '<script>' . PHP_EOL;
    $str .= 'var center = Array();' . PHP_EOL;
    $str .= sprintf( 'center.lat = %s;%s',  $items['center']['lat'], PHP_EOL );
    $str .= sprintf( 'center.lng = %s;%s', $items['center']['lng'], PHP_EOL );
    $str .= sprintf( 'var zoom = %s;%s', $items['zoom'], PHP_EOL );
    $str .= sprintf( 'var url = "%s";%s', plugin_dir_url(__FILE__), PHP_EOL );
    $str .= sprintf( 'var title = "%s";%s', $items['info_window']['title'], PHP_EOL );
    $str .= sprintf( 'var contentString = \'' . $items['info_window']['content_string'] . '\'' . PHP_EOL );
    $str .= '</script>' . PHP_EOL;
    return $str;
}
