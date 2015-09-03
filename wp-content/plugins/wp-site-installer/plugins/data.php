<?php

defined( 'ABSPATH' ) || die();

function get_plugins_data() {
    $plugins = array ( 
            array ( 
                'name' => 'WP Super Cache', 'folder' => 'wp-super-cache', 'file' => 'wp-cache.php', 'configure' => 0, 'activate' => 1, 
                'items' => array (
                        array ( 'option_name' => '', 'option_value' => '', 'set' => 0 ),
                        )
                ),
            array ( 
                'name' => 'Autoptimize', 'folder' => 'autoptimize', 'file' => 'autoptimize.php', 'configure' => 1, 'activate' => 1, 
                'items' => array (
                        array ( 'option_name' => 'autoptimize_html',               'option_value' => 'on',  'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_html_keepcomments',  'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_js',                 'option_value' => 'on',  'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_js_exclude',         'option_value' => 's_sid,smowtion_size,sc_project,WAU_,wau_add,comment-form-quicktags,edToolbar,ch_client,seal.js', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_js_trycatch',        'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_js_justhead',        'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_js_forcehead',       'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css',                'option_value' => 'on', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_exclude',        'option_value' => 'admin-bar.min.css, dashicons.min.css,fonts.googleapis.com', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_justhead',       'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_datauris',       'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_defer',          'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_defer_inline',   'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_css_inline',         'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_cdn_url',            'option_value' => '', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_cache_clean',        'option_value' => '0', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_cache_nogzip',       'option_value' => 'on', 'set' => 1 ),
                        array ( 'option_name' => 'autoptimize_show_adv',           'option_value' => '1', 'set' => 1 ),
                        )
                ),
                array ( 
                'name' => 'WP Optimization and Update Scheduling', 'folder' => 'wp-optimization', 'file' => 'plugin.php', 'configure' => 0, 'activate' => 1, 
                'items' => array (
                        array ( 'option_name' => '', 'option_value' => '', 'set' => 0 ),
                        )
                ),
                array ( 
                'name' => 'Sucuri Scanner', 'folder' => 'sucuri-scanner', 'file' => 'sucuri.php', 'configure' => 0, 'activate' => 0, 
                'items' => array (
                        array ( 'option_name' => '', 'option_value' => '', 'set' => 0 ),
                        )
                ),
                array ( 
                'name' => 'BackUpWordPress', 'folder' => 'backupwordpress', 'file' => 'backupwordpress.php', 'configure' => 0, 'activate' => 1, 
                'items' => array (
                        array ( 'option_name' => '', 'option_value' => '', 'set' => 0 ),
                        )
                ),
            
        ); 
    return $plugins;
}
