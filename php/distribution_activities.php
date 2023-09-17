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
	$sql = "set @count = (select count(*) from activities)";
	$mysql_link->query($sql);
	$sql = "select (count(*)/@count) * 100 as total, type from activities group by type";
	$result = $mysql_link->query($sql);
	$percent = array();
	while($row = $result->fetch_assoc()){
		array_push($percent, array("label" => $row["type"], "percent" => $row["total"])); 
	}
	echo json_encode($percent);
?>