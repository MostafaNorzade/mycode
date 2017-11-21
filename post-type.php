<?php

    function my_custom_post_product() {
    $labels = array(
    'name'               => __( 'محصولات'),
    'singular_name'      => __( 'محصول' ),
    'add_new'            => __( 'افزودن جدید'),
    'add_new_item'       => __( 'افزودن محصول جدید' ),
    'edit_item'          => __( 'ویرایش محصول' ),
    'new_item'           => __( 'محصول جدید' ),
    'all_items'          => __( 'همه محصولات' ),
    'view_item'          => __( 'نمایش محصول' ),
    'search_items'       => __( 'جست و جو محصول' ),
    'not_found'          => __( 'محصولی یافت نشد' ),
    'not_found_in_trash' => __( 'محصولی در زباله دان یافت نشد' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'محصولات'
    );
    $args = array(
    'labels'        => $labels,
    'description'   => 'ذخیره اطلاعات مربوط به محصولات',
    'public'        => true,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    );

    register_taxonomy( 'product_category', 'product', $args );//add category
    register_post_type( 'product', $args );
    }
    add_action( 'init', 'my_custom_post_product' );



//===================================================
//------------ Display Post Type --------------------
//===================================================

$args = array( 'post_type' =>'product','posts_per_page'=>10);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
    echo '<div style="padding:0 15%;"><h2>';
    the_title();
    echo '</h2></div>';
endwhile;
wp_reset_query();