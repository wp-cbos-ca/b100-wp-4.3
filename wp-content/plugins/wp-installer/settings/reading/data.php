<?php

defined( 'ABSPATH' ) || die();

function get_reading_data() {
    $items = array(
        0 => array ( 'title' => 'Front page displays', 'slug' => '', 'value' => 0, 'update' => 0 ),
        1 => array ( 'title' => 'Posts page', 'slug' => '', 'value' => 0, 'update' => 0 ),
        2 => array ( 'title' => 'Blog pages show at most', 'slug' => 'posts_per_page', 'value' => 10, 'update' => 0 ),
        3 => array ( 'title' => 'Syndication feeds show the most recent', 'slug' => 'posts_per_rss', 'value' => 10, 'update' => 0 ),
        4 => array ( 'title' => 'For each article in a feed show', 'slug' => 'rss_use_excerpt', 'value' => 1, 'update' => 0 ),
        5 => array ( 'title' => 'Search Engine Visibility', 'slug' => 'blog_public', 'value' => 0, 'update' => 0 ),  
    );
    return $items;
}
