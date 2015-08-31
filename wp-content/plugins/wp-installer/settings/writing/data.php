<?php

defined( 'ABSPATH' ) || die();

function get_writing_data() {
    $items = array (
        0 => array ( 'title' => 'Convert emoticons to graphics on display', 'slug' => 'use_smilies', 'value' => 0, 'update' => 0 ),
        1 => array ( 'title' => 'Default Post Category', 'slug' => 'default_category', 'value' => 0, 'update' => 0 ),
        2 => array ( 'title' => 'Default Post Format', 'slug' => '', 'value' => 'standard', 'update' => 0 ),
        3 => array ( 'title' => 'Update Services', 'slug' => '', 'value' => '', 'update' => 0 ),
        );
    return $items;
}
