<?php
//Designed By market4.ir |!!.
global $data; ?>
<?php get_header(); ?>

<?php if($data['brokelink_show'] == 1){ ?>
    <div class="broke-black"></div>
    <div class="broke-box">
        <div class="content">
            <div class="broke-title">
                <div class="cir"><i class="fa fa-close fa-16px" id="broke-close"></i></div>
                گزارش خرابی لینک</div>
            <script>
                $(document).ready(function() {
                    $('#broksubmit').click(function() {
                        $('#broksuccess').html('لطفا صبر کنید...<style>#broksuccess{background-color:#f39c12;}</style>');
                        $.post("<?php bloginfo('template_directory'); ?>/include/sendmail-broklink.php", $("#broklinkform").serialize(), function(response) {
                            $('#broksuccess').html(response);
                        });
                        return false;
                    });
                });
            </script>
            <form id="broklinkform" action="" method="post">
                <table class="broklinktable">
                    <tr>
                        <td>
                            <input style="display:none;" value="<?php echo get_option( 'admin_email' ); ?>" id="aut-email" type="text" name="aut-email" />
                            <input id="name" type="text" name="name" placeholder="نام ..." /></td>
                    </tr>
                    <tr>
                        <td><input id="weblink" type="text" name="weblink" placeholder="لینک خراب ..."  /></td>
                    </tr>
                    <tr>
                        <td><input id="email" type="email" name="email" placeholder="ایمیل ..." /></td>
                    </tr>
                    <tr>
                        <td><textarea id="message" name="message">توضیحات ...</textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="text-align:center;">
                                <input id="broksubmit" type="button" value="ارسال گزارش" name="submit" />
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="text-align:center;">
                    <div id="broksuccess">اطلاعات را وارد کنید .</div></div>
            </form>
        </div>
    </div>
<?php } ?>

