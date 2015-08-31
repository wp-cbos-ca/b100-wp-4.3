<?php

defined( 'ABSPATH' ) || die();

function get_timezone() {
     //the first timezone with 'selected' => 1 is chosen. America/Toronto is the default.
     $timezone = array (
            0 => array ( 'name' => 'America/Toronto', 'selected' =>  1 ),
            1 => array ( 'name' => 'America/Vancouver', 'selected' =>  0 ),
            2 => array ( 'name' => 'America/New_York', 'selected' =>  0 ),
            3 => array ( 'name' => 'America/Chicago', 'selected' =>  0 ),
            4 => array ( 'name' => 'America/Denver', 'selected' =>  0 ),
            5 => array ( 'name' => 'America/Los_Angeles', 'selected' =>  0 )
            );
     return $timezone;
} 
