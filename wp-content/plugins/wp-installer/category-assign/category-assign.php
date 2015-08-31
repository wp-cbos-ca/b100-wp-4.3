<?php
  
defined( 'ABSPATH' ) || die();

function assign_categories() {
    $args = array(
    'type'                     => 'post',
    'parent'                   => 0,
    'orderby'                  => 'name',
    ); 
    $cats = get_categories( $args );
    var_dump( $cats );
    if ( ! empty ( $cats ) ) {
    
        if ( $posts = get_posts_by_post_type_cat( 'reviews' ) ) {
            foreach ( $posts as $post ) {
                $cat = $cats[ rand( 1, count( $cats ) ) ];
                wp_set_post_categories( $post->ID, $cat->term_id, false );
            }
        }
    }
}

function save_to_category_by_post_type ($post_ID) {
    global $wpdb;
    if( wp_is_post_autosave( $post_ID ) || wp_is_post_revision( $post_ID ) ) {
      return $post_ID;
    }
    $ccat_id = intval( get_cat_ID( $cat_name ) );
    wp_set_object_terms( $post_ID, $ccat_id, 'category' );

}

function get_posts_by_post_type_cat( $numposts = 15 ) {
    $args = array(
        'posts_per_page'   => $numposts,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => WP_POST_TYPE,
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'post_status'      => 'publish',
        'suppress_filters' => true 
    );
    $arr = get_posts( $args ); 
    if ( ! empty ( $arr ) ) {
        return $arr;
    } 
    else {
        return false;
    }
}
