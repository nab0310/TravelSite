@extends('layouts.app')
@section('style')
<style>
.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: auto;
      height:225px;
      margin: auto;
  }
</style>
@endsection
@section('bootstrap')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">{{$name}}</div>

                    <div class="panel-body">
                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00&libraries=places&callback=getInfo" async defer></script>
                        <div id="Address"></div>
                        <div id="Phone"></div>
                        <div id="Hours"></div>
                        <div id="Icon"></div>
                        <div id="Name"></div>
                        <div id="Rating"></div>
                        <div id="Photos">
                        	<div id="myCarousel" class="carousel slide" data-ride="carousel">
								  <!-- Indicators -->
								  <ol class="carousel-indicators">
								    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								  </div>

								  <!-- Left and right controls -->
								  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								    <span class="sr-only">Next</span>
								  </a>
								</div>
                        </div>
                        <div id="Reviews"></div>
                        <div id="PriceLevel"></div>
                        <div id="Website"></div>
                        <div id="map"></div>
                        <script>
                            // This example requires the Places library. Include the libraries=places
                            // parameter when you first load the API. For example:
                            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                            var map;

                            function getInfo() {
                                var browserLocation;
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -34.397, lng: 150.644},
                                    zoom: 15
                                });
                                var request = {
									placeId: "{{$id}}"
								};
                                var service = new google.maps.places.PlacesService(map);
                                service.getDetails(request, callback);
                            }

                            function callback(results, status) {
                                if (status === google.maps.places.PlacesServiceStatus.OK) {
                                	document.getElementById("Address").innerHTML = "Address: "+results.formatted_address;
                                	document.getElementById("Phone").innerHTML = "Phone Number: "+ results.formatted_phone_number;
                                	document.getElementById("Icon").innerHTML = "Icon: "+ results.icon;
                                	//parse Hours
                                	document.getElementById("Hours").innerHTML = "Hours: "+ results.opening_hours.open_now;
                                	document.getElementById("Name").innerHTML = "Name: "+ results.name;
                                	document.getElementById("Rating").innerHTML = "Rating: "+ results.rating;
									document.getElementById("PriceLevel").innerHTML = "Price Level: "+ results.price_level;
									parsePhotos(results.photos);
                                	document.getElementById("Reviews").innerHTML = "Reviews: ";
                                	//parse reviews
                                	for(var i=0;i<results.reviews.length;i++){
                                		var div = document.getElementById('Reviews');
                                		var addedText = "<p>Name: "+results.reviews[i].author_name+", URL: <a href="+results.reviews[i].author_url+">Google Profile</a>, rating: "+results.reviews[i].rating+", Text: "+results.reviews[i].text+"</p>";
                                        div.innerHTML = div.innerHTML + addedText;
                                        div.innerHTML = div.innerHTML + "<hr>"
                                	}
                                	document.getElementById("Website").innerHTML = "Website: "+results.website;
                                }
                            }
                            function parsePhotos(photos){
                            	var div = document.getElementById('Photos');
                            	for(var i=0;i<photos.length;i++){
                            		if(i!=0){
                            			$(".carousel-indicators").append("<li data-target='#myCarousel' data-slide-to="+i+"></li>");
                            		}
                            		var img = photos[i].getUrl({'maxWidth': 460, 'maxHeight': 345});
                            		if(i==0){
                            			//div = document.getElementsByClassName('item active');
                            			var addedText = "<div class='active item'><img src="+img+"></img></div>";
                            			$(".carousel-inner").html(addedText);
                            		}else{
                            			//div = document.getElementsByClassName('carousel-inner');
                            			var addedText = "<div class='item'><img src="+img+"></img></div>";
                            			$(".carousel-inner").append(addedText);
                            		}
                            	}
                            }
                        </script>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection