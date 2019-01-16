<?php
include('sanitize.php');
session_start();
if(!isset($_SESSION['ID'])){
	header("location:index.php");
}


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
<style>
*{
font-family: 'Libre Baskerville', serif;
}
.fixed {
position: fixed;
right:0;
}

.btn.outline {
	background: #00a0d6;
    padding: 12px 22px;
	
}
.btn-primary.outline {
border: 2px solid #fcf8e3;
    color: #ffffff;
    font-weight: bold;
    margin-bottom: 2%;
    width: 22%;
    margin-right: 3%;
}
.btn-primary.outline:hover, .btn-primary.outline:focus, .btn-primary.outline:active, .btn-primary.outline.active, .open > .dropdown-toggle.btn-primary {
	border: 2px solid #fff;
    color: #fff;
}
.btn-primary.outline:active, .btn-primary.outline.active {
	border: 2px solid #fff;
    color: #fff;
	box-shadow: none;
}
.container{
	 padding: 3%;
}
.photoFrame{
	background-color: white;
    width: 29%;
    text-align: center;
    padding-top: 2%;
    padding-bottom: 0.5%;
    display: inline-table;
    margin-bottom: 2%;
    margin-left: 3%;
	box-shadow: 5px 5px 10px #a9a9a9;
}
.photoFrame img{
width: 87%;	
}
.photoFrame h2{
	font-size: 180%;
	margin-bottom: -5%;
	margin-top: 1%;
	color: #4e4e4e;
    font-weight: bolder;
}
.photoFrame h3{
	font-size: 104%;
	color: #4e4e4e;
}
.items{
	margin: auto;
    width: 90%;
}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=288329941372483";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body style="background-image: url('images/bg2.png')">
			<div class="form-group row " style="margin-left: 12%;margin-bottom: -2%;">
				<h2><label for="text-input" class="col-xs-2 col-form-label label label-primary" style="width: auto;">Search</label></h2><h2>
				<div class="col-xs-10">
					<input class="form-control search" type="text" value="">
				</div> 
			</h2></div>
							
		<div class="container" id="loadIn" style="width:100%;text-align: -webkit-center;padding-bottom: 35%;">
		
			
			
		</div>
		
	 
		

	 <div class="col-xs-2 col-md-2 navbar navbar-fixed-bottom" id="sidebar" style="width: 100%;height: 20%;Text-align:center;background-image: url('images/bg2.png');">
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Users</a>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Female</a>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Male</a>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Random</a>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >My Profile</a>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Update Details</a>
			<a class="btn btn-primary btn-lg outline load" href="http://google.com" role="button" >Get our App</a>
			<a class="btn btn-primary btn-lg outline load" id = "share_button" role="button"style="width:initial;" >Share your ID on Facebook</a><br>
			
			<div class="fb-like" data-href="https://www.facebook.com/GetShare-Social-media-Info-604936769713525/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</div>
	
</body>


<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: 'Get share social media info',
link: 'http://localhost/myphp/joiner.com/',
picture: 'http://www.w3schools.com/images/w3schools_green.jpg',
caption: 'We support more than 13+ social sites',
description: "Use This ID to Search for all my info <?php echo $_SESSION['ID'];?>. All our Features We Offer: Search Users Using Name Or Our Unique ID,Get Female Users,Get Male Users,Get Random Users and Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media",
message: ""
});
});
});
</script>
<script type="text/javascript">

 $(document).ready(function() {

  $.ajax({    
        type: "GET",
        url: "getUpdate Details.php",             
        dataType: "html",                 
        success: function(response){                    
            $("#loadIn").html(response); 
           
        }

    });
	
	 
	 $('body').on('click', '.user', function (){
       var u_id = $(this).attr("u_id");
		$.ajax({    
				type: "GET",
				url: "profile.php?u_id="+u_id,             
				dataType: "html",                 
				success: function(response){  
								
					$("#loadIn").html(response);
					$('.ani').addClass('animated ZoomIn');
				}
			});
    });
	$('body').on('keyup', '.search', function (){
       var searchValue = $(this).val();
		$.ajax({    
				type: "GET",
				url: "getSearch.php?query="+searchValue,             
				dataType: "html",                 
				success: function(response){  
								
					$("#loadIn").html(response);
					$('.ani').addClass('animated ZoomIn');
				}
			});
    });
	 $('body').on('click', '.submit', function (){
		        var u_id = <?php echo $_SESSION['ID'];?>;   
				var facebook = $("#facebook").val()
				var youtube = $("#youtube").val();         
				var instagram = $("#instagram").val();     
				var twitter = $("#twitter").val();         
				var reddit = $("#reddit").val();          
				var tumblr = $("#tumblr").val();          
				var linkedin = $("#linkedin").val();      
				var flickr = $("#flickr").val();         
				var pinterest = $("#pinterest").val();    
				var askfm = $("#askfm").val();       
				var google = $("#google").val();          
				var whatsapp = $("#whatsapp").val();      
				var snapchat = $("#snapchat").val();      
				var wechat = $("#wechat").val();
				
		
		 
       $.ajax({    
				type: "GET",
				url: "sendData.php?u_id="+u_id+"&facebook="+facebook+"&youtube="+youtube+"&instagram="+instagram+"&twitter="+twitter+"&reddit="+reddit+
								"&tumblr="+tumblr+"&linkedin="+linkedin+"&flickr="+flickr+"&pinterest="+pinterest+"&askfm="+askfm+"&google="+google
								+"&whatsapp="+whatsapp+"&snapchat="+snapchat+"&wechat="+wechat,
				dataType: "html",                 
				success: function(response){  
						$.ajax({    
							type: "GET",
							url: "getMy Profile.php",             
							dataType: "html",                 
							success: function(response){    
																
									$.ajax({    
										type: "GET",
										url: "getMy Profile.php",             
										dataType: "html",                 
										success: function(response){                    
											$("#loadIn").html(response);
											$('.ani').addClass('animated ZoomIn');
										}
									});
							}
						});
				}
			});
    });
	
	
	
	 $('.load').on("click", "", function(){
		 var loadInfo = $(this).text();
		$.ajax({    
				type: "GET",
				url: "get"+loadInfo+".php",             
				dataType: "html",                 
				success: function(response){                    
					$("#loadIn").html(response);
					$('.ani').addClass('animated ZoomIn');
				}
			});
	 
	 });
	
 
 });

</script>