<?php

function add_my_css_and_my_js_files() {
    wp_register_script( 'ggl', get_template_directory_uri( ) . '/js/custom_google_map.js' , array( 'jquery' ) );
    wp_enqueue_script('ggl');

    wp_register_script( 'ggl_api', 'http://maps.google.com/maps/api/js?key=AIzaSyBtDbDJug28ZzgNzcUmX2DbF3-J3Dj4LS8&#038' , array( 'jquery' ) );
    wp_enqueue_script('ggl_api');
}
add_action( 'admin_enqueue_scripts', "add_my_css_and_my_js_files" );

function add_my_css_and_my_js_files_tempaltxe() {
    wp_register_script( 'ggl', get_template_directory_uri( ) . '/js/custom_google_map.js' , array( 'jquery' ) );
    wp_enqueue_script('ggl');
}
//add_action( 'wp_enqueue_scripts', "add_my_css_and_my_js_files_tempaltxe" );

function takhfif_get_custom_field($value)
{
    global $product;

    $custom_field = get_post_meta($product->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}

function takhfif_add_custom_meta_box() {
    add_meta_box(
        'takhfif-meta-box',
        __('لوکیشن محصول بر روی نقشه گوگل','textdomain'),
        'takhfif_meta_box_output',
        'product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'takhfif_add_custom_meta_box' );

function takhfif_meta_box_output(){
    wp_nonce_field( 'my_takhfif_meta_box_nonce', 'takhfif_meta_box_nonce' );
    echo 'لطفا طول و عرض جغرافیایی محصول خود را وارد کنید .'?>
    <input id="dokan-map-add" type="text" class="dokan-map-search ui-autocomplete-input valid" value="Seyyed Khandan, Abbas Abad, Tehran, Tehran Province, Iran" name="find_address" placeholder="آدرسی برای یافتن بنویسید" size="30" autocomplete="off">
    <div class="dokan-google-map" id="dokan-map"></div>
    <input id="dokan-map-lat" type="hidden" name="takhfif_location" value="<?php echo empty(get_post_meta(get_the_ID(), 'takhfif_location', true)) ? "35.7408503,51.4510554" : get_post_meta(get_the_ID(), 'takhfif_location', true); ?>" size="30" />
    <?php
}


function takhfif_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['takhfif_meta_box_nonce']) || !wp_verify_nonce($_POST['takhfif_meta_box_nonce'], 'my_takhfif_meta_box_nonce')) return;
    if (!current_user_can('edit_post')) return;
    if (isset($_POST['takhfif_location']))
        update_post_meta($post_id, 'takhfif_location', esc_attr($_POST['takhfif_location']));
}
add_action('save_post','takhfif_meta_box_save');
