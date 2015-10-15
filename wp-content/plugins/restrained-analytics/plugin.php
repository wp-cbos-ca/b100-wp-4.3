<?php
/*
Plugin Name: Restrained Analytics
Plugin URI: http://wp.cbos.ca/plugins/?plugin=restrained-analtyics&view=summary
Description:  Uses a timer to fire analytics script only after page has loaded for more than five seconds. This helps eliminate drag on your website, improves performance and helps ensure that the visitors that are tracked are those of better quality.
Version: 1.0.0.
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
*/  

defined( 'ABSPATH') || die();

// EDITABLE 
define( 'RESTRAINED_ANALTYICS_DELAY', 5000 ); //milliseconds

function the_analytics_script() {?>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53214119-1', 'auto');
  ga('send', 'pageview');
<?php 
}

// NON EDITABLE 
function load_restrained_analytics() {
    if ( ! current_user_can( 'manage_options' ) ) {
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
