<?php

defined( 'ABSPATH' ) || die();

function install_post_block( $user_id = 1 ){
    require_once( dirname(__FILE__) . '/data.php' );
    global $wpdb;  
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' ); 
    $items = get_post_block_data();
    for ( $i=0; $i < $items['cnt']; $i++ ) {
            
            $title = build_post_block_title( $items['title_prefix'], $i );
            if ( ! get_page_by_title( $title, OBJECT, 'post' ) ) {
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
                    'post_type' => WP_POST_TYPE,
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                  
            }
     }
}

function build_post_block_title( $title_prefix, $i ) {
    if ( $i < 10 ) {
        $n = $i + 1;
        $page_num = '0' . $n;
    }
    else {
        $page_num = $n;        
    }
     $title = sprintf( '%s %s', $title_prefix ,$page_num );
     return $title;
}
