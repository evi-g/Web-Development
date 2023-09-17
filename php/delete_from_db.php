<?php
	header("Content-Type: application/json; charset=UTF-8");
	include_once("connect.php");
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location:index.php");
	}
	if($_SESSION["usertype"] != "admin"){
		header("Location:user.php");
	}
	$sql = "delete from activities";
	if($mysql_link->query($sql)){
		echo 1;
	}
	else{
		echo 0;
	}
	$sql = "delete from locations";
	if($mysql_link->query($sql)){
		echo 1;
	}
	else{
		echo 0;
	}
?>