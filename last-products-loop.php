<?php

//============================================================
//--------------- Last Product Shortcode ---------------------
//============================================================


function my_last_product_post()
{
$args = array(
'orderby' => 'id',
'order' => 'desc',
'posts_per_page' => 9,
);
$loop = new WP_Query($args);
?>

<div class="container">
    <div class="row">
        <?php
        if ($loop->have_posts()):
            while ($loop->have_posts()): $loop->the_post(); ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img style="height: 250px;"
                                 src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>"
                                 alt="<?php echo get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true); ?>">
                            <div>
                                <a href="<?php the_permalink() ?>" class="btn">نمایش محصول</a>
                            </div>
                        </div>
                        <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>

                        <div style="padding-bottom: 8px;">
                            <i style="float: right;padding-left: 5px;" class="fa fa-truck"></i>
                            <p style="float: right;margin-bottom: 0;"><strong>نوع خودرو
                                    : </strong><?php echo get_post_meta(get_the_ID(), 'glass1_textfield', true); ?>
                            </p>
                        </div>
                        <br>
                        <div style="padding-bottom: 8px;">
                            <i style="float: right;padding-left: 5px;" class="fa fa-scissors"></i>
                            <p style="float: right;margin-bottom: 0;"><strong>ابعاد (سانتیمتر)
                                    : </strong><?php echo get_post_meta(get_the_ID(), 'glass2_textfield', true); ?>
                            </p>
                        </div>
                        <br>
                        <div style="padding-bottom: 8px;"><i style="float: right;padding-left: 5px;"
                                                             class="fa fa-tint"></i>
                            <p style="float: right;margin-bottom: 0;"><strong>جنس
                                    : </strong><?php echo get_post_meta(get_the_ID(), 'glass3_textfield', true); ?>
                            </p></div>
                        <br>
                        <div style="padding-bottom: 8px;"><i style="float: right;padding-left: 5px;"
                                                             class="fa fa-globe"></i>
                            <p style="float: right;margin-bottom: 0;"><strong>وزن
                                    : </strong><?php echo get_post_meta(get_the_ID(), 'glass4_textfield', true); ?>
                            </p></div>
                        <br>
                        <div style="padding-bottom: 25px;"><i style="float: right;padding-left: 5px;"
                                                              class="fa fa-eyedropper"></i>
                            <p style="float: right;margin-bottom: 0;"><strong>رنگ
                                    : </strong><?php echo get_post_meta(get_the_ID(), 'glass5_textfield', true); ?>
                            </p></div>
                        <br>
                        <div class="pi-price">تماس برای قیمت</div>
                        <a href="<?php the_permalink() ?>" class="btn add2cart">نمایش محصول</a>
                        <div class="sticker sticker-new"></div>
                    </div>
                </div>
            <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</div>
<?php
}

add_shortcode('my_last_product', 'my_last_product_post');
//----------------------------------------------------------------------------