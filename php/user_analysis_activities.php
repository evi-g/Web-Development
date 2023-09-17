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
	if($_POST["search_term"] != ""){
		$sql1 = "set @count = (select count(*) from activities where user = '".$_SESSION["user_id"]."' and ".$_POST["search_term"].")";
		$mysql_link->query($sql1);
		$sql = "select (count(*)/@count) *100 as percent, type from activities where user = '".$_SESSION["user_id"]."' and ".$_POST["search_term"]."  group by type";
	}
	else{
		$sql1 = "set @count = (select count(*) from activities where user = '".$_SESSION["user_id"]."')";
		$mysql_link->query($sql1);
		$sql = "select (count(*)/@count) *100 as percent, type from activities where user = '".$_SESSION["user_id"]."' group by type";
	}
	$result = $mysql_link->query($sql);
	$percent = array();
	while($row = $result->fetch_assoc()){
		array_push($percent, array("label" => $row["type"], "percent" => $row["percent"]));
	}
	echo json_encode($percent);
?>