<?php

$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}


$output = "[";
$package = array();
$result = mysqli_query($con,"SELECT * FROM `users` ORDER BY RAND() LIMIT 1");

	
while($row = $result->fetch_assoc()) {
		$package["ID"] = $row["ID"];
		$package["name"] = $row["name"];
		$package["email"] = $row["email"];
		$package["image"] = $row["image"];
		$package["gender"] = $row["gender"];
		$output .= json_encode($package);
    }

$output .="]";
echo $output;