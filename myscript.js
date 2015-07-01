var map;
var Markers = new Array();
var infoWindows = new Array();
var centerPoint = new google.maps.LatLng(0.15, -78.35);
var array = new Array();



function escapeText(t){
	return document.createTextNode(t).textContent;
}

function myBadLoadFunction(XMLHttpRequest,errorMessage,errorThrown) {
	alert("Load failed:"+errorMessage+":"+errorThrown);
} 



function myGoodLoadJSON1(data) {
 	for (var i = 0; i < data.data.length; i++){
 		if (escapeText(data.data[i].location)!="null" ){

 			 var captionNoNull;
 			if (data.data[i].caption==null)
 			 	captionNoNull =  "Description: Such a nice photo!";
			else
				captionNoNull = escapeText(data.data[i].caption.text);

 			var newHTML = "<div class='well'>";
 			newHTML = newHTML + "Username: " + escapeText(data.data[i].user.username) + "</br>";
 			newHTML = newHTML + "Full name: " + escapeText(data.data[i].user.full_name) + "</br>";
 			newHTML = newHTML + "Latitude: " + escapeText(data.data[i].location.latitude) + "</br>";
 			newHTML = newHTML + "Longitude: " + escapeText(data.data[i].location.longitude) + "</br>";
 			newHTML = newHTML + "<a href=\'#mapPanel\' onClick=\'clickImage("+escapeText(data.data[i].location.latitude)+","+escapeText(data.data[i].location.longitude)+")\'><img style =\"width:100%;cursor:pointer;\" src=\"" + (escapeText(data.data[i].images.standard_resolution.url)).replace(/\\\//g, "/");
 			newHTML += "\"></a></br>";
 			newHTML = newHTML + "Description: " + captionNoNull + "</br></div>";
 			$("div.dataJSON1").append(newHTML);

 			var obj ={
 				lat: escapeText(data.data[i].location.latitude),
 				lng: escapeText(data.data[i].location.longitude),
 				username: escapeText(data.data[i].user.username),
 				fullname: escapeText(data.data[i].user.full_name),
 				cap: captionNoNull,
 				image: escapeText(data.data[i].images.thumbnail.url).replace(/\\\//g, "/"),
 				profile_pic: escapeText(data.data[i].user.profile_picture).replace(/\\\//g, "/")
 			};
 			array.push(obj);
 		}	

 		
	}
	initializeMap(array);
}


function initializeMap(arr){
	var myOptions = {
		zoom: 3,
		center: centerPoint,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map($('#map_canvas').get(0), myOptions);
	centerMap(centerPoint);

	for (var i = 0; i < arr.length;i++){
	 	createInfoWindow(arr[i]);
		placeMarker(arr[i]);
	}

	putInfoWindows();
}



function clickImage(lat,lng){
	centerPoint = new google.maps.LatLng(lat, lng);
	centerMap(centerPoint);
	for (var i = 0; i < Markers.length; i++){
		if (Markers[i].position.equals(centerPoint)){
			infoWindows[i].open(map,Markers[i]);
			break;
		}
	}
}

function centerMap(cPoint){	
	map.setCenter(cPoint);
}


function createInfoWindow(arr){
	var contentString = 
	 	"<div style='width:130px;'>"+
	 		"<p>Name: " + arr.fullname + "</br>" +
	 		"Username: " + arr.username + "</br>" +  
	 		"</p>"+
	 		"<img src='" + arr.image + "' style=\'width:130px;\'></br>" + 
	 	"</div>";


		var infowindow = new google.maps.InfoWindow({
		    content: contentString
		});
		infoWindows.push(infowindow);
}

function putInfoWindows(){
	for (var i = 0; i < Markers.length; i++){
		clickMarker(Markers[i],infoWindows[i],map)
	}
}

function clickMarker(marker,infowindow,map){
	google.maps.event.addListener(marker, 'click', function() {
	  		infowindow.open(map,marker);
	});
}

function placeMarker(arr){
		var image = {
				url: arr.profile_pic,
				// This marker is 32 pixels wide by 32 pixels tall.
				//size: new google.maps.Size(150, 150),
				// The origin for this image is 0,0.
				origin: new google.maps.Point(0,0),
				// The anchor for this image is at 0,16.
				anchor: new google.maps.Point(0, 0),
				//Resize
				scaledSize: new google.maps.Size(32,32)
		};
		var latlng = new google.maps.LatLng(arr.lat,arr.lng);
    
		var marker = new google.maps.Marker({ 
			position: latlng, 
			map: map,
			icon: image,
			title:arr.cap
		});
		Markers.push(marker);
}

function codeAddressHelper(results, status) {
	if (status == google.maps.GeocoderStatus.OK) {
		map.setCenter(results[0].geometry.location);
		var marker = new google.maps.Marker({
			map: map, 
			title: 'Hello INF 133',
			position: results[0].geometry.location
		});
	} else {
		alert("Geocode was not successful for the following reason: " + status);
	}
}

function codeAddress() {
	var geocoder = new google.maps.Geocoder();
	var myAddress = $("#address").val();
	geocoder.geocode( { address: myAddress}, codeAddressHelper);
}

	
function myReadyFunction(){
	$.ajax({
		url: "https://students.ics.uci.edu/~djp3/myProxy.php?https://api.instagram.com/v1/media/popular?access_token=1474246888.5b9e1e6.d0b5f7f2fb3740e1a818bb5490a2c7e2",
		dataType: "json",
		success: myGoodLoadJSON1,
		error: myBadLoadFunction,	
	});
}

$(document).ready(
	function(){
		myReadyFunction();
	}
);
