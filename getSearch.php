<?php
include('sanitize.php');
session_start();
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}


							
if(isset($_GET['query'])){
   $query = cleanUp($_GET['query']);
	$sql=" SELECT * FROM users WHERE name like '%".$query."%' OR ID = '$query' ";   
	$result = mysqli_query($con,$sql) or die(mysql_error());	
	if (!mysqli_num_rows($result)==0){
		while($row = $result->fetch_assoc()) {
			echo '<div class="ani user photoFrame " u_id="'.$row["ID"].'" style="margin-bottom: '.rand(2, 6).'%;">
						<img src="'.$row["image"].'">
						<h2>'.$row["name"].'</h2>
						<h3>'.$row["gender"].'</h3>
					</div> ' ;
		}
	}else{
		echo '<div class="ani photoFrame " style="margin-bottom: '.rand(2, 6).'%;">
						<img src="images/goto.png">
						<h2>No results</h2>
						<h3></h3>
					</div> ' ;
	}	
					
}        
      