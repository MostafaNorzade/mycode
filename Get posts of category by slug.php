<?php
$args = array(
    'taxonomy' => 'product_cat',
    'child_of' => 0,
    'order' => 'ASC',
    'hide_empty' => 1,
    'hierarchical' => 1,
    'pad_counts' => false
);
$categories = get_categories ( $args );

    foreach ($categories as $cat){
        $name = $cat->name;
        $slug = $cat->slug;
        ?>

        <div class="discount_other">
            <div class="title_block"><span><?php echo'آخرین محصولات '. $name; ?></span></div>

            <?php $args = array(
                "posts_per_page" => 4,
                "post_type" => "product",
                "tax_query" => array(
                array(
                    "taxonomy" => "product_cat",
                    "field"    => "slug",
        //            "terms"    => "training",
                    "terms"    => $slug,

                )
            ));
            $posts_array = get_posts( $args );
            foreach ($posts_array as $post) : setup_postdata( $post );
                get_template_part('partials/content-product-mini');
            endforeach;
            wp_reset_postdata();
            ?>

        </div>

<?php }
