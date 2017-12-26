<?php

//------------------------------ Refrence ---------
https://github.com/valendesigns/option-tree-theme

//===================================================================
//------------- Add below code to functions.php ---------------------
//------------- Documentation = https://www.sitepoint.com/optiontree-theme-options-ui-builder
//===================================================================



load_theme_textdomain( 'option-tree', get_template_directory() . '/option-tree/languages' );

add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'option-tree/theme-options.php' );
require( trailingslashit( get_template_directory() ) . 'option-tree/meta-boxes.php' );
function custom_internal_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/option-tree/ot-custom-style.css" />';
}
add_action('admin_head', 'custom_internal_css');
