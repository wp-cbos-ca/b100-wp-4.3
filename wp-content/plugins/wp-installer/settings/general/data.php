<?php

defined( 'ABSPATH' ) || die();

function get_general_data() {
    $items = array(
        array ( 'title' => 'Site Title', 'slug' => 'blogname', 'value' => 'xyz', 'update' => 1 ),
        array ( 'title' => 'Tagline', 'slug' => 'blogdescription', 'value' => 0, 'update' => 0 ),
        array ( 'title' => 'WordPress Address (URL)', 'slug' => 'home', 'value' => '', 'update' => 0 ),
        array ( 'title' => 'Site Address (URL)', 'slug' => 'siteurl', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'E-mail Address', 'slug' => '', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'Membership', 'slug' => '', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'New User Default Role', 'slug' => 'default_role', 'value' => 'subscriber', 'update' => 0  ),
        array ( 'title' => 'Timezone', 'slug' => '', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'Date Format', 'slug' => 'date_format', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'Time Format', 'slug' => 'time_format', 'value' => '', 'update' => 0  ),
        array ( 'title' => 'Week Starts On', 'slug' => '', 'value' => '', 'update' => 0  ),
        //email to post not done
    );
    return $items;
}
