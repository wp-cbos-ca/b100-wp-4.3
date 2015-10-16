<?php

defined( 'ABSPATH' ) || die();

function get_social_data() {
    $items = array( 
            0 => array( 'name' => 'twitter', 'title' => 'Twitter', 'display' => 1 ),
            1 => array( 'name' => 'facebook',  'title' => 'Facebook', 'display' => 1 ),
            2 => array( 'name' => 'rss',  'title' => 'RSS', 'display' => 1 ),
            3 => array( 'name' => 'linkedin',  'title' => 'LinkedIn', 'display' => 1 ),
            4 => array( 'name' => 'googleplus', 'title' => 'Google+', 'display' => 1 )
        );
        return $items;                
}
