<?php
//****************************************************************
//--------- Custom Categories list widget ------------------------
//****************************************************************

//---------------------------- functions.php or create new plugin --------------

class WC_Product_Cat_List_Walker extends Walker {

    function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $output .= '<li class="cat-item cat-item-' . $cat->term_id;

        if ( $args['current_category'] == $cat->term_id ) {
            $output .= ' current-cat';
        }

        if ( $args['has_children'] && $args['hierarchical'] && ( empty( $args['max_depth'] ) || $args['max_depth'] > $depth + 1 ) ) {
            $output .= ' cat-parent';
        }

        if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
            $output .= ' current-cat-parent';
        }
        //----- cat list widget image -------------
        $cat_thumb_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $src = wp_get_attachment_image_src($cat_thumb_id, 'thumbnail');
        $output .= '"><img src="' . $src[0] . '"><a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . _x( $cat->name, 'product category name', 'woocommerce' ) . '</a>';

        if ( $args['show_count'] ) {
            $output .= ' <span class="count">(' . $cat->count . ')</span>';
        }
    }


}
