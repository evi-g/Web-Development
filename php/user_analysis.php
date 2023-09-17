<head>
<style>
.myButton4 {
	box-shadow: 3px 4px 0px 0px #08090a;
	background:linear-gradient(to bottom, #a8bfe6 5%, #59a6ff 100%);
	background-color:#a8bfe6;
	border-radius:15px;
	border:1px solid #344fa1;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
}
.myButton4:hover {
	background:linear-gradient(to bottom, #59a6ff 5%, #a8bfe6 100%);
	background-color:#59a6ff;
}
.myButton4:active {
	position:relative;
	top:1px;
}


</style>
</head>


<div class = "container" style = "margin-top: 60px" >
		<form class="form-horizontal" style = "margin-bottom: 60px">
			<div class = "form-group">
				<label class = "control-label col-lg-2"><h4>Μήνας</h4></label>
				<div class = "col-lg-10">
					<input type="text" class="form-control" id="month" placeholder =" (π.χ. Μάρτιος-Οκτώβριος)">
				</div>
			</div>
			<div class = "form-group">
				<label class = "control-label col-lg-2"><h4>Έτος</h4></label>
				<div class = "col-lg-10">
					<input type="text" class="form-control" id="year" placeholder =" (π.χ. 2016-2020)">
				</div>
			</div>
			<button type="button" class="myButton4 col-lg-2 offset-lg-2" onclick = "search_button()"><h4>Αναζήτηση</h4></button>
		</form>
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-3">
			<label><h4>Ποσοστό εγγραφών ανά είδος δραστηριότητας</h4></label>
		</div>
		<div id = "chart_container1" class = "col-lg-9">
			<canvas id="activity-percent"></canvas>
		</div>
	</div>
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-3">
			<label><h4>Ώρα της ημέρας με τις περισσότερες εγγραφές ανά είδος δραστηριότητας</h4></label>
		</div>
		<div id = "chart_container2" class = "col-lg-9">
			<canvas id="most_hour"></canvas>
		</div>
	</div>
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-3">
			<label><h4>Ημέρα της εβδομάδας με τις περισσότερες εγγραφές ανά είδος δραστηριότητας</h4></label>
		</div>
		<div id = "chart_container3" class = "col-lg-9">
			<canvas id="most_day"></canvas>
		</div>
	</div>
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-3">
			<label><h4>Χάρτης Τοποθεσιών</h4></label>
		</div>
		<div id = "chart_container4" class = "col-lg-9">
			<div id = "map" style="width:650px; height: 400px;"></div>
		</div>
	</div>
</div>