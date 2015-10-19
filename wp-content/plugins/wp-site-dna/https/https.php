<?php

defined( 'ABSPATH' ) || die();

function configure_https() {
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_https_data();
    $marker = 'Https';
    $file = ABSPATH . '.htaccess';
    if ( $items['https'] ) {
        $https_on = get_https_on_arr();
        //wp-admin/includes/misc.php
        insert_with_markers( $file, $marker, $https_on );
    }
    else {
        $https_off = get_https_off_arr();
        insert_with_markers( $file, $marker, $https_off );    
    }
}
