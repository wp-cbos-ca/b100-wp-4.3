<?php

defined( 'ABSPATH' ) || die();

function get_discussion_data() {
    $items = array(
        0 => array ( 'title' => 'Default article settings', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        1 => array ( 'title' => 'Other comment settings', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        2 => array ( 'title' => 'E-mail me whenever', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        3 => array ( 'title' => 'Before a comment appears', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        4 => array ( 'title' => 'Comment Moderation', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        5 => array ( 'title' => 'Comment Blacklist', 'option_name' => 'blacklist_keys' , 'option_value' => '', 'update' => 0 ),
        6 => array ( 'title' => 'Avatar Display', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        7 => array ( 'title' => 'Maximum Rating', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
        8 => array ( 'title' => 'Default Avatar', 'option_name' => '' , 'option_value' => 0, 'update' => 0 ),
    );
    return $items;
}
