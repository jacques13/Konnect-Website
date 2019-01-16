<?php

$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}
$output = "[";
$package = array();

if(isset($_GET['ID'])){
$ID = $_GET['ID'];


		$result = mysqli_query($con,"SELECT * FROM `info` WHERE user_id = '$ID' ");	
		$row =  $result->fetch_array(MYSQLI_BOTH);
		$result2 = mysqli_query($con,"SHOW COLUMNS FROM info");
		$i = 0; 
		while($row2 = mysqli_fetch_array($result2)){
			if($row2['Field'] != "ID"){
				if($row2['Field'] != "user_id"){
					if($row[$i] != ""){
					$field = $row2['Field'];
					$package[$field] = $row[$i];
					}else{
					$field = $row2['Field'];
					$package[$field] = "";
					}
				}
			}
		$i++;
		
		}
		$output .= json_encode($package);
		
		
$output .="]";

}
echo $output;