<head>
<style>
.myButton1 {
	box-shadow:inset 0px 1px 0px 0px #f5978e;
	background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
	background-color:#f24537;
	border-radius:6px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:10px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}
.myButton1:hover {
	background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
	background-color:#c62d1f;
}
.myButton1:active {
	position:relative;
	top:1px;
}

</style>
</head>

<div class = "container" style = "margin-top: 60px" >
	<div class = "row" style = "margin-top: 60px; margin-bottom: 60px">
		<div class = "col-lg-9">
			<label><h3>Για διαγραφή όλων των δεδομένων πατήστε το κουμπί</h3></label>
		</div>
		<div class = "col-lg-6">
			<button type="button" class="myButton1" onclick = "delete_all()">DELETE</button>
		</div>
	</div>
</div>