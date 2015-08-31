<?php

defined( 'ABSPATH' ) || die();

function get_plugins_data() {
    $plugins = array ( 
            array ( 
                'name' => 'WP Super Cache', 'folder' => 'wp-super-cache', 'configure' => 0, 
                'items' => array (
                        array ( 'name' => 'autoptimize_html', 'value' => 'on', 'set' => 0 ),
                        )
                ),
            array ( 
                'name' => 'Autoptimize', 'folder' => 'autoptimize', 'configure' => 1, 
                'items' => array (
                        array ( 'name' => 'autoptimize_html',               'value' => 'on',  'set' => 1 ),
                        array ( 'name' => 'autoptimize_html_keepcomments',  'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_js',                 'value' => 'on',  'set' => 1 ),
                        array ( 'name' => 'autoptimize_js_exclude',         'value' => 's_sid,smowtion_size,sc_project,WAU_,wau_add,comment-form-quicktags,edToolbar,ch_client,seal.js', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_js_trycatch',        'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_js_justhead',        'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_js_forcehead',          'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css',                'value' => 'on', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_exclude',        'value' => 'admin-bar.min.css, dashicons.min.css,fonts.googleapis.com', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_justhead',       'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_datauris',      'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_defer',          'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_defer_inline',   'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_css_inline',         'value' => 'off', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_cdn_url',            'value' => '', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_cache_clean',        'value' => '0', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_cache_nogzip',       'value' => 'on', 'set' => 1 ),
                        array ( 'name' => 'autoptimize_show_adv',           'value' => '1', 'set' => 1 ),
                        )
                ),
                array ( 
                'name' => 'Sucuri Scanner', 'folder' => 'sucuri-scanner', 'configure' => 0, 
                'items' => array (
                        array ( 'name' => 'autoptimize_html', 'value' => 'on', 'set' => 0 ),
                        )
                ),
            
        ); 
    return $plugins;
}
