<?php get_header(); ?>
    <!--wrapper-->
    <section id="wrapper">
    <div class="container">
        <div class="row">
            <?php if(have_posts()) { ?>
                    <?php while(have_posts()) : the_post(); ?>


                    <?php setPostViews(get_the_ID()); ?>
                    <?php get_template_part( 'partials/archive_product_breadcrumb'); ?>
					<?php wc_print_notices(); ?>
                    <?php
                        $post_author_id = get_post_field('post_author', $post->ID);
                        $seller_details = get_user_meta($post_author_id, 'dokan_profile_settings', true);
						//print_r($seller_details);
					?>


                    <!--title & discount & views-->
                    <div class="title_post">
                        <!--<span class="like"><i class="fa fa-eye"></i><?php // echo getPostViews(get_the_ID()); ?></span>-->
                        <h1><?php the_title(); ?></h1> | <h2><?php echo get_post_meta($post->ID,'_subtitle',true); ?></h2>
                        <span class="Discount"><b>%<?php echo get_post_meta($post->ID,'percentage',true); ?></b>تخفیف</span>
                    </div>

                    <!--block_gallery-->
                    <div class="block_gallery">
                        <!-- images -->
                        <div class="gallery_item">

                            <!--option-->
                            <div class="option_item_gallery">
							<?php if ($seller_areas = get_post_meta($post->ID, 'seller_area', true) ){ ?>
                                <span class="address"><i class="fa fa-map-marker"></i> <?php echo $seller_areas; ?> </span>
							<?php } ?>
									<span class="number-sale"><i class="fa fa-shopping-basket"></i><?php echo get_post_meta($post->ID,'total_sales',true); ?></span>
                            </div>

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                    <div class="item active">
                                        <div class="img_item">
                                            <a href="<?php the_permalink(); ?> " title="<?php the_title(); ?> "><img src="<?php
                                                if (has_post_thumbnail())
                                                {
                                                    $img_id = get_post_thumbnail_id($post->ID);
                                                    $src = wp_get_attachment_image_src($img_id, 'shop_single'); echo $src[0];
                                                }
                                                else if (ot_get_option('default_img'))
                                                {
                                                    $img_id = get_image_id(ot_get_option('default_img'));
                                                    $img_thumb = wp_get_attachment_image_src($img_id, 'shop_single');
                                                    echo $img_thumb[0];
                                                }
                                                ?>
                                                " title="<?php the_title(); ?> " alt="<?php the_title(); ?> "></a>
                                        </div>
                                    </div>

                                    <?php
                                    $attachment_ids = $product->get_gallery_image_ids();
                                    $counter = 1;
                                    foreach ( $attachment_ids as $attachment_id )
                                    {
                                        $counter++;
                                        ?>

                                        <div class="item">
                                            <div class="img_item">
                                                <a href="<?php the_permalink(); ?> " title="<?php the_title(); ?>"><img src="<?php $src = wp_get_attachment_image_src($attachment_id, 'large'); echo $src[0]; ?>" title="<?php the_title(); ?> " alt=""></a>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <?php for ($i=1 ; $i<$counter ; $i++ ) { ?>
                                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>

                        <!--details-->
                        <div class="content_item">
                            <div class="Slogan"><span><?php echo $seller_details['store_name']; ?></span></div>
                            <?php if ($custom_sale_price_dates_to = get_post_meta($post->ID, 'custom_sale_price_dates_to', true)){ ?>
							<div class="info-counter">
							
<?php
$display_type_timer_single = ot_get_option('farsi_or_latin', 'farsi');
if ($display_type_timer_single == 'farsi'){
?>
                <div class="timer_farsi_single">
				 <i class="fa fa-clock-o"></i><ul class="countdown_single_product"></ul>
                </div>
				<script>
				<?php
					$dates_to = @explode('-', $custom_sale_price_dates_to);
					$dates_to = jalali_to_gregorian($dates_to[0], $dates_to[1], $dates_to[2]);
					$sale_price_dates_to = $dates_to[0].'-'.$dates_to[1].'-'.$dates_to[2].' '.get_post_meta($post->ID, 'custom_sale_price_time_to', true).':00';
				?>
                    jQuery(function() {
                        var endDate = "<?php echo $sale_price_dates_to; ?>";
                        jQuery('.countdown_single_product').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span> <span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span> <span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span> <span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span> <span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>   
<?php } else { ?>				
							    <span class="info-timerLabel"><i class="fa fa-clock-o"></i>مهلت خرید</span>
								<div id="retroclockbox_sm1"></div>
                                <p><span>ثانیه</span> <span>دقیقه</span> <span>ساعت</span> <span>روز</span></p>
							<script src="<?php bloginfo('template_url'); ?>/js/jquery.flipcountdown.js"></script>
								<!-- Flip Count Down -->
								<script>
								<?php
									$dates_to = @explode('-', $custom_sale_price_dates_to);
									$dates_to = jalali_to_gregorian($dates_to[0], $dates_to[1], $dates_to[2]);
									$sale_price_dates_to = $dates_to[0].'-'.$dates_to[1].'-'.$dates_to[2].' '.get_post_meta($post->ID, 'custom_sale_price_time_to', true).':00';
								?>
									jQuery('#retroclockbox_sm1').flipcountdown({
										size:'sm' ,
										beforeDateTime:'<?php echo $sale_price_dates_to; ?>' ,
										showSecond:false
									});
							</script>
<?php } ?>							
							</div>

							<?php } ?>
							<span class="price price_slider price_slider_single">
							<?php if ($product->is_type('variable')) echo '<em>باز قیمتی با تخفیف</em>';  ?>
							<?php echo $product->get_price_html(); ?>
							</span>
							
                            <div class="share_gift_bye">
                                <div class="btn-group btn_social">
                                    <button type="button" class="btn btn-default link_share dropdown-toggle" data-toggle="dropdown"> اشتراک <i class="fa fa-share-alt"></i> </button>
                                    <ul class="dropdown-menu" id="shr_social">
                                        <ul class='list-inline' style="z-index: 9999">
                                            <li><a href="https://telegram.me/share/url?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" id=""><img src="<?php bloginfo('template_url'); ?>/images/social/telegram.png" alt="telegram"></a></li>
                                            <li><a href="https://www.instagram.com/<?php bloginfo('url'); ?>" id=""><img src="<?php bloginfo('template_url'); ?>/images/social/instagram.png" alt="instagram"></a></li>
                                            <li><a href="http://www.facebook.com/sharer.php?u=<?php  the_permalink(); ?>&t=<?php  the_title(); ?>" title="Facebook" id=""><img src="<?php bloginfo('template_url'); ?>/images/social/facebook.png" alt=""></a></li>
                                            <li><a title="twitter" href="http://twitter.com/share/?url=<?php  the_permalink(); ?>&text=<?php  the_title(); ?>" ID="twitter" target="_blank" class="twitter"><img src="<?php bloginfo('template_url'); ?>/images/social/twitter.png" alt=""></a></li>
                                            <li><a title="Google+" href="https://plus.google.com/share?url=<?php  the_permalink(); ?>&title=<?php  the_title(); ?>" ID="GoogleP" target="_blank" class="googleplus"><img src="<?php bloginfo('template_url'); ?>/images/social/google+.png" alt=""></a></li>
                                            <li><a title="Google Bookmark" href="http://www.google.com/bookmarks/mark?op=edit&bkmk=<?php  the_permalink(); ?>&title=<?php the_title();?>" ID="GoogleB" target="_blank" class="googlebookmark"><img src="<?php bloginfo('template_url'); ?>/images/social/dropbox.png" alt=""></a></li>
                                            <li><a title="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>" ID="linkedin" target="_blank" class="linkedin"><img src="<?php bloginfo('template_url'); ?>/images/social/linkedin.png" alt=""></a></li>
                                            <li><a title="Email" href="mailto:?subject=<?php the_title();?>&body= لطفا این لینک رو ببین: <?php the_permalink();?>" ID="Email" target="_blank" class="email"><img src="<?php bloginfo('template_url'); ?>/images/social/email.png" alt=""></a></li>
                                        </ul>
                                    </ul>
                                </div>
                                <a href="<?php echo dokan_get_store_url($post_author_id); ?>" class="link_gift">دیگرمحصولات<i class="fa fa-shopping-bag"></i></a>
                                <br><br>
                                <!-- <a href="" class="link_bye"><i class="fa fa-shopping-cart"></i>همین حالا خرید کنید</a> -->
                                <div style="padding-bottom: 81px"><?php woocommerce_template_single_add_to_cart(); ?></div>
                            </div>
                        </div>

                    </div>

<div class="post-content">		

	<?php $layout_single = ot_get_option('layout_single', 
			array( 
				array('name_box' => 'the_excerpt'),
				array('name_box' => 'terms-of-use'),
				array('name_box' => 'the_content'),
				array('name_box' => 'google-map'),
				array('name_box' => 'related-product'),
				array('name_box' => 'comments-product')
			)
		); ?>
	
	<?php 
	foreach ( $layout_single as $layout ){
		get_template_part( 'single-product/'.$layout['name_box'] );
		echo '<div class="clear"></div>';
	} 
	 ?>



</div>
                    <?php endwhile;  ?>
                    <?php }  ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>