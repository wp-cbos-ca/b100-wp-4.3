<?php

//https://wordpress.stackexchange.com/questions/26557/programmatically-add-widgets-to-sidebars
function initialize_sidebars(){
  $sidebars = array();
  // Supply the sidebars you want to initialize in a filter
  $sidebars = apply_filters( 'alter_initialization_sidebars', $sidebars );
  
  $active_widgets = get_option( 'sidebars_widgets' );

  $args = array(
    'sidebars' => $sidebars,
    'active_widgets' => $active_widgets,
    'update_widget_content' => array(),
  );

  foreach ( $sidebars as $current_sidebar_short_name => $current_sidebar_id ) {
    $args['current_sidebar_short_name'] = $current_sidebar_short_name;
    // we are passing our arguments as a reference, so we can modify their contents
    do_action( 'your_plugin_sidebar_init', array( &$args ) );
  }
  // we only need to update sidebars, if the sidebars are not initialized yet
  // and we also have data to initialize the sidebars with
  if ( ! empty( $args['update_widget_content'] ) ) {
    foreach ( $args['update_widget_content'] as $widget => $widget_occurence ) {
      // the update_widget_content array stores all widget instances of each widget
      update_option( 'widget_' . $widget, $args['update_widget_content'][ $widget ] );

    }
    // after we have updated all the widgets, we update the active_widgets array
    update_option( 'sidebars_widgets', $args['active_widgets'] );
  }
}

function check_sidebar_content( $active_widgets, $sidebars, $sidebar_name ) {
  $sidebar_contents = $active_widgets[ $sidebars[ $sidebar_name ] ];
  if ( ! empty( $sidebar_contents ) ) {
    return $sidebar_contents;
  }
  return false;
}

function add_widgets_to_sidebar( $args ) {
  extract( $args[0] );
  // We check if the current sidebar already has content and if it does we exit
  $sidebar_element = check_sidebar_content( $active_widgets, $sidebars, $current_sidebar_short_name );
  if ( $sidebar_element !== false  ) {
    return;
  }
  do_action( 'your_plugin_widget_init', array( &$args ) );
}
add_action( 'your_plugin_sidebar_init', 'add_widgets_to_sidebar' );

function your_plugin_initialize_widgets( $args ) {
  extract( $args[0][0] );
  $widgets = array();
  // Here the widgets previously defined in filter functions are initialized,
  // but only those corresponding to the current sidebar 
  $widgets = apply_filters( 'alter_initialization_widgets_' . $current_sidebar_short_name, $widgets );
  if ( ! empty( $widgets ) ) {
    do_action( 'create_widgets_for_sidebar', array( &$args ), $widgets );
  }
}
add_action( 'your_plugin_widget_init', 'your_plugin_initialize_widgets' );

function your_plugin_create_widgets( $args, $widgets ) {
  extract( $args[0][0][0] );
  foreach ( $widgets as $widget => $widget_content ) {
    // The counter is increased on a widget basis. For instance, if you had three widgets,
    // two of them being the archives widget and one of the being a custom widget, then the
    // correct counter appended to each one of them would be archive-1, archive-2 and custom-1.
    // So the widget counter is not a global counter but one which counts the instances (the
    // widget_occurrence as I have called it) of each widget.
    $counter = count_widget_occurence( $widget, $args[0][0][0]['update_widget_content'] );
    // We add each instance to the active widgets...
    $args[0][0][0]['active_widgets'][ $sidebars[ $current_sidebar_short_name ] ][] = $widget . '-' . $counter;
    // ...and also save the content in another associative array.
    $args[0][0][0]['update_widget_content'][ $widget ][ $counter ] = $widget_content;
  }
}
add_action( 'create_widgets_for_sidebar', 'your_plugin_create_widgets', 10, 2 );

function count_widget_occurence( $widget, $update_widget_content ) {
  $widget_occurrence = 0;
  // We look at the update_widget_content array which stores each
  // instance of the current widget with the current counter in an 
  // associative array. The key of this array is the name of the 
  // current widget.
      // Having three archives widgets for instance would look like this:
      // 'update_widget_content'['archives'] => [1][2][3] 
  if ( array_key_exists( $widget, $update_widget_content ) ) {
    $widget_counters = array_keys( $update_widget_content[ $widget ] );
    $widget_occurrence = end( $widget_counters );
  }
  $widget_occurrence++;
  return $widget_occurrence;
}

// Use this filter hook to specify which sidebars you want to initialize
function current_initialization_sidebars( $sidebars ) {
  // The sidebars are assigned in this manner.
  // The array key is very important because it is used as a suffix in the initialization function
  // for each sidebar. The value is what is used in the html attributes.
  $sidebars['info'] = 'info-sidebar';
  return $sidebars;
}
add_filter( 'alter_initialization_sidebars', 'current_initialization_sidebars' ) ;

// Add a filter hook for each sidebar you have. The hook name is derived from
// the array keys passed in the alter_initialization_sidebars filter. 
// Each filter has a name of 'alter_initialization_widgets_' and the array 
// key appended to it.
function current_info_widgets( $widgets ) {
  // This filter function is used to add widgets to the info sidebar. Add each widget
  // you want to assign to this sidebar to an array.
  return $widgets = array(
    // Use the name of the widget as specified in the call to the WP_Widget constructor
    // as the array key.

    // The archives widget is a widget which is shipped with wordpress by default.
    // The arguments used by this widget, as all other default widgets, can be found
    // in wp-includes/default-widgets.php. 

    'archives' => array(
      // Pass in the array options as an array
      'title' => 'Old Content',
      'dropdown' => 'on',
      // The 'on' value is arbitrarily chosen, the widget actually only checks for
      // a non-empty value on both of these options
      'count' => 'on',
    ),
 );
}
add_filter( 'alter_initialization_widgets_info', 'current_info_widgets' );

function my_activation_function() {
  initialize_sidebars();
}
add_action( 'after_switch_theme', 'my_activation_function' );

function my_activation_function() {
  initialize_sidebars();
}
register_activation_hook( __FILE__, 'my_activation_function' );

///***!!!

 $widgets = array(
    'middle-sidebar' => array(
        'widget_name'
    ),
    'right-sidebar' => array(
        'widget2_name-1'
    )
);
update_option( 'sidebars_widgets', $widgets );

//   simple
$active_sidebars = get_option( 'sidebars_widgets' ); //get all sidebars and widgets
$widget_options = get_option( 'widget_name-1' );
$widget_options[1] = array( 'option1' => 'value', 'option2' => 'value2' );

if(isset($active_sidebars['sidebar-id']) && empty($active_sidebars['sidebar-id'])) { //check if sidebar exists and it is empty
    $active_sidebars['sidebar-id'] = array('widget_name-1'); //add a widget to sidebar
    update_option('widget_name-1', $widget_options); //update widget default options
    update_option('sidebars_widgets', $active_sidebars); //update sidebars
}
