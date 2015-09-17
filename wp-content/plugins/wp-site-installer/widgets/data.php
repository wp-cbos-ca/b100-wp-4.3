<?php
  
defined( 'ABSPATH' ) || die();

//for consumption by the widget class. (Yum, yum!)
function get_widgets_data() {
    $items = array(
                array( 
                    'sidebar' => 'sidebar-1',
                    'widget' => 'text',
                    'args' => array( 'title' => 'My text widget', 'text' => 'Lorem ipsum dolor sit amet.' ),
                    'install' => 1
                ),
                array( 
                    'sidebar' => 'sidebar-1',
                    'widget' => 'search',
                    'install' => 1
                    ),
                );
    return $items;
}

//not quite :(
function get_widgets_data_all() {
    $items = array(
        array( 'name' => 'widget_categories', 'slug' => 'categories', 'location' => 'sidebar-1', 'on' => 1, 'update' => 0 ),
        array( 'name' => 'widget_text', 'slug' => 'text', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_rss', 'slug' => 'rss', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_search', 'slug' => 'search', 'location' => 'sidebar-1', 'on' => 1, 'update' => 1 ),
        array( 'name' => 'widget_recent-posts', 'slug' => 'recent-posts', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_recent-comments', 'slug' => 'recent-comments', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_archives', 'slug' => 'archives', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_meta', 'slug' => 'meta', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_widgets', 'slug' => 'widgets', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_calendar', 'slug' => 'calendar', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_nav_menu', 'slug' => 'nav_menu', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_pages', 'slug' => 'pages', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
        array( 'name' => 'widget_tag_cloud', 'slug' => 'tag_cloud', 'location' => 'sidebar-1', 'on' => 0, 'update' => 0 ),
    );
    return $items;
}