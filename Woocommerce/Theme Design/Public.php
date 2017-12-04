<?php

// ----------------- Add Theme Suport ------------
add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {

    add_theme_support( 'woocommerce' );

}


//------------------ Search product ----------------
//------------------ Functions.php -----------------

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', array( 'post', 'product' ));
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');


//----------- Zoom , Slider , Lightbox ----------------
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


 //------------ Breadcrumb -----------
woocommerce_breadcrumb();


//------- Cart Page Link ---------
echo wc_get_cart_url();


//----------- My account page link ----------
echo get_permalink( get_option('woocommerce_myaccount_page_id') );


//------------------ Price -----------
woocommerce_template_loop_add_to_cart();


//----------- is in stock -----------
if ( $product->is_in_stock() ) { ?>

    echo 'در انبار موجود است';

<?php }else{ ?>

    echo 'موجود نیست';

<?php }


//-------------- Title -----------
the_title();
the_excerpt();
the_content();


//------------- add to cart button (in loop) -----------
woocommerce_template_loop_add_to_cart();


//---------------- Product thumbnail ---------
woocommerce_template_loop_product_thumbnail();


//---------- Gallery of product -------------------
do_action( 'woocommerce_product_thumbnails' );


//----------- product category ------------
the_terms($post->ID, 'product_cat' );



//-------------- Product attributes list ----------
$product->list_attributes();

//------------ product sku ---------
echo $product->get_sku();





































