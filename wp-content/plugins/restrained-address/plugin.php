<?php

/*
Plugin Name:    Restrained Address
Plugin URI:     https://wp.cbos.ca
Description:    Adds address fields to the user profile. Shortcode: [address]. Does not display empty fields. Not formatted. Wrapped in div with class="address".
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     https://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || die();

add_action( 'show_user_profile', 'user_profile_address', 1 );
add_action( 'edit_user_profile', 'user_profile_address', 1 );
add_action( 'personal_options_update', 'save_address' );
add_action( 'edit_user_profile_update', 'save_address' );
add_shortcode( 'address', 'user_address' );

function user_address( $args ){
    require_once( dirname(__FILE__) . '/template.php' );    
    $str = get_address_html( $args );
    return $str;
}            

function user_profile_address( $user ) { 
    require_once( dirname(__FILE__) . '/data.php' );
    $items = get_address_data(); 
    if ( $items ) { 
        $str = '<h3>' .  _("Address" ) . '</h3>';
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

function save_address( $user_id ) {
    require_once( dirname(__FILE__) . '/data.php' );
    if ( current_user_can( 'edit_user', $user_id ) ) { 
        if ( $items = get_address_data() ) {
            foreach ( $items as $item ) {
                if ( $item['display'] ) {
                    $value = isset( $_POST[ $item['name'] ] ) ? esc_attr( $_POST[ $item['name'] ] ) : '';
                    if ( ! empty ( $value ) ) {
                        update_user_meta( $user_id, $item['name'], $value );
                    }                    
                }
            }
        }
    }
    else {
        return false;    
    }
}
