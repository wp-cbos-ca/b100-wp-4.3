<?php

defined( 'ABSPATH' ) || die();

function get_dashboard_data(){
    $items = array ( 
        array ( 'name' => 'dashboard_right_now', 'location' => 'normal', 'remove' => 0 ),
        array ( 'name' => 'dashboard_show_welcome_panel', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'network_dashboard_right_now', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_activity', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_quick_press', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_primary', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'lp_dashboard_widget', 'location' => 'side', 'remove' => 1 ),
        array ( 'name' => 'dashboard_incoming_links', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_plugins', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_secondary', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_incoming_links', 'location' => 'normal', 'remove' => 1 ),
        array ( 'name' => 'dashboard_recent_drafts', 'location' => 'side', 'remove' => 1 ),
        array ( 'name' => 'dashboard_recent_comments', 'location' => 'normal', 'remove' => 1 ),
        );
    return $items;
}
