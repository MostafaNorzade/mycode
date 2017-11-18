<?php
//==========================================================================
//------------------------------- MetaBox ----------------------------------
//==========================================================================


//--------metabox - meta box - meta box vanet - site sazan ----------------
function glass_get_custom_field($value)
{
    global $post;

    $custom_field=get_post_meta($post->ID,$value,true);
    if ( !empty( $custom_field ) )
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}

//---------------------------------------------
function glass_add_custom_meta_box() {
    add_meta_box(
        'glass-meta-box',
        __('ویژگی و مشخصات فنی محصول','textdomain'),
        'glass_meta_box_output',
        'post',
        'normal',
        'high'
    );
}

add_action( 'add_meta_boxes', 'glass_add_custom_meta_box' );

//------------------------------------------

function glass_meta_box_output($post){
    wp_nonce_field( 'my_glass_meta_box_nonce', 'glass_meta_box_nonce' );
    echo 'لطفا توضیحات مربوط به ویژگی محصول رو در این بخش وارد نمایید .'?>
    <p>
        <label for="glass1_textfield"><?php _e('نوع خودرو ', 'textdomain' ); ?>:</label>
        <input type="text" name="glass1_textfield" id="glass1_textfield" value="<?php echo glass_get_custom_field( 'glass1_textfield' ); ?>" size="50" />
    </p>
    <p>
        <label for="glass2_textfield"><?php _e('ابعاد ( سانتیمتر ) ', 'textdomain' ); ?>:</label>
        <input type="text" name="glass2_textfield" id="glass2_textfield" value="<?php echo glass_get_custom_field( 'glass2_textfield' ); ?>" size="50" />
    </p>
    <p>
        <label for="glass3_textfield"><?php _e('جنس ', 'textdomain' ); ?>:</label>
        <input type="text" name="glass3_textfield" id="glass3_textfield" value="<?php echo glass_get_custom_field( 'glass3_textfield' ); ?>" size="50" />
    </p>
    <p>
        <label for="glass4_textfield"><?php _e('وزن ', 'textdomain' ); ?>:</label>
        <input type="text" name="glass4_textfield" id="glass4_textfield" value="<?php echo glass_get_custom_field( 'glass4_textfield' ); ?>" size="50" />
    </p>
    <p>
        <label for="glass5_textfield"><?php _e('رنگ ', 'textdomain' ); ?>:</label>
        <input type="text" name="glass5_textfield" id="glass5_textfield" value="<?php echo glass_get_custom_field( 'glass5_textfield' ); ?>" size="50" />
    </p>
    <?php

}
//----------------------------------------------------
function glass_meta_box_save($post_id)
{
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if(!isset($_POST['glass_meta_box_nonce']) || !wp_verify_nonce($_POST['glass_meta_box_nonce'],'my_glass_meta_box_nonce')) return;
    if(!current_user_can('edit_post')) return;

    if(isset($_POST['glass1_textfield']))
        update_post_meta($post_id,'glass1_textfield',esc_attr($_POST['glass1_textfield']));
    if(isset($_POST['glass1_textarea']))
        update_post_meta( $post_id,'glass1_textarea', $_POST['glass1_textarea']);

    if(isset($_POST['glass2_textfield']))
        update_post_meta($post_id,'glass2_textfield',esc_attr($_POST['glass2_textfield']));
    if(isset($_POST['glass2_textarea']))
        update_post_meta( $post_id,'glass2_textarea', $_POST['glass2_textarea']);

    if(isset($_POST['glass3_textfield']))
        update_post_meta($post_id,'glass3_textfield',esc_attr($_POST['glass3_textfield']));
    if(isset($_POST['glass3_textarea']))
        update_post_meta( $post_id,'glass3_textarea', $_POST['glass3_textarea']);

    if(isset($_POST['glass4_textfield']))
        update_post_meta($post_id,'glass4_textfield',esc_attr($_POST['glass4_textfield']));
    if(isset($_POST['glass4_textarea']))
        update_post_meta( $post_id,'glass4_textarea', $_POST['glass4_textarea']);

    if(isset($_POST['glass5_textfield']))
        update_post_meta($post_id,'glass5_textfield',esc_attr($_POST['glass5_textfield']));
    if(isset($_POST['glass5_textarea']))
        update_post_meta( $post_id,'glass5_textarea', $_POST['glass5_textarea']);
}
add_action('save_post','glass_meta_box_save');
