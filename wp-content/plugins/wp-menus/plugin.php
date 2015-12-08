<?php
/*
Plugin Name:    WP Menus
Plugin URI:     https://wp.cbos.ca
Description:    Capability and flags for removing script versions, disabling emojis (added in 4.2), enabling local gravatars, removing feed links and disabling the XLM-RPC API.
Version:        1.0.1
Author:         wp.cbos.ca
Author URI:     https://wp.cbos.ca
License:        GPLv2+
*/

defined( 'ABSPATH' ) || die();

function get_wp_menus(){
  

}

function create_menu_post_type() {
    $labels = array(
        'name'               => 'Menus',
        'singular_name'      => 'Menu',
        'menu_name'          => 'Menus',
        'name_admin_bar'     => 'Menu',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Menu',
        'new_item'           => 'New Menu',
        'edit_item'          => 'Edit Menu',
        'view_item'          => 'View Menu',
        'all_items'          => 'All Menus',
        'search_items'       => 'Search Menus',
        'parent_item_colon'  => 'Parent Menus:',
        'not_found'          => 'No menus found.',
        'not_found_in_trash' => 'No menus found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Description.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'menu' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'excerpt', ),
    );
  register_post_type( 'menu', $args );
}
add_action( 'init', 'create_menu_post_type' );

//if menu page not found, create it.
function install_menu_pages () {
    global $wpdb;
    $now = date( 'Y-m-d H:i:s' );
    $now_gmt = date( 'Y-m-d H:i:s' );
    require_once dirname( __FILE__) . '/data.php';
    //$pages = get_pages_data();
    if ( ! empty( $pages ) ) foreach ( $pages as $page ) {
        if ( $page['build'] ) {
            if ( ! get_page_by_title ( $page['post_title'], OBJECT, 'menu' ) ) {
            $guid = get_option( 'home' ) . '/' . $page['post_name'];
            $wpdb->insert( $wpdb->posts,
                array(
                    'post_author' => get_menu_admin_id(),
                    'post_date' => $now,
                    'post_date_gmt' => $now_gmt,
                    'post_content' => $page['post_content'],
                    'post_excerpt' => '',
                    'post_title' => $page['post_title'],
                    'post_name' => $page['post_name'],
                    'post_modified' => $now,
                    'post_modified_gmt' => $now_gmt,
                    'guid' => $guid,
                    'post_type' => 'menu',
                    'comment_count' => 0,
                    'to_ping' => '',
                    'pinged' => '',
                    'post_content_filtered' => '',
                ));
            }
        }
    }
}

function get_menu_admin_id(){
    $email = get_option( 'admin_email' );
    $user = get_user_by( 'email', $email );    
    if ( ! empty ( $user->ID ) ) {
        return $user->ID;
    }
    else {
        return 1;
    }
}
