<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location:index.php");
	}
	if($_SESSION["usertype"] != "user"){
		header("Location:admin.php");
	}
	if(!file_exists($_FILES["file"]["name"]))
	{
		move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
	}
	include_once("connect.php");
	$file = file_get_contents($_FILES["file"]["name"]);
	$data = json_decode($file);
	$sql = "select max(id) as maximum_id from locations";
	$result = $mysql_link->query($sql);
	$row = $result->fetch_assoc();
	$locations_query = "insert into locations(id, user,heading,verticalAccuracy, velocity, accuracy, longitudeE7, latitudeE7, altitude, timestampMs) values ";
	$activities_query = "insert into activities(location, user, type, confidence, timestamp) values ";
	if($row["maximum_id"] == null){
		$location_id = 0;
	}
	else{
		$location_id = $row["maximum_id"] + 1;
	}
 	foreach($data as $dat){
		foreach($dat as $loc){
			$longitude = $loc->longitudeE7 / 10 ** 7;
			$latitude = $loc->latitudeE7 / 10 ** 7;
			$longitude2 = 38.230462;
			$latitude2 = 21.753150;
			$theta = $longitude - $longitude2;
			$dist = sin(deg2rad($latitude)) * sin(deg2rad($latitude2)) +  cos(deg2rad($latitude)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			$kilometers = $miles * 1.609344; 

			if($kilometers <= 10000){
 				$accuracy = $loc->accuracy;
				if(isset($loc->heading)){
					$heading = $loc->heading;
				}
				else{
					$heading = "NULL";
				}
				if(isset($loc->verticalAccuracy)){
					$verticalAccuracy = $loc->verticalAccuracy;
				}
				else{
					$verticalAccuracy = "NULL";
				}
				if(isset($loc->velocity)){
					$velocity = $loc->velocity;
				}
				else{
					$velocity = "NULL";
				}
				if(isset($loc->altitude)){
					$altitude = $loc->altitude;
				}
				else{
					$altitude = "NULL";
				}
				$phptime = $loc->timestampMs / 1000;
				$mysqltime = date ("Y-m-d H:i:s", $phptime);
				$locations_query .= "(".$location_id.", '".$_SESSION["user_id"]."' , ".$heading.", ".$verticalAccuracy.", ".$velocity.", ".$accuracy.", ".$longitude.", ".$latitude.",".$altitude.", '".$mysqltime."'),";
				if(isset($loc->activity)){
					foreach($loc->activity as $activity){
						$phptime = $activity->timestampMs / 1000;
						$mysqltime = date ("Y-m-d H:i:s", $phptime);
						if(isset($activity->activity)){
							foreach($activity->activity as $activity_det){
								$type = $activity_det->type;
								$confidence = $activity_det->confidence;
								$activities_query .= "(".$location_id.", '".$_SESSION["user_id"]."' , '".$type."' ,".$confidence." , '".$mysqltime."'),";
							}
						}
					}
				} 
				$location_id++; 
			}
		}
	} 
	
	if($mysql_link->query("update users set uploaded = '".date ("Y-m-d H:i:s")."' where user_id = '".$_SESSION["user_id"]."'")){
		echo 1;
	}
	else{
		echo 0;
	}
	if($mysql_link->query(substr($locations_query ,0,-1))){
		echo 1;
	}
	else{
		echo 0;
	} 
	
	if($mysql_link->query(substr($activities_query ,0,-1))){
		echo 1;
	}
	else{
		echo "Insert activities failed";
	} 
	$mysql_link->close();
?>