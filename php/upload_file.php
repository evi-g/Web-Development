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

<div class = "container">
	<div class = "row">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<h4>Αρχείο: <input type="file" name="file" id="file"><br /><br /></h4>
			<button type="button" class = "myButton4" id = "upload" onclick = "uploadFile()"><h4>Υποβολή</h4></button>
		</form>
	</div>
</div>