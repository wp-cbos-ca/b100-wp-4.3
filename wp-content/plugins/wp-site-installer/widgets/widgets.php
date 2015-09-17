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

function count_widget_occurence( $widget, $update_widget_content ) {
  $widget_occurrence = 0;
  if ( array_key_exists( $widget, $update_widget_content ) ) {
    $widget_counters = array_keys( $update_widget_content[ $widget ] );
    $widget_occurrence = end( $widget_counters );
  }
  $widget_occurrence++;
  return $widget_occurrence;
}

function custom_create_widgets( $args, $widgets ) {
  extract( $args[0][0][0] );
  foreach ( $widgets as $widget => $widget_content ) {
    $counter = count_widget_occurence( $widget, $args[0][0][0]['update_widget_content'] );
    $args[0][0][0]['active_widgets'][ $sidebars[ $current_sidebar_short_name ] ][] = $widget . '-' . $counter;
    $args[0][0][0]['update_widget_content'][ $widget ][ $counter ] = $widget_content;
  }
}
add_action( 'create_widgets_for_sidebar', 'custom_create_widgets', 10, 2 );

function initialize_sidebars(){
  $sidebars = array();
  $sidebars = apply_filters( 'alter_initialization_sidebars', $sidebars );
  
  $active_widgets = get_option( 'sidebars_widgets' );

  $args = array(
    'sidebars' => $sidebars,
    'active_widgets' => $active_widgets,
    'update_widget_content' => array(),
  );

  foreach ( $sidebars as $current_sidebar_short_name => $current_sidebar_id ) {
    $args['current_sidebar_short_name'] = $current_sidebar_short_name;
    do_action( 'your_plugin_sidebar_init', array( &$args ) );
  }
  if ( ! empty( $args['update_widget_content'] ) ) {
    foreach ( $args['update_widget_content'] as $widget => $widget_occurence ) {
      update_option( 'widget_' . $widget, $args['update_widget_content'][ $widget ] );

    }
    update_option( 'sidebars_widgets', $args['active_widgets'] );
  }
}
     
//



function remove_default_widgets() {
    if ( ! get_option( 'wp_cleared_widgets' ) ) {
        update_option( 'sidebars_widgets', array() );
        update_option( 'wp_cleared_widgets', true );
    }
}
add_action( 'after_setup_theme', 'remove_default_widgets' );