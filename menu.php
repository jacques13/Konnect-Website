<?php
include('sanitize.php');
session_start();

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;


if($detect->isMobile()){
header("location:menuMobile.php");	
}
if($detect->isTablet()){
header("location:menuTablet.php");	
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(!isset($_SESSION['ID'])){
	header("location:index.php");
}
/*if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
	header("location:menuMobile.php");
}*/



?>
<head>
	<title>Get/Share Social media Info</title>

</head>
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
	margin-bottom: 3%;
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
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1821504681400004";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body style="background-image: url('images/bg2.png')">

	<div class="row" >
							<div class="form-group row " style="margin-left: 12%;">
								<h2><label for="text-input"  class="col-xs-2 col-form-label label label-primary" style="width: auto;">Search</label><h2>
								<div class="col-xs-10">
									<input class="form-control search" type="text" value="" >
								</div> 
							</div>
		<div class="col-xs-16 col-sm-6 col-md-10 container" id="loadIn" style="width: 83.33333%;text-align: -webkit-center;">
		
			
			
		</div>
		
	  
		<div class="col-xs-2 col-md-2 fixed" id="sidebar" style="width: 21%;height: 100%;">
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Users</a><br>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Female</a><br>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Male</a><br>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Random</a><br>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >My Profile</a><br>
			<a class="btn btn-primary btn-lg outline load" href="#" role="button" >Update Details</a><br>
			<a class="btn btn-primary btn-lg outline load" href="http://google.com" role="button" >Get our App</a>
			<a class="btn btn-primary btn-lg outline load" id = "share_button" role="button"style="font-size: 94%;" >Share your ID on Facebook</a>
			
			<div class="fb-like" data-href="https://www.facebook.com/GetShare-Social-media-Info-604936769713525/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</div>
</body>



<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
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