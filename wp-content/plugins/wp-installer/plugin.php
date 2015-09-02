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

if ( ! defined( 'WP_POST_TYPE' ) ) {
    define( 'WP_POST_TYPE', 'post' );
}
if ( ! defined( 'WP_POST_TYPE_ALT' ) ) {
    define( 'WP_POST_TYPE_ALT', 'custom' ); //change as needed
}

require_once( dirname(__FILE__) . '/includes/template.php' );

function wp_install_site_data() {
    require_once( dirname(__FILE__) . '/data.php' );        
    require_once( dirname(__FILE__) . '/includes/functions.php' );        
}
add_action( 'admin_init', 'wp_install_site_data' );

// called from includes/template
function run_site_installer(){
    load_install_files();
    run_install_files();
    load_settings_files();
    run_settings_files();
}

function load_install_files( $items='' ) {
    $items = get_site_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                $file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
                if ( file_exists( $file ) ) {
                    require_once( $file );
                }
            }
        }
    }
}

function load_settings_files( $items='' ) {
    $items = get_settings_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                $file = dirname(__FILE__) . '/settings/' . $item['name'] . '/' . $item['name'] . '.php';
                if ( file_exists( $file ) ) {
                    require_once( $file );
                }
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

function run_settings_files( $items=Array() ) {
    $items = get_settings_data();
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
