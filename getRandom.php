<?php
include('sanitize.php');
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}


$result = mysqli_query($con,"SELECT * FROM `users` ORDER BY RAND() LIMIT 3");



	
while($row = $result->fetch_assoc()) {

	echo '<div class="ani user photoFrame " u_id="'.$row["ID"].'" style="margin-bottom: '.rand(2, 6).'%;">
				<img src="'.$row["image"].'">
				<h2>'.$row["name"].'</h2>
				<h3>'.$row["gender"].'</h3>
			</div> ' ;
		
		
		
    }

