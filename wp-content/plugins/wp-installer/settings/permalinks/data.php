<?php
defined( 'ABSPATH' ) || die();

function get_permalinks_data() {
    $items = array(
        0 => array ( 'title' => 'Common Settings', 'slug' => '', 'value' => '', 'update' => 0 ),
        1 => array ( 'title' => 'Category Base', 'slug' => '', 'value' => '', 'update' => 0  ),
        2 => array ( 'title' => 'Tag Base', 'slug' => 'tag_base', 'value' => '', 'update' => 0  ),
    );
    return $items;
}
