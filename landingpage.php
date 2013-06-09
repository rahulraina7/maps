<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Log in to Intelli-Track</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="1.css" rel="stylesheet" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px"></script>
		<script src="js/init.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    var marker;
    var infowindow;

    function initialize() {
      var latlng = new google.maps.LatLng(37.4419, -122.1419);
      var options = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map-canvas"), options);
      var html = "<table>" +
                 "<tr><td>Description:</td> <td><input type='text' id='descr' name='descr'/> </td> </tr>" +
				 "<tr><td></td><td><input type='button' value='Save & Close' onclick='saveData()'/></td></tr>";
    infowindow = new google.maps.InfoWindow({
     content: html
    });
 
    google.maps.event.addListener(map, "click", function(event) {
        marker = new google.maps.Marker({
          position: event.latLng,
          map: map
        });
        google.maps.event.addListener(marker, "click", function() {
          infowindow.open(map, marker);
        });
    });
    }

    function saveData() {
      var descr = escape(document.getElementById("descr").value);
	  var latlng = marker.getPosition();
 
      var url = "http://localhost/maps/savemdata.php?desc=" + descr +  "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
      downloadUrl(url, function(data, responseCode) {
        if (responseCode == 200 && data.length <= 1) {
          infowindow.close();
          document.getElementById("location").innerHTML = "<strong>Location added</strong>";
        }
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
    </script> 
 		
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/reset.css" />
			<link rel="stylesheet" href="css/structure.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<style type="text/css">
			#main { 
			padding-top:  100px;
			padding-left: 55px; }
           
        </style>
		
		
	</head>
	<body>
	<nav id="nav">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="bookmarks.php">Bookmarks</a></li>
					<li><a href="logout.php">Log-Out</a></li>
					<li><a href="credits.html">Credits</a></li>
				</ul>
			</nav>
			
			
    <body style="margin:0px; padding:0px;" onload="initialize()">
    <div id="map-canvas" style="left: 400px; top:150px; width: 600px; height: 400px"></div>
    <div id="location" style="position:absolute; right: 425px; top:575px;width:300px;"></div>
</html>
			
</body>
</html>