<div id="main-content">


    <section id="mainbar"><h2 style="display:none;">ادامه مطلب</h2>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="article-more-post <?php if($data['posts_effect'] == 1){ echo 'wow fadeInUp'; } ?>" id="post-<?php the_ID(); ?>">
                    <?php setPostViews($id); ?>
                    <div class="right-side">
                        <div class="theiaStickySidebar">
                            <div class="thumb" data-image="<?php get_image_url(); ?>" alt="thumb" title="برای بزرگنمایی کلیک کنید">
                                <?php $value = get_post_meta( $post->ID, 'filetype_field', true );
                                if ( 'zip' == $value ) { ?>
                                    <div class="type purple">ZIP</div>
                                <?php } ?>
                                <?php if ( 'pdf' == $value ) { ?>
                                    <div class="type red">PDF</div>
                                <?php } ?>
                                <?php if ( 'doc' == $value ) { ?>
                                    <div class="type blue">DOC</div>
                                <?php } ?>
                                <?php if ( 'ppt' == $value ) { ?>
                                    <div class="type yellow">PPT</div>
                                <?php } ?>
                                <?php if ( 'xlsx' == $value ) { ?>
                                    <div class="type green">XLSX</div>
                                <?php } ?>
                                <?php if ( 'txt' == $value ) { ?>
                                    <div class="type gray">TXT</div>
                                <?php } ?>
                                <?php if ( 'jpg' == $value ) { ?>
                                    <div class="type yellow">JPG</div>
                                <?php } ?>
                                <?php if ( 'mp3' == $value ) { ?>
                                    <div class="type green">MP3</div>
                                <?php } ?>
                                <?php if ( 'wav' == $value ) { ?>
                                    <div class="type red">WAV</div>
                                <?php } ?>
                                <?php if ( 'mp4' == $value ) { ?>
                                    <div class="type blue">MP4</div>
                                <?php } ?>
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=200&amp;w=200&amp;zc=1" width="200" height="200" alt="<?php the_title(); ?>" />
                                <?php }else{ ?>
                                    <img src="<?php echo $data['media_upload_noimg200']; ?>" alt="<?php the_title(); ?>" width="200" height="200" />
                                <?php } ?>
                            </div>
                            <div class="content">
                                <?php if( function_exists("df_star_ratings") ) : ?>
                                    <div class="rating">
                                    <?php echo df_star_ratings($pid); ?>
                                    </div><?php endif; ?>
                                <div class="item gray"><i class="fa fa-puzzle-piece fa-16px"></i><?php echo $value; if ( '' == $value ) { echo 'zip'; } ?></div>

                                <div class="item blue"><i class="fa fa-calendar fa-16px"></i><?php the_date(); ?></div>

                                <?php $mid_var = get_post_meta($post->ID, 'productsize_field',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item red"><i class="fa fa-arrows fa-16px"></i><?php $dl_size = get_post_meta( $post->ID, 'productsize_field', true ); echo $dl_size; ?></div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'own_text1',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item <?php $value = get_post_meta( $post->ID, 'own_color1', true );
                                    if ( 'blue' == $value || '' == $value ) { echo 'blue'; } else { echo $value; }?>"><i class="fa fa-circle fa-16px"></i>
                                        <?php $mid_var = get_post_meta($post->ID, 'own_link1',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                            <a href="<?php echo get_post_meta ($post->ID, 'own_link1',ture); ?>"><?php echo get_post_meta ($post->ID, 'own_text1',ture); ?></a>
                                        <?php } else { echo get_post_meta ($post->ID, 'own_text1',ture); } ?>
                                    </div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'own_text2',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item <?php $value = get_post_meta( $post->ID, 'own_color2', true );
                                    if ( 'blue' == $value || '' == $value ) { echo 'blue'; } else { echo $value; }?>"><i class="fa fa-circle fa-16px"></i>
                                        <?php $mid_var = get_post_meta($post->ID, 'own_link2',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                            <a href="<?php echo get_post_meta ($post->ID, 'own_link2',ture); ?>"><?php echo get_post_meta ($post->ID, 'own_text2',ture); ?></a>
                                        <?php } else { echo get_post_meta ($post->ID, 'own_text2',ture); } ?>
                                    </div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'own_text3',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item <?php $value = get_post_meta( $post->ID, 'own_color3', true );
                                    if ( 'blue' == $value || '' == $value ) { echo 'blue'; } else { echo $value; }?>"><i class="fa fa-circle fa-16px"></i>
                                        <?php $mid_var = get_post_meta($post->ID, 'own_link3',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                            <a href="<?php echo get_post_meta ($post->ID, 'own_link3',ture); ?>"><?php echo get_post_meta ($post->ID, 'own_text3',ture); ?></a>
                                        <?php } else { echo get_post_meta ($post->ID, 'own_text3',ture); } ?>
                                    </div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'own_text4',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item <?php $value = get_post_meta( $post->ID, 'own_color4', true );
                                    if ( 'blue' == $value || '' == $value ) { echo 'blue'; } else { echo $value; }?>"><i class="fa fa-circle fa-16px"></i>
                                        <?php $mid_var = get_post_meta($post->ID, 'own_link4',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                            <a href="<?php echo get_post_meta ($post->ID, 'own_link4',ture); ?>"><?php echo get_post_meta ($post->ID, 'own_text4',ture); ?></a>
                                        <?php } else { echo get_post_meta ($post->ID, 'own_text4',ture); } ?>
                                    </div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'own_text5',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item <?php $value = get_post_meta( $post->ID, 'own_color5', true );
                                    if ( 'blue' == $value || '' == $value ) { echo 'blue'; } else { echo $value; }?>"><i class="fa fa-circle fa-16px"></i>
                                        <?php $mid_var = get_post_meta($post->ID, 'own_link5',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                            <a href="<?php echo get_post_meta ($post->ID, 'own_link5',ture); ?>"><?php echo get_post_meta ($post->ID, 'own_text5',ture); ?></a>
                                        <?php } else { echo get_post_meta ($post->ID, 'own_text5',ture); } ?>
                                    </div>
                                <?php } ?>

                                <?php $productid = (int)get_post_meta( $post->ID, 'productid_field', true ); if ( !empty($productid) ) { ?>
                                    <div class="item yellow"><i class="fa fa-database fa-16px"></i><?php edd_price($productid); ?></div>

                                    <?php if($data['cellcount_show'] == 1){ ?>
                                        <div class="item blue"><i class="fa fa-cloud-download fa-16px"></i>
                                            <?php
                                            $dl_query = new WP_Query('post_type=downloads&p='.$productid);
                                            $sellcount = get_post_meta( $productid, '_edd_download_sales', true );
                                            echo $sellcount; wp_reset_query(); ?> فروش
                                        </div>
                                    <?php } ?>

                                    <div class="item green"><i class="fa fa-shopping-cart fa-16px"></i><?php echo do_shortcode('[purchase_link id="'.$productid.'" style="text link" color="" text="خرید"]'); ?></div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'prev_link',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item green"><i class="fa fa-download fa-16px"></i>
                                        <a href="<?php echo get_post_meta ($post->ID, 'prev_link',ture); ?>">دانلود پیش نمایش</a>
                                    </div>
                                <?php } ?>

                                <?php $mid_var = get_post_meta($post->ID, 'freedl_link',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                    <div class="item green"><i class="fa fa-download fa-16px"></i>
                                        <a href="<?php echo get_post_meta ($post->ID, 'freedl_link',ture); ?>">دانلود رایگان</a>
                                    </div>
                                <?php } ?>

                                <?php if($data['brokelink_show'] == 1){ ?>
                                    <div class="item purple" id="broken-link"><i class="fa fa-close fa-16px"></i>گزارش خرابی لینک</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="left-side">
                        <div class="content">
                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3><hr />
                            <?php the_content(); ?><br /><br />
                            <div class="tags-cats"><b><i class="fa fa-tasks fa-16px"></i> موضوعات : </b><hr />
                                <?php the_category(' , ') ?></div>
                            <?php the_tags( '<div class="tags-cats"><b><i class="fa fa-tag fa-16px"></i> برچسب‌ها : </b><hr />' , ' , ' , '</div>'); ?>
                            <div class="share-bottom">
                                <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>">
                                    <div class="icon share-blue">
                                        <i class="fa fa-paper-plane fa-16px"></i></div></a>
                                <a href="http://www.facebook.com/share.php?v=4&amp;src=bm&amp;u=<?php the_permalink(); ?>&amp;title=<?php echo sanitize_title_with_dashes( get_the_title() ) ?>">
                                    <div class="icon share-dblue">
                                        <i class="fa fa-facebook fa-16px"></i></div></a>
                                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                                    <div class="icon share-red">
                                        <i class="fa fa-google-plus fa-16px"></i></div></a>
                                <a href="http://twitter.com/home?status=<?php the_permalink(); ?>&amp;title=<?php echo sanitize_title_with_dashes( get_the_title() ) ?>">
                                    <div class="icon share-blue">
                                        <i class="fa fa-twitter fa-16px"></i></div></a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo sanitize_title_with_dashes( get_the_title() ) ?>">
                                    <div class="icon share-dblue">
                                        <i class="fa fa-linkedin fa-16px"></i></div></a>
                                <a href="https://www.xing.com/spi/shares/new?url=<?php the_permalink(); ?>">
                                    <div class="icon share-green">
                                        <i class="fa fa-xing fa-16px"></i></div></a>
                                <a href="<?php bloginfo('rss_url'); ?>">
                                    <div class="icon share-yellow">
                                        <i class="fa fa-rss fa-16px"></i></div></a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php $mid_var = get_post_meta($post->ID, 'screenshot1',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                <div class="relate-box ppx">
                    <div class="content ppx">
                        <h3>تصاویر پیش نمایش</h3><hr />
                        <div class="ppx">
                            <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot1',ture); ?>" alt="<?php the_title(); ?>-1">
                                <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot1',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                            </div>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot2',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot2',ture); ?>" alt="<?php the_title(); ?>-2">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot2',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot3',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot3',ture); ?>" alt="<?php the_title(); ?>-3">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot3',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot4',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot4',ture); ?>" alt="<?php the_title(); ?>-4">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot4',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot5',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot5',ture); ?>" alt="<?php the_title(); ?>-5">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot5',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot6',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot6',ture); ?>" alt="<?php the_title(); ?>-6">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot6',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                            <?php $mid_var = get_post_meta($post->ID, 'screenshot7',true); if(isset($mid_var) && !empty($mid_var)) { ?>
                                <div class="prevpics" data-image="<?php echo get_post_meta ($post->ID, 'screenshot7',ture); ?>" alt="<?php the_title(); ?>-7">
                                    <img title="برای بزرگنمایی کلیک کنید" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_post_meta ($post->ID, 'screenshot7',ture); ?>&amp;w=150&amp;zc=1" alt="<?php the_title(); ?>-1" width="150" />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($data['moreads_show'] == 1){ ?>
                <div class="relate-box">
                    <div class="content ads-content">
                        <?php echo $data['moreads_text']; ?>
                    </div>
                </div>
            <?php } ?>
            <?php if($data['aboutaut_show'] == 1){ ?>
                <div class="aut-block"><h3 style="display:none;">درباره نویسنده</h3>
                    <div class="content">
                        <div class="thumb">
                            <?php echo get_avatar( get_the_author_meta('user_email'), '50', '' ); ?>
                        </div>
                        <div class="title"><a href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a></div>
                        <p><?php the_author_meta('description'); ?></p>
                        <p><?php the_author(); ?> <?php the_author_posts(); ?> نوشته در <?php bloginfo('name'); ?> دارد .
                            مشاهده تمام نوشته های <?php the_author_posts_link(); ?> </p>
                    </div>
                </div>
            <?php } ?>
            <?php if($data['relpost_show'] == 1){ ?>
                <div class="relate-box">
                    <div class="content">
                        <h3>مطالب مرتبط</h3><hr />
                        <ul>
                            <?php
                            $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => $data['relpost_count'], 'post__not_in' => array($post->ID) ) );
                            if( $related ) foreach( $related as $post ) {
                                setup_postdata($post); ?>
                                <li>
                                    <?php $value = get_post_meta( $post->ID, 'filetype_field', true );
                                    if ( 'zip' == $value ) { ?>
                                        <span class="purple">ZIP</span>
                                    <?php } ?>
                                    <?php if ( 'pdf' == $value ) { ?>
                                        <span class="red">PDF</span>
                                    <?php } ?>
                                    <?php if ( 'doc' == $value ) { ?>
                                        <span class="blue">DOC</span>
                                    <?php } ?>
                                    <?php if ( 'ppt' == $value ) { ?>
                                        <span class="yellow">PPT</span>
                                    <?php } ?>
                                    <?php if ( 'xlsx' == $value ) { ?>
                                        <span class="green">XLSX</span>
                                    <?php } ?>
                                    <?php if ( 'txt' == $value ) { ?>
                                        <span class="gray">TXT</span>
                                    <?php } ?>
                                    <?php if ( 'jpg' == $value ) { ?>
                                        <span class="yellow">JPG</span>
                                    <?php } ?>
                                    <?php if ( 'mp3' == $value ) { ?>
                                        <span class="green">MP3</span>
                                    <?php } ?>
                                    <?php if ( 'wav' == $value ) { ?>
                                        <span class="red">WAV</span>
                                    <?php } ?>
                                    <?php if ( 'mp4' == $value ) { ?>
                                        <span class="blue">MP4</span>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php } wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <div class="comments-block">
                <div class="content">
                    <h3>دیدگاه ها</h3><hr />
                    <?php comments_template(); ?>
                </div>
            </div>
        <?php endif; ?>
    </section>


    <?php get_sidebar(); ?>


</div>



<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>