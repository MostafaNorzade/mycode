<?php
function my_last_product_post()
{
?>
<ul>
<?php

global $post;
$args = array( 
    'posts_per_page' => 100,
    'orderby'          => 'name',
    'order'            => 'ASC',
    'category' => 138
    );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php echo get_post_meta(get_the_ID(), 'olka1_textfield', true); ?>"><?php the_title(); ?></a>
	</li>
<?php endforeach; 
wp_reset_postdata();?>

</ul>
<?php
}
add_shortcode('my_last_product', 'my_last_product_post');
