<?php
include('sanitize.php');
session_start();
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}
if(isset($_SESSION['ID'])){
	$user_id_test = cleanUp($_SESSION['ID']);


		$result = mysqli_query($con,"SELECT * FROM `info` WHERE user_id = '$user_id_test' ");	
		$row =  $result->fetch_array(MYSQLI_BOTH);
		$result2 = mysqli_query($con,"SHOW COLUMNS FROM info");
		
	
		
		$i = 0; 
		while($row2 = mysqli_fetch_array($result2)){
			
			if($row2['Field'] != "ID"){
				if($row2['Field'] != "user_id"){
					
					if($row[$i] != ""){
						
							if($row2['Field'] == "ask.fm"){
								echo '  <div class="form-group row ani items" style="margin-left: 12%;width: 87%;">
								  <h2><label for="text-input"  class="col-xs-2 col-form-label label label-primary" style="width: auto;">'.$row2['Field'].'</label><h2>
									<div class="col-xs-10">
										<input class="form-control" id="askfm" type="text" value="'.$row[$i].'" >
									</div> 
								</div>';
							}else if($row2['Field'] == "google+"){
								echo '  <div class="form-group row ani items" style="margin-left: 12%; width: 87%;">
								  <h2><label for="text-input"  class="col-xs-2 col-form-label label label-primary" style="width: auto;">'.$row2['Field'].'</label><h2>
									<div class="col-xs-10">
										<input class="form-control" id="google" type="text" value="'.$row[$i].'" >
									</div> 
								</div>';
							}else if($row2['Field'] == "whatsapp"){
								echo '  <div class="form-group row ani items" style="margin-left: 12%; width: 87%;">
								  <h2><label for="text-input"  class="col-xs-2 col-form-label label label-primary" style="width: auto;">'.$row2['Field'].'</label><h2>
									<div class="col-xs-10">
										<input class="form-control" data="test" id="'.$row2['Field'].'" type="number"  value="'.$row[$i].'" >
									</div> 
								</div>';
							}else{
								echo '  <div class="form-group row ani items" style="margin-left: 12%; width: 87%;">
								  <h2><label for="text-input"  class="col-xs-2 col-form-label label label-primary" style="width: auto;">'.$row2['Field'].'</label><h2>
									<div class="col-xs-10">
										<input class="form-control" id="'.$row2['Field'].'" type="text" value="'.$row[$i].'" >
									</div> 
								</div>';
							}
							
					}else{
						echo '  <div class="form-group row ani items" style="margin-left: 12%;width: 87%;">
							  <h2><label for="text-input" class="col-xs-2 col-form-label label label-primary" style="width: auto;">'.$row2['Field'].'</label><h2>
								<div class="col-xs-10">
									<input class="form-control" type="text" value="" id="'.$row2['Field'].'">
								</div> 
							</div>';
					}							
							
				}
			
			}
		$i++;
		
		}	
		echo '<a class="btn btn-primary btn-lg outline submit" href="#" role="button" style="margin-top:3%;">Submit</a>';
}     


		
