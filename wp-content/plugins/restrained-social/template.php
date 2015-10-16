<?php

defined( 'ABSPATH' ) || die();

function get_social_media_html( $args='' ){
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_social_data();
    if ( ! empty( $items ) ) {
        $str = '<ul class="social-media">' . PHP_EOL;
        foreach ( $items as $item ) {        
            if ( $item['display'] ) {
                $url = get_user_meta( get_current_user_id(), $item['name'], true );
                if ( ! empty( $url ) ) {
                    $str .= sprintf( '<li><a class="genericon genericon-%s" href="%s"></a></li>%s',  $item['name'], $url, PHP_EOL );
                }
            }
        }
        $str .= '</ul>' . PHP_EOL;
        return $str;
    }    
    else {
        return false;
    }
}
