<?php

function get_core_update_data(){
    $items = array(
        array( 'title' => 'Automatic Updater', 'slug' => 'automatic_updater_disabled', 'disable' => 0, 'engage' => 0 ),
        array( 'title' => 'Auto Update Core', 'slug' => 'auto_update_core', 'disable' => 1, 'engage' => 1 ),
        array( 'title' => 'Auto Updates VCS Checkout', 'slug' => 'automatic_updates_is_vcs_checkout', 'disable' => 1, 'engage' => 1 ),
        array( 'title' => 'Allow Minor Auto Core Updates', 'slug' => 'allow_minor_auto_core_updates', 'disable' => 1, 'engage' => 1 ),
        array( 'title' => 'Allow Major Auto Core Updates', 'slug' => 'allow_major_auto_core_updates', 'disable' => 1, 'engage' => 1 )
        );
    return $items;
}

function get_theme_update_data(){
    $items = array (
        array( 'title' => 'Auto Update Theme', 'slug' => 'automatic_updates_is_vcs_checkout', 'disable' => 1, 'engage' => 1 ),
        );
    return $items;
}

function get_plugin_update_data(){
    $items = array (
        array( 'title' => 'Auto Update Plugin', 'slug' => 'auto_update_plugin', 'disable' => 1, 'engage' => 1 ),
        );
    return $items;
}

function get_translation_update_data(){
    $items = array (
        array( 'title' => 'Auto Update Translation', 'slug' => 'auto_update_translation', 'disable' => 0, 'engage' => 1 ),
        );
    return $items;
}

function get_email_update_data(){
    $items = array (
        array( 'title' => 'Send Update via Email', 'slug' => 'auto_core_update_send_email', 'disable' => 1, 'engage' => 1 ),
        );
    return $items;
}

//apply_filters( 'auto_core_update_send_email', true, $type, $core_update, $result );

function auto_update_specific_plugins ( $update, $item ) {
    $plugins = array ( 'akismet', 'buddypress' );
    if ( in_array( $item->slug, $plugins ) ) {
        return true; 
    } else {
        return $update;
    }
}
add_filter( 'auto_update_plugin', 'auto_update_specific_plugins', 10, 2 );

//https://codex.wordpress.org/Configuring_Automatic_Background_Updates
//place in wp-config.php for static update control
//define( 'AUTOMATIC_UPDATER_DISABLED', true );
//define( 'WP_AUTO_UPDATE_CORE', false );
