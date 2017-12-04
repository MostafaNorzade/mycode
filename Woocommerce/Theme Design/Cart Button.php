<?php
//check mikone age woo nasb nabod , cart not display
if ( class_exists( 'WooCommerce' ) ) { ?>

    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d محصول', '%d محصول', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>

<?php } ?>


<?php
//------------ OR --------------------
?>


<div class="box-carts">
<?php if ( WC()->cart->get_cart_contents_count() == 0 ): ?>
    <span>سبد خرید خالی است</span>

<?php else: ?>
    <span><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> محصول در سبد خرید</span>

<?php endif; ?>
<a href="<?php echo wc_get_cart_url(); ?>">مشاهده سبد خرید</a>
</div>
</div>