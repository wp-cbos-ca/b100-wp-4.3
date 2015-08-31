<?php

defined( 'ABSPATH' ) || die();

//the widget api does not appear to be very well developed.
function setup_widgets() {
    
    require_once dirname( __FILE__) . '/data.php';
      
    // Set up default widgets for default theme.
    update_option( 'widget_search', array ( 2 => array ( 'title' => '' ), '_multiwidget' => 1 ) );
    update_option( 'widget_recent-posts', array ( 2 => array ( 'title' => '', 'number' => 5 ), '_multiwidget' => 1 ) );
    update_option( 'widget_recent-comments', array ( 2 => array ( 'title' => '', 'number' => 5 ), '_multiwidget' => 1 ) );
    update_option( 'widget_archives', array ( 2 => array ( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
    update_option( 'widget_categories', array ( 2 => array ( 'title' => '', 'count' => 0, 'hierarchical' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
    update_option( 'widget_meta', array ( 2 => array ( 'title' => '' ), '_multiwidget' => 1 ) );
    update_option( 'sidebars_widgets', array ( 'wp_inactive_widgets' => array ( ), 'sidebar-1' => array ( 0 => 'search-2', 1 => 'recent-posts-2', 2 => 'recent-comments-2', 3 => 'archives-2', 4 => 'categories-2', 5 => 'meta-2',), 'sidebar-2' => array ( ), 'sidebar-3' => array ( ), 'sidebar-4' => array ( ), 'sidebar-5' => array ( ), 'array_version' => 3 ) );
    update_user_meta( $user_id, 'show_welcome_panel', 1 );   
}
     