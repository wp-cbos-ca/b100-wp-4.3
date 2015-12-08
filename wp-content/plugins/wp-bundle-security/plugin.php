<?php
/*
Plugin Name:    WP Bundle Security
Plugin URI:     https://wp.cbos.ca
Description:    Helps to maintain and enhance the security features implemented in the WP Bundle package.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     https://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

function check_security_features( $bool, $args, $result ){
    $file = ABSPATH . 'xmlrpc.php';
    if ( file_exists( $file ) ) {
        $bool = unlink( $file );
    }
    $file = ABSPATH . '.wpcli';
    if ( file_exists( $file ) ) {
        $bool = unlink( $file );
    }
    return $bool;
}
add_filter( 'upgrader_post_install', 'check_security_features', 10, 3 );
