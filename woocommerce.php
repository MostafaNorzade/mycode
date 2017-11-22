<?php

add_action( 'after_setup_theme','woocommerce_support' );
function woocommerce_support() {

    add_theme_support('woocommerce');

}


//Step 1: Create a new CSS file.
//Step 2: Name it as ‘cusotm-woocommerce.css.'
//Step 3: Save it in the directory wp–content/themes/<theme name>/css
//Step 4: Include this .css file into your theme in the foundation.php

function theme_name_woocommerce_scripts() {

wp_enqueue_style('custom-woocommerce-style' ,'get_template_directory_uri() . '/css);

}
add_action('wp_enqueue_scripts', 'theme_name_woocommerce_scripts');

//Step 5: You can now add your CSS to this file and it will override the default WooCommerce styles.


//------------------------------------------------------