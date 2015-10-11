<?php

defined( 'ABSPATH' ) || die();

function get_maintenance_plugins_data(){
    $items = array( 
        array ( 
            'display' => 1,
            'category' => 'optimization', 
            'title' => 'P3 (Plugin Performance Profiler)', 
            'name' => 'p3-profiler', 
            'uri' => 'https://wordpress.org/plugins/p3-profiler/', 
            'notes' => '',             
        ),
        array( 
            'display' => 1,
            'category' => 'optimization', 
            'title' => 'Image Cleanup', 
            'name' => 'image-cleanup', 
            'uri' => 'https://wordpress.org/plugins/image-cleanup/', 
            'details' => 'image+cleanup',
            'notes' => '', 
            ),
        array( 
            'display' => 1,
            'category' => 'optimization', 
            'title' => 'WP Smush', 
            'name' => 'wp-smushit', 
            'uri' => 'https://wordpress.org/plugins/wp-smushit/', 
            'notes' => '',
            ),
        array( 
            'display' => 1,
            'category' => '', 
            'title' => '', 
            'name' => '', 
            'uri' => '', 
            'notes' => '', 
            ),
        );
        return $items;
}
