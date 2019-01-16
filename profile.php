<?php
include('sanitize.php');
session_start();
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}
if(isset($_GET['u_id'])){
$user_id_test = cleanUp($_GET['u_id']);

$resultreal = mysqli_query($con,"SELECT * FROM `users` WHERE `ID`= '$user_id_test'");
while($row = $resultreal->fetch_assoc()) {

	
	echo '<div class="ani user photoFrame " u_id="'.$row["ID"].'" style="margin-bottom: '.rand(2, 6).'%;">
				<img src="'.$row["image"].'">
				<h2>'.$row["name"].'</h2>
				<h3>'.$row["gender"].'</h3>
			</div> ' ;

		
		
		
    }


		$result = mysqli_query($con,"SELECT * FROM `info` WHERE user_id = '$user_id_test' ");	
		$row =  $result->fetch_array(MYSQLI_BOTH);
		$result2 = mysqli_query($con,"SHOW COLUMNS FROM info");
		$i = 0; 
		while($row2 = mysqli_fetch_array($result2)){
			if($row[$i] != ""){
				if($row2['Field'] != "user_id"){
					if($row2['Field'] != "ID"){
						if($row[$i] != ""){
							switch ($row2['Field']) {
							case "askfm":
								echo 	'<a href="http://ask.fm/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
											<img src="images/askfm.png">
											<h2>ask.fm</h2>
											<h3>'.$row[$i].'</h3>
										</div></a>' ;
								break;
							case "google":
								echo 	'<a href="https://plus.google.com/s/'.$row[$i].'/top" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/google.png">
													<h2>google+</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "instagram":
								echo 	'<a href="https://www.instagram.com/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "twitter":
								echo 	'<a href="https://twitter.com/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "reddit":
								echo 	'<a href="https://www.reddit.com/user/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "tumblr":
								echo 	'<a href="http://'.$row[$i].'.tumblr.com" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "linkedin":
								echo 	'<a href="https://www.linkedin.com/vsearch/f?type=all&keywords='.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "flickr":
								echo 	'<a href="  https://www.flickr.com/photos/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "pinterest":
								echo 	'<a href="  https://pinterest.com/'.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
							case "youtube":
								echo 	'<a href="https://www.youtube.com/results?search_query='.$row[$i].'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
								
								case "whatsapp":
								echo 	'<a  Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
								case "wechat":
								echo 	'<a  Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
								case "snapchat":
								echo 	'<a Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
													<img src="images/'.$row2['Field'].'.png">
													<h2>'.$row2['Field'].'</h2>
													<h3>'.$row[$i].'</h3>
												</div></a>' ;
								break;
								
							
							default:
								echo 	'<a Style="color: inherit;">
										<div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
																<img src="images/logo.png">
																<h2>Get and Share Social info</h2>
																<h3>ID = '.$user_id_test.'</h3>
															</div></a>' ;
								echo 	'<a href="https://www.facebook.com/'.$user_id_test.'" Style="color: inherit;"><div class="ani photoFrame "  style="margin-bottom: '.rand(2, 6).'%;">
										<img src="images/'.$row2['Field'].'.png">
										<h2>'.$row2['Field'].'</h2>
										<h3>'.$row[$i].'</h3>
										</div></a>' ;
						}
						}
					}
			}
			
			}else{
			
			//echo "<h2 class='ani'>".$row2['Field']." - &&&</h2><br>";
			
			}
		$i++;
		
		}	
}     


		
