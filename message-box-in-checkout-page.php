<?php
//--------- Gift Message ---------------------

function cloudways_custom_checkout_fields($fields){
$fields['cloudways_extra_fields'] = array(
'cloudways_text_field' => array(
'type' => 'textarea',
'required'      => false,
'label' => __( 'اگر قصد ارسال پیام هدیه همراه با کالای خود را دارید ، پیام هدیه خود را وارد کنید :' )
    )
);
return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'cloudways_custom_checkout_fields' );



function cloudways_extra_checkout_fields(){

$checkout = WC()->checkout(); ?>

<div class="extra-fields">
    <h3><?php _e( 'پیام هدیه همراه با سفارش' ); ?></h3>
    <?php
    foreach ( $checkout->checkout_fields['cloudways_extra_fields'] as $key => $field ) : ?>
        <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
    <?php endforeach; ?>
</div>
<?php }
add_action( 'woocommerce_checkout_after_customer_details' ,'cloudways_extra_checkout_fields' );


//------------------- Save Field ----------------------------
function cloudways_save_extra_checkout_fields( $order_id, $posted ){
    // don't forget appropriate sanitization if you are using a different field type
    if( isset( $posted['cloudways_text_field'] ) ) {
        update_post_meta( $order_id, '_cloudways_text_field', sanitize_text_field( $posted['cloudways_text_field'] ) );
    }
    if( isset( $posted['cloudways_dropdown'] ) && in_array( $posted['cloudways_dropdown'], array( 'first', 'second', 'third' ) ) ) {
        update_post_meta( $order_id, '_cloudways_dropdown', $posted['cloudways_dropdown'] );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'cloudways_save_extra_checkout_fields', 10, 2 );


// ----------------------- Final Order Page (namayesh dar faktor) -----------------
function cloudways_display_order_data( $order_id ){  ?>
    <h4><?php _e( 'اطلاعات مربوط به پیام هدیه' ); ?></h4>
    <table class="shop_table shop_table_responsive additional_info">
        <tbody>
        <tr>
            <th style="width: 117px;"><?php _e( 'پیام هدیه شما :' ); ?></th>
            <td><?php echo get_post_meta( $order_id, '_cloudways_text_field', true ); ?></td>
        </tr>

        </tbody>
    </table>
<?php }
add_action( 'woocommerce_thankyou', 'cloudways_display_order_data', 20 );
add_action( 'woocommerce_view_order', 'cloudways_display_order_data', 20 );


//-------------- Woocommerce product admin page -------
function cloudways_display_order_data_in_admin( $order ){  ?>
    <div class="order_data_column">

        <h4><?php _e( 'اطلاعات تکمیلی', 'woocommerce' ); ?><a href="#" class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a></h4>
        <div class="address">
            <?php
            echo '<p style="width: 257px;border: 1px solid;border-radius: 3px;"><strong>' . __( 'پیام هدیه کاربر ' ) . ':</strong>' . get_post_meta( $order->id, '_cloudways_text_field', true ) . '</p>';?>
        </div>
        <div class="edit_address">
            <?php woocommerce_wp_text_input( array( 'id' => '_cloudways_text_field', 'label' => __( 'Some field' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
        </div>
    </div>
<?php }
add_action( 'woocommerce_admin_order_data_after_order_details', 'cloudways_display_order_data_in_admin' );


function cloudways_save_extra_details( $post_id, $post ){
    update_post_meta( $post_id, '_cloudways_text_field', wc_clean( $_POST[ '_cloudways_text_field' ] ) );
}
add_action( 'woocommerce_process_shop_order_meta', 'cloudways_save_extra_details', 45, 2 );
