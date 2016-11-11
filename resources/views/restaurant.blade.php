@extends('layouts.getNearby')

@section('title')
<div class="panel-heading">Restraunts Nearby!</div>
@endsection
@section('script')
<script>
    var map;
    var radius=1000;
    var increaseRadiusFlag = 0;
    function searchPlace() {
        var browserLocation;
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 15
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };
                map.setCenter(pos);
            var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: map.getCenter(),
            radius: radius,
            type: ['restaurant']
        }, callback);
              }, function() {
              });
        }
    }

    function increaseRadius(){
        radius = radius +1000;
        increaseRadiusFlag =1;
        searchPlace();
    }

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var div = document.getElementById('content');
                var id = results[i].place_id;
                var addedText = "<a id = "+results[i].place_id+">"+results[i].name+"</a>";
                div.innerHTML = div.innerHTML + addedText;
                div.innerHTML = div.innerHTML + "<hr>"
            }
            $("a").click(function(){
                window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
            });
        }
        if (status === google.maps.places.PlacesServiceStatus.ZERO_RESULTS){
            if(increaseRadiusFlag==1){
                increaseRadius();
            }else{
                var div = document.getElementById('content');
                div.innerHTML = "<p>We Found no results. Would you like to increase the search radius?</p>"+"<button onClick='increaseRadius()'>Increase Radius</button>"+"<hr>";
            }
        }
    }
</script>
@endsection