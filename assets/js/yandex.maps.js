if ($('#map').length > 0) {

    ymaps.ready(init);

    function init() {
        var myPlacemark,
            myMap = new ymaps.Map('map', {
                center: [41.008238, 28.978359],
                zoom: 7,
                controls: ['zoomControl', 'searchControl']
            }, {
                searchControlProvider: 'yandex#search'
            });

        if ($('#map').data('latlng') && $('#map').data('address')) {
            var latlng = $('#map').data('latlng').split(",");
            myPlacemark = new ymaps.Placemark(latlng, {
                iconCaption: $('#map').data('address')
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
            myMap.geoObjects.add(myPlacemark);
        }

        // Listening for a click on the map
        myMap.events.add('click', function (e) {
            var coords = e.get('coords');
            console.log(coords);
            // Moving the placemark if it was already created
            if (myPlacemark) {
                myPlacemark.geometry.setCoordinates(coords);
            }
            // Otherwise, creating it.
            else {
                myPlacemark = createPlacemark(coords);
                myMap.geoObjects.add(myPlacemark);
                // Listening for the dragging end event on the placemark.
                myPlacemark.events.add('dragend', function () {
                    getAddress(myPlacemark.geometry.getCoordinates());
                });
            }
            getAddress(coords);
        });

        // Creating a placemark
        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                iconCaption: 'Aranıyor...'
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
        }

        // Determining the address by coordinates (reverse geocoding).
        function getAddress(coords) {
            myPlacemark.properties.set('iconCaption', 'Aranıyor...');
            ymaps.geocode(coords).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0);
                $('#latlng').val(firstGeoObject.geometry.getCoordinates().join(','));
                $('#address_location').val(firstGeoObject.getAddressLine());
                myPlacemark.properties
                    .set({
                        // Forming a string with the object's data.
                        iconCaption: [
                            // The name of the municipality or the higher territorial-administrative formation.
                            firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                            // Getting the path to the toponym; if the method returns null, then requesting the name of the building.
                            firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                        ].filter(Boolean).join(', '),
                        // Specifying a string with the address of the object as the balloon content.
                        balloonContent: firstGeoObject.getAddressLine()
                    });
            });
        }
    }
} // maps