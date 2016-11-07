// var qpx = require('google-flights-wrapper1')("AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00");
// console.log("Using values gotten from api.")
// qpx.api("1", "USD500", "5", "NYC", "CHI", "2016-11-10", function(data){
// 	//data looks like: [ { airline: 'Name of airline', price: 'EUR71.10' } ]
// 	console.log(data); 
// });
// require("cors");
var dataNearby = [];
var dataDest = [];
var sita = require('SITA-JS-Wrapper')("4c748ae5883936e911407020c01c951b");
sita.api("41.8781136","-87.62979819999998","5", function(data){
	for(var i=0;i<data.length;i++){
		console.log("Data at: "+i);
		console.log(data[i]);
		dataNearby.push(data[i]);
	}
	sita.api("40.712784", "-74.005941","5",function(data){
		for(var j=0;j<data.length;j++){
			console.log("Data at: "+j);
			console.log(data[j]);
			dataDest.push(data[j]);
		}
		console.log("This is the nearby Airports: "+dataNearby);
		console.log("These are the destination Airports: "+dataDest);
		var qpx = require('google-flights-wrapper1')("AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00");
		console.log("Using values gotten from api.")
		qpx.api("1", "USD500", "5", dataNearby[1].code, dataDest[2].code, "2016-11-10", function(data){
    		//data looks like: [ { airline: 'Name of airline', price: 'EUR71.10' } ]
    		console.log(data); 
		});
	});
});