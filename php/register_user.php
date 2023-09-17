<?php
	include_once("connect.php");
	$query = "select * from users where username = '".$_POST["username"]."' or pass = '".$_POST["password"]."' or email = '".$_POST["email"]."' ";
	$result = $mysql_link->query($query);
	if($result->num_rows != 0){
		echo 0;
	}
	else{
		$encryptionMethod = "AES-256-CBC"; 
		$user_id = openssl_encrypt($_POST["email"], $encryptionMethod, $_POST["password"]);
		$pass = sha1($_POST["password"]);
		$query = "insert into users(user_id, username, pass, email) values('".$user_id."', '".$_POST["username"]."', '".$pass."', '".$_POST["email"]."')";
		$mysql_link->query($query);
		echo 1;
	}
	$mysql_link->close();
?>