<?php

defined( 'ABSPATH' ) || die();

function wp_site_installer_menu(){
    require_once( dirname(__FILE__) . '/data.php' );
    $args = get_installer_data();
    add_management_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
}
add_action( 'admin_menu', 'wp_site_installer_menu' );

function get_site_installer_template() {
    if ( ! current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    
    if ( $msg = check_site_installer() ) { }
    else {
        $msg = "";
    }
    
    $items = get_template_data();
    
    $str = '<div class="wrap" style="width: 50%;">';
    $str .= sprintf('<h1>%s</h1>%s', $items['title'], PHP_EOL );
    $str .= sprintf( '<p>%s</p>%s', $items['desc'], PHP_EOL );
    $str .= '<form action="" method="post">';
    $str .= sprintf('<button class="button" name="site-installer" >%s</button>', $items['button_text'], PHP_EOL );
    $str .= wp_nonce_field( 'site-installer', 'site-installer' );
    $str .= '</form>';
    $str .= '<p>' . $msg . '</p>';
    $str .= get_help_data();
    $str .= '</div>';
    return $str;
}

function the_site_installer_template() {
    echo get_site_installer_template();
}
    
function check_site_installer() {
    if ( ! empty( $_POST ) && check_admin_referer( 'site-installer', 'site-installer' ) ) {
        run_site_installer();
    }
    else {
        return false;
    }
}
