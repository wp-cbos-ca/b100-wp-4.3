<?php

defined( 'ABSPATH' ) || die();

function install_pages ( $user_id = 1 ) {
    
    global $wpdb;
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' );

    require_once dirname( __FILE__) . '/data.php';
    $pages = get_page_data();
     
    foreach ( $pages as $page ) {
        if ( $page['build'] &&  ( ! page_exists ( $page['post_name'] ) ) ) {  //insert it only if specified
            $guid = get_option('home') . $page['guid']; //build guid
            //insert post/page
            $wpdb->insert( $wpdb->posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => $page['post_content'],
                    'post_excerpt' => '', 
                    'post_title' => __($page['post_title']), 
                    'post_name' => __( $page['post_name'] ),
                    'post_modified' => $now, 
                    'post_modified_gmt' => $now_gmt, 
                    'guid' => $guid, 
                    'post_type' => 'page',
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                                
        }
    }                        
}

function page_exists( $slug )  {
    if ( $post_id = get_page_id_by_slug( $slug ) ) {
        return true;
    }
    else {
        return false;
    }
}

function get_page_id_by_slug( $slug, $post_type = 'page' ) {
     global $wpdb;
     $query = $wpdb -> prepare( 
        'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_name = %s AND post_type = %s', 
        $slug, 
        $post_type
        );
     if ( $post_id = $wpdb -> get_var( $query ) ) {
        return $post_id;
    }
    else {
        return false;
    }
}


function install_page_block( $user_id = 0 ){
    global $wpdb;
    $cnt = 1;
    
    for ( $i=0; $i < $cnt; $i++ ) {
            
            $title = build_page_title( $i );
            if ( ! is_page ( $title )) {
                $wpdb->insert( $wpdb->posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => '',
                    'post_excerpt' => '', 
                    'post_title' => __($title), 
                    'post_name' => __( sanitize_title_with_dashes( $title ) ),
                    'post_modified' => $now, 
                    'post_modified_gmt' => $now_gmt, 
                    'guid' => $guid, 
                    'post_type' => 'page',
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                  
            }
     }
}

function build_page_title( $i ) {
    if ( $i < 10 ) {
        $n = $i + 1;
        $page_num = '0' . $n;
    }
    else {
        $page_num = $n;        
    }
     $title = 'Page ' . $page_num;
     return $title;
}
