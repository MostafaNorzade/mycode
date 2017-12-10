<div class="discount_other">
    <div class="title_block"><span><?php echo opt('index_other_discounts'); ?></span></div>

    <?php $args = array(
        "posts_per_page" => 4,
        "post_type" => "product",
        "tax_query" => array(
        array(
            "taxonomy" => "product_cat",
            "field"    => "slug",
            "terms"    => "training",
        )
    ));
    $posts_array = get_posts( $args );
    foreach ($posts_array as $post) : setup_postdata( $post );
        get_template_part('partials/content-product-mini');
    endforeach;
    wp_reset_postdata();
    ?>

</div>
