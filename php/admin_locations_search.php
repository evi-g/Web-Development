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
	if($_POST["search"] != ""){
		$sql = "select distinct longitudeE7, latitudeE7, COUNT(*) as count from locations 
				inner join activities on locations.id = activities.location where ".$_POST["search"]." group by longitudeE7, latitudeE7";
	}
	else{
		$sql = "select distinct longitudeE7, latitudeE7, COUNT(*) as count from locations 
				inner join activities on locations.id = activities.location group by longitudeE7, latitudeE7";
	}
	$result = $mysql_link->query($sql);
	$locations = array();
	while($row = $result->fetch_assoc()){
		array_push($locations, array("lo" => $row["longitudeE7"], "la" => $row["latitudeE7"], "count" => $row["count"]));
	}
	echo json_encode($locations);
?>