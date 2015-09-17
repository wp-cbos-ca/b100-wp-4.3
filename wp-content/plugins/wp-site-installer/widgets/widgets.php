<?php

defined( 'ABSPATH' ) || die();

function install_widgets() {
    require_once( dirname(__FILE__) . '/data.php' );
    $widgets = get_widget_data();
    wpsi_add_widgets( $widgets, 'Twenty Twelve' );
}

/**
* https://raw.githubusercontent.com/superinteractive/WordPress-Automagic-Widgets/master/example-usage.php
*/

function wpsi_add_widgets( $widgets, $theme_name='' ) {
    require_once( dirname(__FILE__) . '/add-widgets.class.php' );
    $theme = get_current_theme();
    if ( $theme_name == get_current_theme() && false == get_option( 'wpsi_widgets_added' ) ) {
        if( class_exists( 'WPSI_Add_Widgets' ) ) {
            $add_widgets = new WPSI_Add_Widgets;
            $add_widgets->add_widgets( $widgets );
            update_option( 'wpsi_widgets_added', 1 );
        }
    }
}
