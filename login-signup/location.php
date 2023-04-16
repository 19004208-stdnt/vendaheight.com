<!DOCTYPE html>
<html>
<head>
	<title>Vendaheight Location</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<style>
		#map {
			height: 100%;
		}
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body>
	<div id="map"></div>
	<script>
		function initMap() {
			var location = {lat: -22.964975, lng:  30.455124};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: location
			});
			var marker = new google.maps.Marker({
				position: location,
				map: map,
				title: 'Vendaheight'
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqNiPFZz7JCJBWVkAwrsE5BIm-vYKhxn0&callback=initMap"
	async defer></script>
</body>
</html>
