<?php
include('sanitize.php');
session_start();
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;

if(!$con){
	echo ("Host Connecting Error");
}

if(isset($_SESSION['ID'])){
	$ID = cleanUp($_SESSION['ID']);
	$facebook = cleanUp($_GET['facebook']);
	$youtube = cleanUp($_GET['youtube']);
	$instagram = cleanUp($_GET['instagram']);
	$twitter = cleanUp($_GET['twitter']);
	$reddit = cleanUp($_GET['reddit']);
	$tumblr = cleanUp($_GET['tumblr']);
	$linkedin = cleanUp($_GET['linkedin']);
	$flickr = cleanUp($_GET['flickr']);
	$pinterest = cleanUp($_GET['pinterest']);
	echo $askfm = cleanUp($_GET['askfm']);
	$google = cleanUp($_GET['google']);
	$whatsapp = cleanUp($_GET['whatsapp']);
	$snapchat = cleanUp($_GET['snapchat']);
	 $wechat = cleanUp($_GET['wechat']);  


 $result = $con->query("UPDATE info SET youtube = '$youtube', 
												facebook = '$facebook',
												instagram = '$instagram', 
												twitter = '$twitter', 
												reddit = '$reddit', 
												tumblr = '$tumblr', 
												linkedin = '$linkedin', 
												flickr = '$flickr', 
												pinterest = '$pinterest', 
												askfm = '$askfm', 
												google = '$google', 
												snapchat = '$snapchat', 
												wechat = '$wechat', 
												whatsapp = '$whatsapp'
												WHERE user_id = '$ID'");
						
}