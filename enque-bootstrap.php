<?php
//--------------------- Enqueue Bootstrap ----------------------------
function theme_styles()
{
wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'theme_styles');


function theme_js()
{
wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts', 'theme_js');
