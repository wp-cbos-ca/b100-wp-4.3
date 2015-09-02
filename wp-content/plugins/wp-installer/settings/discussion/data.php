<?php

defined( 'ABSPATH' ) || die();

function get_discussion_data() {
    $items = array(
        array ( 'title' => 'Default article settings', 'option_name' => 'default_pingback_flag' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Default article settings', 'option_name' => 'default_ping_status' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Default article settings', 'option_name' => 'default_comment_status' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'require_name_email' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'comment_registration' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'close_comments_for_old_post' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'close_comments_days_old' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'thread_comments' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'thread_comments_depth' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'page_comments' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'comments_per_page' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'default_comments_page' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Other comment settings', 'option_name' => 'comment_order' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'E-mail me whenever', 'option_name' => 'comments_notify' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'E-mail me whenever', 'option_name' => 'moderation_notify' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'Before a comment appears', 'option_name' => 'comment_moderation' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Before a comment appears', 'option_name' => 'comment_whitellist' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'Comment Moderation', 'option_name' => 'comment_max_links' , 'option_value' => 0, 'update' => 0 ),
        array ( 'title' => 'Comment Moderation', 'option_name' => 'moderation_key' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'Comment Blacklist', 'option_name' => 'blacklist_keys' , 'option_value' => '', 'update' => 0 ),
        
        array ( 'title' => 'Avatar Display', 'option_name' => 'show_avatars' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'Maximum Rating', 'option_name' => 'avatar_rating' , 'option_value' => 0, 'update' => 0 ),
        
        array ( 'title' => 'Default Avatar', 'option_name' => 'avatar_default' , 'option_value' => 0, 'update' => 0 ),
    );
    return $items;
}
