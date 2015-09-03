<?php

defined( 'ABSPATH' ) || die();

function install_post_type ( $user_id = 1 ) {
    require_once dirname( __FILE__) . '/data.php';
    global $wpdb;
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' ); //adjust
    $posts = get_post_type_data();
    foreach ( $posts as $post ) {
        if ( $post['build'] &&  ( ! custom_post_exists ( $post['post_name'], WP_POST_TYPE_ALT ) ) ) { 
               $guid = get_option( 'home' ) . '/' . $post['post_name'];
               $wpdb->insert( $wpdb->posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => $post['post_content'],
                    'post_excerpt' => '', 
                    'post_title' => $post['post_title'], 
                    'post_name' => $post['post_name'],
                    'post_modified' => $now, 
                    'post_modified_gmt' => $now_gmt, 
                    'guid' => $guid, 
                    'post_type' => $post_type,
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                                
        }
    }                        
}

function custom_post_exists( $slug, $post_type )  {
    if ( $post_id = get_custom_post_id_by_slug( $slug, $post_type ) ) {
        return true;
    }
    else {
        return false;
    }
}

function install_custom_post_block( $user_id = 1 ){
    global $wpdb;
    $cnt = 1;
    $post_type = 'reviews';
    for ( $i=0; $i < $cnt; $i++ ) {
            
            $title = build_custom_post_title( $i );
            if ( ! custom_post_exists ( sanitize_title_with_dashes( $title ), $post_type ) ) {
                $wpdb -> insert( $wpdb -> posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => '',
                    'post_excerpt' => '', 
                    'post_title' => __( $title ), 
                    'post_name' => __( sanitize_title_with_dashes( $title ) ),
                    'post_modified' => $now, 
                    'post_modified_gmt' => $now_gmt, 
                    'guid' => $guid, 
                    'post_type' => $post_type,
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                  
            }
     }
}

function get_custom_post_id_by_slug( $title, $post_type = 'post' ) {
     global $wpdb;
     $query = $wpdb -> prepare( 
        'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_name = %s AND post_type = %s', 
        sanitize_title_with_dashes( $title ), 
        $post_type
        );
     if ( $post_id = $wpdb -> get_var( $query ) ) {
        return $post_id;
    }
    else {
        return false;
    }
}

function build_custom_post_title( $i ) {
    if ( $i < 10 ) {
        $n = $i + 1;
        $page_num = '0' . $n;
    }
    else {
        $page_num = $n;        
    }
     $title = 'Book Title ' . $page_num;
     return $title;
}
