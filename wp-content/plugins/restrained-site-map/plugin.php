<?php

/*
Plugin Name:    Restrained Site Map
Plugin URI:     https://wp.cbos.ca
Description:    Displays a site map of your published pages in alphabetical order with tabbed indents for child pages. Shortcode: [site-map]
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     https://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

add_shortcode( 'site-map', 'get_site_map' );

function get_site_map() {
    require_once( dirname(__FILE__) . '/data.php' );
    $args = get_site_map_data();
    $str = '<div class="site-map">';
    $str .= wp_list_pages( $args );
    $str .= '<div>';
    return $str;
}

function get_exclude_site_map_page_ids(){
    $items = get_exclude_site_map_pages();
    if ( ! empty ( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['exclude'] ) {
                $page = get_page_by_title( $item['title'], ARRAY_A, 'page' );
                $ids[] = $page['ID'];
            }
        } 
        if ( ! empty ( $ids ) ) {
            return implode( ',', $ids );
        }
        else {
            return false;
        }
    } 
    else {
        return false;
    }
}
