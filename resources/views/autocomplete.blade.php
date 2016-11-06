@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">AutoCompelete!</div>

                    <div class="panel-body">
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
                                 document.getElementById('content').innerHTML = place.place_id;
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
    </div>
</div>
@endsection