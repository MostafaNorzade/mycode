<?php
//Designed By Solo Design |!!.
/* Adds a meta box to the post edit screen */
add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
function myplugin_add_custom_box() {
    add_meta_box( 'metabox-product', 'اطلاعات محصول', 'custom_box_product', 'post', 'normal', 'high' );
    add_meta_box( 'metabox-prevpics', 'تصاویر پیش نمایش', 'cd_meta_box_prev', 'post', 'normal', 'high' );
}

function custom_box_product( $post ) {
    $values = get_post_custom($post->ID);
    $productid = $values["productid_field"][0];
    $filetype = $values["filetype_field"][0];
    $productsize = $values["productsize_field"][0];
    $prevlink = $values["prev_link"][0];
    $freedllink = $values["freedl_link"][0];
    $own_text1 = $values["own_text1"][0];
    $own_link1 = $values["own_link1"][0];
    $own_color1 = $values["own_color1"][0];

    $own_text2 = $values["own_text2"][0];
    $own_link2 = $values["own_link2"][0];
    $own_color2 = $values["own_color2"][0];

    $own_text3 = $values["own_text3"][0];
    $own_link3 = $values["own_link3"][0];
    $own_color3 = $values["own_color3"][0];

    $own_text4 = $values["own_text4"][0];
    $own_link4 = $values["own_link4"][0];
    $own_color4 = $values["own_color4"][0];

    $own_text5 = $values["own_text5"][0];
    $own_link5 = $values["own_link5"][0];
    $own_color5 = $values["own_color5"][0];


    $productsales = $values["productsales_field"][0];

    wp_nonce_field( 'product_nonce', 'product_meta_box_nonce' );

    ?>

    <b>فیلد های اجباری</b><hr />
    مقدار دهی به فیلد های زیر اجباری است .
    <p>
        <label for="productid_field" style="width:25%;font-weight:bold;float:right;">آیدی محصول این پست : </label>
        <input style="width:30%;" type="text" name="productid_field" id="productid_field" value="<?php echo $productid; ?>" />
    </p>
    <p> <label for="filetype_field" style="width:25%;font-weight:bold;float:right;">نوع فایل شامل برای دانلود : </label>
        <select style="width:30%;" name="filetype_field" id="filetype_field" class="postbox">
            <option value="" <?php if( $filetype == '' ) { ?>selected="selected"<?php } ?>>انتخاب نشده</option>
            <option value="zip" <?php if( $filetype == 'zip' ) { ?>selected="selected"<?php } ?>>ZIP</option>
            <option value="pdf" <?php if( $filetype == 'pdf' ) { ?>selected="selected"<?php } ?>>PDF</option>
            <option value="doc" <?php if( $filetype == 'doc' ) { ?>selected="selected"<?php } ?>>DOC</option>
            <option value="ppt" <?php if( $filetype == 'ppt' ) { ?>selected="selected"<?php } ?>>PPT</option>
            <option value="xlsx" <?php if( $filetype == 'xlsx' ) { ?>selected="selected"<?php } ?>>XLSX</option>
            <option value="txt" <?php if( $filetype == 'txt' ) { ?>selected="selected"<?php } ?>>TXT</option>
            <option value="jpg" <?php if( $filetype == 'jpg' ) { ?>selected="selected"<?php } ?>>JPG</option>
            <option value="mp3" <?php if( $filetype == 'mp3' ) { ?>selected="selected"<?php } ?>>MP3</option>
            <option value="wav" <?php if( $filetype == 'wav' ) { ?>selected="selected"<?php } ?>>WAV</option>
            <option value="mp4" <?php if( $filetype == 'mp4' ) { ?>selected="selected"<?php } ?>>MP4</option>
        </select></p>

    <b>فیلد های اختیاری</b><hr />
    مقدار دهی به فیلد های زیر اخیاری است و در صورت ندادن مقدار نمایش داده نمی شوند .
    <p>
        <label for="productsize_field" style="width:25%;font-weight:bold;float:right;">حجم فایل محصول : </label>
        <input style="width:70%;" type="text" name="productsize_field" id="productsize_field" value="<?php echo $productsize; ?>" />
    </p>

    <p>
        <label for="prev_link" style="width:25%;font-weight:bold;float:right;">لینک پیش نمایش : </label>
        <input style="width:70%;direction:ltr" type="text" name="prev_link" id="prev_link" value="<?php echo $prevlink; ?>" />
    </p>

    <p>
        <label for="freedl_link" style="width:25%;font-weight:bold;float:right;">لینک دانلود رایگان : </label>
        <input style="width:70%;direction:ltr" type="text" name="freedl_link" id="freedl_link" value="<?php echo $freedllink; ?>" />
    </p>
    <b>فیلد های اختصاصی</b><hr />
    این فیلد ها به صورت دلخواه قابل تنظیم هستند و بالای لینک خرید نمایش داده می شوند .
    اگر لینک خالی باشد بدون لینک نمایش داده می شود و اگر هر دو خالی باشد نمایش داده نمی شود .

    <p>
        <label for="own_text1" style="width:15%;font-weight:bold;float:right;">عنوان فیلد 1 : </label>
        <input style="width:80%;" type="text" name="own_text1" id="own_text1" value="<?php echo $own_text1; ?>" />
    </p>
    <p>
        <label for="own_link1" style="width:15%;font-weight:bold;float:right;">لینک فیلد 1 : </label>
        <input style="width:80%;direction:ltr;" type="text" name="own_link1" id="own_link1" value="<?php echo $own_link1; ?>" />
    </p>
    <p>
        <label for="own_color1" style="width:25%;font-weight:bold;float:right;">رنگ فیلد 1 : </label>
        <select style="width:30%;" name="own_color1" id="own_color1" class="postbox">
            <option value="blue" <?php if( $own_color1 == 'blue' || $own_color1 == '' ) { ?>selected="selected"<?php } ?>>آبی</option>
            <option value="purple" <?php if( $own_color1 == 'purple' ) { ?>selected="selected"<?php } ?>>بنفش</option>
            <option value="green" <?php if( $own_color1 == 'green' ) { ?>selected="selected"<?php } ?>>سبز</option>
            <option value="yellow" <?php if( $own_color1 == 'yellow' ) { ?>selected="selected"<?php } ?>>زرد</option>
            <option value="red" <?php if( $own_color1 == 'red' ) { ?>selected="selected"<?php } ?>>قرمز</option>
            <option value="gray" <?php if( $own_color1 == 'gray' ) { ?>selected="selected"<?php } ?>>خاکستری</option>
        </select>
    </p>

    <p>
        <label for="own_text2" style="width:15%;font-weight:bold;float:right;">عنوان فیلد 2 : </label>
        <input style="width:80%;" type="text" name="own_text2" id="own_text2" value="<?php echo $own_text2; ?>" />
    </p>
    <p>
        <label for="own_link2" style="width:15%;font-weight:bold;float:right;">لینک فیلد 2 : </label>
        <input style="width:80%;direction:ltr;" type="text" name="own_link2" id="own_link2" value="<?php echo $own_link2; ?>" />
    </p>
    <p>
        <label for="own_color2" style="width:25%;font-weight:bold;float:right;">رنگ فیلد 2 : </label>
        <select style="width:30%;" name="own_color2" id="own_color2" class="postbox">
            <option value="blue" <?php if( $own_color2 == 'blue' || $own_color2 == '' ) { ?>selected="selected"<?php } ?>>آبی</option>
            <option value="purple" <?php if( $own_color2 == 'purple' ) { ?>selected="selected"<?php } ?>>بنفش</option>
            <option value="green" <?php if( $own_color2 == 'green' ) { ?>selected="selected"<?php } ?>>سبز</option>
            <option value="yellow" <?php if( $own_color2 == 'yellow' ) { ?>selected="selected"<?php } ?>>زرد</option>
            <option value="red" <?php if( $own_color2 == 'red' ) { ?>selected="selected"<?php } ?>>قرمز</option>
            <option value="gray" <?php if( $own_color2 == 'gray' ) { ?>selected="selected"<?php } ?>>خاکستری</option>
        </select>
    </p>

    <p>
        <label for="own_text3" style="width:15%;font-weight:bold;float:right;">عنوان فیلد 3 : </label>
        <input style="width:80%;" type="text" name="own_text3" id="own_text3" value="<?php echo $own_text3; ?>" />
    </p>
    <p>
        <label for="own_link3" style="width:15%;font-weight:bold;float:right;">لینک فیلد 3 : </label>
        <input style="width:80%;direction:ltr;" type="text" name="own_link3" id="own_link3" value="<?php echo $own_link3; ?>" />
    </p>
    <p>
        <label for="own_color3" style="width:25%;font-weight:bold;float:right;">رنگ فیلد 3 : </label>
        <select style="width:30%;" name="own_color3" id="own_color3" class="postbox">
            <option value="blue" <?php if( $own_color3 == 'blue' || $own_color3 == '' ) { ?>selected="selected"<?php } ?>>آبی</option>
            <option value="purple" <?php if( $own_color3 == 'purple' ) { ?>selected="selected"<?php } ?>>بنفش</option>
            <option value="green" <?php if( $own_color3 == 'green' ) { ?>selected="selected"<?php } ?>>سبز</option>
            <option value="yellow" <?php if( $own_color3 == 'yellow' ) { ?>selected="selected"<?php } ?>>زرد</option>
            <option value="red" <?php if( $own_color3 == 'red' ) { ?>selected="selected"<?php } ?>>قرمز</option>
            <option value="gray" <?php if( $own_color3 == 'gray' ) { ?>selected="selected"<?php } ?>>خاکستری</option>
        </select>
    </p>

    <p>
        <label for="own_text4" style="width:15%;font-weight:bold;float:right;">عنوان فیلد 4 : </label>
        <input style="width:80%;" type="text" name="own_text4" id="own_text4" value="<?php echo $own_text4; ?>" />
    </p>
    <p>
        <label for="own_link4" style="width:15%;font-weight:bold;float:right;">لینک فیلد 4 : </label>
        <input style="width:80%;direction:ltr;" type="text" name="own_link4" id="own_link4" value="<?php echo $own_link4; ?>" />
    </p>
    <p>
        <label for="own_color4" style="width:25%;font-weight:bold;float:right;">رنگ فیلد 4 : </label>
        <select style="width:30%;" name="own_color4" id="own_color4" class="postbox">
            <option value="blue" <?php if( $own_color4 == 'blue' || $own_color4 == '' ) { ?>selected="selected"<?php } ?>>آبی</option>
            <option value="purple" <?php if( $own_color4 == 'purple' ) { ?>selected="selected"<?php } ?>>بنفش</option>
            <option value="green" <?php if( $own_color4 == 'green' ) { ?>selected="selected"<?php } ?>>سبز</option>
            <option value="yellow" <?php if( $own_color4 == 'yellow' ) { ?>selected="selected"<?php } ?>>زرد</option>
            <option value="red" <?php if( $own_color4 == 'red' ) { ?>selected="selected"<?php } ?>>قرمز</option>
            <option value="gray" <?php if( $own_color4 == 'gray' ) { ?>selected="selected"<?php } ?>>خاکستری</option>
        </select>
    </p>

    <p>
        <label for="own_text5" style="width:15%;font-weight:bold;float:right;">عنوان فیلد 5 : </label>
        <input style="width:80%;" type="text" name="own_text5" id="own_text5" value="<?php echo $own_text5; ?>" />
    </p>
    <p>
        <label for="own_link5" style="width:15%;font-weight:bold;float:right;">لینک فیلد 5 : </label>
        <input style="width:80%;direction:ltr;" type="text" name="own_link5" id="own_link5" value="<?php echo $own_link5; ?>" />
    </p>
    <p>
        <label for="own_color5" style="width:25%;font-weight:bold;float:right;">رنگ فیلد 5 : </label>
        <select style="width:30%;" name="own_color5" id="own_color5" class="postbox">
            <option value="blue" <?php if( $own_color5 == 'blue' || $own_color5 == '' ) { ?>selected="selected"<?php } ?>>آبی</option>
            <option value="purple" <?php if( $own_color5 == 'purple' ) { ?>selected="selected"<?php } ?>>بنفش</option>
            <option value="green" <?php if( $own_color5 == 'green' ) { ?>selected="selected"<?php } ?>>سبز</option>
            <option value="yellow" <?php if( $own_color5 == 'yellow' ) { ?>selected="selected"<?php } ?>>زرد</option>
            <option value="red" <?php if( $own_color5 == 'red' ) { ?>selected="selected"<?php } ?>>قرمز</option>
            <option value="gray" <?php if( $own_color5 == 'gray' ) { ?>selected="selected"<?php } ?>>خاکستری</option>
        </select>
    </p>
    <?php
}

