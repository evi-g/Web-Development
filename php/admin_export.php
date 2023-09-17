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
		$sql = "select * from locations 
				inner join activities on locations.id = activities.location where ".$_POST["search"]."";
	}
	else{
		$sql = "select * from locations
				inner join activities on locations.id = activities.location";
	}
	$result = $mysql_link->query($sql);
	if($_POST["type"] == "csv"){
		$export_file = fopen("users_data.csv", "w");
		while($row = $result->fetch_assoc()){
			fputcsv($export_file, array($row["heading"], $row["type"], $row["confidence"], strtotime($row["timestamp"]) * 1000, $row["verticalAccuracy"], $row["velocity"], $row["accuracy"], $row["longitudeE7"] * 10 ** 7, $row["latitudeE7"] * 10 ** 7, $row["altitude"], strtotime($row["timestampMs"]) * 1000));
		}
	}
	else if($_POST["type"] == "json"){
		$export_file = fopen("users_data.json", "w");
		$data = array();
		while($row = $result->fetch_assoc()){
			array_push($data, array($row["heading"], $row["type"], $row["confidence"], strtotime($row["timestamp"]) * 1000, $row["verticalAccuracy"], $row["velocity"], $row["accuracy"], $row["longitudeE7"] * 10 ** 7, $row["latitudeE7"] * 10 ** 7, $row["altitude"], strtotime($row["timestampMs"]) * 1000));
		}
		fwrite($export_file, json_encode($data));
	}
	fclose($export_file);
?>