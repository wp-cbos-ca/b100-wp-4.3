<?php

 defined( 'ABSPATH' ) || die();
 
 function activate_wp_site_installer(){
     $plugin = array( 'folder' => 'wp-site-installer', 'file' => 'plugin.php', 'activate' => 1 );
     $file = WP_PLUGIN_DIR  . '/' .  $plugin['folder'] . '/' . $plugin['file'];
        if ( file_exists( $file ) ) {
            if ( $plugin['activate'] ) {
                    activate_plugin( $file );
            }
        }
 }
 