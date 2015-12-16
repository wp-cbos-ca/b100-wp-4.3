<?php

/*
Plugin Name:    Restrained Video
Plugin URI:     https://wp.cbos.ca
Description:    Displays a video using the youtu.be short url or an mp4. [video url="https://youtu.be/--------" width="750" height="422"]
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     https://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

add_shortcode( 'video', 'restrained_video' );

function restrained_video( $args ){
    $args['width'] = isset( $args['width'] ) ? $args['width'] : '750';
    $args['height'] = isset( $args['height'] ) ? $args['height'] : '422';
    if ( strpos( $args['url'], 'youtu' ) !== FALSE ){
         $html = get_video_format_one( $args );
    }
    else {
        $html = get_restrained_video_html( $args );
    }
    return $html;
}

function get_video_format_one( $args ){
    $str = sprintf( '<iframe width="%s" height="%s"', $args['width'], $args['height'] );
    $str .= sprintf( 'source src="%s" ', get_video_link( 'https://www.youtube.com/embed/', $args ) );
    $str .= 'frameborder="0" allowfullscreen' . PHP_EOL;
    $str .= '></iframe>';
    return $str;
}

function get_video_link( $prefix='', $args ) {
    $ex = explode( '/', $args['url'] );
    if (  ! empty( $ex ) ) {
        $url_id = $ex[ count( $ex ) - 1 ];
        $link = sprintf( '%s%s?rel=0', $prefix, $url_id );
    }
    else {
        $link = '';
    }
    return $link;
}

function get_restrained_video_html( $args ){
    $str = sprintf( '<video width="%s" height="%s"', $args['width'], $args['height'] );
    $str .= sprintf( 'poster="%s" controls="">', $args['poster'] );
    $str .= sprintf( '<source src="%s" type="video/mp4">', $args['url'], PHP_EOL );
    $str .= 'Your browser does not support the video tag.' . PHP_EOL;
    $str .= '</video>';
    return $str;
}
