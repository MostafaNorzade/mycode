<?php
function mirab_get_custom_field($value)
{
    global $post;

    $custom_field = get_post_meta($post->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}

function mirab2_get_custom_field($value)
{
    global $post;

    $custom_field = get_post_meta($post->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}

function mirab3_get_custom_field($value)
{
    global $post;

    $custom_field = get_post_meta($post->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}

//---------------------------------------------
function mirab_add_custom_meta_box()
{
//فعال سازی متاباکس در صفحه پست جدید
    add_meta_box(
        'mirab-meta-box',
        __('ویژگی محصول', 'textdomain'),
        'mirab_meta_box_output',
        'post',
        'normal',
        'high'
    );
}

function mirab2_add_custom_meta_box()
{
//فعال سازی متاباکس در صفحه پست جدید
    add_meta_box(
        'mirab2-meta-box',
        __('مزایای محصول', 'textdomain'),
        'mirab2_meta_box_output',
        'post',
        'normal',
        'high'
    );
}

function mirab3_add_custom_meta_box()
{
//فعال سازی متاباکس در صفحه پست جدید
    add_meta_box(
        'mirab3-meta-box',
        __('کاربردهای محصول', 'textdomain'),
        'mirab3_meta_box_output',
        'post',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'mirab_add_custom_meta_box');
add_action('add_meta_boxes', 'mirab2_add_custom_meta_box');
add_action('add_meta_boxes', 'mirab3_add_custom_meta_box');
//---------
function mirab_meta_box_output($post)
{
    wp_nonce_field('my_mirab_meta_box_nonce', 'mirab_meta_box_nonce');
    echo 'لطفا توضیحات مربوط به ویژگی محصول رو در این بخش وارد نمایید .' ?>
    <p>
        <label for="mirab_textfield"><?php _e('عنوان معرفی', 'textdomain'); ?>:</label>
        <input type="text" name="mirab_textfield" id="mirab_textfield"
               value="<?php echo mirab_get_custom_field('mirab_textfield'); ?>" size="50"/>
    </p>
    <?php
    $content = get_post_meta($post->ID, 'mirab_textarea', true);
    wp_editor(htmlspecialchars_decode($content), 'mirab_textarea');

}

function mirab2_meta_box_output($post)
{
    wp_nonce_field('my_mirab2_meta_box_nonce', 'mirab2_meta_box_nonce');
    echo 'لطفا توضیحات مربوط به مزایای محصول رو در این بخش وارد نمایید .' ?>
    <p>
        <label for="mirab2_textfield"><?php _e('عنوان معرفی', 'textdomain'); ?>:</label>
        <input type="text" name="mirab2_textfield" id="mirab2_textfield"
               value="<?php echo mirab_get_custom_field('mirab2_textfield'); ?>" size="50"/>
    </p>
    <?php
    $content = get_post_meta($post->ID, 'mirab2_textarea', true);
    wp_editor(htmlspecialchars_decode($content), 'mirab2_textarea');
}

function mirab3_meta_box_output($post)
{
    wp_nonce_field('my_mirab3_meta_box_nonce', 'mirab3_meta_box_nonce');
    echo 'لطفا توضیحات مربوط به کاربردهای محصول رو در این بخش وارد نمایید .' ?>
    <p>
        <label for="mirab3_textfield"><?php _e('عنوان معرفی', 'textdomain'); ?>:</label>
        <input type="text" name="mirab3_textfield" id="mirab3_textfield"
               value="<?php echo mirab_get_custom_field('mirab3_textfield'); ?>" size="50"/>
    </p>
    <?php
    $content = get_post_meta($post->ID, 'mirab3_textarea', true);
    wp_editor(htmlspecialchars_decode($content), 'mirab3_textarea');
}

//---------
function mirab_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['mirab_meta_box_nonce']) || !wp_verify_nonce($_POST['mirab_meta_box_nonce'], 'my_mirab_meta_box_nonce')) return;
    if (!current_user_can('edit_post')) return;
    if (isset($_POST['mirab_textfield']))
        update_post_meta($post_id, 'mirab_textfield', esc_attr($_POST['mirab_textfield']));
    if (isset($_POST['mirab_textarea']))
        update_post_meta($post_id, 'mirab_textarea', esc_attr($_POST['mirab_textarea']));
}

add_action('save_post', 'mirab_meta_box_save');

function mirab2_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['mirab2_meta_box_nonce']) || !wp_verify_nonce($_POST['mirab2_meta_box_nonce'], 'my_mirab2_meta_box_nonce')) return;
    if (!current_user_can('edit_post')) return;
    if (isset($_POST['mirab2_textfield']))
        update_post_meta($post_id, 'mirab2_textfield', esc_attr($_POST['mirab2_textfield']));
    if (isset($_POST['mirab2_textarea']))
        update_post_meta($post_id, 'mirab2_textarea', esc_attr($_POST['mirab2_textarea']));
}

add_action('save_post', 'mirab2_meta_box_save');

function mirab3_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['mirab3_meta_box_nonce']) || !wp_verify_nonce($_POST['mirab3_meta_box_nonce'], 'my_mirab3_meta_box_nonce')) return;
    if (!current_user_can('edit_post')) return;
    if (isset($_POST['mirab3_textfield']))
        update_post_meta($post_id, 'mirab3_textfield', esc_attr($_POST['mirab3_textfield']));
    if (isset($_POST['mirab3_textarea']))
        update_post_meta($post_id, 'mirab3_textarea', esc_attr($_POST['mirab3_textarea']));
}

add_action('save_post', 'mirab3_meta_box_save');


//----------------------------------------------------------------------------------
//-------------------------------------------------------

?>
<div class="liner col row">
    <ul style="margin: 0;" class="dl-box row">
        <li>
            <span class="block"><i class="col fa fa-download"></i>
                <a href="<?php echo get_post_meta($post->ID, 'site_freelink', ture); ?>"
                   title="">
                    دانلود رایگان با کیفیت 320
                </a>
            </span>
            <span class="tozih"><?php echo get_post_meta($post->ID, 'productsize_field', ture); ?></span>
        </li>

        <?php
        $productid = (int)get_post_meta($post->ID, 'productid_field', true);
        $productid2 = (int)get_post_meta($post->ID, 'product_acord', true);
        if ($productid) : ?>
            <li>
                <span class="block">
                    <div>
                        <?php echo do_shortcode('[purchase_link id="' . $productid . '" text="خرید ریمیکس با کیفیت 320"]'); ?>
                    </div>
                </span>
                <span class="tozih">خرید و دانلود آنی</span>
            </li>
        <?php endif; ?>

        <li>
            <span class="block">
                <i class="col fa fa-eye"></i>
                <a href="<?php echo get_post_meta($post->ID, 'product_preview', ture); ?>"
                   title="">پیش نمایش آنلاین</a>
            </span>
            <span class="tozih">30 ثانیه از آهنگ ریمیکس</span>
        </li>
        <li style="border: none;">
            <span class="block">
                <div>
                    <?php echo do_shortcode('[purchase_link id="' . $productid2 . '" text="خرید آکورد و نت"]'); ?>
                </div>
            </span>
            <span class="tozih">دانلود شعر و آکورد آهنگ</span>
        </li>
        <p></p>
    </ul>
</div>