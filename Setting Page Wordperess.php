<?php
if ( is_admin() ) : // Load only if we are viewing an admin page
function template_admin_scripts() {
	if($_GET['page'] == 'theme-panel')
		wp_enqueue_media();
	
	wp_enqueue_style( 'template_admin_style',get_template_directory_uri().'/admin-panel/css/template_admin.css');
	wp_enqueue_script( 'template_of-media-uploader', get_template_directory_uri().'/admin-panel/js/media-uploader.js', array( 'jquery' ) );
	wp_enqueue_script( 'costum_script', get_template_directory_uri().'/admin-panel/js/costum-script.js', array( 'jquery' ) );
	
	wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');

}
add_action('admin_init', 'template_admin_scripts');

$panel_header = array(
	'head' => 'پنل ادمین استیلا',
	'desc' => 'تنظیمات را انجام دهید',
);
/***********initialize******************/
$template_options = array(
	
	'logo_upload' => '',
	'about_us' => '',
	'featured_title_fa' => __('متن درباره ما','template'),
	'featured_title_en' => __('متن درباره ما','template'),
	'featured_title_ar' => __('متن درباره ما','template'),
	'history' => '',
	'managers' => '',
	'managers_cat' => '',
	'clients_title_fa' => '',
	'clients_title_en' => '',
	'clients_title_ar' => '',
	'clients_cat' => '',
	'featured_post_readmore' => __('ادامه مطلب','template'),
	'responsive_design'=>'',
	'template_favicon'=> '',
	'contact_us_title_fa'=> '',
	'contact_us_title1_fa'=> '',
	'contact_us_title2_fa'=> '',
	'contact_us_title_en'=> '',
	'contact_us_title1_en'=> '',
	'contact_us_title2_en'=> '',
	'contact_us_title_ar'=> '',
	'contact_us_title1_ar'=> '',
	'contact_us_title2_ar'=> '',
	'contact_address1_fa' => '',
	'contact_address1_en' => '',
	'contact_address1_ar' => '',
	'contact_address2_fa' => '',
	'contact_address2_en' => '',
	'contact_address2_ar' => '',
	'google_map1' => '',
	'google_map2' => '',
	'slider_readmore' => 'ادامه مطلب',
    'slider_cat' => '',
	'products_title_fa' => '',
	'products_title_en' => '',
	'products_title_ar' => '',
	'product_cat' => '',
	'template_facebook' => '',
	'template_gplus' => '',
	'template_linkedin' => '',
	'template_instagram' => '',
	'template_telegram' => '',
	'article_title_fa'=>'',
	'article_title_en'=>'',
	'article_title_ar'=>'',
	'article_cat'=>'',
	'employment_title_fa'=>'',
	'employment_title_en'=>'',
	'employment_title_ar'=>'',
	'employment_cat'=>'',
	'contact_form_title_fa'=>'',
	'contact_form_title_en'=>'',
	'contact_form_title_ar'=>'',
	'what_u_say'=>'',
	'what_u_say_cat'=>'',
	'catalog_download_fa'=>'',
	'catalog_download_en'=>'',
	'catalog_download_url'=>'',
	'iso_managment'=>'',
	'steela_msg'=>'',
	'news_number_to_shoew'=>'',
	'product_array'=>'',
	'news_chars'=>'',
	'xxx_download_url'=>'',
	'xxx_download_url_fa'=>'',
	'xxx_download_url_en'=>'',
);

add_action( 'admin_init', 'template_register_settings' );
add_action( 'admin_menu', 'template_theme_options' );

function template_register_settings() {
	register_setting( 'template_theme_options', 'template_options', 'template_validate_options' );
}