function cd_meta_box_prev( $post )
{
    $values = get_post_custom( $post->ID );
    $screenshot1 = isset( $values['screenshot1'] ) ? esc_attr( $values['screenshot1'][0] ) : '';
    $screenshot2 = isset( $values['screenshot2'] ) ? esc_attr( $values['screenshot2'][0] ) : '';
    $screenshot3 = isset( $values['screenshot3'] ) ? esc_attr( $values['screenshot3'][0] ) : '';
    $screenshot4 = isset( $values['screenshot4'] ) ? esc_attr( $values['screenshot4'][0] ) : '';
    $screenshot5 = isset( $values['screenshot5'] ) ? esc_attr( $values['screenshot5'][0] ) : '';
    $screenshot6 = isset( $values['screenshot6'] ) ? esc_attr( $values['screenshot6'][0] ) : '';
    $screenshot7 = isset( $values['screenshot7'] ) ? esc_attr( $values['screenshot7'][0] ) : '';
    wp_nonce_field( 'prevpics_save_meta_box_data', 'prevpics_meta_box_nonce' );

    // jQuery
    wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
    wp_enqueue_media();
    ?>
    توجه کنید اگر هر کدام خالی باشد آن مورد نمایش داده نمی شود و اگر اولی خالی باشد کلا نمایش داده نمی شود .
    <div>

        <p><label for="screenshot1" style="font-weight:bold;">تصویر پیش نمایش 1</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot1" id="screenshot1" value="<?php echo $screenshot1; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn1" id="upload-btn1" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot2" style="font-weight:bold;">تصویر پیش نمایش 2</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot2" id="screenshot2" value="<?php echo $screenshot2; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn2" id="upload-btn2" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot3" style="font-weight:bold;">تصویر پیش نمایش 3</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot3" id="screenshot3" value="<?php echo $screenshot3; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn3" id="upload-btn3" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot4" style="font-weight:bold;">تصویر پیش نمایش 4</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot4" id="screenshot4" value="<?php echo $screenshot4; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn4" id="upload-btn4" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot5" style="font-weight:bold;">تصویر پیش نمایش 5</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot5" id="screenshot5" value="<?php echo $screenshot5; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn5" id="upload-btn5" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot6" style="font-weight:bold;">تصویر پیش نمایش 6</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot6" id="screenshot6" value="<?php echo $screenshot6; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn6" id="upload-btn6" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

        <p><label for="screenshot7" style="font-weight:bold;">تصویر پیش نمایش 7</label>:
            <input type="text" style="width:60%;direction:ltr" name="screenshot7" id="screenshot7" value="<?php echo $screenshot7; ?>" class="regular-text image_url">
            <input type="button" style="width:20%;" name="upload-btn7" id="upload-btn7" class="button-secondary upload-btn" value="آپلود از کتابخانه"></p>

    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.upload-btn').click(function(e) {
                e.preventDefault();
                var prev_url = $(this).parent().find('.image_url');
                var image = wp.media({
                    title: 'انتخاب یا آپلود تصویر پیشنمایش',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open()
                    .on('select', function(e){
                        // This will return the selected image from the Media Uploader, the result is an object
                        var uploaded_image = image.state().get('selection').first();
                        // We convert uploaded_image to a JSON object to make accessing it easier
                        // Output to the console uploaded_image
                        console.log(uploaded_image);
                        var image_url = uploaded_image.toJSON().url;
                        // Let's assign the url value to the input field
                        prev_url.val(image_url);
                    });
            });
        });
    </script>

    <?php

}

