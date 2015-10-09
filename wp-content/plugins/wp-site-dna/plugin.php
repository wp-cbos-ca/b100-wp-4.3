<?php

/*
Plugin Name:    WP Site DNA
Plugin URI:     http://wp.cbos.ca
Description:    Securely holds the complete site configuration (with very little "junk" DNA) in a repeating set of files and arrays. Capable of installing pages, posts, menus, featured images, categories, tags and users. Also capable of setting permalinks, timezones, the front and posts page, etc. Ideally stored elsewhere once used. Can be retained for restoring site to user specified factory default. 
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

require_once( dirname(__FILE__) . '/includes/template/template.php' );

function wp_install_site_data() {
    require_once( dirname(__FILE__) . '/data.php' );        
    require_once( dirname(__FILE__) . '/includes/functions.php' );
}
add_action( 'admin_init', 'wp_install_site_data' );

// called from includes/template
function run_site_installer(){
    $items = get_installer_run_data();
    if ( $items['site']['run'] ) {
        load_site_files();
        run_site_files();
    }
    if ( $items['settings']['run'] ) {
        load_settings_files();
        run_settings_files();
    }
    if ( $items['content']['run'] ) {
        load_content_files();
        run_content_files();
    }
    if ( $items['sorting']['run'] ) {
        load_sorting_files();
        run_sorting_files();
    }
    if ( $items['images']['run'] ) {
        load_images_files();
        run_images_files();
    }
}

function load_site_files() {
    $items = get_site_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                if ( strpos( $item['name'], 'menu-' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/menus/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                else {
                    $file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                if ( file_exists( $file ) ) {
                    require_once( $file );
                }
            }
        }
    }
}

function run_site_files() {
    $items = get_site_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'clean':
                        default_cleaner();
                        break;
                    case 'menus':
                        install_menus();
                        break;
                    case 'menu-assign':
                        assign_menus();
                        break;
                    case 'users':
                        install_users();
                        break;
                    case 'widgets':
                        configure_widgets();
                        break;
                    case 'themes':
                        activate_themes();
                        break;
                    case 'plugins':
                        configure_plugins();
                        break;
                    case 'dashboard':
                        configure_dashboard_user();
                        break;    
                    default:   
                }
            }
        }
    }
}

function load_settings_files() {
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

function run_settings_files() {
    $items = get_settings_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'general':
                        install_general_settings();
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
                    case 'timezone':
                        install_timezone_settings();
                        break;
                    default:   
                }
            }
        }
    }
}

function load_content_files() {
    $items = get_content_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                if ( strpos( $item['name'], 'posts-' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/posts/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                else if ( strpos( $item['name'], 'post-type-block' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/post-type/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                
                else if ( strpos( $item['name'], 'page-' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/pages/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                else {
                    $file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                if ( file_exists( $file ) ) {
                    require_once( $file );
                }
            }
        }
    }
}

function run_content_files() {
    $items = get_content_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'pages':
                        install_pages();
                        break;
                    case 'page-block':
                        install_page_block();
                        break;
                    case 'posts':
                        install_posts();
                        break;
                    case 'posts-block':
                        install_posts_block();
                        break;
                    case 'post-type':
                        install_post_type();
                        break;
                    case 'post-type-block':
                        install_post_type_block();
                        break;
                    default:    
                }
            }
        }
    }
}

function load_images_files() {
    $items = get_image_data();
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

function run_images_files() {
    $items = get_image_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'images':
                        install_featured_images();
                        break;
                    default: 
                }
            }
        }
    }
}

function load_sorting_files() {
    $items = get_sorting_data();
    if ( ! empty ( $items ) && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                if ( strpos( $item['name'], 'tags-' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/tags/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                else if ( strpos( $item['name'], 'cats-' ) !== FALSE ) {
                    $file = dirname(__FILE__) . '/categories/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                else {
                    $file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
                }
                if ( file_exists( $file ) ) {
                    require_once( $file );
                }
            }
        }
    }
}

function run_sorting_files() {
    $items = get_sorting_data();
    if ( ! empty ( $items )  && is_array( $items ) ) {
        foreach ( $items as $item ) {
            if ( $item['run'] && ! $item['ran'] ) {
                switch( $item['name'] ) {
                    case 'categories':
                        install_categories();
                        break;
                    case 'cats-assign':
                        assign_categories();
                        break;
                    case 'tags':
                        install_tags();
                        break;
                    case 'tags-assign':
                        assign_tags_to_posts();
                        break;
                }
            }
        }
    }
}

if ( ! defined( 'is_localhost' ) ) {
    function is_localhost() {
        $whitelist = array( '127.0.0.1', '::1' );
        if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
            return true;
        }
    }
}

function global_remove_welcome_panel() {
    global $wp_filter;
    unset( $wp_filter['welcome_panel'] );
}
add_action( 'wp_dashboard_setup', 'global_remove_welcome_panel' );

function sort_dashboard_widgets() {
    $args = array( 'slug' => 'wpsi_dashboard_widget', 'title' => 'WP Site Installer', 'function' => 'wpsi_function' );
    wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );                                                                                
    global $wp_meta_boxes;
    $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
    $widget_backup = array( 'wpsi_dashboard_widget' => $normal_dashboard['wpsi_dashboard_widget'] );
    unset( $normal_dashboard['wpsi_dashboard_widget'] );
    $sorted_dashboard = array_merge( $widget_backup, $normal_dashboard );
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
} 

function wpsi_add_dashboard_widget() {
    $args = array( 'slug' => 'wpsi_dashboard_widget', 'title' => 'WP Site Installer', 'function' => 'wpsi_function' );
    wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );                                                                                
}
add_action( 'wp_dashboard_setup', 'sort_dashboard_widgets' );

function wpsi_function() {
    $str = sprintf( 'The WP Site Installer can be found at <strong><a href="%s">Tools: WP Site Installer</a>.</strong>', admin_url( '/tools.php?page=wp-site-installer' ) );
    $str .= '<p>Click <strong>Run Installer</strong> to run the installer. ';
    $str .= 'The settings are found in the plugin file and can be edited ';
    $str .= 'with a simple text editor and uploaded with your favourite ftp program. ';
    $str .= 'This approach is chosen to make these settings less prone to change as once ';
    $str .= 'configured the entire site configuration can be stored here. ';
    $str .= 'Click "Screen Options" above, and then uncheck "WP Site Installer" to dismiss this notice.</p>';
    echo $str;
}