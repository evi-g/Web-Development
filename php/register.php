<!DOCTYPE html>
<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href = "login.css" rel="stylesheet"></link>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src = "register.js"></script>
	</head>
	<body>
		<div class="sidenav">
			<div class="login-main-text">
				<h1>User Registration</h1>
			</div>
		</div>
		<div class="main">
			<div class="col-md-6 col-sm-12">
				<div class="login-form">
					<form>
						<div class="form-group">
							<label>Username</label>
							<input type="text" id = "username" class="form-control" placeholder="username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" id = "pass" class="form-control" placeholder="password">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id = "email" class="form-control" placeholder="email">
						</div>
						<button type="button" class="btn btn-black" onclick = "registerUser()">Registration</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>