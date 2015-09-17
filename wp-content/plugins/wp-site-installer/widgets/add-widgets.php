<?php

//https://raw.githubusercontent.com/superinteractive/WordPress-Automagic-Widgets/master/example-usage.php
  
class WP_Sidebars {

    function __construct() {
        //add_action( "after_switch_theme", array( &$this, "register_widgets" ) );
        add_action( 'admin_init', array( &$this, 'register_widgets' ) );  //adjust as needed.
    }

    function register_widgets( $theme_name ) {
        require_once( dirname(__FILE__) . '/class.add-widgets.php' );
        $theme = get_current_theme();
        if ( $theme_name == get_current_theme() && false == get_option( 'wp_widgets_added' ) ) {
            if( class_exists( 'WP_Automatic_Widgets' ) ) {
                $auto_widgets = new WP_Automatic_Widgets;
                require_once( dirname(__FILE__) . '/data.php' );
                $widgets = get_widget_data();
                $auto_widgets->add_widgets( $widgets );
                update_option( 'wp_widgets_added', 1 );
            }
        }
    }
}

$wp_sidebars = new WP_Sidebars;

$wp_sidebars->register_widgets( 'Twenty Twelve' );
