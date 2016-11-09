window.getFlights =function(){
	var qpx = require('google-flights-wrapper1')("AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00");
	console.log("Using values gotten from api.");
	qpx.api(document.getElementById("NumOfAdults"), document.getElementById("maxPrice"), "5", document.getElementById("Origin"), document.getElementById("Destination"), "2016-11-10", function(data){
		//data looks like: [ { airline: 'Name of airline', price: 'EUR71.10' } ]
		console.log(data); 
	});
};