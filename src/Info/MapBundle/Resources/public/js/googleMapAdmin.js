function getLocation(value) {
    var loc;
    var lat;
    var lng;
    if (value) {
        var input = value;
        input = input.replace('(', '');
        var latlngStr = input.split(",", 2);
        lat = parseFloat(latlngStr[0]);
        lng = parseFloat(latlngStr[1]);
    }
    else {
        lat = 42.87797684287408;
        lng = 74.607253074646;
    }
    loc = new google.maps.LatLng(lat, lng);
    return loc;
}
/**
 * Created by Admin on 25.11.13.
 */

function initialize(id,value) {
    var loc = getLocation(value);
    $("#" + id).val(loc);

    var mapOptions = {
        center: loc,
        zoom: value==null?10:17,
        draggableCursor: 'crosshair'
    };

    var map = new google.maps.Map(document.getElementById("map-canvas-"+id), mapOptions);


    var marker = new google.maps.Marker({
        position: loc,
        map: map
    });

    google.maps.event.addListener(map, 'click', function (event) {
        marker.setPosition(event.latLng);
        map.setCenter(event.latLng);
        $("#" + id).val(event.latLng);
    });
}