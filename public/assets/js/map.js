/* Alternatively, you can target your input element by ID
   Replace querySelector('input[name="search_input"]') with getElementById('search_input') 
   and insert id="search_input" in your form's input field
   You can add Component Restrictions to Limit Countries
   componentRestrictions: {
       country: 'us',
       country: 'ph',
    }*/
var searchInput = document.querySelector('input[name="country"]');
document.addEventListener('DOMContentLoaded', function() {
    var autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ['geocode'],
        
    });
    autocomplete.addListener('place_changed', function() {
        var near_place = autocomplete.getPlace();
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById('cityLat').value = lat;
        document.getElementById('cityLng').value = lng;
    });
});


