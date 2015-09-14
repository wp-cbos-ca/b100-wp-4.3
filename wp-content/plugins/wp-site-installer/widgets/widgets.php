<?php

defined( 'ABSPATH' ) || die();

function install_widgets() {
    require_once dirname( __FILE__) . '/data.php';
    $items = get_widgets_data();
    $sidebars = get_option( 'sidebars_widgets' );
    $location = 'sidebar-1';
    foreach ( $items as $k => $item ) {
    if ( $item['update'] ) {
            if ( $item['on'] ) {
                if ( ! exists_in_sidebar( $sidebars[ $item['location'] ], $item['slug'] ) ) {
                    array_unshift( $sidebars[ $item['location'] ], $item['slug'] );
                    //array_search ( 'a', $arr );
                    update_option( 'sidebars_widgets', $sidebars );
                    break;
                }
            }
            else {
                //unset( $sidebars [ $item['location'] ][0] );
            }
        }
    }
}
    
function exists_in_sidebar( $sidebar, $widget ){
    if( is_array( $sidebar ) ) foreach ( $sidebar as $k => $v ) {
        if( strpos( $v, $widget ) !== FALSE ) {
            return true;
        }        
        else {
            return false;
        }
    }
    else {
        return false;
    }
}

function pre_dump( $arr ) {
    echo '<pre>';
    var_dump( $arr ); 
    echo '</pre>';
}
     