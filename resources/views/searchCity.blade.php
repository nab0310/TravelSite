@extends('layouts.getNearby')

@section('title')
<div class="panel-heading">Restraunts Near Latitude: {{$lat}} Longitude: {{$lng}}</div>
@endsection
@section('script')
<script>
    var map;
    var radius=5000;
    var increaseRadiusFlag = 0;
    var showingRestrauntsStart=0;
    var showingRestrauntsEnd =5;
    var showingStoresStart =0;
    var showingStoresEnd =5;
    var showingHotelsStart =0;
    var showingHotelsEnd =5;
    var showingAirportsStart =0;
    var ShowingAirportsEnd =5;
    var restrauntResults;
    var airportResults;
    var hotelResults;
    var storeResults;
    var givenLat = {{ $lat }};
    var givenLng = {{ $lng }};
    function showMoreRestraunts(){
        showingRestrauntsStart +=5;
        showingRestrauntsEnd += 5;
        for (var i = showingRestrauntsStart; i < showingRestrauntsEnd; i++) {
                var div = document.getElementById('content');
                var id = restrauntResults[i].place_id;
                var addedText = "<a id = "+restrauntResults[i].place_id+">"+restrauntResults[i].name+"</a>";
                div.innerHTML = div.innerHTML + addedText;
                div.innerHTML = div.innerHTML + "<hr>"
            }
            $("a").click(function(){
                window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
            });
    }
    function showMoreAirports(){
    showingAirportsStart +=5;
    showingAirportsEnd += 5;
    for (var i = showingAirportsStart; i < showingAirportsEnd; i++) {
            var div = document.getElementById('airports');
            var id = airportResults[i].place_id;
            var addedText = "<a id = "+airportResults[i].place_id+">"+airportResults[i].name+"</a>";
            div.innerHTML = div.innerHTML + addedText;
            div.innerHTML = div.innerHTML + "<hr>"
        }
        $("a").click(function(){
            window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
        });
    }
    function showMoreStores () {
        showingStoresStart +=5;
        showingStoresEnd += 5;
         for (var i = showingStoresStart; i < showingStoresEnd; i++) {
            var div = document.getElementById('stores');
            var id = storeResults[i].place_id;
            var addedText = "<a id = "+storeResults[i].place_id+">"+storeResults[i].name+"</a>";
            div.innerHTML = div.innerHTML + addedText;
            div.innerHTML = div.innerHTML + "<hr>"
        }
        $("a").click(function(){
            window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
        });
    }
    function showMoreHotels () {
        showingHotelsStart +=5;
        showingHotelsEnd += 5;
         for (var i = showingHotelsStart; i < showingHotelsEnd; i++) {
            var div = document.getElementById('lodging');
            var id = hotelResults[i].place_id;
            var addedText = "<a id = "+hotelResults[i].place_id+">"+hotelResults[i].name+"</a>";
            div.innerHTML = div.innerHTML + addedText;
            div.innerHTML = div.innerHTML + "<hr>"
        }
        $("a").click(function(){
            window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
        });
    }
    function searchPlace() {
        var browserLocation;
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24, lng:  44},
            zoom: 15
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: givenLat,
                  lng: givenLng
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
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: givenLat,
                  lng: givenLng
                };
                map.setCenter(pos);
            var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: map.getCenter(),
            radius: radius,
            type: ['lodging']
        }, callbackLodging);
              }, function() {
              });
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: givenLat,
                  lng: givenLng
                };
                map.setCenter(pos);
            var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: map.getCenter(),
            radius: radius,
            type: ['stores']
        }, callbackStores);
              }, function() {
              });
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: givenLat,
                  lng: givenLng
                };
                map.setCenter(pos);
            var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: map.getCenter(),
            radius: radius,
            type: ['airport']
        }, callbackAirports);
              }, function() {
              });
        }
    }

    function increaseRadius(){
        radius = radius +10000;
        increaseRadiusFlag =1;
        searchPlace();
    }

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            restrauntResults = results;
            for (var i = 0; i < 5; i++) {
                var div = document.getElementById('content');
                var id = restrauntResults[i].place_id;
                var addedText = "<a id = "+restrauntResults[i].place_id+">"+restrauntResults[i].name+"</a>";
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
     function callbackLodging(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        hotelResults = results;
        var div1 = document.getElementById('root');
        div1.innerHTML = div1.innerHTML + "<div class='col-md-6'><div class='panel panel-default'><div class='panel-heading'>Hotels Near Latitude: {{$lat}} Longitude: {{$lng}}</div><div class='panel-body'><div id='lodging'></div><div id='map'><button onclick='showMoreHotels()'>Show More!</button></div></div></div>";
        for (var i = 0; i < 5; i++) {
            var div = document.getElementById('lodging');
            var id = hotelResults[i].place_id;
            var addedText = "<a id = "+hotelResults[i].place_id+">"+hotelResults[i].name+"</a>";
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
            increaseRadius();
        }
    }
    }
     function callbackStores(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        storeResults = results;
        var div1 = document.getElementById('root');
        div1.innerHTML = div1.innerHTML + "<div class='col-md-6'><div class='panel panel-default'><div class='panel-heading'>Stores Near Latitude: {{$lat}} Longitude: {{$lng}}</div><div class='panel-body'><div id='stores'></div><div id='map'><button onclick='showMoreStores()''>Show More!</button></div></div></div>";
        for (var i = 0; i < 5; i++) {
            var div = document.getElementById('stores');
            var id = storeResults[i].place_id;
            var addedText = "<a id = "+storeResults[i].place_id+">"+storeResults[i].name+"</a>";
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
            increaseRadius();
        }
    }
}
     function callbackAirports(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        storeResults = results;
        var div1 = document.getElementById('root');
        div1.innerHTML = div1.innerHTML + "<div class='col-md-6'><div class='panel panel-default'><div class='panel-heading'>Airports Near Latitude: {{$lat}} Longitude: {{$lng}}</div><div class='panel-body'><div id='airports'></div><div id='map'><button onclick='showMoreStores()''>Show More!</button></div></div></div>";
        for (var i = 0; i < 5; i++) {
            var div = document.getElementById('airports');
            var id = storeResults[i].place_id;
            var addedText = "<a id = "+storeResults[i].place_id+">"+storeResults[i].name+"</a>";
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
            increaseRadius();
        }
    }
}
</script>
@endsection