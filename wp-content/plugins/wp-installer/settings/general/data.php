<?php

defined( 'ABSPATH' ) || die();

function get_site_title(){
    $site_title = array( 'title' => 'Site Tite', 'option_name' => 'blogname', 'option_value' => 'WordPress 4.3 Bundle', 'update' => 1 );
    return $site_title;
}

function get_tagline(){
    $tagline = array ( 'title' => 'Tagline', 'option_name' => 'blogdescription', 'option_value' => 0, 'update' => 0 );
    return $tagline;
}

function get_root_url(){
    $root_url = array ( 'title' => 'Site Address (URL)', 'option_name' => 'siteurl', 'option_value' => '', 'update' => 0, 'desc' => 'This should be the root of the installation'  );
    return $root_url;    
}

function get_install_url(){
    $install_url = array ( 'title' => 'WordPress Address (URL)', 'option_name' => 'home', 'option_value' => '', 'update' => 0, 'desc' => 'This can be a subdirectory' );
    return $install_url;
}

function get_admin_email_address() {
    $email = array ( 'title' => 'E-mail Address', 'option_name' => 'admin_email', 'option_value' => 'admin@example.ca', 'update' => 0  );
    return $email;
}

function get_general_data() {
    $items = array(
        array ( 'title' => 'Membership', 'option_name' => 'users_can_register', 'option_value' => '0', 'update' => 0  ),
        array ( 'title' => 'New User Default Role', 'option_name' => 'default_role', 'option_value' => 'subscriber', 'update' => 0  ),
        array ( 'title' => 'Date Format', 'option_name' => 'date_format', 'option_value' => 'F j, Y', 'update' => 0  ),
        array ( 'title' => 'Time Format', 'option_name' => 'time_format', 'option_value' => 'g:i a', 'update' => 0  ),
        array ( 'title' => 'Week Starts On', 'option_name' => 'start_of_week', 'option_value' => '0', 'update' => 0  ), // 0 = Sunday
        //email to post not done
    );
    return $items;
}

function get_timezone() {
     //the first timezone with 'selected' => 1 is chosen. America/Toronto is the default.
     $timezone = array (    //option_name => timezone_string
            0 => array ( 'name' => 'America/Toronto', 'selected' =>  1 ),
            1 => array ( 'name' => 'America/Vancouver', 'selected' =>  0 ),
            2 => array ( 'name' => 'America/New_York', 'selected' =>  0 ),
            3 => array ( 'name' => 'America/Chicago', 'selected' =>  0 ),
            4 => array ( 'name' => 'America/Denver', 'selected' =>  0 ),
            5 => array ( 'name' => 'America/Los_Angeles', 'selected' =>  0 ),
            //add your own here as needed...
            );
     return $timezone;
} 

function get_site_language() {
    $site_language = array ( 'title' => 'Site Language', 'option_name' => 'WPLANG', 'option_value' => 'en', 'update' => 0  );
    return $site_language;
}
