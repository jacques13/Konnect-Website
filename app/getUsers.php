<?php
include('sanitize.php');
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}


$output = "[";
$package = array();
$result = mysqli_query($con,"SELECT * FROM `users`");
$num_rows = mysqli_num_rows($result);
$i = 0;
	
while($row = $result->fetch_assoc()) {
		$i = 1+$i;
		$package["ID"] = $row["ID"];
		$package["name"] = $row["name"];
		$package["email"] = $row["email"];
		$package["image"] = $row["image"];
		$package["gender"] = $row["gender"];
		$output .= json_encode($package);
		if($num_rows != $i){
		$output .= "," ;
		}
    }

$output .="]";
echo $output;