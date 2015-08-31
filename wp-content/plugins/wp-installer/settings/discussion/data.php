<?php

defined( 'ABSPATH' ) || die();

function get_discussion_data() {
    $items = array(
        0 => array ( 'title' => 'Default article settings', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        1 => array ( 'title' => 'Other comment settings', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        2 => array ( 'title' => 'E-mail me whenever', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        3 => array ( 'title' => 'Before a comment appears', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        4 => array ( 'title' => 'Comment Moderation', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        5 => array ( 'title' => 'Comment Blacklist', 'slug' => 'blacklist_keys' , 'value' => '', 'update' => 0 ),
        6 => array ( 'title' => 'Avatar Display', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        7 => array ( 'title' => 'Maximum Rating', 'slug' => '' , 'value' => 0, 'update' => 0 ),
        8 => array ( 'title' => 'Default Avatar', 'slug' => '' , 'value' => 0, 'update' => 0 ),
    );
    return $items;
}
