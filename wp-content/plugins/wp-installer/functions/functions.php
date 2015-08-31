<?php

defined( 'ABSPATH' ) || die();

//this should be pre built somewhere in WP.
function get_post_id_by_title( $title ) {
     global $wpdb;
     $query = $wpdb->prepare('SELECT ID FROM ' . $wpdb->posts . ' WHERE post_name = %s', sanitize_title_with_dashes($title));
     if ( $post_id = $wpdb->get_var( $query ) ) {
        return $post_id;
    }
    else {
        return false;
    }
}

function get_page_id_by_title( $title ) {
    if ( $page = get_page_by_title ( $title ) ) {
          return $page->ID;
    }
    else {
        return false;
    }      
}
    