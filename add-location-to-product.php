<?php

//======================================================
//----------------- Add Metabox to product page --------
//======================================================
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


//=============================================================
//------------------ google-map.php ---------------------------    
//=============================================================
global $seller_details;
?>

<div class="address_map box_single">
    <div class="title_block"><span><?php echo opt('single_map');?></span></div>
    <div class="box_map">
        <div id="map_sellers" style="width:100%;height:400px;"></div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_option('dokan_general')['gmap_api_key'];?>"></script>
<script>
    function single_product_map() {
        var mapOptions_sellers = {
            center: new google.maps.LatLng(<?php echo get_post_meta(get_the_ID(), 'takhfif_location', true); ?>),
            zoom: <?php echo ot_get_option('footer_map_zoom', 15); ?>,
            mapTypeId: google.maps.MapTypeId.terrain,
            mapTypeControl: true,
            panControl: true,
            zoomControl: true,
            scaleControl: true,
            streetViewControl: false,
            overviewMapControl: true,
            rotateControl: false,
        };
        var map_sellers = new google.maps.Map(document.getElementById("map_sellers"), mapOptions_sellers);
        var marker_sellers = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo get_post_meta(get_the_ID(), 'takhfif_location', true); ?>),
            map: map_sellers,
            title: '<?php echo $seller_details['store_name']; ?>'
        });
    }
    single_product_map();
</script>


<?php
//------------------- add google-map.php to single-product ---------------


//=================================================================
//------------ Add google locations to archive page ---------------
//=================================================================

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