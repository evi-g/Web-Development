<?php
	header("Content-Type: application/json; charset=UTF-8");
	include_once("connect.php");
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location:index.php");
	}
	if($_SESSION["usertype"] != "user"){
		header("Location:admin.php");
	}
	$sql = "select distinct type from activities";
	$result = $mysql_link->query($sql);
	$activities = array();
	while($row = $result->fetch_assoc()){
		array_push($activities, $row["type"]);
	}
	
	if($_POST["search_term"] != ""){
		$sql = "select count(*) as total, type, hour(timestamp) as hour from activities where user = '".$_SESSION["user_id"]."' and ".$_POST["search_term"]." group by hour, type";
	}
	else{
		$sql = "select count(*) as total, type, hour(timestamp) as hour from activities where user = '".$_SESSION["user_id"]."' group by hour, type";
	}
	$result = $mysql_link->query($sql);
	$data_array = array();
	while($row = $result->fetch_assoc()){
		array_push($data_array, array("type" => $row["type"], "hour" => $row["hour"], "total" => $row["total"]));
	}
	$max_hour = array();
	for($i = 0; $i < count($activities); $i++){
		$activity = $activities[$i];
		$hour = 0;
		$max = 0;
		$count = 0;
		foreach($data_array as $element){
			if($element["type"] == $activity && $element["total"] > $max){
				$max = $element["total"];
				$hour = $element["hour"];
			}
			if($count == count($data_array) - 1){
				array_push($max_hour, array("label" => $activity, "hour" => $hour));
			}
			else{
				$count++;
			}
		}
	}
	echo json_encode($max_hour);
?>