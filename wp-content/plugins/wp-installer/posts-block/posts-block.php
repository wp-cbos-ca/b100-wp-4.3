<?php

defined( 'ABSPATH' ) || die();

function install_posts_block( $user_id = 1 ){
    global $wpdb;
    $cnt = 15;
    $post_type = 'reviews';
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' ); //adjust
    for ( $i=1; $i <= $cnt; $i++ ) {
            $title = build_custom_post_block_title( $i );
            $guid = get_option( 'home' ) . sanitize_title_with_dashes( $title );
            if ( ! custom_post_exists ( sanitize_title_with_dashes( $title ), $post_type ) ) {
                $wpdb -> insert( $wpdb -> posts, 
                array(
                    'post_author' => $user_id, 
                    'post_date' => $now, 
                    'post_date_gmt' => $now_gmt, 
                    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id pharetra velit, at dictum enim. Aliquam maximus metus sed ante cursus rutrum id eu turpis. Curabitur consequat placerat lorem quis mattis. Curabitur ut nisl nec ipsum molestie suscipit. Maecenas placerat, ex sed dignissim accumsan, ante justo tempor nunc, sed faucibus mi neque id massa. Aenean consectetur vitae mi sed semper. Praesent sed suscipit diam. Fusce semper malesuada nisi id aliquet. Curabitur vulputate arcu nec justo malesuada pulvinar. Etiam pretium enim dictum elit pellentesque imperdiet. Ut egestas ac ligula non pharetra. Cras pharetra est eget eros rhoncus vulputate. Donec et neque ac risus convallis sollicitudin. Vivamus arcu mauris, pharetra eget gravida in, ultricies a justo. Maecenas dictum mattis volutpat. Donec at ipsum orci.',
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

function custom_post_exists( $slug, $post_type )  {
    if ( $post_id = get_custom_post_id_by_slug( $slug, $post_type ) ) {
        return true;
    }
    else {
        return false;
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

function build_custom_post_block_title( $i ) {
    if ( $i < 10 ) {
        $page_num = '0' . $i;
    }
    else {
        $page_num = $i;        
    }
     $title = 'Book Title ' . $page_num;
     return $title;
}
