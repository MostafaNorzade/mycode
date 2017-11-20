<?php

function my_admin_scripts() {
wp_enqueue_style( 'my_admin', get_template_directory_uri() . '/my_admin.css' );
}
add_action( 'admin_enqueue_scripts', 'my_admin_scripts' );