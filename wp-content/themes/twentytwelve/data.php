<?php

defined( 'ABSPATH' ) || die();

function get_footer_info( $name='' ) {
    $items = get_footer_info_data();
    if ( $items['display'] ) {
        if ( isset( $items[ $name ] ) ) {
            return $items[ $name ];
        }
    }
    return false;  
}

function get_footer_info_data( ) {
    $items = array( 
        'display' => 1,
        'text' => 'WordPress... Simplified.',
        'text_alt' => 'One Click Download.',
        'title' => 'wp.cbos.ca',
        'url' => 'https://wp.cbos.ca',
    );
    return $items;
}