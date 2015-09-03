<?php

defined( 'ABSPATH' ) || die();

function install_post_type_block( $user_id = 1 ){
    global $wpdb;
    $cnt = 15;
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' ); //adjust
    for ( $i=1; $i <= $cnt; $i++ ) {
            $title = build_post_type_block_title( $i );
            $guid = get_option( 'home' ) . sanitize_title_with_dashes( $title );
            if ( ! get_page_by_title ( $title, OBJECT, 'post' ) ) {
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
                    'post_type' => WP_POST_TYPE,
                    'comment_count' => 0, 
                    'to_ping' => '', 
                    'pinged' => '', 
                    'post_content_filtered' => '' 
                ));                  
            }
     }
}

function build_post_type_block_title( $i ) {
    if ( $i < 10 ) {
        $page_num = '0' . $i;
    }
    else {
        $page_num = $i;        
    }
     $title = 'Book Title ' . $page_num;
     return $title;
}
