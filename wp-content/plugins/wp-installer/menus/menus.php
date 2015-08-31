<?php

defined( 'ABSPATH' ) || die();

add_action( 'install_site_data', 'install_menus' );

function install_menus() {
    require_once dirname( __FILE__) . '/data.php';
    $menus = get_menu_data();
    if ( ! empty ( $menus ) ) foreach ( $menus as $menu ) {
        if ( $menu['build'] ) {
            if ( $exists = wp_get_nav_menu_object( $menu['name'] ) ) {
                $menu_id = $exists -> term_id;
                  if ( empty ( $menu_id ) ) {
                    $menu_id = wp_create_nav_menu( $menu['name'] );
                } 
            }
            else {
                $menu_id = wp_create_nav_menu( $menu['name'] );
            }
            add_items_to_menu( $menu_id, $menu['slug'], $menu['items'] );
        }
    }
    assign_menus();
}

function add_items_to_menu( $menu_id, $slug, $items ) {
    if ( $items ) foreach ( $items as $item ) {
        if ( $item['build'] ) {
            if ( ! menu_item_exists( $item, $menu_id ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array (
                    'menu-item-title' =>  __( $item['title'] ),
                    'menu-item-classes' => '',
                    'menu-item-url' => home_url( $item['slug'] ), 
                    'menu-item-status' => 'publish'
                    ) );
            }
        }
    }
}

function menu_item_exists( $item, $menu_id ) {
    $args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false ); 
    
    $existing = wp_get_nav_menu_items( $menu_id, $args );
    $found = false;
    foreach ( $existing as $exists ) {
        if( strpos( $exists->post_name, $item['slug'] ) !== FALSE  ) {  //pretty good search (not exact).
            $found = true;
            break;
        }
     
    }
    return $found;
}

//Set the primary menu to Main Menu
function assign_menus() {
    $menus = array ( 
        0 => array ( 
            'name' => 'Main Menu' , 
            'location' => 'primary' ,
            'assign' => 1 ,
        ),
        1 => array ( 
            'name' => 'Secondary Menu' , 
            'location' => 'secondary' ,
            'assign' => 0 ,
        ),
        2 => array ( 
            'name' => 'Footer Menu' , 
            'location' => 'footer' ,
            'assign' => 1 ,
        )
    );
    if ( $menus ) foreach ( $menus as $menu ) {
        if ( $menu_exists = wp_get_nav_menu_object( $menu['name'] ) ) {
            $locations = get_theme_mod( 'nav_menu_locations' );
            if ( ! empty ( $locations[ $menu['location'] ] ) ) {
                $locations[ $menu['location'] ] = $menu_exists->term_id; 
            }
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
