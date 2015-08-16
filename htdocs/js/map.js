// JavaScript Document

function initialize(){
	
	var latlng = new google.maps.LatLng(21.1500095,-86.9063787);
	var myOptions = {
		zoom: 17,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.HYBRID
		};
	var map = new google.Map(document.getElementById("map"),myOptions);
	
	var latlng = new google.maps.LatLng(21.1500095,-86.9063787);
	var beachMarker = new google.maps.Marker({
		map:map
		});
	
	}