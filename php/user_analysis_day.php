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
		$sql = "select count(*) as total, type, dayofweek(timestamp) as day from activities where user = '".$_SESSION["user_id"]."' and ".$_POST["search_term"]." group by day, type";
	}
	else{
		$sql = "select count(*) as total, type, dayofweek(timestamp) as day from activities where user = '".$_SESSION["user_id"]."' group by day, type";
	}
	$result = $mysql_link->query($sql);
	$data_array = array();
	while($row = $result->fetch_assoc()){
		array_push($data_array, array("type" => $row["type"], "day" => $row["day"], "total" => $row["total"]));
	}
	$max_day = array();
	for($i = 0; $i < count($activities); $i++){
		$activity = $activities[$i];
		$day = 0;
		$max = 0;
		$count = 0;
		foreach($data_array as $element){
			if($element["type"] == $activity && $element["total"] > $max){
				$max = $element["total"];
				$day = $element["day"];
			}
			if($count == count($data_array) - 1){
				array_push($max_day, array("label" => $activity, "day" => $day));
			}
			else{
				$count++;
			}
		}
	}
	echo json_encode($max_day);
?>