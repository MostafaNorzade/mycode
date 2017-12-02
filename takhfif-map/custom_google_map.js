// dokan_address_select.init();
jQuery(document).ready(function($){
    var $input_area = $( '#dokan-map-lat' );

    var def_zoomval = 12;
    // var def_latval  = $input_area.val().split( ',' )[0];
    // var def_longval = $input_area.val().split( ',' )[1];
    var def_latval  = 35.7408503;
    var def_longval = 51.4510554;

    var curpoint = new google.maps.LatLng(def_latval, def_longval),
        geocoder   = new window.google.maps.Geocoder(),
        $map_area = $('#dokan-map'),
        $input_add = $( '#dokan-map-add' );

    if($map_area[0]){

        var gmap = new google.maps.Map( $map_area[0], {
            center: curpoint,
            zoom: def_zoomval,
            mapTypeId: window.google.maps.MapTypeId.ROADMAP
        });

        var marker = new window.google.maps.Marker({
            position: curpoint,
            map: gmap,
            draggable: true
        });

        window.google.maps.event.addListener( gmap, 'click', function ( event ) {
            marker.setPosition( event.latLng );
            updatePositionInput( event.latLng );
        } );

        window.google.maps.event.addListener( marker, 'drag', function ( event ) {
            updatePositionInput(event.latLng );
        } );


        // autoCompleteAddress();

        function updatePositionInput( latLng ) {
            $input_area.val( latLng.lat() + ',' + latLng.lng() );
        }

        function updatePositionMarker() {
            var coord = $input_area.val(),
                pos, zoom;

            if ( coord ) {
                pos = coord.split( ',' );
                marker.setPosition( new window.google.maps.LatLng( pos[0], pos[1] ) );

                zoom = pos.length > 2 ? parseInt( pos[2], 10 ) : 12;

                gmap.setCenter( marker.position );
                gmap.setZoom( zoom );
            }
        }

        function geocodeAddress( address ) {
            geocoder.geocode( {'address': address}, function ( results, status ) {
                if ( status == window.google.maps.GeocoderStatus.OK ) {
                    updatePositionInput( results[0].geometry.location );
                    marker.setPosition( results[0].geometry.location );
                    gmap.setCenter( marker.position );
                    gmap.setZoom( 15 );
                }
            } );
        }

        function autoCompleteAddress(){
            if (!$input_add) return null;

            $input_add.autocomplete({
                source: function(request, response) {
                    // TODO: add 'region' option, to help bias geocoder.
                    geocoder.geocode( {'address': request.term }, function(results, status) {
                        response(jQuery.map(results, function(item) {
                            return {
                                label     : item.formatted_address,
                                value     : item.formatted_address,
                                latitude  : item.geometry.location.lat(),
                                longitude : item.geometry.location.lng()
                            };
                        }));
                    });
                },
                select: function(event, ui) {

                    $input_area.val(ui.item.latitude + ',' + ui.item.longitude );

                    var location = new window.google.maps.LatLng(ui.item.latitude, ui.item.longitude);

                    gmap.setCenter(location);
                    // Drop the Marker
                    setTimeout( function(){
                        marker.setValues({
                            position    : location,
                            animation   : window.google.maps.Animation.DROP
                        });
                    }, 1500);
                }
            });
        }
    }

});
