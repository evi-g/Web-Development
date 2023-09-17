<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></link>
		<link href = "login.css" rel="stylesheet"></link>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src = "login.js"></script>
		<style>
		.myButton {
			box-shadow:inset 0px -3px 7px 0px #29bbff;
			background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
			background-color:#2dabf9;
			border-radius:3px;
			border:1px solid #0b0e07;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:Arial;
			font-size:15px;
			padding:9px 23px;
			text-decoration:none;
			text-shadow:0px 1px 0px #263666;
			
		}
		.myButton:hover {
			background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
			background-color:#0688fa;
		}
		.myButton:active {
			position:relative;
			top:1px;
		}
		
	</style>
	
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
	font-size:15px;
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

        
        
</style/>
	</head>
	<body>
			<div class="form-style-5">
				<form>
					<div class="form-group">
							<label>Username</label>
							<input type="text" id = "username" class="form-control" placeholder="username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" id = "pass" class="form-control" placeholder="password">
						</div>
						<button type="button" class="myButton" onclick = "loginUser()">Login</button>
						<button type="button" class="myButton" onclick = "registerForm()">Registration</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>