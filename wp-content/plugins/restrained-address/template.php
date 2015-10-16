<?php

defined( 'ABSPATH' ) || die();

function get_address_html( $args='' ){
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_address_data();
    if ( ! empty( $items ) ) {
        $str = '<div class="address">' . PHP_EOL;
        $str .= '<p>' . PHP_EOL;
        foreach ( $items as $item ) {        
            if ( $item['display'] ) {
                if ( ! empty( $item['name'] ) ) {
                    $value = get_user_meta( get_current_user_id(), $item['name'], true );
                    if ( ! empty ( $value ) ) {
                        $str .= sprintf( '%s<br />%s', $value, PHP_EOL );
                    }
                }
            }
        }
        $str .= '</p>' . PHP_EOL;
        $str .= '</div><!-- .address -->' . PHP_EOL;
        return $str;
    }    
    else {
        return false;
    }
}
