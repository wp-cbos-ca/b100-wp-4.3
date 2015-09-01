<?php

defined( 'ABSPATH' ) || die();

function get_general_data() {
    required_once( dirname(__FILE__) . '/data.php' );
    
      // Start of the Week
    update_option( 'start_of_week', 0 ); //0 is Sunday, 1 is Monday and so on
 
    // Disable Smilies
    update_option( 'use_smilies', 0 );
 
    // Increase the Size of the Post Editor
    update_option( 'default_post_edit_rows', 40 );
     
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
