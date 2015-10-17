<?php

/*
Plugin Name:    Restrained Video
Plugin URI:     http://wp.cbos.ca
Description:    Displays a video using the youtu.be short url or an mp4. [video url="https://youtu.be/--------" width="640" height="360"]
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

add_shortcode( 'video', 'restrained_video' );

function restrained_video( $args ){
    if ( strpos( $args['url'], 'youtu' ) !== FALSE ){
         $html = get_video_format_one( $args );
    }
    else {
        $html = get_restrained_video_html( $args );
    }
    return $html;
}

function get_restrained_video_html( $args ){
    $str = sprintf( '<video width="%s" height="%s"', $args['width'], $args['height'] );
    $str .= sprintf( 'poster="%s" controls="">', $args['poster'] );
    $str .= sprintf( '<source src="%s" type="video/mp4">', $args['url'], PHP_EOL );
    $str .= 'Your browser does not support the video tag.' . PHP_EOL;
    $str .= '</video>';
    return $str;
}

function get_video_format_one( $args ){
    $ex = explode( '/', $args['url'] );
    $url_id = $ex[ count($ex) -1 ];
    $str = sprintf( '<iframe width="%s" height="%s"', $args['width'], $args['height'] );
    $str .= sprintf( 'source src="https://www.youtube.com/embed/%s?rel=0" ', $url_id, PHP_EOL );
    $str .= 'frameborder="0" allowfullscreen' . PHP_EOL;
    $str .= '></iframe>';
    return $str;
}


