<?php

defined( 'ABSPATH' ) || die();

function install_reading_settings() {
    require_once dirname( __FILE__) . '/data.php';
    $items = get_reading_data();
    if ( ! empty ( $items ) ) foreach ( $items as $item ) {
        if( $item['update'] ) {
            update_option( $item['option_name'], $item['option_value'] );
        }
    }    
}
