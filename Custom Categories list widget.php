<?php
//****************************************************************
//--------- Custom Categories list widget ------------------------
//****************************************************************

//----- plugin/woocommerce/includes/class-product-cat-list-walker.php --------------
//--- jai gozari shavad . img tag custom ------

$cat_thumb_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
$src = wp_get_attachment_image_src($cat_thumb_id, 'thumbnail');
$output .= '"><img src="' . $src[0] . '">
  <a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . _x( $cat->name, 'product category name', 'woocommerce' ) . 
  '</a>';
