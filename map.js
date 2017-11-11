var map, map2;

function myMap() {
var mapProp= {
    center:new google.maps.LatLng(42.8, -88),
    zoom:7,
};
map=new google.maps.Map(document.getElementById("gMap"), mapProp);
map2 = new google.maps.Map(document.getElementById("gMap2"), mapProp);

var Naperville = new google.maps.LatLng(41.7508, -88.1535);
var Chicago = new google.maps.LatLng(41.8781, -87.6298);
var Joliet = new google.maps.LatLng(41.525, -87.99);

var Janesville = new google.maps.LatLng(42.6828, -89.0187);
var Milwaukee = new google.maps.LatLng(43.0389, -87.9065);

var Kenosha = new google.maps.LatLng(42.5847, -87.8212);
var JolietTwo = new google.maps.LatLng(41.62, -87.6298);

var Madison = new google.maps.LatLng(43.0731, -89.4012);

var KenoshaMarker = new google.maps.Marker({position:Kenosha});
var JanesvilleMarker = new google.maps.Marker({position:Janesville});

var marker = new google.maps.Marker({position:Naperville});
var ChicagoMarker = new google.maps.Marker({position:Chicago});
var JolietMarker = new google.maps.Marker({position:Joliet});
var MilwaukeeMarker = new google.maps.Marker({position:Milwaukee});
var MadisonMarker = new google.maps.Marker({position:Madison});
ChicagoMarker.setMap(map);
// JolietMarker.setMap(map);
MilwaukeeMarker.setMap(map);
MadisonMarker.setMap(map);
marker.setMap(map2);
KenoshaMarker.setMap(map2);
JanesvilleMarker.setMap(map2);


var barOne = "Madison Region<br>800 ft Cat5 Wire<br>";
barOne += "535 ft THHN Wire<br>915 ft 18-4 Wire";

var barTwo = "Milwaukee Region<br>688 ft Cat5 Wire<br>";
barTwo += "412 ft THHN Wire<br>1580 ft 18-4 Wire";

var barThree = "Chicago Region<br>1700 ft Cat5 Wire<br>";
barThree += "815 ft THHN Wire<br>1280 ft 18-4 Wire";


var jobOne = "Naperville, IL<br>St. Laurence Hospital<br>200 ft Cat5 Wire<br>";
jobOne += "955 ft THHN Wire<br>85 ft 18-4 Wire";

var jobTwo = "Janesville, WI<br>Janesville High School<br>450 ft Cat5 Wire<br>";
jobTwo += "612 ft THHN Wire<br>1555 ft 18-4 Wire";

var jobThree = "Kenosha, WI<br>Walmart Superstore<br>2200 ft Cat5 Wire<br>";
jobThree += "459 ft THHN Wire<br>0 ft 18-4 Wire";



/*
var barTwo = "Miller's Pub<br>134 S Wabash Ave, Chicago IL 60603<br>";
barTwo += "35 Kegs<br>Avg Pressure: 55 PSI<br>Avg Temperature: 57˚";
var barThree = "Juliet's Tavern<br>205 N Chicago St 60432<br>";
barThree += "3 Kegs<br>Avg Pressure: 55 PSI<br>Avg Temperature: 43˚";
*/

google.maps.event.addListener(marker, 'click', function() {
  var napeWindow = new google.maps.InfoWindow({
	content:jobOne
  });
  napeWindow.open(map2,marker);
});


google.maps.event.addListener(JanesvilleMarker, 'click', function() {
  var janeWindow = new google.maps.InfoWindow({
	content:jobTwo
  });
  janeWindow.open(map2,JanesvilleMarker);
});


google.maps.event.addListener(KenoshaMarker, 'click', function() {
  var kenWindow = new google.maps.InfoWindow({
	content:jobThree
  });
  kenWindow.open(map2,KenoshaMarker);
});

google.maps.event.addListener(MadisonMarker, 'click',function() {
  var infowindow = new google.maps.InfoWindow({
  	content:barOne 

  });
  infowindow.open(map,MadisonMarker);
});

google.maps.event.addListener(ChicagoMarker, 'click',function() {
  var chiWindow = new google.maps.InfoWindow({
	content:barThree
  });
  chiWindow.open(map,ChicagoMarker);
});

google.maps.event.addListener(MilwaukeeMarker, 'click', function() {
  var jolWindow = new google.maps.InfoWindow({
    	content:barTwo
  });
  jolWindow.open(map, MilwaukeeMarker);
});


}


