<?php

/*
Plugin Name:    Restrained Social
Plugin URI:     http://wp.cbos.ca
Description:    Adds social fields to the user profile. Call with shortcode: [social-media]. Makes use of Genericons. Does not display empty fields. Lightly styled.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca

*/ 

defined( 'ABSPATH' ) || die();

add_action( 'show_user_profile', 'user_social_media', 1 );
add_action( 'edit_user_profile', 'user_social_media', 1 );
add_action( 'personal_options_update', 'save_social_media' );
add_action( 'edit_user_profile_update', 'save_social_media' );
add_shortcode( 'social-media', 'social_media' );

function social_media( $args ){
    require_once( dirname(__FILE__) . '/template.php' );    
    $str = get_social_media_html( $args );
    return $str;
}            

function social_media_scripts() {
    // Please ensure no duplicates. Uses .woff only.
    wp_enqueue_style( 'genericons', plugin_dir_url(__FILE__) . 'css/genericons.css', array() );
    wp_enqueue_style( 'social-media', plugin_dir_url(__FILE__) . 'css/style.css' );    
}
add_action( 'wp_enqueue_scripts', 'social_media_scripts', 15 );


function user_social_media( $user ) { 
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_social_data(); 
    if ( $items ) { 
        $str = '<h3>' .  _("Social Media" ) . '</h3>';
        $str .= '<table class="form-table">';
        foreach ( $items as $item ) {
            if ( $item['display'] ) { 
                $str .= '<tr>';
                $str .= '<th><label for="address">' . _( $item['title'] ) .'</label></th>';
                $str .= '<td>';
                $str .= '<input type="text" name="' . $item['name'] .'" ';
                $str .= 'id="' . $item['name'] . '"';
                $str .= ' value="' . esc_attr( get_the_author_meta( $item['name'], $user->ID ) ) . '" ';
                $str .= 'class="regular-text" /><br />';
                $str .= '</td>';
                $str .= '</tr>';
                }
        } 
        $str .= '</table>';
    }
    echo $str;   
}

function save_social_media( $user_id ) {
    require_once( dirname(__FILE__) . '/data.php' );
    if ( current_user_can( 'edit_user', $user_id ) ) { 
        if ( $items = get_social_data() ) {
            foreach ( $items as $item ) {
                if ( $item['display'] ) {
                    update_user_meta( $user_id, $item['name'], esc_attr( $_POST[ $item['name'] ] ) );
                }
            }
        }
    }
    else {
        return false;   
    }
}
