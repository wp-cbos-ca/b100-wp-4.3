<?php

defined( 'ABSPATH' ) || die();

function create_posts ( $user_id = 1 ) {
    
    require_once dirname( __FILE__) . '/data.php';
    
    global $wpdb;
    
    $now = date( 'Y-m-d H:i:s' );
    
    $now_gmt = date( 'Y-m-d H:i:s' ); //adjust

    $posts = get_post_data();
     
    foreach ( $posts as $post ) {
        if ( $post['build'] &&  ( ! page_exists ( $post['post_name'] ) ) ) {  //insert it only if specified
            $guid = get_option('home') . $post['guid']; //build guid
            //insert post/page
            $wpdb->insert( $wpdb->posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => $post['post_content'],
                    'post_excerpt' => '', 
                    'post_title' => __($post['post_title']), 
                    'post_name' => __( $post['post_name'] ),
                    'post_modified' => $now, 
                    'post_modified_gmt' => $now_gmt, 
                    'guid' => $guid, 
                    'post_type' => 'post',
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                )
            );                                
        }
    } 
}

function setup_post_defaults() {
    // Increase the Size of the Post Editor
     update_option( 'default_post_edit_rows', 40 );    
     
     // Disable Smilies
     update_option( 'use_smilies', 0 );
}
add_action( 'install_script', 'setup_post_defaults' );

function post_exists( $slug )  {
    if ( $post_id = get_post_by_title( $slug ) ) {
        return true;
    }
    else {
        return false;
    }
}

function install_post_block( $user_id = 0 ){
    global $wpdb;  
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' ); 
    $cnt = 1;
    
    for ( $i=0; $i < $cnt; $i++ ) {
            
            $title = build_post_title( $i );
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
                    'post_type' => 'post',
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                  
            }
     }
}

function build_post_title( $i ) {
    if ( $i < 10 ) {
        $n = $i + 1;
        $page_num = '0' . $n;
    }
    else {
        $page_num = $n;        
    }
     $title = 'Post ' . $page_num;
     return $title;
}
