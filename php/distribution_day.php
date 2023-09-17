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
	$sql = "set @count = (select count(*)as total from activities inner join locations on locations.id = activities.location)";
	$mysql_link->query($sql);
	$sql = "select (count(*)/@count) * 100 as total, dayofweek(timestamp) as day from activities inner join locations on locations.id = activities.location group by day";
	$result = $mysql_link->query($sql);
	$distr = array();
	while($row = $result->fetch_assoc()){
		array_push($distr, array("label" => $row["day"], "percent" => $row["total"])); 
	}
	echo json_encode($distr);
?>