<?php
//==========================================================================
//------------------------------- Meta ----------------------------------
//==========================================================================
function olka_get_custom_field($value)
{
    global $post;
    $custom_field = get_post_meta($post->ID, $value, true);
    if (!empty($custom_field))
        return is_array($custom_field) ? stripslashes_deep($custom_field) : stripslashes(wp_kses_decode_entities($custom_field));
    return false;
}
//---------------------------------------------
function olka_add_custom_meta_box()
{
    add_meta_box(
        'olka-meta-box',
        __('بارگذاری و تعیین فایل روزنامه', 'textdomain'),
        'olka_meta_box_output',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'olka_add_custom_meta_box');
//------------------------------------------
function olka_meta_box_output($post)
{
    wp_nonce_field('my_olka_meta_box_nonce', 'olka_meta_box_nonce');
    echo 'لطفا آدرس فایل PDF خود را که در گالری آپلود کرده اید را وارد نمایید .';
    ?>
    <p>
        <label for="olka1_textfield"><?php _e('آدرس فایل روزنامه', 'textdomain'); ?>:</label>
    <input type="text" name="olka1_textfield" id="olka1_textfield"
           value="<?php echo olka_get_custom_field('olka1_textfield'); ?>" size="50"/>
    </p>

    <?php
}
//----------------------------------------------------
function olka_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['olka_meta_box_nonce']) || !wp_verify_nonce($_POST['olka_meta_box_nonce'], 'my_olka_meta_box_nonce')) return;
    if (!current_user_can('edit_post')) return;
    if (isset($_POST['olka1_textfield']))
        update_post_meta($post_id, 'olka1_textfield', esc_attr($_POST['olka1_textfield']));
    if (isset($_POST['olka1_textarea']))
        update_post_meta($post_id, 'olka1_textarea', $_POST['olka1_textarea']);
}
add_action('save_post', 'olka_meta_box_save');





//==========================================================================
//------------------------------- header or ...  ----------------------------------
//==========================================================================
?>
	
<div style="width: 100%;background: #eee;border-bottom: 1px solid #a5a5a5;">
	
<div style="background: #efefef;width: 85%;height: 35px;margin: 0 auto;">
    <div style="width: 40%;margin: 0 auto;padding: 4px;float: right;">
        <p style="color: green;font-weight: 600;font-size: 15px;"><i class="fa fa-file-pdf-o
" style="padding-left: 5px;"></i>شما میتوانید هر روز روزنامه مورد نظر خود را دانلود کنید .</p>
    </div>
    <div class="option-list" style="float: left;padding: 4px 0 0 25px;">
        <?php
		global $post;
		$args = array( 
    		'post_type' => 'post',
			'tax_query' => array(
			array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'rozname',
		)
	),
    );

$myposts = get_posts( $args ); ?>
	    
<script>
	$(document).ready(function(){
		$('body').on('change', '#ua_xxsdf', function(){
			$(this).find('option[value="0"]').remove();
		});
	});
</script>
	    
<select id="ua_xxsdf" style="font-family: IRANSansWeb_Light;font-size: 15px;border: 1px solid #ddd;border-radius: 5px;font-weight: 600;" onchange="javascript:location.href = this.value;">	
<?php 
	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<option style="font-family: IRANSansWeb_Light;" value="<?php echo get_post_meta(get_the_ID(), 'olka1_textfield', true); ?>"><?php the_title(); ?></option>
<?php endforeach; ?>
</select>	
<?php wp_reset_postdata();?>

    </div>
</div>
	</div>	
