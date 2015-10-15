<?php

defined( 'ABSPATH' ) || die();

function get_plugins_data() {
    $plugins = array (
        array ( 
        'name' => 'BackUpWordPress', 'folder' => 'backupwordpress', 'file' => 'backupwordpress.php', 
        'activate' => 1, 'local' => 1, 'online' => 1, 
        ),
        array ( 
        'name' => 'WP Optimization', 'folder' => 'wp-optimization', 'file' => 'plugin.php', 
        'activate' => 1, 'local' => 1, 'online' => 1,
        ),
        array ( 
        'name' => 'WP Maintain', 'folder' => 'wp-maintain', 'file' => 'plugin.php', 
        'activate' => 1, 'local' => 1, 'online' => 1, 
        ),
        array ( 
        'name' => 'WP Ice Age', 'folder' => 'wp-ice-age', 'file' => 'plugin.php',
        'activate' => 1, 'local' => 1, 'online' => 1,
        ),    
        array ( 
        'name' => 'WP Super Cache', 'folder' => 'wp-super-cache', 'file' => 'wp-cache.php',
        'activate' => 1, 'local' => 1, 'online' => 1, 'configure' => 1, 'settings' => array (
            array ( 'option_name' => 'gzipcompression', 'option_value' => 1, 'set' => 1 ),
            ),
        ),
        array ( 
        'name' => 'Sucuri Scanner', 'folder' => 'sucuri-scanner', 'file' => 'sucuri.php', 
        'activate' => 1, 'local' => 0, 'online' => 1, 'configure' => 1, 'settings' => array (
            array ( 'option_name' => 'sucuriscan_dns_lookups', 'option_value' => 'disabled', 'set' => 1 ),
            ),
        ),
        array ( 
        'name' => 'Restrained Analytics', 'folder' => 'restrained-analytics', 'file' => 'plugin.php', 
        'activate' => 1, 'local' => 1, 'online' => 1,         
        ),
        array ( 
        'name' => 'Autoptimize', 'folder' => 'autoptimize', 'file' => 'autoptimize.php', 
        'activate' => 1, 'local' => 1, 'online' => 1, 'configure' => 1, 'settings' => array (
            array ( 'option_name' => 'autoptimize_html',               'option_value' => 'on',  'set' => 1 ),
            array ( 'option_name' => 'autoptimize_html_keepcomments',  'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_js',                 'option_value' => 'on',  'set' => 1 ),
            array ( 'option_name' => 'autoptimize_js_exclude',         
            'option_value' => 's_sid,smowtion_size,sc_project,WAU_,wau_add,comment-form-quicktags,edToolbar,ch_client,seal.js', 'set' => 1 ),
            array ( 'option_name' => 'autoptimize_js_trycatch',        'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_js_justhead',        'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_js_forcehead',       'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css',                'option_value' => 'on',  'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_exclude',        
            'option_value' => 'admin-bar.min.css,dashicons.min.css,fonts.googleapis.com', 'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_justhead',       'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_datauris',       'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_defer',          'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_defer_inline',   'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_css_inline',         'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_cdn_url',            'option_value' => '',    'set' => 1 ),
            array ( 'option_name' => 'autoptimize_cache_clean',        'option_value' => '0',   'set' => 1 ),
            array ( 'option_name' => 'autoptimize_cache_nogzip',       'option_value' => 'on',  'set' => 1 ),
            array ( 'option_name' => 'autoptimize_show_adv',           'option_value' => '1',   'set' => 1 ),
            ),
        ),
    ); 
    return $plugins;
}
