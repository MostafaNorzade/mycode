<?php get_header(); ?>
    <!--wrapper-->
    <section id="wrapper">
        <div class="container">
            <div class="row">
                <?php  get_template_part( 'partials/archive_product_breadcrumb'); ?>
                <?php 
				if(! is_paged() ) get_template_part( 'partials/archive_product_slider'); 
				?>
                <div class="clear"></div>
                <?php  get_template_part( 'partials/archive_product_related_posts'); ?>
                <div class="clear"></div>
                <?php  get_template_part( 'partials/archive_product_category_desc'); ?>
            </div>
        </div>
    </section>
<?php /***************************************************************************/ ?>
<?php
global $seller_details;
$loc_arr = array();
while(have_posts()) : the_post(); global $post,$product;
    $loc_arr[get_the_ID()] = get_post_meta(get_the_ID(), 'takhfif_location', true);
endwhile;
wp_reset_query();

$locations = array();
$i = 1;
foreach( $loc_arr as $key => $str ){
    $temp = array();
    $ex = explode(',', $str);
    $post_x = get_post($key);
    $temp[0] = $post_x->post_title;
    $temp[1] = $ex[0];
    $temp[2] = $ex[1];
    $temp[3] = $i;

    $locations[] = $temp;

    $i ++;
}

$locations = json_encode($locations);

?>
    <div class="address_map box_single">
        <div class="title_block"><span><?php echo opt('single_map');?></span></div>
        <div class="box_map">
            <!--map-->
            <div id="map_sellers" style="width:100%;height:400px;"></div>
            <!--                <div class="label_map"><i class="fa fa-map-o"></i><span>مشاهده آدرس روی نقشه</span></div>-->
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_option('dokan_general')['gmap_api_key'];?>"></script>
    <script>
        var $locations = '<?php echo $locations; ?>';
        $locations = JSON.parse($locations);

        for(var i = 0; i < $locations.length; i++){
            var x_ave = 0;
            var y_ave = 0;
            for(var j = 0; j < $locations.length; j++) {
                x_ave += Number($locations[j][1]);
                y_ave += Number($locations[j][2]);
            }
        }

        x_ave /= Number($locations.length);
        y_ave /= Number($locations.length);

        var locations = $locations;

        var map = new google.maps.Map(document.getElementById('map_sellers'), {
            zoom: 12,
            center: new google.maps.LatLng(x_ave, y_ave),
            mapTypeId: google.maps.MapTypeId.terrain,
            mapTypeControl: true,
            panControl: true,
            zoomControl: true,
            scaleControl: true,
            streetViewControl: false,
            overviewMapControl: true,
            rotateControl: false,
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
<?php /***************************************************************************/ ?>
<?php get_footer(); ?>