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
	$sql = "select count(*) as total_month, monthname(timestamp) as month, year(timestamp) as year from activities 
			where user = '".$_SESSION["user_id"]."' and timestamp  > DATE_SUB(now(), INTERVAL 12 MONTH) group by month(timestamp), year(timestamp)";
	$result = $mysql_link->query($sql);
	$data = array();	
	while($row = $result->fetch_assoc()){
		$data[$row["month"]][$row["year"]]["total_month"] = $row["total_month"];
	}		
	$sql2 = "select count(*) as echo_month, monthname(timestamp) as month, year(timestamp) as year from activities 
			 where user = '".$_SESSION["user_id"]."' and timestamp  > DATE_SUB(now(), INTERVAL 12 MONTH) and (type = 'ON_FOOT' or type = 'WALKING' or type = 'ON_BICYCLE' or type = 'RUNNING') group by month(timestamp), year(timestamp)";
	$result = $mysql_link->query($sql2);
	while($row = $result->fetch_assoc()){
		$data[$row["month"]][$row["year"]]["echo_month"] = $row["echo_month"];
	}
	$echo = array();
	
	foreach($data as $month => $element){
		foreach($element as $year => $el){
			if($el["total_month"] == 0){
				array_push($echo, array("date" => $month." ".$year, "echo" => 0));
			}
			else{
				array_push($echo, array("date" => $month." ".$year, "echo" => $el["echo_month"]/$el["total_month"] * 100));
			} 
		}
	}
	echo json_encode($echo);
?>
