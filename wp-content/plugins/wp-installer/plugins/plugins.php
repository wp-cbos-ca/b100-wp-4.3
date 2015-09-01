<?php

defined( 'ABSPATH' ) || die();

function configure_plugins(){
    require_once( dirname(__FILE__) . '/data.php' );
    $plugins = get_plugins_data();
    if ( ! empty ( $plugins ) )  {
        foreach ( $plugins as $plugin ) {
            if ( $plugin['configure'] ) {
                foreach ( $plugin['items'] as $item ) {
                    update_option( $item['option_name'], $item['option_value'] );
                }
            }
            if ( $plugin['activate'] ) {
                $file = WP_PLUGIN_DIR  . '/' .  $plugin['folder'] . '/' . $plugin['file'];
                if ( file_exists( $file ) ) {
                    activate_plugin( $file );
                }
            }
        }
    }
}
