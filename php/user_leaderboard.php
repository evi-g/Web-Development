<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location:index.php");
	}
	if($_SESSION["usertype"] != "user"){
		header("Location:admin.php");
	}
	include_once("connect.php");
	header("Content-Type: application/json; charset=UTF-8");
	
	$sql = "select count(*) as total_user, user from activities group by user";
	$result = $mysql_link->query($sql);
	$data = array();	
	while($row = $result->fetch_assoc()){
		$data[$row["user"]]["total_user"] = $row["total_user"];
	}	
	
	$sql2 = "select count(*) as echo_user, user from activities where type = 'ON_FOOT' or type = 'WALKING' or type = 'ON_BICYCLE' or type = 'RUNNING' group by user";
	
	$result = $mysql_link->query($sql2);
	while($row = $result->fetch_assoc()){
		$data[$row["user"]]["echo_user"] = $row["echo_user"];
	}
	
	$echo = array();
	foreach($data as $user => $element){
		if($element["total_user"] == 0){
			array_push($echo, array("user" => $user, "echo" => 0));
		}
		else{
			array_push($echo, array("user" => $user, "echo" => $element["echo_user"]/ $element["total_user"] * 100));
		}
	}
	
	echo json_encode(array_slice(sort_array($echo),0, 3));
	
	function sort_array($array){
		do
		{
			$swapped = false;
			for($i = 0; $i < count($array) -1; $i++){
				if( $array[$i]["echo"] < $array[$i + 1]["echo"] ){
					list( $array[$i + 1], $array[$i] ) = array( $array[$i], $array[$i + 1] );
					$swapped = true;
				}
			}
		}
		while( $swapped );
		return $array; 
	} 
?>