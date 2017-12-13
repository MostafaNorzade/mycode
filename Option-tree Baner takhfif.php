<div class="">
    <div class="row1">
        <?php
        $list_item = ot_get_option('baner4tae');
        $count = 0;
        if ($list_item) {
            foreach ($list_item as $item) {
                $count++;
                ?>
                <div class="baner-item">
                    <div class="wpb_wrapper">
                        <a href="<?php echo $item['baner4-link'] ?>">
                            <div class="entry iconbox">
                                <div class="entry-icon">
                                    <span class="<?php echo $item['baner4_icon'] ?>"></span>
                                </div>
                                <div class="entry-data">
                                    <div class="entry-header">
                                        <div class="entry-title"><?php echo $item['baner4-titr'] ?></div>
                                    </div><!-- header -->
                                    <div class="entry-content"><p><?php echo $item['baner4-tozih'] ?></p>
                                    </div>
                                </div><!-- data -->
                            </div>
                        </a><!-- entry -->
                    </div>
                </div>

                <?php
            } // end foreach
        }   // end if
        ?>
    </div>
</div>


<?php
//------------------------------------------------------------------------------------------------
//------------------------------option tree ( theme-option.php ) ---------------------------------

array(
			'id'          => 'baner4tae',
			'label'       => 'تنظیمات بنر 4 تایی صفحه اصلی . لطفا 4 بخش برای این بنر تنظیم کنید .',
			'desc'        => '',
			'std'         => '',
			'type'        => 'list-item',
			'section'     => 'baner',
			'settings'  => array(
				array(
					'id'        => 'baner4-titr',
					'label'     => 'تیتر اصلی',
					'type'      => 'text',
				),
				array(
					'id'        => 'baner4-tozih',
					'label'     => ' توضیحات اصلی',
					'type'      => 'text',
				),
				array(
					'id'        => 'baner4-link',
					'label'     => 'لینک',
					'type'      => 'text',
				),
				array(
					'id'          => 'baner4_icon',
					'label'       => 'ﺁﯾﮑﻮﻥ',
					'desc'        => '',
					'std'         => '',
					'type'        => 'radio',
					'class'       => "Icon_type",
					'choices'     => $ot_icons
				),
			),
		),
?>




<style>
    .baner-item {
        width: 25%;
        float: right;
    }

    .row1 {
        background-color: #f7f7f7;
        height: 110px;
        box-shadow: 4px 3px 9px -1px rgba(186, 186, 186, 0.82);
        margin-top: 40px;
    }

    .entry-icon {
        font-size: 38px;
        color: #959799;
        float: left;
        margin-left: 15px;
        line-height: 1;
    }

    .entry.iconbox {
        margin-top: 30px !important;
        margin-bottom: 30px !important;
        display: -webkit-box;
        display: -ms-flexbox;
        -webkit-display: flex;
        -khtml-display: flex;
        -moz-display: flex;
        display: flex;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-box-align: center;
        -o-box-align: center;
        box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        -khtml-align-items: center;
        -moz-align-items: center;
        align-items: center;
        -webkit-box-orient: horizontal;
        -moz-box-orient: horizontal;
        -ms-box-orient: horizontal;
        -o-box-orient: horizontal;
        box-orient: horizontal;
        -webkit-flex-direction: row;
        -khtml-flex-direction: row;
        -moz-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        -khtml-justify-content: center;
        -moz-justify-content: center;
        justify-content: center;
    }

    .entry.iconbox .entry-data {
        float: right;
    }

    .entry.iconbox .entry-data .entry-header .entry-title {
        line-height: 20px;
        font-weight: 700;
        color: #000000;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .entry.iconbox .entry-data .entry-content p {
        margin-bottom: 0;
        color: initial;
    }
</style>
