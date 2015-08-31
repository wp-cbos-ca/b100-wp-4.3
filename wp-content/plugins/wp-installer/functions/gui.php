<?php

defined( 'ABSPATH' ) || die();

function wp_site_installer_menu(){
    $args = array( 
        'page_title' => 'WP Site Installer',
        'menu_title' => 'Site Installer',
        'capability' => 'manage_options',
        'menu_slug' => 'site-installer',
        'function' => 'wp_site_installer',
        );
        
    add_management_page( 
        $args['page_title'], 
        $args['menu_title'], 
        $args['capability'], 
        $args['menu_slug'], 
        $args['function']
    );
}

add_action( 'admin_menu', 'wp_site_installer_menu' );

function wp_site_installer() {
    if ( ! current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    
    if ( $msg = check_site_installer() ) { }
    else {
        $msg = "";
    }
    
    $str = '<div class="wrap" style="width: 50%;">';
    $str .= '<h1>Run Installer</h1>';
    $str .= '<p>See plugin file for detail settings.</p>';
    $str .= '<form action="" method="post">';
    $str .= '<button class="button" name="site-installer" >Run Installer</button>';
    $str .= wp_nonce_field( 'site-installer', 'site-installer' );
    $str .= '</form>';
    $str .= '<p>' . $msg . '</p>';
    $str .= '</div>';
    echo $str;
}
    
function check_site_installer() {
    if ( ! empty( $_POST ) && check_admin_referer( 'site-installer', 'site-installer' ) ) {
        run_site_installer();
    }
    else {
        return false;
    }
}
