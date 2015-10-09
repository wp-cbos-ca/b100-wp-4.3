<?php

defined( 'ABSPATH' ) || die();

function install_widgets() {
    require_once dirname( __FILE__) . '/data.php';
    $items = get_widgets_data();
    $sidebars = get_option( 'sidebars_widgets' );
    foreach ( $sidebars[ 'sidebar-1' ] as $widget ) {
        foreach ( $items as $k => $item ) {
        if ( $item['update'] ) {
                    if ( $item['on'] ) {
                        if ( ! exists_in_sidebar( $sidebars[ $item['location'] ], $item['name'] ) ) {
                            //add it
                            $sidebars[ $item['location'] ] = $item['name'];
                        }
                    }
                    else {
                        //it's not on, take it out.   
                        unset( $sidebars [ $item['location'] ][0] );
                    }
                }
                else {
                    //
                }
            }
        }
    }
    
function exists_in_sidebar( $sidebar, $widget ){
    foreach ( $sidebar as $k => $v ) {
        if( strpos( $v, $widget ) !== FALSE ) {
            return true;
        }        
        else {
            return false;
        }
    }
}

function pre_dump( $arr ) {
    echo '<pre>';
    var_dump( $arr ); 
    echo '</pre>';
}

     