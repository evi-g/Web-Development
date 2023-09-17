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
	$sql1 = "set @count1 = (select count(*) from activities where user = '".$_SESSION["user_id"]."' and month(timestamp) = month(curdate()) and year(timestamp) = year(curdate()))";
	$mysql_link->query($sql1);
	$sql2 = "set @count2 = (select count(*) from activities 
							where user = '".$_SESSION["user_id"]."' and month(timestamp) = month(curdate()) and year(timestamp) = year(curdate()) and (type = 'ON_FOOT' or type = 'WALKING' or type = 'ON_BICYCLE' or type = 'RUNNING') )";
	$mysql_link->query($sql2);	

	$sql3 = "select @count2 / @count1 * 100 as total";
	$result = $mysql_link->query($sql3);
	$row = $result->fetch_assoc();
	if($row["total"] == null){
		$echo_current = 0;
	}
	else{
		$echo_current = $row["total"];
	}
	
	$sql = "select min(timestamp) as min_date, max(timestamp) as max_date from activities where user = '".$_SESSION["user_id"]."'";
	$result = $mysql_link->query($sql);
	$row = $result->fetch_assoc();
	$min_date = $row["min_date"];
	$max_date = $row["max_date"];
	
	$sql = "select uploaded from users where user_id = '".$_SESSION["user_id"]."'";
	$result = $mysql_link->query($sql);
	$row = $result->fetch_assoc();
	$latest = $row["uploaded"];
	
	echo json_encode(array("echo" => $echo_current, "min_date" => $min_date, "max_date" => $max_date, "latest" => $latest));
?>