<?php
	session_start();
	include_once("connect.php");
	$pass = sha1($_POST["password"]);
	$query = "select * from users where username = '".$_POST["username"]."' and pass = '".$pass."'";
	$result = $mysql_link->query($query);
	if($result->num_rows == 0){
		echo 0;
	}
	else{
		$row = $result->fetch_assoc();
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["usertype"] = $row["user_type"];
		echo $row["user_type"];
	}
	$mysql_link->close();
?>