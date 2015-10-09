<?php

defined( 'ABSPATH' ) || die();

global $sidebars_widgets;
$sidebars_widgets = null;

function configure_widgets() {
    require_once( dirname(__FILE__) . '/data.php' );
    
    $theme = get_widget_theme_data();
    if ( $theme['name'] == get_option('template' ) ) {
        update_sidebars_widgets();
        update_widgets();
    }
}

function update_sidebars_widgets() {  
    $widgets = get_sidebars_widget_data();
    $existing = get_option( 'sidebars_widgets' );
    wdump( $existing, 1 );
    update_option( 'sidebars_widgets', $widgets );
    $new = get_option( 'sidebars_widgets' );
    wdump( $new, 1 );
} 

function update_widgets(){
    $search = get_search_widget_data();
    $existing = get_option( 'widget_search' );
    wdump( $existing, 0 );
    update_option( 'widget_search', '' );
    if ( $search['update'] ) {        
        update_option( 'widget_search', $search['widget'] );    
    }    
    $new = get_option( 'widget_search' );
    wdump( $new, 0 );
}

function build_sidebars_widgets_array( $existing, $items ){
    foreach ( $items as $name => $item ) {
        if ( $item['update'] ) {
            $existing[ $name ] = $item['contents'];
        }
    }
    return $existing;
}


function wdump( $arr, $output = 1 ) {
    if ( $output ) {
        echo "<pre>";
        var_dump( $arr );
        echo "</pre>";
    }
}