<?php
/*
Plugin Name:    Restrained Analytics
Plugin URI:     http://wp.cbos.ca/plugins/?plugin=restrained-analytics&view=summary
Description:    Restrains analytics with a five second delay to enhance performance. Add your code snippet and turn on in code editor.
Version:        1.0.0
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca
License:        GPLv2+
*/  

defined( 'ABSPATH') || die();

// EDITABLE 
define( 'RESTRAINED_ANALTYICS_DELAY', 5000 ); //milliseconds
define( 'RESTRAINED_ANALTYICS_BREAKER_ON', false ); // turn "ON" by setting to "true" (no quotes).

function the_analytics_script() {?>
  <!-- ADD YOUR ANALYTICS SCRIPT HERE -->
<?php 
}

// NON EDITABLE 
function load_restrained_analytics() {
    if ( RESTRAINED_ANALTYICS_BREAKER_ON && ! current_user_can( 'manage_options' ) ) {
        the_analytics_timer();
    }
}
add_action( 'wp_footer', 'load_restrained_analytics' );

function the_analytics_timer(){
    echo '<script>' . PHP_EOL;
    echo 'setTimeout(function(){ ';
    the_analytics_script();
    printf( '}, %s)', RESTRAINED_ANALTYICS_DELAY, PHP_EOL );
    echo '</script>' . PHP_EOL;
}