function template_theme_options() {
	// Add theme options page to the addmin menu
	add_menu_page(  "پنل ادمین", "پنل ادمین", 'edit_theme_options', 'theme-panel', 'template_theme_options_page' );
}
/***************************************************/
// Store Posts in array
$template_postlist[0] = array(
	'value' => 0,
	'label' => __( '--انتخاب--', 'template' )
);
$arg = array('posts_per_page'   => -1);
$template_posts = get_posts($arg);
foreach( $template_posts as $template_post ) :
	$template_postlist[$template_post->ID] = array(
		'value' => $template_post->ID,
		'label' => $template_post->post_title
	);
endforeach;
wp_reset_postdata();
// Store categories in array
$template_catlist[0] = array(
	'value' => 0,
	'label' => __( '--انتخاب--' )
);
$arg1 = array(
	'hide_empty' => 0,
	'orderby' => 'name',
  	'parent' => 0,
);
$template_cats = get_categories($arg1);

foreach( $template_cats as $template_cat ) :
	$template_catlist[$template_cat->cat_ID] = array(
		'value' => $template_cat->cat_ID,
		'label' => $template_cat->cat_name
	);
endforeach;
wp_reset_postdata();
/************************************************/

// Function to generate options page
function template_theme_options_page() {
	global $panel_header; // related to panel introduce
	global $template_options, $template_postlist, $template_slider, $template_slider_show_pager, $template_slider_show_controls, $template_slider_mode, $template_slider_auto, $template_slider_caption, $template_catlist, $allowedtags;

	?>


	<div id="optionsframework-metabox" class="metabox-holder">
		
		<div id="optionsframework" class="template-box-15">
			<div id="header">
				<h1><?php echo $panel_header['head']; ?></h1><br />
				<h2><?php echo $panel_header['desc']; ?></h2>
			</div>
			<form id="form_options" method="post" action="options.php">

			<?php $settings = get_option('template_options'); ?>
			<?php settings_fields( 'template_theme_options' ); ?>

			<div id="options-group-1" class="group">
				<table class="form-table">
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('لوگو و fav آیکن'); ?></h4>
					</td>
					</tr>
					<tr>
						<th><label for="logo_upload"><?php _e( 'لوگو', 'template' )?></label></th>
						<td>
							<div class="upload_logo_upload">
							  <input class="medium upload_testimonial_bg" type="text" name="template_options[logo_upload]" id="template_logo_upload" value="<?php if(!empty($settings['logo_upload'])){ echo esc_url($settings['logo_upload']); }?>" />
							  <input class="button template_upload_button" attr-upload="upload_testimonial_bg" name="media_upload_button" id="template_logo_upload_button" value="<?php _e('آپلود','template'); ?>" type="button" /> <br />
							  <em class="f13"><?php _e('عکسی را برای لوگو انتخاب کنید امکان آپلود عکس جدید نیز وجود دارد', 'template'); ?></em>

							  <?php if(!empty($settings['logo_upload'])){ ?>
							  <div class="template_media_image upload_testimonial_bg">
							  <img src="<?php echo esc_url($settings['logo_upload']) ?>" class="template_show_image upload_testimonial_bg">
							  <div class="template_remove_upload" id="template_logo_upload_remove" attr-remove="upload_testimonial_bg"><?php _e('Remove','template'); ?></div>
							  </div>
							  <?php }else{ ?>
							  <div class="template_media_image upload_testimonial_bg" style="display:none">
							  <img src="<?php if(isset($settings['logo_upload'])) { echo esc_url($settings['logo_upload']); } ?>" class="template_show_image upload_testimonial_bg">
							  <a href="javascript:void(0)" class="template_remove_upload" attr-remove="upload_testimonial_bg" title="remove"><?php _e('Remove','template'); ?></a>
							  </div>
							  <?php	} ?>
							</div>
						</td>
					</tr>
					
					
					
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('درباره ما'); ?></h4>
					</td>
					</tr>
					<tr>
					<th scope="row"><label for="featured_title_fa"><?php _e('عنوان درباره(فارسی)','template'); ?></label></th>
					<td>
					<input class="medium" type="text" id="featured_title_fa" name="template_options[featured_title_fa]" value="<?php echo wp_kses($settings['featured_title_fa'], $allowedtags); ?>" />
					</td>
                    </tr>
                    
                    <tr>
					<th scope="row"><label for="featured_title_en"><?php _e('عنوان درباره(انگلیسی)','template'); ?></label></th>
					<td>
					<input class="medium" type="text" id="featured_title_en" name="template_options[featured_title_en]" value="<?php echo wp_kses($settings['featured_title_en'], $allowedtags); ?>" />
					</td>
                    </tr>
                    
                    <tr>
					<th scope="row"><label for="featured_title_ar"><?php _e('عنوان درباره(عربی)','template'); ?></label></th>
					<td>
					<input class="medium" type="text" id="featured_title_ar" name="template_options[featured_title_ar]" value="<?php echo wp_kses($settings['featured_title_ar'], $allowedtags); ?>" />
					</td>
                    </tr>

					<tr><th scope="row"><label for="history"><?php _e('تاریخچه','template'); ?></label></th>
					<td>
					<select id="history" name="template_options[history]">
					<?php
					foreach ( $template_postlist as $single_post ) :
						$label = esc_attr($single_post['label']); ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['history'] ); ?>><?php echo $label; ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>
					
					<tr><th scope="row"><label for="what_u_say"><?php _e('آنچه میگویند','template'); ?></label></th>
					<td>
					<select id="what_u_say" name="template_options[what_u_say]">
					<?php
					foreach ( $template_postlist as $single_post ) :
						$label = esc_attr($single_post['label']); ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['what_u_say'] ); ?>><?php echo $label; ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="managers"><?php _e('مدیران','template'); ?></label></th>
					<td>
					<select id="managers" name="template_options[managers]">
					<?php
					foreach ( $template_postlist as $single_post ) :
						$label = esc_attr($single_post['label']); ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['managers'] ); ?>><?php echo $label; ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>
					
					<tr>
						<th><label for="iso_managment"><?php _e( 'لوگو', 'template' )?></label></th>
						<td>
							<div class="upload_logo_upload">
							  <input class="medium upload_testimonial_bg" type="text" name="template_options[iso_managment]" id="template_logo_upload" value="<?php if(!empty($settings['iso_managment'])){ echo esc_url($settings['iso_managment']); }?>" />
							  <input class="button template_upload_button" attr-upload="upload_testimonial_bg" name="media_upload_button" id="template_logo_upload_button" value="<?php _e('آپلود','template'); ?>" type="button" /> <br />
							  <em class="f13"><?php _e('عکسی را برای لوگو انتخاب کنید امکان آپلود عکس جدید نیز وجود دارد', 'template'); ?></em>

							  <?php if(!empty($settings['iso_managment'])){ ?>
							  <div class="template_media_image upload_testimonial_bg">
							  <img src="<?php echo esc_url($settings['iso_managment']) ?>" class="template_show_image upload_testimonial_bg">
							  <div class="template_remove_upload" id="template_logo_upload_remove" attr-remove="upload_testimonial_bg"><?php _e('Remove','template'); ?></div>
							  </div>
							  <?php }else{ ?>
							  <div class="template_media_image upload_testimonial_bg" style="display:none">
							  <img src="<?php if(isset($settings['iso_managment'])) { echo esc_url($settings['iso_managment']); } ?>" class="template_show_image upload_testimonial_bg">
							  <a href="javascript:void(0)" class="template_remove_upload" attr-remove="upload_testimonial_bg" title="remove"><?php _e('Remove','template'); ?></a>
							  </div>
							  <?php	} ?>
							</div>
						</td>
					</tr>

					<tr>
					<th><?php _e('-اعضای هیئت مدیره','template'); ?></th>
					<td>
					<?php 
					if(!isset($settings['managers_cat'])){
						$settings['managers_cat'] = 0;
					}
					?>
					<select id="employment_cat" name="template_options[managers_cat]">
						<?php
						foreach ( $template_catlist as $single_cat ) :
							$label = esc_attr($single_cat['label']);
							echo '<option value="' . esc_attr($single_cat['value']) . '" ' . selected( $single_cat['value'] , $settings['managers_cat'] ) . '>' . $label . '</option>';
						endforeach;
						?>
					</select>
					</td>
					</tr>
					
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('محصولات و خدمات'); ?></h4>
					</td>
					</tr>
					<tr>
						<th><label for="employment_title_fa"><?php _e('عنوان بخش محصولات(فارسی)','template'); ?></label></th>
						<td><input id="employment_title_fa" type="text" name="template_options[employment_title_fa]" value="<?php if ( isset($settings['employment_title_fa'])){echo esc_attr($settings['employment_title_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="employment_title_en"><?php _e('عنوان بخش محصولات(انگلیسی)','template'); ?></label></th>
						<td><input id="employment_title_en" type="text" name="template_options[employment_title_en]" value="<?php if ( isset($settings['employment_title_en'])){echo esc_attr($settings['employment_title_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="employment_title_ar"><?php _e('عنوان بخش محصولات(عربی)','template'); ?></label></th>
						<td><input id="employment_title_ar" type="text" name="template_options[employment_title_ar]" value="<?php if ( isset($settings['employment_title_ar'])){echo esc_attr($settings['employment_title_ar']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="product_array"><?php _e('آی دی های دسته بندی های محصولات (با - جدا کنید)','template'); ?></label></th>
						<td><input id="product_array" type="text" name="template_options[product_array]" value="<?php if ( isset($settings['product_array'])){echo esc_attr($settings['product_array']); } ?>"><br><em class="f13"><?php _e('11-20-30-43 ...', 'template'); ?></em></td>

					</tr>
					
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('مشتریها'); ?></h4>
					</td>
					</tr>
					<tr>
						<th><label for="clients_title_fa"><?php _e('عنوان بخش مشتریها(فارسی)','template'); ?></label></th>
						<td><input id="clients_title_fa" type="text" name="template_options[clients_title_fa]" value="<?php if ( isset($settings['clients_title_fa'])){echo esc_attr($settings['clients_title_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="clients_title_en"><?php _e('عنوان بخش مشتریها(انگلیسی)','template'); ?></label></th>
						<td><input id="clients_title_en" type="text" name="template_options[clients_title_en]" value="<?php if ( isset($settings['clients_title_en'])){echo esc_attr($settings['clients_title_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="clients_title_ar"><?php _e('عنوان بخش مشتریها(عربی)','template'); ?></label></th>
						<td><input id="clients_title_ar" type="text" name="template_options[clients_title_ar]" value="<?php if ( isset($settings['clients_title_ar'])){echo esc_attr($settings['clients_title_ar']); } ?>"></td>
					</tr>
					<tr>
					<th><?php _e('دسته بندی مشتریها','template'); ?></th>
					<td>
					<?php 
					if(!isset($settings['clients_cat'])){
						$settings['clients_cat'] = 0;
					}
					?>
					<select id="clients_cat" name="template_options[clients_cat]">
						<?php
						foreach ( $template_catlist as $single_cat ) :
							$label = esc_attr($single_cat['label']);
							echo '<option value="' . esc_attr($single_cat['value']) . '" ' . selected( $single_cat['value'] , $settings['clients_cat'] ) . '>' . $label . '</option>';
						endforeach;
						?>
					</select>
					</td>
					</tr>
					
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('کاتالوگ'); ?></h4>
					</td>
					</tr>
					
					<tr>
					<th><?php _e('دسته بندی کاتالوگ','template'); ?></th>
					<td>
					<?php 
					if(!isset($settings['product_cat'])){
						$settings['product_cat'] = 0;
					}
					?>
					<select id="product_cat" name="template_options[product_cat]">
						<?php
						foreach ( $template_catlist as $single_cat ) :
							$label = esc_attr($single_cat['label']);
							echo '<option value="' . esc_attr($single_cat['value']) . '" ' . selected( $single_cat['value'] , $settings['product_cat'] ) . '>' . $label . '</option>';
						endforeach;
						?>
					</select>
					</td>
					</tr>
					<tr>
						<th><label for="catalog_download_fa"><?php _e('دانلود کاتالوگ(فارسی)','template'); ?></label></th>
						<td><input id="catalog_download_fa" type="text" name="template_options[catalog_download_fa]" value="<?php if ( isset($settings['catalog_download_fa'])){echo esc_attr($settings['catalog_download_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="catalog_download_en"><?php _e('دانلود کاتالوگ(انگلیسی)','template'); ?></label></th>
						<td><input id="catalog_download_en" type="text" name="template_options[catalog_download_en]" value="<?php if ( isset($settings['catalog_download_en'])){echo esc_attr($settings['catalog_download_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="catalog_download_url"><?php _e('لینک دانلود کاتالوگ','template'); ?></label></th>
						<td><input id="catalog_download_url" type="text" name="template_options[catalog_download_url]" value="<?php if ( isset($settings['catalog_download_url'])){echo esc_attr($settings['catalog_download_url']); } ?>"></td>
					</tr>

					<tr>
						<th><label for="xxx_download_url_fa"><?php _e('دانلود پیام استیلا(فارسی)','template'); ?></label></th>
						<td><input id="xxx_download_url_fa" type="text" name="template_options[xxx_download_url_fa]" value="<?php if ( isset($settings['xxx_download_url_fa'])){echo esc_attr($settings['xxx_download_url_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="xxx_download_url_en"><?php _e('دانلود پیام استیلا(انگلیسی)','template'); ?></label></th>
						<td><input id="xxx_download_url_en" type="text" name="template_options[xxx_download_url_en]" value="<?php if ( isset($settings['xxx_download_url_en'])){echo esc_attr($settings['xxx_download_url_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="xxx_download_url"><?php _e('لینک دانلود کاتالوگ','template'); ?></label></th>
						<td><input id="xxx_download_url" type="text" name="template_options[xxx_download_url]" value="<?php if ( isset($settings['xxx_download_url'])){echo esc_attr($settings['xxx_download_url']); } ?>"></td>
					</tr>

					<tr>
					<th><?php _e('پیام استیلا','template'); ?></th>
					<td>
					<?php 
					if(!isset($settings['steela_msg'])){
						$settings['steela_msg'] = 0;
					}
					?>
					<select id="steela_msg" name="template_options[steela_msg]">
						<?php
						foreach ( $template_catlist as $single_cat ) :
							$label = esc_attr($single_cat['label']);
							echo '<option value="' . esc_attr($single_cat['value']) . '" ' . selected( $single_cat['value'] , $settings['steela_msg'] ) . '>' . $label . '</option>';
						endforeach;
						?>
					</select>
					</td>
					</tr>
					<tr class="setting-title">
					<td colspan="2">
					<h4><?php _e('فوتر'); ?></h4>
					</td>
					</tr>
					
					
					<tr>
						<th><label for="news_number_to_shoew"><?php _e('تعداد اخبار برای نمایش','template'); ?></label></th>
						<td><input id="news_number_to_shoew" type="text" name="template_options[news_number_to_shoew]" value="<?php if ( isset($settings['news_number_to_shoew'])){echo esc_attr($settings['news_number_to_shoew']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="news_chars"><?php _e('تعداد اخبار برای نمایش','template'); ?></label></th>
						<td><input id="news_chars" type="text" name="template_options[news_chars]" value="<?php if ( isset($settings['news_chars'])){echo esc_attr($settings['news_chars']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="article_title_fa"><?php _e('عنوان قسمت اخبار(فارسی)','template'); ?></label></th>
						<td><input id="article_title_fa" type="text" name="template_options[article_title_fa]" value="<?php if ( isset($settings['article_title_fa'])){echo esc_attr($settings['article_title_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="article_title_en"><?php _e('عنوان قسمت اخبار(انگلیس)','template'); ?></label></th>
						<td><input id="article_title_en" type="text" name="template_options[article_title_en]" value="<?php if ( isset($settings['article_title_en'])){echo esc_attr($settings['article_title_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="article_title_ar"><?php _e('عنوان قسمت اخبار(عربی)','template'); ?></label></th>
						<td><input id="article_title_ar" type="text" name="template_options[article_title_ar]" value="<?php if ( isset($settings['article_title_ar'])){echo esc_attr($settings['article_title_ar']); } ?>"></td>
					</tr>
					<tr>
					<th><?php _e('دسته بندی اخبار','template'); ?></th>
					<td>
					<?php 
					if(!isset($settings['article_cat'])){
						$settings['article_cat'] = 0;
					}
					?>
					<select id="article_cat" name="template_options[article_cat]">
						<?php
						foreach ( $template_catlist as $single_cat ) :
							$label = esc_attr($single_cat['label']);
							echo '<option value="' . esc_attr($single_cat['value']) . '" ' . selected( $single_cat['value'] , $settings['article_cat'] ) . '>' . $label . '</option>';
						endforeach;
						?>
					</select>
					</td>
					</tr>
					
					<tr>
						<th><label for="contact_us_title_fa"><?php _e('عنوان اطلاعات تماس(فارسی)','template'); ?></label></th>
						<td><input id="contact_us_title_fa" type="text" name="template_options[contact_us_title_fa]" value="<?php if ( isset($settings['contact_us_title_fa'])){echo esc_attr($settings['contact_us_title_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title_en"><?php _e('عنوان اطلاعات تماس(انگلیسی)','template'); ?></label></th>
						<td><input id="contact_us_title_en" type="text" name="template_options[contact_us_title_en]" value="<?php if ( isset($settings['contact_us_title_en'])){echo esc_attr($settings['contact_us_title_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title_ar"><?php _e('عنوان اطلاعات تماس(عربی)','template'); ?></label></th>
						<td><input id="contact_us_title_ar" type="text" name="template_options[contact_us_title_ar]" value="<?php if ( isset($settings['contact_us_title_ar'])){echo esc_attr($settings['contact_us_title_ar']); } ?>"></td>
					</tr>
					
					<tr>
						<th><label for="contact_us_title1_fa"><?php _e('-عنوان بخش اول(فارسی)','template'); ?></label></th>
						<td><input id="contact_us_title1_fa" type="text" name="template_options[contact_us_title1_fa]" value="<?php if ( isset($settings['contact_us_title1_fa'])){echo esc_attr($settings['contact_us_title1_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title1_en"><?php _e('-عنوان بخش اول(انگلیسی)','template'); ?></label></th>
						<td><input id="contact_us_title1_en" type="text" name="template_options[contact_us_title1_en]" value="<?php if ( isset($settings['contact_us_title1_en'])){echo esc_attr($settings['contact_us_title1_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title1_ar"><?php _e('-عنوان بخش اول(عربی)','template'); ?></label></th>
						<td><input id="contact_us_title1_ar" type="text" name="template_options[contact_us_title1_ar]" value="<?php if ( isset($settings['contact_us_title1_ar'])){echo esc_attr($settings['contact_us_title1_ar']); } ?>"></td>
					</tr>
					
					<tr><th scope="row"><label for="google_map1"><?php _e('-نقشه گوگل بخش اول','template'); ?></label></th>
						<td>
						<textarea id="google_map1" name="template_options[google_map1]" rows="6" cols="60"><?php echo $settings['google_map1']; ?></textarea>
						<p class="f13"><em><?php _e('لطفا iframe گوگل وارد کنید','template'); ?><em></p>
						</td>
					</tr>
					
					<tr><th scope="row"><label for="contact_address1_fa"><?php _e('-اطلاعات تماس بخش اول(فارسی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address1_fa" name="template_options[contact_address1_fa]" rows="6" cols="60"><?php echo $settings['contact_address1_fa']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					<tr><th scope="row"><label for="contact_address1_fa"><?php _e('-اطلاعات تماس بخش اول(انگلیسی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address1_en" name="template_options[contact_address1_en]" rows="6" cols="60"><?php echo $settings['contact_address1_en']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					<tr><th scope="row"><label for="contact_address1_ar"><?php _e('-اطلاعات تماس بخش اول(عربی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address1_fa" name="template_options[contact_address1_ar]" rows="6" cols="60"><?php echo $settings['contact_address1_ar']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					
					<tr>
						<th><label for="contact_us_title2_fa"><?php _e('-عنوان بخش دوم(فارسی)','template2'); ?></label></th>
						<td><input id="contact_us_title2_fa" type="text" name="template_options[contact_us_title2_fa]" value="<?php if ( isset($settings['contact_us_title2_fa'])){echo esc_attr($settings['contact_us_title2_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title2_en"><?php _e('-عنوان بخش دوم(انگلیسی)','template2'); ?></label></th>
						<td><input id="contact_us_title2_en" type="text" name="template_options[contact_us_title2_en]" value="<?php if ( isset($settings['contact_us_title2_en'])){echo esc_attr($settings['contact_us_title2_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_us_title2_ar"><?php _e('-عنوان بخش دوم(عربی)','template2'); ?></label></th>
						<td><input id="contact_us_title2_ar" type="text" name="template_options[contact_us_title2_ar]" value="<?php if ( isset($settings['contact_us_title2_ar'])){echo esc_attr($settings['contact_us_title2_ar']); } ?>"></td>
					</tr>
					
					<tr><th scope="row"><label for="google_map2"><?php _e('-نقشه گوگل بخش دوم','template'); ?></label></th>
						<td>
						<textarea id="google_map2" name="template_options[google_map2]" rows="6" cols="60"><?php echo $settings['google_map2']; ?></textarea>
						<p class="f13"><em><?php _e('لطفا iframe گوگل وارد کنید','template'); ?><em></p>
						</td>
					</tr>
					
					<tr><th scope="row"><label for="contact_address2_fa"><?php _e('-اطلاعات تماس بخش دوم(فارسی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address2_fa" name="template_options[contact_address2_fa]" rows="6" cols="60"><?php echo $settings['contact_address2_fa']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					<tr><th scope="row"><label for="contact_address2_en"><?php _e('-اطلاعات تماس بخش دوم(انگلیسی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address2_fa" name="template_options[contact_address2_en]" rows="6" cols="60"><?php echo $settings['contact_address2_en']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					<tr><th scope="row"><label for="contact_address2_ar"><?php _e('-اطلاعات تماس بخش دوم(عربی)','template'); ?></label></th>
						<td>
						<textarea id="contact_address2_fa" name="template_options[contact_address2_ar]" rows="6" cols="60"><?php echo $settings['contact_address2_ar']; ?></textarea>
						<p class="f13"><em><?php _e(' تگ های html مجاز هستند','template'); ?><em></p>
						</td>
					</tr>
					<tr>
						<th><label for="template_telegram"><?php _e('آدرس تلگرام','template'); ?></label></th>
						<td><input id="template_telegram" type="text" name="template_options[template_telegram]" value="<?php if ( isset($settings['template_telegram'])){echo esc_attr($settings['template_telegram']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="template_facebook"><?php _e('آدرس فیسبوک','template'); ?></label></th>
						<td><input id="template_facebook" type="text" name="template_options[template_facebook]" value="<?php if ( isset($settings['template_facebook'])){echo esc_attr($settings['template_facebook']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="template_gplus"><?php _e('آدرس گوگل پلاس','template'); ?></label></th>
						<td><input id="template_gplus" type="text" name="template_options[template_gplus]" value="<?php if ( isset($settings['template_gplus'])){echo esc_attr($settings['template_gplus']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="template_linkedin"><?php _e('آدرس لینکدین','template'); ?></label></th>
						<td><input id="template_linkedin" type="text" name="template_options[template_linkedin]" value="<?php if ( isset($settings['template_linkedin'])){echo esc_attr($settings['template_linkedin']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="template_instagram"><?php _e('آدرس اینستاگرام','template'); ?></label></th>
						<td><input id="template_instagram" type="text" name="template_options[template_instagram]" value="<?php if ( isset($settings['template_instagram'])){echo esc_attr($settings['template_instagram']); } ?>"></td>
					</tr>
					
					<tr>
						<th><label for="contact_form_title_fa"><?php _e('عنوان فرم تماس(فارسی)','template2'); ?></label></th>
						<td><input id="contact_form_title_fa" type="text" name="template_options[contact_form_title_fa]" value="<?php if ( isset($settings['contact_form_title_fa'])){echo esc_attr($settings['contact_form_title_fa']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_form_title_en"><?php _e('عنوان فرم تماس(انگلیسی)','template2'); ?></label></th>
						<td><input id="contact_form_title_en" type="text" name="template_options[contact_form_title_en]" value="<?php if ( isset($settings['contact_form_title_en'])){echo esc_attr($settings['contact_form_title_en']); } ?>"></td>
					</tr>
					<tr>
						<th><label for="contact_form_title_ar"><?php _e('عنوان فرم تماس(عربی)','template2'); ?></label></th>
						<td><input id="contact_form_title_ar" type="text" name="template_options[contact_form_title_ar]" value="<?php if ( isset($settings['contact_form_title_ar'])){echo esc_attr($settings['contact_form_title_ar']); } ?>"></td>
					</tr>
				</table>
			</div>
			
			<div id="optionsframework-submit">
				<input type="submit" class="button-primary" value="<?php _e('ذخیره تغییرات'); ?>" />
			</div>
			
			</form>
		</div><!-- #optionsframework -->

	</div><!-- #optionsframework-metabox -->
    
	<?php
}
function template_validate_options($input){
	return $input;
}

/*****order set section***********/
function gam_no_order( $gam_no_post, $metabox ) {
	
	$order_tex = 'اولویت: <input type="text" id="gam-no-order" name="gam-no-order" value="' . get_gam_no_data($gam_no_post->ID, 'gam-no-order') . '" /><br />';
	$order_tex .= 'نقش: <input type="text" id="gam-no-role" name="gam-no-role" value="' . get_gam_no_data($gam_no_post->ID, 'gam-no-role') . '" />';
	echo $order_tex;
}
function gam_no_order_meta_box() {
    add_meta_box( 'gam_no_order_box', __( 'گام نو', 'textdomain' ), 'gam_no_order', 'post' );
}
add_action( 'add_meta_boxes', 'gam_no_order_meta_box' );

add_action( 'added_post_meta', 'gam_no_click_save', 10, 4 );
function gam_no_click_save($meta_id, $post_id, $meta_key, $meta_value) {
	
	$post = get_post($post_id);
	$order = $_REQUEST['gam-no-order'];
	$role = $_REQUEST['gam-no-role'];
	
	gam_no_add_to_post_meta($post_id, 'gam-no-order', $order);
	gam_no_add_to_post_meta($post_id, 'gam-no-role', $role);
	
}
function gam_no_add_to_post_meta($postid, $mk, $mv) {
	if (!add_post_meta( $postid, $mk, $mv, true )) {
	   update_post_meta( $postid, $mk, $mv);
	}
}
function get_gam_no_data($post_id, $text){
	return get_post_meta($post_id, $text, TRUE);
}

endif;  // EndIf is_admin()
?>
