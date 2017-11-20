<?php
/**
* Initialize the custom Meta Boxes. 
*/
add_action( 'admin_init', 'custom_meta_boxes' );
/**
* Meta Boxes demo code.
*
* You can find all the available option types in demo-theme-options.php.
*
* @return    void
* @since     2.0
*/
function custom_meta_boxes() {
	require( trailingslashit( get_template_directory() ) . 'option-tree/ot_icon.php' );
	$cities = ot_get_option('manategh', array());
	foreach($cities as $citie) {
		$cities_for_meta_box[] = array('value'=>$citie['title'] ,'label'=> $citie['title']);
	}	
	/**
	* Create a custom meta boxes array that we pass to 
	* the OptionTree Meta Box API Class.
	*/
	$my_meta_box = array(
		'id'          => 'product_info_',
		'title'       => 'اطلاعات محصول و فروشنده',
		'desc'        => '',
		'pages'       => array( 'product' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
      array(
        'label'       => 'تاریخ پایان خرید تخفیف',
        'id'          => 'tab1',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'custom_sale_price_dates_to',
				'label'       => 'بر روی فیلد کلیک کنید و تاریخ پایان مهلت خرید را انتخاب کنید.',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'ساعت پایان خرید تخفیف',
        'id'          => 'tab2',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'custom_sale_price_time_to',
				'label'       => 'اگر میخواهید در ساعت خاصی مهلت خرید پایان یابد ساعت مورد نظر رو انتخاب کنید <br>
				AM به معنای قبل از ظهر است و <br>
				PM به معنای بعد از ظهر است. <br>
				مقدار پیشفرض ساعت 23:59 دقیقه است.',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'ساعات پاسخگویی',
        'id'          => 'tab3',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'service_hours',
				'label'       => 'ساعت هایی را که مشتری میتواند مراجعه کند را درج کنید.',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'روز های پاسخگویی',
        'id'          => 'tab4',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'service_days',
				'label'       => 'روزهایی که مایل به خدمات دهی هستید رو تیک بزنید',
				'desc'        => '',
				'type'        => 'checkbox',
				'class'       => '',
				'choices'     => array( 
				  array(
					'value'       => 'شنبه',
					'label'       => 'شنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'یکشنبه',
					'label'       => 'یکشنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'دوشنبه',
					'label'       => 'دوشنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'سه شنبه',
					'label'       => 'سه شنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'چهارشنبه',
					'label'       => 'چهارشنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'پنجشنبه',
					'label'       => 'پنجشنبه',
					'src'         => ''
				  ),
				  array(
					'value'       => 'جمعه',
					'label'       => 'جمعه',
					'src'         => ''
				  ),
		
				)
			),
      array(
        'label'       => 'شهر فروشنده',
        'id'          => 'tab5',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'seller_cities',
				'label'       => 'شهر فروشنده رو انتخاب کنید. قبلا این شهرها رو باید در تنظیمات قالب درج کرده باشید',
				'desc'        => '',
				'type'        => 'select',
				'class'       => '',
				'choices'     => $cities_for_meta_box,
			),
      array(
        'label'       => 'نام منطقه',
        'id'          => 'tab6',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'seller_area',
				'label'       => 'نام منطقه یا همان محله را برای فروشنده انتخاب کنید.',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'شماره تماس',
        'id'          => 'tab7',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'seller_phone',
				'label'       => 'شماره تماس فروشنده',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'آدرس',
        'id'          => 'tab8',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'seller_address',
				'label'       => 'آدرس کامل فروشگاه فروشنده',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
      array(
        'label'       => 'لوگوی فروشنده',
        'id'          => 'tab9',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'avatar',
				'label'       => 'لوگوی فروشنده را با عرض و ارتفاع  150X150    پیکسل آپلود کنید.',
				'desc'        => '',
				'type'        => 'upload',
				'class'       => '',
			),
      array(
        'label'       => 'مهلت استفاده',
        'id'          => 'tab10',
        'type'        => 'tab'
      ),
			array(
				'id'          => 'mohlate_estefadeh',
				'label'       => 'تاریخ مهلت استفاده از این تخفیف رو در صورت خرید کاربر مشخص کنید.',
				'desc'        => '',
				'type'        => 'text',
				'class'       => '',
			),
		)
	);

	if ( function_exists( 'ot_register_meta_box' ) ){
		ot_register_meta_box( $my_meta_box );
	}

}
?>