<?php
/*
Plugin Name:    Wish It Were Core
Plugin URI:     https://wp.cbos.ca/plugins/wish-it-were-core/
Version:        2015.11.25
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

if ( ! function_exists( 'array_flatten' ) ) {
function array_flatten( $arr = null ) { 
    if ( is_array( $arr ) && ! empty( $arr ) ) {
        $str = '';
        foreach ( $arr as $key => $value ){
            $key = str_replace( '_', ' ', $key );
            $str .= empty( $value ) ? sprintf( '<strike>%s</strike> ', $key ) : sprintf( '<strong>%s</strong> ', $key );
        } 
        return $str; 
    }
    else {
        return false;
    }
} 
}

if ( ! function_exists( 'get_pages_flex' ) ) {
function get_pages_flex( $args ) { 
    if ( true ) {
        
    }
    else {
        return false;
    }
} 
}

if ( ! function_exists( 'is_localhost' ) ) {
function is_localhost() {
    if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) {
        return true;
    }
    else {
        return false;
    }
}
}

if ( ! function_exists( 'is_online' ) ) {
function is_online() {
    if( ! in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) {
        return true;
    }
    else {
        return false;
    }
}
}
