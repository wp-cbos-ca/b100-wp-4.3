<?php

defined( 'ABSPATH' ) || die();

function configure_plugins(){
    require_once( dirname(__FILE__) . '/data.php' );
    $plugins = get_plugins_data();
    if ( ! empty ( $plugins ) )  {
        foreach ( $plugins as $plugin ) {
            $file = WP_PLUGIN_DIR  . '/' .  $plugin['folder'] . '/' . $plugin['file'];
            if ( file_exists( $file ) ) {
                if ( $plugin['activate'] ) {
                    if ( ( $plugin['local'] && is_localhost() ) || ( $plugin['online'] && ! is_localhost() ) ) {
                        activate_plugin( $file );
                        if ( $plugin['configure'] ) {
                            foreach ( $plugin['settings'] as $setting ) {
                                update_option( $setting['option_name'], $setting['option_value'] );
                            }
                        }
                    }
                }
            }
        }
    }
}
