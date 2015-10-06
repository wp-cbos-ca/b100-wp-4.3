<?php

defined( 'ABSPATH' ) || die();

function install_widgets() {
    require_once( dirname(__FILE__) . '/data.php' );
    $widgets = get_widget_data();
    delete_widgets();
    wpsi_add_widgets( $widgets, 'Twenty Twelve' );
}

function delete_widgets(){
    $sidebars = get_option( 'sidebars_widgets' );
    unset( $sidebars['sidebar-1'] );
    update_option( 'sidebars_widgets', $sidebars );
}

function wpsi_add_widgets( $widgets, $theme_name='' ) {
    $theme = get_current_theme();
        if ( $theme_name == get_current_theme() ) {
                $add_widgets = new WPSI_Add_Widgets;
                $add_widgets->add_widgets( $widgets );
    }
}

/**
* https://raw.githubusercontent.com/superinteractive/WordPress-Automagic-Widgets/master/example-usage.php
*/

class WPSI_Add_Widgets {
    
    protected $sidebar_options = array();
    
    protected $widgets = array();
    
    function add_widgets( $widgets ) {
        
        if( ! count( $widgets ) ) {
            
            return false;
            
        }
        
        $this -> sidebar_options = get_option( 'sidebars_widgets' );
        
        $this -> _count_widgets();
        
        foreach( $widgets as $widget ) {
            
            if ( $widget[ 'install' ] ){
                
                if ( ! $this-> _has_widget ( $widget )  ) {
                    
                    $this -> _add_widget( $widget );
                    
                }
            }
        }
        
        $this -> _save();
    }
    
    function _has_widget( $widget ) {
        
        $sidebar_slug = $widget[ 'sidebar' ];
        
        $sidebar = $this -> sidebar_options[ $sidebar_slug ];
        
        $found = false;
        
        if ( ! empty ( $sidebar ) ) foreach ( $sidebar as $item ) {    
            
            if ( strpos( $item, $widget[ 'slug' ] ) !== FALSE ) {
                $found = true;
                break;
            }
        }
        
        return $found;
    }
    
    function _add_widget( $widget ) {
        
        $sidebar = $this -> sidebar_options[ $widget[ 'sidebar' ] ];
        
        $count = $this -> widgets[ $widget[ 'slug' ] ] + 1;
        
        $sidebar[] =  $widget[ 'slug' ]; //$widget[ 'slug' ] . '-' . $count; //$widget[ 'slug' ];
        
        $this -> sidebar_options[ $widget[ 'sidebar' ] ] = $sidebar;
        
        $widget_contents = get_option( 'widget_' . $widget[ 'slug' ], array() );
        
        $widget_contents[ $count ] = $widget[ 'args' ];
        
        $this -> widgets[ $widget[ 'slug' ] ] = $widget[ 'args' ]; 
        
     }
     
    function _count_widgets() {
         
         if( $this -> sidebar_options ) {
             
             $exclude = array( 'wp_inactive_widgets', 'array_version' );
             
             foreach( $this -> sidebar_options as $sidebar_id => $sidebar_widgets ) {
                 
                 if( ! in_array( $sidebar_id, $exclude ) ) {
                     
                     if ( ! empty ( $sidebar_widgets ) ) foreach( $sidebar_widgets as $widget ) {
                         
                         list( $name, $count ) = preg_split( '/-+(?=\S+$)/', $widget );
                         
                         if( ! isset( $this -> widgets[ $name ] ) || $count > $this -> widgets[ $name ] ) {
                             
                             $this -> widgets[ $name ] = $count;
                             
                         }
                     }
                 }
             }
         }
     }

     /**
     * 
     * Saves sidebar widget collection
     * then saves individual widgets as additional
     * option value
     * 
     */
     function _save() {
         
        update_option( 'sidebars_widgets', $this -> sidebar_options );
        
        if( count( $this -> widgets ) ) {
                
            foreach( $this -> widgets as $widget_id => $widget_contents ) {
                
                update_option( 'widget_' . $widget_id, $widget_contents );
                
            }    
        }
     }
     
     function _delete_widget( $widget ) {
         
     }

}
