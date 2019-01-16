<?php
include('sanitize.php');
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}

if(isset($_GET["ID"])){
	$ID = cleanUp($_GET["ID"]);
	$name = cleanUp($_GET["name"]);
	$email = cleanUp($_GET["email"]);
	$image = $_GET["image"];
	$gender = cleanUp($_GET["gender"]);

	$result = mysqli_query($con,"SELECT * FROM `users` WHERE `ID` =".$ID);
		$num_rows = mysqli_num_rows($result);
		if ($num_rows == 0) {
		  $result = mysqli_query($con,"INSERT INTO `users`(`ID`, `name`, `email`, `image`,`gender`) VALUES ('$ID','$name','$email','$image','$gender')");
		   $result = mysqli_query($con,"INSERT INTO `info`(`ID`, `user_id`, `facebook`) 
													VALUES ('','$ID','$name')");
		}
}