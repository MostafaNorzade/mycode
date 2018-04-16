<?php
//***********************************************************************
// ----https://wordpress.org/plugins/show-random-products/
//***********************************************************************
?>


<div class="discount_other">
    <div class="title_block"><span><?php echo opt('index_other_discounts'); ?></span></div>

    <?php
    $args = array(
        'posts_per_page'   => 4,
        'orderby'          => 'rand',
        'post_type'        => 'product' ); 

    $random_products = get_posts( $args );
        
        foreach ( $random_products as $post ) : setup_postdata( $post );
            get_template_part('partials/content-product-mini');
        endforeach; 
        wp_reset_postdata();  
    ?>
    
</div>
