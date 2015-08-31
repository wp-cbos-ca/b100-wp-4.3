<?php

defined( 'ABSPATH' ) || die();

function get_categories_data(){
     $items = array( 
        array( 'name' => 'Romance', 'slug' => 'romance', 'build' => 1 ),
        array( 'name' => 'Mystery', 'slug' => 'mystery', 'build' => 1 ),
        array( 'name' => 'Thriller', 'slug' => 'thriller', 'build' => 1 ),
        array( 'name' => 'Teens', 'slug' => 'teens', 'build' => 1 ),
        array( 'name' => 'Children', 'slug' => 'children', 'build' => 1 ),
     );
     return $items;
     
 }
 