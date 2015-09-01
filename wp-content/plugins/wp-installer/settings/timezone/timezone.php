<?php

defined( 'ABSPATH' ) || die();

function setup_timezone() {
    
    require_once dirname( __FILE__) . '/data.php';
    
    $items = get_timezone();
    
    $timezone = 'America/Toronto';
    
    if ( $items ) foreach ( $items as $item ) { 
        if ( $item['selected'] ) {
            $timezone = $item['name'];
            break;
        }
    }
    update_option( 'timezone_string', $timezone );
     
   
}
