<?php
global $seller_details;
//if ($seller_details['location']){?>
	<!--address map-->
	<div class="address_map box_single">
		<div class="title_block"><span><?php echo opt('single_map');?></span></div>
		<div class="box_map">
			<!--map-->
			<div id="map_sellers" style="width:100%;height:400px;"></div>
			<!--		<div class="label_map"><i class="fa fa-map-o"></i><span>مشاهده آدرس روی نقشه</span></div>-->
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
<?php //} ?>