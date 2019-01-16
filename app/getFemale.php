<?php

$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}


$output = "[";
$package = array();
$result = mysqli_query($con,"SELECT * FROM `users`");

	
while($row = $result->fetch_assoc()) {
		if($row["gender"] == "female"){
			$package["ID"] = $row["ID"];
			$package["name"] = $row["name"];
			$package["email"] = $row["email"];
			$package["image"] = $row["image"];
			$package["gender"] = $row["gender"];
			$output .= json_encode($package);
		}
    }

$output .="]";
echo $output;