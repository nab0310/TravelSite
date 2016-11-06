@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are now logged in!
                </div>
            <div class="panel-heading">What do you want to find nearby?</div>

            &nbsp;<a href="{{ url('/places/restaurant') }}">Restraunt</a>     |
            <a href="{{ url('/places/store') }}">Store</a>      |
            <a href="{{ url('/places/liquor_store') }}">Liquor Store</a>        |
            <a href="{{ url('/places/airport') }}">Airports</a>     |
            <a href="{{ url('/places/lodging') }}">Lodging</a>

            
        </div>
        <div class="panel panel-default">
                <div id="locationField">
                            <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
                        </div>
                        <div id="content"></div>
                        <div id="map"></div>

                        <script type="text/javascript">
                            var placeSearch, autocomplete;
                            function initAutoComplete() {
                                // Create the autocomplete object, restricting the search to geographical
                                // location types.
                                autocomplete = new google.maps.places.Autocomplete(
                                    (document.getElementById('autocomplete')),
                                    {types: ['geocode']});

                                // When the user selects an address from the dropdown, populate the address
                                // fields in the form.
                                autocomplete.addListener('place_changed', fillInAddress);
                            }
                            function fillInAddress() {
                                // Get the place details from the autocomplete object.
                                var place = autocomplete.getPlace();
                                 document.getElementById('content').innerHTML = place.formatted_address;
                                 goToCity(place.geometry.location.lat(), place.geometry.location.lng());
                            }

                            function geolocate() {
                                if (navigator.geolocation) {
                                  navigator.geolocation.getCurrentPosition(function(position) {
                                    var geolocation = {
                                      lat: position.coords.latitude,
                                      lng: position.coords.longitude
                                    };
                                    var circle = new google.maps.Circle({
                                      center: geolocation,
                                      radius: position.coords.accuracy
                                    });
                                    autocomplete.setBounds(circle.getBounds());
                                  });
                                }
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00&libraries=places&callback=initAutoComplete" async defer></script>
                </div>

        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function goToCity(lat, lng) {
        var c = $("#city").text();
        window.location = "{{ url('/places/searchCity') }}"+"/"+lat+"/"+lng;
    }
</script>
@endsection