add_action( 'save_post', 'metabox_save_postdata' );
function metabox_save_postdata( $post_id ) {

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['product_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['product_meta_box_nonce'], 'product_nonce' ) ) return;

    if( !isset( $_POST['prevpics_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['prevpics_meta_box_nonce'], 'prevpics_save_meta_box_data' ) ) return;

    if ( array_key_exists('filetype_field', $_POST ) ) {
        update_post_meta( $post_id,'filetype_field', $_POST['filetype_field'] );
    }
    if ( array_key_exists('productid_field', $_POST ) ) {
        update_post_meta( $post_id,'productid_field', $_POST['productid_field'] );

        $dl_query = new WP_Query('post_type=downloads&p='.$_POST['productid_field']);
        $sellcount = get_post_meta( $_POST['productid_field'], '_edd_download_sales', true );

        update_post_meta( $post_id,'productsales_field', $sellcount );

        wp_reset_query();

    }
    if ( array_key_exists('productsize_field', $_POST ) ) {
        update_post_meta( $post_id,'productsize_field', $_POST['productsize_field'] );
    }
    if ( array_key_exists('prev_link', $_POST ) ) {
        update_post_meta( $post_id,'prev_link', $_POST['prev_link'] );
    }
    if ( array_key_exists('freedl_link', $_POST ) ) {
        update_post_meta( $post_id,'freedl_link', $_POST['freedl_link'] );
    }

    if ( array_key_exists('own_text1', $_POST ) ) {
        update_post_meta( $post_id,'own_text1', $_POST['own_text1'] );
    }
    if ( array_key_exists('own_link1', $_POST ) ) {
        update_post_meta( $post_id,'own_link1', $_POST['own_link1'] );
    }
    if ( array_key_exists('own_color1', $_POST ) ) {
        update_post_meta( $post_id,'own_color1', $_POST['own_color1'] );
    }

    if ( array_key_exists('own_text2', $_POST ) ) {
        update_post_meta( $post_id,'own_text2', $_POST['own_text2'] );
    }
    if ( array_key_exists('own_link2', $_POST ) ) {
        update_post_meta( $post_id,'own_link2', $_POST['own_link2'] );
    }
    if ( array_key_exists('own_color2', $_POST ) ) {
        update_post_meta( $post_id,'own_color2', $_POST['own_color2'] );
    }

    if ( array_key_exists('own_text3', $_POST ) ) {
        update_post_meta( $post_id,'own_text3', $_POST['own_text3'] );
    }
    if ( array_key_exists('own_link3', $_POST ) ) {
        update_post_meta( $post_id,'own_link3', $_POST['own_link3'] );
    }
    if ( array_key_exists('own_color3', $_POST ) ) {
        update_post_meta( $post_id,'own_color3', $_POST['own_color3'] );
    }

    if ( array_key_exists('own_text4', $_POST ) ) {
        update_post_meta( $post_id,'own_text4', $_POST['own_text4'] );
    }
    if ( array_key_exists('own_link4', $_POST ) ) {
        update_post_meta( $post_id,'own_link4', $_POST['own_link4'] );
    }
    if ( array_key_exists('own_color4', $_POST ) ) {
        update_post_meta( $post_id,'own_color4', $_POST['own_color4'] );
    }

    if ( array_key_exists('own_text5', $_POST ) ) {
        update_post_meta( $post_id,'own_text5', $_POST['own_text5'] );
    }
    if ( array_key_exists('own_link5', $_POST ) ) {
        update_post_meta( $post_id,'own_link5', $_POST['own_link5'] );
    }
    if ( array_key_exists('own_color5', $_POST ) ) {
        update_post_meta( $post_id,'own_color5', $_POST['own_color5'] );
    }

    if( isset( $_POST['screenshot1'] ) )
        update_post_meta( $post_id, 'screenshot1', $_POST['screenshot1'] );

    if( isset( $_POST['screenshot2'] ) )
        update_post_meta( $post_id, 'screenshot2', $_POST['screenshot2'] );

    if( isset( $_POST['screenshot3'] ) )
        update_post_meta( $post_id, 'screenshot3', $_POST['screenshot3'] );

    if( isset( $_POST['screenshot4'] ) )
        update_post_meta( $post_id, 'screenshot4', $_POST['screenshot4'] );

    if( isset( $_POST['screenshot5'] ) )
        update_post_meta( $post_id, 'screenshot5', $_POST['screenshot5'] );

    if( isset( $_POST['screenshot6'] ) )
        update_post_meta( $post_id, 'screenshot6', $_POST['screenshot6'] );

    if( isset( $_POST['screenshot7'] ) )
        update_post_meta( $post_id, 'screenshot7', $_POST['screenshot7'] );
}

?>