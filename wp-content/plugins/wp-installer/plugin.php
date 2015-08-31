<?php

/*
Plugin Name:    WP Installer
Plugin URI:     http://wp.cbos.ca
Description:    Capable of installing pages, posts, menus, featured images, categories, tags and users. Also capable of setting permalinks, timezones, the front and posts page, etc. Remove once complete. Can be retained for restoring site to user specified factory default. 
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

require_once( dirname(__FILE__) . '/functions/gui.php' );

function wp_install_site_data() {
    require_once( dirname(__FILE__) . '/functions/functions.php' );        
}
add_action( 'admin_init', 'wp_install_site_data' );

function run_site_installer(){
    load_install_files();
    run_install_files();
    load_settings_files();
    run_settings_files();
}

function get_site_data(){
    $items = array(
        array( 'name' => 'clean',           'run' => 1, 'ran' => 1 ),
        array( 'name' => 'site',            'run' => 0, 'ran' => 0 ),
        array( 'name' => 'menus',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'pages',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'posts',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'posts-custom',    'run' => 0, 'ran' => 0 ),
        array( 'name' => 'posts-block',     'run' => 0, 'ran' => 0 ),
        array( 'name' => 'images-featured', 'run' => 0, 'ran' => 0 ),
        array( 'name' => 'categories',      'run' => 0, 'ran' => 0 ),
        array( 'name' => 'category-assign', 'run' => 0, 'ran' => 0 ),
        array( 'name' => 'tags',            'run' => 0, 'ran' => 0 ),
        array( 'name' => 'users',           'run' => 0, 'ran' => 0 ),
        array( 'name' => 'widgets',         'run' => 0, 'ran' => 0 ),
        array( 'name' => 'themes',          'run' => 0, 'ran' => 0 ),
        array( 'name' => 'plugins',         'run' => 1, 'ran' => 0 ),
    );
    return $items;
}

function get_settings_data() {
    $items = array(
        array( 'name' => 'general',     'run' => 0, 'ran' => 0 ),
        array( 'name' => 'writing',     'run' => 0, 'ran' => 0 ),
        array( 'name' => 'reading',     'run' => 0, 'ran' => 0 ),
        array( 'name' => 'discussion',  'run' => 0, 'ran' => 0 ),
        array( 'name' => 'media',       'run' => 0, 'ran' => 0 ),
        array( 'name' => 'permalinks',  'run' => 0, 'ran' => 0 ),
        array( 'name' => 'timezone',    'run' => 0, 'ran' => 0 ),
    );
    return $items;
}

function load_install_files( $items='' ) {
    $items = get_site_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                require_once( dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php' );
            }
        }
    }
}

function load_settings_files( $items='' ) {
    $items = get_settings_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                require_once( dirname(__FILE__) . '/settings/' . $item['name'] . '/' . $item['name'] . '.php' );
            }
        }
    }
}

function run_install_files( $items='' ) {
    $items = get_site_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'clean':
                        default_cleaner();
                        break;
                    case 'site':
                        install_site();
                        break;
                    case 'menus':
                        install_menus();
                        break;
                    case 'pages':
                        install_pages();
                        break;
                    case 'posts':
                        install_posts();
                        break;
                    case 'posts-custom':
                        install_custom_post_type_data();
                        break;
                    case 'posts-block':
                        install_posts_block();
                        break;
                    case 'images-featured':
                        install_featured_images();
                        break;
                    case 'categories':
                        install_categories();
                        break;
                    case 'category-assign':
                        assign_categories();
                        break;
                    case 'tags':
                        install_tags();
                        break;
                    case 'timezone':
                        install_timezone();
                        break;
                    case 'users':
                        install_users();
                        break;
                    case 'widgets':
                        install_widgets();
                        break;
                    case 'plugins':
                        configure_plugins();
                        break;
                    default:   
                }
            }
        }
    }
}

function run_settings_files( $items='' ) {
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'general':
                        install_general_settings();
                        break;
                    case 'timezone':
                        install_timezone_settings();
                        break;
                    case 'writing':
                        install_writing_settings();
                        break;
                    case 'reading':
                        install_reading_settings();
                        break;
                    case 'discussion':
                        install_discussion_settings();
                        break;
                    case 'media':
                        install_media_settings();
                        break;
                    case 'permalinks':
                        install_permalink_settings();
                        break;
                    default:   
                }
            }
        }
    }
}
