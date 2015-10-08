<?php

defined( 'ABSPATH' ) || die();

function configure_widgets() {
    require_once( dirname(__FILE__) . '/data.php' );
    $theme = get_widget_theme_data();
    if ( $theme['name'] == get_option('template' ) ) {
        update_sidebars_widgets();
        update_widgets();
    }
}

//Warning: this will replace all current widgets
//and delete inactive ones.  
function update_sidebars_widgets() {  
    $sidebars_widgets = get_sidebars_widget_data();
    update_option( 'sidebars_widgets', $sidebars_widgets );
    $widgets = get_option( 'sidebars_widgets' );
} 

function update_widgets(){
    $search = get_search_widget_data();
    if ( $search['update'] ) {        
        update_option( 'widget_search', $search['widget'] );    
    }    
}

function wdump( $arr ) {
    echo "<pre>";
    var_dump( $arr );
    echo "</pre>";
}