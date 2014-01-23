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


/**
 *
 * @returns {StyledMapType}
 */
function getStyledMap() {
    var styles = [
        {
            "featureType": "poi",
            "stylers": [
                { "visibility": "off" }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry.fill",
            "stylers": [
                { "visibility": "on" }
            ]
        }
    ];

    // Create a new StyledMapType object, passing it the array of styles,
    // as well as the name to be displayed on the map type control.
    var styledMap = new google.maps.StyledMapType(styles,
        {name: "Styled Map"});
    return styledMap;
}

function initialize(element)
{
    var mapOptions = {
        center: getLocation(null),
        zoom: 10,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
    };
    mapFront = new google.maps.Map(element, mapOptions);


    infowindow = new google.maps.InfoWindow({
        maxWidth: 200
    });

    //Associate the styled map with the MapTypeId and set it to display.
    var styledMap = getStyledMap();
    mapFront.mapTypes.set('map_style', styledMap);
    mapFront.setMapTypeId('map_style');
    return Array(mapFront,infowindow);
}
function initializeFront(mapFront,infowindow,value,address,content,icon) {
    var marker = new google.maps.Marker({
        position: getLocation(value),
        map: mapFront,
        title: address,
        icon: icon
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(content);
        infowindow.open(mapFront,marker);
    });
    return marker;
}