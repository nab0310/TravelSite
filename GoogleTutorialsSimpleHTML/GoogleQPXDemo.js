var qpx = require('google-flights-wrapper1')("AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00");
qpx.api("1", "USD500", "5", "NYC", "CHI", "2016-11-10", function(data){
    //data looks like: [ { airline: 'Name of airline', price: 'EUR71.10' } ]
    console.log(data); 
});