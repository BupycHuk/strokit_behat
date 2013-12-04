/**
 * Created by Admin on 04.12.13.
 */
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
var mapFront;
var infowindow;
function initialize()
{
    var mapOptions = {
        center: getLocation(null),
        zoom: 10
    };
    mapFront = new google.maps.Map(document.getElementById("map-canvas-front"), mapOptions);


    infowindow = new google.maps.InfoWindow({
        maxWidth: 200
    });
}

function initializeFront(value,address,content) {
    var marker = new google.maps.Marker({
        position: getLocation(value),
        map: mapFront,
        title: address
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(content);
        infowindow.open(mapFront,marker);
    });
}