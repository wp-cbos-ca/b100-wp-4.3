<?php
  
defined( 'ABSPATH' ) || die();

function get_template_data(){
    $items = array(
        'title' => 'Run Installer',
        'desc' => 'See plugin file for detail settings.',
        'button_text' => 'Run Installer',
        'help' => get_help_data(),
    );
    return $items;
}

function get_help_data(){
    $str = '<div style="font-size: 80% !important;">' . PHP_EOL;
    $str .= '<p>This installer is broken into three parts: site, settings and content. ';
    $str .= 'The site section cleans out pre-installed default content, and adds a stock set of menus and pages. ';
    $str .= 'It also has the capability to add users, (widgets, although this api is not yet that well developed), activate the chosen theme, ';
    $str .= 'and activate the selected plugins.</p>';
    $str .= '<p>The settings section works through the settings as they appear in the Settings menu and simply starts at the top and ends at the bottom. ';
    $str .= 'This includes General, Writing, Reading, Discussion, Media and Permalinks. The timezone is separated out as this is easy to overlook. ';
    $str .= 'The content section has the capability to add posts (with pre-defined titles, slugs, guids and post content), a post block with a user defined ';
    $str .= 'number of posts and title prefix as well as one custom post type and post type block (same as for the posts block).</p>';
    $str .= '<p>In addition, categories and tags can be created, and categories and tags can be randomly assigned to posts to create a realistic looking scenario for development. ';
    $str .= 'It also has the capability to assign a selected featured image to posts.</p>';
    $str .= '<p>This idea, along with the WordPress bundle it is currently included with ';
    $str .= 'has been over a year in the making. If you like, you can head over to GitHub to <a href="https://github.com/wp-cbos-ca/">look me up</a> and ';
    $str .= 'and follow and/or contribute to it&apos;s development, or purchase a copy of the WordPress bundle it ';
    $str .= 'is packaged with at <a href="http://wp.cbos.ca">wp.cbos.ca</a> to aid with development.</a>';
    $str .= '<p>Each component can be controlled individually with dip switch like settings so you have the choice whether or not to ';
    $str .= 'load and run each of the site, settings and content sections as well as whether or not to run, activate or configure each ';
    $str .= 'individual component.</p>' . PHP_EOL;
    $str .= '<p>These dip switch like settings are currently found in the code itself in the files labelled data.php. ';
    $str .= 'Thus to work with this plugin at this point you will need to make use of a freely available editor such as Notepad++ or better ';
    $str .= 'and a freely available (s)ftp program such as Filezilla or alternate.</p>';
    $str .= '<p>It follows a "holographic" style of programming which is fairly easy to work with and understand ';
    $str .= 'as each successive layer (whether drilling down deeper or zoning out to an upper layer) is simply a repeat of the same pattern seen at each of the other layers.</p>' . PHP_EOL;
    $str .= '<p>Thanks for stopping by, and hope you have a wonderful day.' . PHP_EOL;
    $str .= '</div>' . PHP_EOL;
    return $str;
}
