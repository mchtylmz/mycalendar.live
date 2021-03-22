<!DOCTYPE html>
<!-- @mchtylmz149 -->
<html lang="tr" class="no-js">
<head>
<meta charset="utf-8">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?=site_setting('description')?>">
<meta name="keywords" content="<?=site_setting('keywords')?>">
<meta name="author" content="mchtylmz149, mucahityilmaz.mail@gmail.com">
<meta name="copyright" content="Copyright <?=date('Y')?>">
<title><?=(isset($PageTitle) ? $PageTitle . ' - ':'') . site_setting('title')?></title>
<!-- Favicon -->
<link rel="icon" href="<?=uploads_url(site_setting('favicon'))?>">
<!-- Fonts -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">
<!-- Plugins -->
<link rel="stylesheet" href="<?=assets_url('css/backend.min.css')?>?v=1.0.1">
<link rel="stylesheet" href="<?=assets_url('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')?>">
<link rel="stylesheet" href="<?=assets_url('vendor/remixicon/fonts/remixicon.css')?>">
<link rel="stylesheet" href="<?=assets_url('css/style.css')?>">
<!-- Custom Header Code -->
<?=$this->renderSection("header_code")?>
<!-- Script -->
<script type="text/javascript">
 var _base_url  = "<?=site_url()?>";
 var _csrftoken = "<?=csrf_hash()?>";
 var _csrfname  = "<?=csrf_token()?>";
</script>
</head>
<body class="fixed-top-navbar <?=uri_string() == 'calendar' ? 'top-nav':''?> <?=dark_mode() ? 'dark':''?>">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center"></div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
<?=$this->renderSection("nav")?>
<?=$this->renderSection("page_content")?>
</div>
<!-- Wrapper End-->
<!-- script -->
<script src="<?=assets_url('js/backend-bundle.min.js')?>"></script>
<script src="<?=assets_url('js/customizer.js')?>"></script>
<script src="<?=assets_url('js/app.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=site_setting('google_map_javascript_key')?>&callback=initMap&libraries=&v=weekly" defer></script>
<!-- Custom Footer Code -->
<?=$this->renderSection("footer_code")?>
<script type="text/javascript">
    let map;
    let markers = [];
    window.map_styles = [
        /*
      { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
      { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
      { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
      {
        featureType: "administrative.locality",
        elementType: "labels.text.fill",
        stylers: [{ color: "#d59563" }],
      },
      {
        featureType: "poi",
        elementType: "labels.text.fill",
        stylers: [{ color: "#d59563" }],
      },
      {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{ color: "#263c3f" }],
      },
      {
        featureType: "poi.park",
        elementType: "labels.text.fill",
        stylers: [{ color: "#6b9a76" }],
      },
      {
        featureType: "road",
        elementType: "geometry",
        stylers: [{ color: "#38414e" }],
      },
      {
        featureType: "road",
        elementType: "geometry.stroke",
        stylers: [{ color: "#212a37" }],
      },
      {
        featureType: "road",
        elementType: "labels.text.fill",
        stylers: [{ color: "#9ca5b3" }],
      },
      {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{ color: "#746855" }],
      },
      {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [{ color: "#1f2835" }],
      },
      {
        featureType: "road.highway",
        elementType: "labels.text.fill",
        stylers: [{ color: "#f3d19c" }],
      },
      {
        featureType: "transit",
        elementType: "geometry",
        stylers: [{ color: "#2f3948" }],
      },
      {
        featureType: "transit.station",
        elementType: "labels.text.fill",
        stylers: [{ color: "#d59563" }],
      },
      {
        featureType: "water",
        elementType: "geometry",
        stylers: [{ color: "#17263c" }],
      },
      {
        featureType: "water",
        elementType: "labels.text.fill",
        stylers: [{ color: "#515c6d" }],
      },
      {
        featureType: "water",
        elementType: "labels.text.stroke",
        stylers: [{ color: "#17263c" }],
      },
        */
    ];
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: {lat: 41.008238, lng: 28.978359},
            styles: map_styles
        });
        const geocoder = new google.maps.Geocoder();
        map.addListener("click", (mapsMouseEvent) => {
            document.getElementById("latlng").value = mapsMouseEvent.latLng.toUrlValue();
            geocodeLatLng(geocoder, map, 'map');
        });
        document.getElementById("map_search").addEventListener("click", () => {
            geocodeLatLng(geocoder, map, 'input');
        });
    }


    function geocodeLatLng(geocoder, map, clickType = 'input') {
        const input = document.getElementById("latlng").value;
        const latlngStr = input.split(",", 2);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        var address = document.getElementById("address_location").value;
        var geocode_json = {address: address};
        if (clickType === 'map') {
            geocode_json = {location: latlng};
        }
        geocoder.geocode(geocode_json, (results, status) => {
            if (status === "OK") {
                if (results[0]) {
                    map.setCenter(results[0].geometry.location);
                    deleteMarkers();
                    map.setZoom(14);
                    const marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                    });
                    markers.push(marker);
                    document.getElementById("address_location").value = results[0].formatted_address;
                    document.getElementById("latlng").value = results[0].geometry.location.toUrlValue();
                } else {
                    window.alert("Sonuç Bulunamadı!");
                }
            } else {
                window.alert("Geocoder şu nedenle başarısız oldu: " + status);
            }
        });
    }


    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
    $("form").submit(function () {
        var btn_submit = "button[type=submit]";
        $(btn_submit)
            .attr('prev-text', $(btn_submit).text())
            .attr('disabled', 'disabled')
            .html('<i class="fas fa-spinner fa-pulse"></i>');
        if (document.querySelector('#editor')) {
            let myEditor = document.querySelector('#editor');
            if ($(this).find('textarea[name=content]').length <= 0) {
                $(this).append('<textarea style="display:none" name="content"></textarea>');
            }
            $(this).find('textarea[name=content]').val(myEditor.children[0].innerHTML);
        }
    });
</script>
</body>
</html>
