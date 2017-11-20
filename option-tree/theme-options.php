<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );
/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {
require( trailingslashit( get_template_directory() ) . 'option-tree/ot_icon.php' );
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array.
   */
  $saved_settings = get_option( ot_settings_id(), array() );

  /**
   * Custom settings array that will eventually be
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array(
        array(
          'id'        => 'option_types_help',
          'title'     => 'ﺗﻨﻈﯿﻤﺎﺕ',
          'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
    ),
    'settings'        => array(
  array(
  'id'          => 'favicon',
  'label'       => 'ﻓﯿﻮ ﺁﯾﮑﻮﻥ',
  'desc'        => 'ﺑﺮاﯼ اﯾﻨﮑﻪ ﻭﺏ ﺳﺎﯾﺖ ﺷﻤﺎ ﻓﯿﻮ ﺁﯾﮑﻮﻥ ﺩاﺷﺘﻪ ﺑﺎﺷﺪ ﯾﮏ ﻋﮑﺲ ﺑﺎ ﻋﺮﺽ ﻭ اﺭﺗﻔﺎﻉ 16 ﭘﯿﮑﺴﻞ ﺁﭘﻠﻮﺩ ﻧﻤﺎﺋﯿﺪ ﯾﺎ ﺁﺩﺭﺱ ﻣﺴﺘﻘﯿﻢ ﺁﻥ ﺭا ﺩﺭ اﯾﻨﺠﺎ ﺩﺭﺝ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '',
  'type'        => 'upload',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  array(
  'id'          => 'logo',
  'label'       => 'ﻟﻮﮔﻮ',
  'desc'        => 'ﻟﻮﮔﻮﯼ ﺧﻮﺩ ﺭا ﺑﺮاﯼ ﻗﺮاﺭ ﮔﺮﻓﺘﻦ ﺩﺭ ﻫﺪﺭ ﻭﺏ ﺳﺎﯾﺖ ﺁﭘﻠﻮﺩ ﮐﻨﯿﺪ',
  'std'         => '',
  'type'        => 'upload',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  /**/
  array(
  'id'          => 'default_img',
  'label'       => 'ﺗﺼﻮﯾﺮ ﭘﯿﺶ ﻓﺮﺽ',
  'desc'        => 'ﯾﮏ ﻋﮑﺲ ﺑﺎ ﻋﺮﺽ ﻭ اﺭﺗﻔﺎﻉ 1024*1024 ﭘﯿﮑﺴﻞ ﺁﭘﻠﻮﺩ ﻧﻤﺎﺋﯿﺪ. اﯾﻦ ﺗﺼﻮﯾﺮ ﻫﻨﮕﺎﻣﯽ ﮐﻪ ﻫﺮ ﮐﺪاﻡ اﺯ ﭘﺴﺖ ﻫﺎ ﯾﺎ ﺑﺮﮔﻪ ﻫﺎﯼ ﺷﻤﺎ ﺩاﺭاﯼ ﺗﺼﻮﯾﺮ ﺷﺎﺧﺺ ﻧﺒﺎﺷﻨﺪ ﺟﺎﯾﮕﺰﯾﻦ ﺗﺼﻮﯾﺮ ﺷﺎﺧﺺ ﺧﻮاﻫﺪ ﺷﺪ. اﯾﻦ ﺗﺼﻮﯾﺮ ﻣﯿﺘﻮاﻧﺪ ﻟﻮﮔﻮﯼ ﻭﺏ ﺳﺎﯾﺖ ﺷﻤﺎ ﺑﺎﺷﺪ.',
  'std'         => '',
  'type'        => 'upload',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  array(
  'id'          => 'analytics',
  'label'       => 'ﮔﻮﮔﻞ ﺁﻧﺎﻟﯿﺘﮑﺰ',
  'desc'        => 'ﮐﺪ ﺳﺎﯾﺖ ﮔﻮﮔﻞ ﺁﻧﺎﻟﯿﺘﯿﮑﺰ ﺭا ﺩﺭ اﯾﻦ ﺑﺎﮐﺲ ﺩﺭﺝ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '',
  'type'        => 'javascript',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  array(
  'id'          => 'css',
  'label'       => 'ﺳﯽ اﺱ اﺱ',
  'desc'        => 'ﮐﺪﻫﺎﯼ ﺳﯽ اﺱ اﺱ ﻣﻮﺭﺩ ﻧﻈﺮ ﺧﻮﺩ ﺭا ﺩﺭ اﯾﻦ ﺑﺎﮐﺲ ﺩﺭﺝ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '',
  'type'        => 'css',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  array(
  'id'          => 'script',
  'label'       => 'ﺟﺎﻭا اﺳﮑﺮﯾﭙﺖ',
  'desc'        => 'ﮐﺪﻫﺎﯼ ﺟﺎﻭا اﺳﮑﺮﯾﭙﺖ ﺧﻮﺩ ﺭا ﺩﺭ اﯾﻦ ﺑﺎﮐﺲ ﺩﺭﺝ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '',
  'type'        => 'javascript',
  'section'     => 'general',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
array(
    'id'          => 'background_color',
    'label'       => 'رنگی را که میخواهید جایگزین رنگ های قرمز وب سایت شود را انتخاب کنید.',
    'std'         => '',
    'type'        => 'colorpicker',
    'section'     => 'general',
),
array(
    'id'          => 'wysija_form',
    'label'       => 'شورت کد خبرنامه را در این فیلد قرار دهید.',
	'desc'        => 'برای گرفتن شورت کد خبرنامه به منوی mailpoet و بعد زیر منوی تنظیمات مراجعه کنید و در تب فرمها بر روی ویرایش فرم مورد نظر کلیک کنید و در انتهای صفحه بر روی متن shortcode کلیک کنید تا شورت کد مورد نظر نمایش داده شود . شورت کد را کپی کرده و در این فیلد قرار دهید.
	برای مشاهده تصویری این مورد ویدئوی آموزشی رو دانلود کنید: 
	<a href="http://wordpressdesigner.ir/sitesazan/229348760.mp4" target="_blank" >نحوه گرفتن شورت کد یک خبرنامه</a>',
    'std'         => '',
    'type'        => 'text',
    'section'     => 'general',
),
/*
array(
    'id'          => 'background_color_hover',
    'label'       => 'رنگی را که میخواهید هنگامی که موس بر روی دکمه ها یا باکس های قرمز قرار گرفت جایگزین شود را انتخاب کنید. این رنگ بهتر است کمی از رنگ بالایی تیره تر باشد.',
    'std'         => '',
    'type'        => 'colorpicker',
    'section'     => 'general',
),
array(
    'id'          => 'color_onliner',
    'label'       => 'رنگی را که میخواهید جایگزین رنگ قرمز فونت ها شود را انتخاب کنید.',
    'std'         => '',
    'type'        => 'colorpicker',
    'section'     => 'general',
),
array(
    'id'          => 'border_color_onliner',
    'label'       => 'رنگی را که میخواهید به جای رنگ کادرهای باکس ها اعمال شود را انتخاب کنید.',
    'std'         => '',
    'type'        => 'colorpicker',
    'section'     => 'general',
),
*/
/************************************ header *************************************/
        array(
            'id'          => 'header_social_acc',
            'label'       => 'شبکه های اجتماعی',
            'desc'        => '',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'header',
            'settings'  => array(
                array(
                    'id'        => 'header_social_acc_link',
                    'label'     => 'ﻟﯿﻨﮏ',
                    'type'      => 'text',
                ),
                array(
                    'id'          => 'header_social_acc_icon',
                    'label'       => 'ﺁﯾﮑﻮﻥ',
                    'desc'        => '',
                    'std'         => '',
                    'type'        => 'radio',
                    'class'       => "Icon_type",
                    'choices'     => $ot_icons
                ),
            ),
        ),
        array(
            'id'          => 'header_phone_number',
            'label'       => 'شماره تماس',
            'desc'        => '',
            'std'         => ' ',
            'type'        => 'text',
            'section'     => 'header',
        ),
        array(
            'id'          => 'header_phone_number_icon',
            'label'       => 'آیکون شماره تماس',
            'desc'        => '',
            'std'         => '',
            'type'        => 'radio',
            'section'     => 'header',
            'class'       => "Icon_type",
            'choices'     => $ot_icons
        ),

/************************************ INDEX *************************************/
    array(
            'id'          => 'layout_index',
            'label'       => 'چیدمان باکس های صفحه اصلی',
            'desc'        => '',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'index',
            'settings'  => array(
                array(
                    'id'        => 'name_box',
                    'label'     => 'نوع باکس',
                    'type'      => 'select',
						'choices'     => array(  
							  array(
								'value'       => 'index_slider',
								'label'       => 'اسلایدر',
								'src'         => ''
							  ),
							  array(
								'value'       => 'index_special_offers',
								'label'       => 'تخفیفات ویژه',
								'src'         => ''
							  ),
							  array(
								'value'       => 'index_categories',
								'label'       => 'دسته بندیها',
								'src'         => ''
							  ),
							  array(
								'value'       => 'index_discount_others',
								'label'       => 'دیگر تخفیفات',
								'src'         => ''
							  ),
							  array(
								'value'       => 'index_brands',
								'label'       => 'برندها',
								'src'         => ''
							  )
					)
                ),
            ),   
        ),    
	
	
	array(
            'id'          => 'content_categories',
            'label'       => 'دسته بندی محصولات',
            'desc'        => '',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'index',
            'settings'  => array(
                array(
                    'id'        => 'content_categories_desc',
                    'label'     => 'توضیحات',
                    'type'      => 'text',
                ),
                array(
                    'id'        => 'content_categories_name', // name = id
                    'label'     => 'انتخاب دسته بندی',
                    'type'      => 'taxonomy-select',
                    'taxonomy'  => 'product_cat',

                ),
                array(
                    'id'        => 'content_categories_upload',
                    'label'     => 'آپلود تصویر دسته بندی',
                    'type'      => 'upload',
                ),
                array(
                    'id'        => 'content_categories_upload_icon',
                    'label'     => 'آپلود آیکون دسته بندی',
                    'type'      => 'upload',
                ),
                array(
                    'id'        => 'content_categories_bg',
                    'label'     => 'رنگ پس زمینه عنوان',
                    'type'      => 'colorpicker',
                ),
            ),
        ),
    array(
            'id'          => 'content_brands',
            'label'       => 'برندها',
            'desc'        => '',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'index',
            'settings'  => array(
                array(
                    'id'        => 'content_brands_link',
                    'label'     => 'لینک مرتبط',
                    'type'      => 'text',
                ),
                array(
                    'id'        => 'content_brands_logos',
                    'label'     => 'آپلود تصویر برند',
                    'type'      => 'upload',
                ),
            ),
        ),
/**************************************** single ******************************************/
    array(
            'id'          => 'layout_single',
            'label'       => 'چیدمان باکس های صفحه داخلی',
            'desc'        => '',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'single',
            'settings'  => array(
                array(
                    'id'        => 'name_box',
                    'label'     => 'نوع باکس',
                    'type'      => 'select',
						'choices'     => array(  
							  array(
								'value'       => 'the_excerpt',
								'label'       => 'ویژگی ها',
								'src'         => ''
							  ),
							  array(
								'value'       => 'terms-of-use',
								'label'       => 'شرایط استفاده و اطلاعات فروشنده',
								'src'         => ''
							  ),
							  array(
								'value'       => 'the_content',
								'label'       => 'توضیحات تکمیلی',
								'src'         => ''
							  ),
							  array(
								'value'       => 'google-map',
								'label'       => 'نقشه گوگل و محل نمایش فروشنده',
								'src'         => ''
							  ),
							  array(
								'value'       => 'related-product',
								'label'       => 'محصولات مرتبط',
								'src'         => ''
							  ),
							  array(
								'value'       => 'comments-product',
								'label'       => 'دیدگاه ها',
								'src'         => ''
							  )							  
					)
                ),
            ),   
        ),
    array(
            'id'          => 'farsi_or_latin',
            'label'       => 'نمایش تایمر در صفحه جزئیات محصول',
            'desc'        => '',
            'std'         => 'farsi',
            'type'        => 'radio',
            'section'     => 'single',
						'choices'     => array(  
							  array(
								'value'       => 'farsi',
								'label'       => 'نمایش تایمر اتمام تخفیف با حروف فارسی',
								'src'         => ''
							  ),
							  array(
								'value'       => 'latin',
								'label'       => 'نمایش تایمر اتمام تخفیف با حروف لاتین',
								'src'         => ''
							  ),							  
					)  
        ),
/*************************************** sidebar ****************************************/
    array(
        'id'          => 'sidebar_title_bg',
        'label'       => 'رنگ پس زمینه عنوان ابزارک ها',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'sidebar',
    ),
/*************************************** select_image ******************************************/
  array(
  'id'          => 'cat_best_news_footer',
  'label'       => 'ﺗﺼﺎﻭﯾﺮ ﺑﺮﮔﺰﯾﺪﻩ',
  'desc'        => 'ﺩﺳﺘﻪ ﻫﺎﯾﯽ ﮐﻪ ﻣﺎﯾﻞ ﻫﺴﺘﯿﺪ ﻣﻄﺎﻟﺐ ﺁﻥ ﺩﺭ ﻣﻄﺎﻟﺐ ﺗﺎﺯﻩ ﺳﺎﯾﺪﺑﺎﺭ ﻧﻤﺎﯾﺶ ﺩاﺩﻩ ﺷﻮﺩ ﺭا اﻧﺘﺨﺎﺏ ﮐﻨﯿﺪ.',
  'std'         => '',
  'type'        => 'category-checkbox',
  'section'     => 'select_image',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
  array(
  'id'          => 'num_best_news_footer',
  'label'       => 'ﺗﺼﺎﻭﯾﺮ ﺑﺮﮔﺰﯾﺪﻩ',
  'desc'        => 'ﺗﻌﺪاﺩ ﻣﻄﺎﻟﺒﯽ ﺭا ﮐﻪ ﻣﺎﯾﻞ ﻫﺴﺘﯿﺪ ﺩﺭ ﻣﻄﺎﻟﺐ ﺗﺎﺯﻩ ﺳﺎﯾﺪﺑﺎﺭ ﻧﻤﺎﯾﺶ ﺩاﺩﻩ ﺷﻮﺩ ﺭا اﻧﺘﺨﺎﺏ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '8',
  'type'        => 'numeric-slider',
  'section'     => 'select_image',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '0,100',
  'class'       => '',
  'condition'   => '',
  'operator'    => 'and'
  ),
/****************************************** sharing ********************************************/
  array(
   'id'          => 'list_telegram_footer',
   'label'       => 'ﻟﯿﻨﮏ ﮐﺎﻧﺎﻝ ﻭ ﺗﻮﺿﯿﺤﺎﺕ ﺗﻠﮕﺮاﻡ',
   'desc'        => 'ﻟﯿﻨﮏ ﻫﺎﯾﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺩﺭ اﯾﻦ ﺑﺨﺶ ﻧﻤﺎﯾﺶ ﺩاﺩﻩ ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
   'std'         => '',
   'type'        => 'list-item',
   'section'     => 'sharing',
   'settings'  => array(
    array(
     'id'        => 'link',
     'label'     => 'ﻟﯿﻨﮏ',
     'type'      => 'text',
    ),
   ),
  ),
  array(
   'id'          => 'list_rss_footer',
   'label'       => 'ﻟﯿﻨﮏ اﺷﺘﺮاﮎ rss ﻭ ﺗﻮﺿﯿﺤﺎﺕ',
   'desc'        => 'ﻟﯿﻨﮏ ﻫﺎﯾﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺩﺭ اﯾﻦ ﺑﺨﺶ ﻧﻤﺎﯾﺶ ﺩاﺩﻩ ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
   'std'         => '',
   'type'        => 'list-item',
   'section'     => 'sharing',
   'settings'  => array(
    array(
     'id'        => 'link',
     'label'     => 'ﻟﯿﻨﮏ',
     'type'      => 'text',
    ),
   ),
  ),
  array(
   'id'          => 'list_email_footer',
   'label'       => 'ﻟﯿﻨﮏ ﺗﻮﺿﯿﺤﺎﺕ اﺷﺘﺮاﮎ اﯾﻤﯿﻠﯽ',
   'desc'        => 'ﻟﯿﻨﮏ ﻫﺎﯾﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺩﺭ اﯾﻦ ﺑﺨﺶ ﻧﻤﺎﯾﺶ ﺩاﺩﻩ ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
   'std'         => '',
   'type'        => 'list-item',
   'section'     => 'sharing',
   'settings'  => array(
    array(
     'id'        => 'link',
     'label'     => 'ﻟﯿﻨﮏ',
     'type'      => 'text',
    ),
   ),
  ),

/****************************************** baner  *********************************************/
        array(
            'id'          => 'baner-footer',
            'label'       => 'انتخاب بنر بالای فوتر',
            'desc'        => 'یک عکس با ابعاد 200*1100 انتخاب کنید',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'baner',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),array(
            'id'          => 'baner-footer-link',
            'label'       => 'انتخاب لینک برای بنر بالای فوتر',
            'desc'        => 'یک آدرس برای لینک شدن بر روی عکس بالا وارد نمایید',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'baner',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
        array(
            'id'          => 'baner1',
            'label'       => 'انتخاب بنر شماره 1 کنار اسلایدر',
            'desc'        => 'یک عکس با ابعاد 193*215 انتخاب کنید',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'baner',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
        array(
            'id'          => 'baner2',
            'label'       => 'انتخاب بنر شماره 2 کنار اسلایدر',
            'desc'        => 'یک عکس با ابعاد 193*215 انتخاب کنید',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'baner',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
        ),
/****************************************** Footer  *********************************************/
        /**
        array(
            'id'          => 'contact_us_address_phone_email',
            'label'       => 'ارتباط با ما',
            'desc'        => 'آدرس , شماره تماس  ,  ایمیل',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'footer',
            'settings'  => array(
                array(
                    'id'        => 'contact-bg',
                    'label'     => 'رنگ پس زمینه',
                    'type'      => 'colorpicker',
                ),
                array(
                    'id'          => 'footer_icon',
                    'label'       => 'ﺁﯾﮑﻮﻥ',
                    'desc'        => '',
                    'std'         => '',
                    'type'        => 'radio',
                    'class'       => "Icon_type",
                    'choices'     => $ot_icons
                ),
            ),
        ),


        array(
            'id'          => 'know_us_title',
            'label'       => 'مارا بشناسید - عنوان',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
         **/

        array(
            'id'          => 'footer_know_us_logo',
            'label'       => 'لوگو توضیحات فوتر',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_know_us_desc',
            'label'       => ' توضیحات فوتر',
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_social_telegram',
            'label'       => 'لینک تلگرام',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_social_instagram',
            'label'       => 'لینک اینستاگرام',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_social_facebook',
            'label'       => 'لینک فیسبوک',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_namad',
            'label'       => 'اسکریپت نماد الکترونیک',
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_copyright_txt',
            'label'       => 'متن قانون کپی رایت',
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea',
            'section'     => 'footer',
        ),
		/*
        array(
            'id'          => 'footer_map_latitude',
            'label'       => 'عرض جغرافیایی',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_map_longitude',
            'label'       => 'طول جغرافیایی',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_map_api',
            'label'       => 'کلید API نقشه گوگل',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_map_zoom',
            'label'       => 'مقدار زوم',
            'desc'        => '',
            'std'         => '10',
            'type'        => 'text',
            'section'     => 'footer',
        ),
		*/
        array(
            'id'          => 'footer_map_width',
            'label'       => 'عرض',
            'desc'        => '',
            'std'         => '250',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_map_height',
            'label'       => 'ارتفاع',
            'desc'        => '',
            'std'         => '200',
            'type'        => 'text',
            'section'     => 'footer',
        ),
        array(
            'id'          => 'footer_map_pic',
            'label'       => 'تصویر نقشه',
            'desc'        => 'اگر میخواهید ازتصویر به جای نقشه استفاده کنید ، تصویر خود را آپلود نمایید.',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'footer',
        ),





/**************************************** translate ********************************************/
        array(
            'id'          => 'index_categories',
            'label'       => 'دسته بندی ها',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ دسته بندی ها ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'دسته بندی ها',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'index_special_offers',
            'label'       => 'پیشنهادات ویژه',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ پیشنهادات ویژه ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'پیشنهادات ویژه',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'index_other_discounts',
            'label'       => 'دیـگر تخــفیفـات',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ دیـگر تخــفیفـات ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'دیـگر تخــفیفـات',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'index_brands',
            'label'       => 'بــرنـدهـا',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ بــرنـدهـا ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'بــرنـدهـا',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'single_related_products',
            'label'       => 'محصولات مرتبط  - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ محصولات مرتبط در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'محصولات مرتبط',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'single_related_posts',
            'label'       => 'مطالب مرتبط - صفحه مطلب',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ مطالب مرتبط در صفحه مطلب ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'مطالب مرتبط',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'single_features',
            'label'       => 'ویژگی ها - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ ویژگی ها در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'ویژگی ها',
            'type'        => 'text',
            'section'     => 'translate',
        ),
        array(
            'id'          => 'single_terms_of_use',
            'label'       => 'شرایط استفاده - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ شرایط استفاده در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'شرایط استفاده',
            'type'        => 'text',
            'section'     => 'translate',
            ),
        array(
            'id'          => 'single_product_content',
            'label'       => 'توضیحات تکمیلی - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ توضیحات تکمیلی در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'توضیحات تکمیلی',
            'type'        => 'text',
            'section'     => 'translate',
        ),array(
            'id'          => 'single_map',
            'label'       => 'نقشه آدرس - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ نقشه آدرس در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => 'نقشه آدرس',
            'type'        => 'text',
            'section'     => 'translate',
        ),array(
            'id'          => 'single_comments',
            'label'       => 'دیدگاه ها - صفحه محصول',
            'desc'        => 'ﻣﺘﻨﯽ ﮐﻪ ﻣﯿﺨﻮاﻫﯿﺪ ﺟﺎﯾﮕﺰﯾﻦ دیدگاها در صفحه محصول ﺷﻮﺩ ﺭا ﻭاﺭﺩ ﮐﻨﯿﺪ.',
            'std'         => ' دیدگاها',
            'type'        => 'text',
            'section'     => 'translate',
        ),
/****************************************** 404 ******************************************/
  array(
  'id'          => '404',
  'label'       => '404 ﻣﺘﻦ ﺻﻔﺠﻪ',
  'desc'        => 'ﻣﺘﻦ ﺻﻔﺤﻪ 404 ﺧﻮﺩ ﺭا ﺩﺭ اﯾﻦ ﺑﺎﮐﺲ ﺩﺭﺝ ﻧﻤﺎﺋﯿﺪ.',
  'std'         => '',
  'type'        => 'textarea',
  'section'     => 'not404',
  ),
/****************************************** Others *********************************************/
array(
    'id'          => 'terms_of_use_desc',
    'label'       => 'متن توضیحات شرایط استفاده از وب سایت / فروشگاه',
    'desc'        => '',
    'std'         => '',
    'type'        => 'textarea',
    'section'     => 'shop',
),
array(
    'id'          => 'terms_of_use_items',
    'label'       => 'شرایط استفاده از وب سایت / فروشگاه',
    'desc'        => 'شرایط استفاده از وب سایت / فروشگاه که به صورت ثابت در صفحه همه فروشندگان قرار میگیرد.',
    'std'         => '',
    'type'        => 'list-item',
    'section'     => 'shop',
    'settings'  => array(
        array(
            'id'        => 'term_of_use_img',
            'label'     => 'آپلود تصویر / آیکون',
            'type'      => 'upload',
        ),
    ),
),
/*
array(
            'id'          => 'ostan',
            'label'       => 'استانها',
            'desc'        => 'نام استانها را درج نمائید.',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'shop',
            'settings'  => array(
                array(
                    'id'        => 'none',
                    'label'     => '',
                    'type'      => 'none',
                ),
            ),
            'operator'    => 'and'
        ),
	
array(
            'id'          => 'shahrestan',
            'label'       => 'شهرستانها',
            'desc'        => 'در فیلد تیتر ابتدا نام استان و سپس در فیلد بعد نام هر شهرستان را در یک خط جدید درج نمایید.',
            'std'         => '',
            'type'        => 'list-item',
            'section'     => 'shop',
            'settings'  => array(
                array(
                    'id'        => 'banner',
                    'label'     => 'نام شهرستانها',
                    'type'      => 'textarea-simple',
                ),
            ),
            'operator'    => 'and'
        ),
	*/
array(
	'id'          => 'manategh',
	'label'       => 'مناطق',
	'desc'        => 'در فیلد تیتر ابتدا نام شهر را ثبت نمایید و سپس نام هر منطقه ر دریک خط جدید درج نمایید.',
	'std'         => '',
	'type'        => 'list-item',
	'section'     => 'shop',
	'settings'  => array(
		array(
			'id'        => 'banner',
			'label'     => 'نام مناطق',
			'type'      => 'textarea--simple',
		),
	),
),
/****************************************** Init Tabs *********************************************/
 ),

 'sections'        => array(
      array(
        'id'          => 'general',
        'title'       => 'ﺗﻨﻈﯿﻤﺎﺕ ﻋﻤﻮﻣﯽ'
      ),
     array(
         'id'          => 'baner',
         'title'       => 'ﺗﻨﻈﯿﻤﺎﺕ بنرهای تبلیغات'
     ),
   array(
        'id'          => 'header',
        'title'       => 'ﺗﻨﻈﯿﻤﺎﺕ ﻫﺪﺭ'
      ),
   array(
        'id'          => 'index',
        'title'       => 'ﺗﻨﻈﯿﻤﺎﺕ ﺻﻔﺤﻪ اﺻﻠﯽ'
      ),
   array(
        'id'          => 'single',
        'title'       => 'تنظیمات صفحه داخلی'
      ),
    array(
       'id'          => 'sidebar',
       'title'       => 'ﺗﻨﻈﯿﻤﺎﺕ ﺳﺎﯾﺪﺑﺎﺭ'
     ),
   array(
        'id'          => 'footer',
        'title'       => 'ﻓﻮﺗﺮ'
      ),

   array(
        'id'          => 'translate',
        'title'       => 'ﻣﻌﺎﺩﻝ ﻫﺎ'
      ),
   array(
        'id'          => 'not404',
        'title'       => '404'
      ),
     array(
         'id'          => 'shop',
         'title'       => 'تنظیمات فروشگاه'
     ),
    ),
/****************************************** Init *********************************************/
  );

  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

}
