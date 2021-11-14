<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
}
?>






<?php


require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();



//locate the IP
$geoplugin->locate();







?>


<!DOCTYPE html>
<html>
  <head>
    <style>
    .container{
    	width: 400px;
    	height: 250px;
    	margin: 0px auto;
    }
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
  	<div class="container">
  		
    <h3>Location: <?php echo $geoplugin->city;?> (<?php echo $geoplugin->countryName; ?>) </h3>
  	</div>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $geoplugin->latitude; ?>, lng: <?php echo $geoplugin->longitude; ?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 18, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9WObx58Fn1L04tmkCikTlPEecdgE_7Ss&callback=initMap">
    </script>
  </body>
</html>