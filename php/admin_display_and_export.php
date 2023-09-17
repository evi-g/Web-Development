<head>
<style>
.myButton2 {
	box-shadow: 3px 4px 0px 0px #00030d;
	background:linear-gradient(to bottom, #ebedf0 5%, #003c85 100%);
	background-color:#ebedf0;
	border-radius:18px;
	border:1px solid #263970;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #334c8c;
}
.myButton2:hover {
	background:linear-gradient(to bottom, #003c85 5%, #ebedf0 100%);
	background-color:#003c85;
}
.myButton2:active {
	position:relative;
	top:1px;
}


        
</style>

<style>
.myButton3 {
	box-shadow: 3px 4px 0px 0px #9fb4f2;
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	background-color:#7892c2;
	border-radius:15px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
}
.myButton3:hover {
	background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
	background-color:#476e9e;
}
.myButton3:active {
	position:relative;
	top:1px;
}

        

</style>
</head>

</head>
<div class = "container" style = "margin-top: 60px" >
	<form class="form-horizontal" style = "margin-bottom: 60px">
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Αctivities</h4></label>
			<div class = "col-lg-7">
				<select id = "activities" multiple class="form-control">
					<option>IN_VEHICLE</option>
					<option>ON_BICYCLE</option>
					<option>ON_FOOT</option>
					<option>RUNNING</option>
					<option>STILL</option>
					<option>TILTING</option>
					<option>UNKNOWN</option>
					<option>WALKING</option>
				</select>
			</div>
			<div class = "col-lg-3">
				<button type="button" class="myButton2" id = "reset_btn"><h4>All</h4></button>
			</div>
		</div>
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Hour</h4></label>
			<div class = "col-lg-10">
				<input type="text" class="form-control" id="hour" placeholder ="(π.χ. 02-19)">
			</div> 
		</div>
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Day</h4></label>
			<div class = "col-lg-10">
				<input type="text" class="form-control" id="day" placeholder =" (π.χ. Δευτέρα-Σάββατο)">
			</div>
		</div>
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Month</h4></label>
			<div class = "col-lg-10">
				<input type="text" class="form-control" id="month" placeholder =" (π.χ. Μάρτιος-Οκτώβριος)">
			</div>
		</div>
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Year</h4></label>
			<div class = "col-lg-10">
				<input type="text" class="form-control" id="year" placeholder =" (π.χ. 2016-2020)">
			</div>
		</div>
		<div class = "form-group">
			<label class = "control-label col-lg-2"><h4>Export Type</h4></label>
			<div class = "col-lg-10">
				<input type="radio" name="export_type" value="csv" checked> CSV<br>
				<input type="radio" name="export_type" value="json"> JSON<br>
			</div>
		</div>
		<button type="button" class="myButton3 col-lg-2 offset-lg-2" onclick = "search_button()"><h4>Search</h4></button>
		<button type="button" class="myButton3 col-lg-2 offset-lg-2" onclick = "export_button()"><h4>Export</h4></button>
	</form>
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-3">
			<label><h4>Location Map</h4></label>
		</div>
		<div class = "col-lg-9" id = "map_container">
			<div id = "map" style="width:650px; height: 400px;"></div>
		</div>
	</div>
</div>