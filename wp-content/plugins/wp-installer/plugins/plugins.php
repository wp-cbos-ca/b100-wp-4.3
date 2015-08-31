<?php

defined( 'ABSPATH' ) || die();

function configure_plugins(){
    require_once( dirname(__FILE__) . '/data.php' );
    $plugins = get_plugins_data();
    if ( ! empty ( $plugins ) )  {
        foreach ( $plugins as $plugin ) {
            if ( $plugin['configure'] ) {
                foreach ( $plugin['items'] as $item ) {
                    update_option( $item['name'], $item['value'] );
                }
            }
        }
    }
}
