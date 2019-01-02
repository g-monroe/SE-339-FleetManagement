<!DOCTYPE html>
<html lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/fleetmap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Chart.js-master/dist/Chart.bundle.js"></script>
	<script type="text/javascript" src="Chart.js-master/samples/utils.js"></script>
	<head>
		<title>My Fleet</title>
		<meta charset="utf-8">
		<style>
			#map {
				height: 400px,
				width: 100%
			}
		</style>
	</head>
	<body>
		<div ng-app="myApp" ng-controller="myCtrl">
			<?php include("navbar.html");?>
			<div class="container-fluid">
				<div class="row">
					<h1>{{username}}'s Fleet</h1>
					<div id="map"></div>
					<script>
						var map;
						var hasinit = false;

						const pos1 = {lat: 42.023679, lng: -93.646534};
						const pos2 = {lat: 42.025408, lng: -93.651916};
						const pos3 = {lat: 42.026456, lng: -93.647890};

						var marker = null;
						function initmap(){
							hasinit = true;
							map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: {lat: 42.023949, lng: -93.647595}});
							startPin(pos1);
						}
						async function startPin(pos){
							await sleep(2000);
   							
   							if (flu == 0){
   								flu = 30;
   							}else{
   								flu = Math.round((flu - 0.05) * 100) / 100;
   							}
   							document.getElementById("speed").innerHTML = Math.round(Math.random() * 30 + 5);
   							document.getElementById("rpm").innerHTML = Math.round(Math.random() * 1000 + 1500);
   							document.getElementById("fl").innerHTML = flu;
   							if(!(hasinit === true)) return;
   							if(marker === null){
   								marker = new google.maps.Marker({position: pos, map: map});
   							} else {
   								marker.setPosition(pos);
   							}
						}
						var flu = 30;
						async function addPin(pos){
   							await sleep(30000);
   							
   							if (flu == 0){
   								flu = 30;
   							}else{
   								flu = Math.round((flu - 0.05) * 100) / 100;
   							}
   							document.getElementById("speed").innerHTML = Math.round(Math.random() * 30);
   							document.getElementById("rpm").innerHTML = Math.round(Math.random() * 1000 + 1500);
   							document.getElementById("fl").innerHTML = flu;
   							if(!(hasinit === true)) return;
   							if(marker === null){
   								marker = new google.maps.Marker({position: pos, map: map});
   							} else {
   								marker.setPosition(pos);
   							}
						}

						function sleep(ms){
							return new Promise(resolve => setTimeout(resolve, ms));
						}
						async function pins(){
							await addPin(pos1);
							await addPin(pos2);
							await addPin(pos3);
							await addPin(pos1);
							await addPin(pos2);
							await addPin(pos3);
							await addPin(pos1);
							await addPin(pos2);
							await addPin(pos3);
							await addPin(pos1);
							await addPin(pos2);
							await addPin(pos3);
							await addPin(pos1);
							await addPin(pos2);
							await addPin(pos3);
						}

						pins();
					</script>
					<script async defer
						src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2wuox0JoLAY9sdCDkpOpgJVZvCY4Huig&callback=initmap">
					</script>
			</div>
		

			<hr>
			<div class="row">
				<div class="col-md-12">
					<h3>Stats</h3>
							<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="text-nowrap" scope="row">Speed</th>
        <td id="speed">30</td>
      </tr>
      <tr>
        <th class="text-nowrap" scope="row">RPM</th>
        <td id="rpm">30</td>
      </tr>
      <tr>
        <th class="text-nowrap" scope="row">Fuel Level</th>
        <td id="fl">30</td>
      </tr>
    </tbody>
  </table>
</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6" ng-show="remainingFuelChart">
					<canvas id="remainingFuelCanvas"></canvas>
				</div>
				<div class="col-md-6" ng-show="gasConsumptionChart">
					<canvas id="gasConsumptionCanvas"></canvas>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6" ng-show="currentSpeedChart">
					<canvas id="currentSpeedCanvas"></canvas>
				</div>
				<div class="col-md-6" ng-show="engineTemperatureChart">
					<canvas id="engineTemperatureCanvas"></canvas>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6" ng-show="engineLoadChart">
					<canvas id="engineLoadCanvas"></canvas>
				</div>
			</div>
		</div>

		<script src="js/fleetmap.js"></script>
		<script src="js/services/navbarService.js"></script>
		<script src="js/services/mapService.js"></script>
		<script src="js/services/chartService.js"></script>
		<script src="js/services/sessionService.js"></script>
	</body>
</html>
