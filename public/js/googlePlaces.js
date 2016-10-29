function getGooglePlaces(){
  google_places = new GooglePlaces('AIzaSyAyg20NhRd6eBWgHt0u6EXhDA2-2wkFN-Q');
  google_places.location = array(-33.86820, 151.1945860);
  google_places.radius   = 800;
  results                 = google_places.nearbySearch();
  Log.warning('The results from the Google Places call: '+ results);
  alert(results);
	Console.log(results);
}