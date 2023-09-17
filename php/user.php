<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></link>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css"></link>
	<link rel = "stylesheet" href ="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
	<script src = "https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
	<script src = "https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
	<script src = "https://raw.githubusercontent.com/pa7/heatmap.js/develop/plugins/leaflet-heatmap/leaflet-heatmap.js"></script>
	<link href = "login.css" rel="stylesheet"></link>
	<link href = "tables.css" rel="stylesheet"></link>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src = "user_tab_press.js"></script>
	<script src = "heatmap.js"></script>
	<script src = "user_analysis.js"></script>
	<script src = "upload_file.js"></script>
</head>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION["user_id"])){
			header("Location:index.php");
		}
		else if($_SESSION["usertype"] != "user"){
			header("Location:admin.php");
		} 
	?>
		<div style = "font-size:14px">
		<ul id ="admin_tabs" class="nav nav-pills ">
			<li class="active"><a data-toggle="pill" href="#home" >Αρχική</a></li>
			<li><a data-toggle="pill" href="#m1">Ανάλυση στοιχείων χρήστη</a></li>
			<li><a data-toggle="pill" href="#m2">Upload δεδομένων</a></li>
		</ul></div>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<?php include_once("user_display.php")?>
			</div>
			<div id="m1" class="tab-pane fade">
				<?php include_once("user_analysis.php")?>
			</div>
			<div id="m2" class="tab-pane fade" style = "padding: 80px">
				<?php include_once("upload_file.php")?>
			</div>
		</div>
	</div>
</body>
</html>