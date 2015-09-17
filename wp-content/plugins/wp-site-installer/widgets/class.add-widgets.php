<?php
/**
 * Super Interactive Automagic Widgets
 *
 * Allows you to programmatically add widgets to specified sidebars in WordPress.
 * 
 * 
 * @author Bastiaan van Dreunen <bastiaan@superinteractive.com>
 * 
 * http://www.superinteractive.com
 * 
 */

class WP_Automatic_Widgets {
    
    protected $sidebar_options = array();
    protected $widgets = array();
    
    function add_widgets( $widgets ) {
        if( ! count( $widgets ) ) {
            return false;
        }
        $this->sidebar_options = get_option( 'sidebars_widgets', array() );
        $this->_count_widgets();
        foreach( $widgets as $widget ) {
            if ( $widget['install'] ){
                //should check if it is there already...
                $this->_add_widget( $widget );
            }
        }
        $this->_save();
    }
    
    function _add_widget( $widget ) {
        $sidebar_id = $widget['sidebar'];
        $widget_id = $widget['widget'];
        $widget_args = $widget['args'];
        $sidebar = $this->sidebar_options[$sidebar_id];
        $count = $this->widgets[$widget_id] + 1;
        $sidebar[] = "$widget_id-$count";
        $this->sidebar_options[$sidebar_id] = $sidebar;
        $widget_contents = get_option( "widget_$widget_id", array() );
        $widget_contents[$count] = $widget_args;
        $this->widgets[$widget_id] = $widget_contents;
     }
     
     function _count_widgets() {
         if( $this -> sidebar_options ) {
             $exclude = array( 'wp_inactive_widgets', 'array_version' );
             foreach( $this->sidebar_options as $sidebar_id => $sidebar_widgets ) {
                 if( ! in_array( $sidebar_id, $exclude ) ) {
                     foreach( $sidebar_widgets as $widget ) {
                         list( $name, $count ) = preg_split( '/-+(?=\S+$)/', $widget );
                         if( !isset( $this -> widgets[$name] ) || $count > $this -> widgets[$name] ) {
                             $this -> widgets[$name] = $count;
                         }
                     }
                 }
             }
         }
     }

     function _save() {
        update_option( 'sidebars_widgets', $this->sidebar_options );
        if( count( $this->widgets ) ) {
            foreach( $this->widgets as $widget_id => $widget_contents ) {
                update_option( "widget_$widget_id", $widget_contents );
            }    
        }
     }
}
  