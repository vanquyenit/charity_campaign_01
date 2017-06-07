function initMap() {
    var lat = $('#googleMap').data('lat');
    var lng = $('#googleMap').data('lng');
    var uluru = {lat: lat, lng: lng};
    var map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 16,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
