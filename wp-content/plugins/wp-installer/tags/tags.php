<?php

defined( 'ABSPATH' ) || die();

add_action( 'install_site_data', 'install_tags' );

function install_tags() {
    require_once dirname( __FILE__) . '/data.php';
    $tags = get_tags_data();
    if ( $posts = get_posts_by_post_type( 'reviews' ) ) {
        foreach ( $posts as $post ) {
            generate_tag_data( $post, $tags );
        }
    }
}

//
function generate_tag_data( $post, $tags ) {
    $tag = $tags[ rand( 0, 11 ) ];
    $tag .= rand( 1,3 );
    wp_set_post_tags( $post->ID, $tag, false ); 
}

function get_posts_by_post_type( $post_type = 'post' ) {
    $args = array(
        'posts_per_page'   => 15,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => $post_type,
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