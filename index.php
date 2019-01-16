<?php
session_start();
include('sanitize.php');

if(isset($_SESSION['ID'])){
	header("location:menu.php");
}
$con = mysqli_connect('localhost', 'root', '', 'instantaneous');;
$facebookLoginBtn = "";
if(!$con){
	echo ("Host Connecting Error");
}	
		# Start the session 
	if(!session_id()) {
		session_start();
	}
	
	# Autoload the required files
	require_once __DIR__ . '/vendor/autoload.php';
	
	# Set the default parameters
	$fb = new Facebook\Facebook([
	  'app_id' => '1821504681400004',
	  'app_secret' => '7fd6fd15bf51ddb49e5d1f1464eac242',
	  'default_graph_version' => 'v2.5',
	]);
	$redirect = 'http://localhost/myphp/joiner.com/';


	# Create the login helper object
	$helper = $fb->getRedirectLoginHelper();

	# Get the access token and catch the exceptions if any
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	# If the 
	if (isset($accessToken)) {
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page

		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);
		
		try {
		  $response = $fb->get('/me?fields=email,name,gender,birthday');
		  $userNode = $response->getGraphUser();
			
			
													
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
			

			$ID = $userNode->getId();
			$name = $userNode->getName();
			$email = $userNode->getProperty('email');
			$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
			$gender = $userNode->getProperty('gender');
			$_SESSION['ID'] = $userNode->getId();
			
			 
			$result = mysqli_query($con,"SELECT * FROM `users` WHERE `ID` =".$userNode->getId());
			 $num_rows = mysqli_num_rows($result);
			 
			if ($num_rows == 0) {
			  $result = mysqli_query($con,"INSERT INTO `users`(`ID`, `name`, `email`, `image`,`gender`) VALUES ('$ID','$name','$email','$image','$gender')");
			  $result = mysqli_query($con,"INSERT INTO `info`(`ID`, `user_id`, `facebook`) 
													VALUES ('','$ID','$name')");
			}	
			header("Refresh:0");
			
		
		/*
		//mobile
			echo '<div class="col-xs-18 col-sm-12" style="">
			<h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: 6%;">Get/Share Social Info</h1>
			<img class="ani" src="images/logo.png" style="height: auto;width: 60%;"><br>
			'.$facebookLoginBtn.'
			<div class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: -2%;">Konnect</div><br>
			<div class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: -2%;">Konnect</div>
		
		</div>';*/
		
		
		
	}else{
		$permissions  = ['email'];
		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
		$facebookLoginBtn = '<a class="ani" href="' . $loginUrl . '"><img src="images/facebookLogin.png" /></a>';
	}
	
	
?>
<body style="background-image: url('images/bg2.png');text-align: center;" data-gr-c-s-loaded="true">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
<style>
*{
font-family: 'Libre Baskerville', serif;
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
    box-shadow: 5px 5px 10px #7b7b7b;
    border-radius: 2%;
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
<div class="container">
    <div class="row">
	<?php
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;


	if($detect->isMobile()){
	echo '<div class="col-xs-18 col-sm-12" style="Text-align:center;">
			<h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: 6%;">Get/Share Social Info</h1>
			<img class="ani" src="images/logo.png" style="height: auto;width: 60%;"><br>
			<div class="ani user photoFrame" style="margin-top:6%;width: 85%;padding-bottom: 8%;">
				<h2>All our Supported Social Media</h2><br>
				<h3>- Facebook</h3>
				<h3>- Instagram </h3>
				<h3>- Snapchat</h3> 
				<h3>- Tumblr</h3>
				<h3>- Twitter</h3>
				<h3>- Linkedin</h3>
				<h3>- Pinterest</h3>
				<h3>- Reddit</h3>
				<h3>- Wechat</h3>
				<h3>- Whatsapp</h3>
				<h3>- Youtube</h3>
				<h3>- Askfm</h3>
				<h3>- Flickr</h3>
				<h3>- Google</h3>
			</div><br>
			<div class="ani user photoFrame" style="margin-top: 6%;width: 85%;padding-bottom: 8%;padding-left: 2%;padding-right: 2%;">
				<h2 style="margin-bottom: 3%;">Features</h2>
				<h3>- Search Users Using Name Or Our Unique ID</h3>
				<h3>- Get Female Users</h3>
				<h3>- Get Male Users</h3>
				<h3>- Get Random Users</h3>
				<h3>- Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media</h3>
			</div>
			'.$facebookLoginBtn.'
		
		</div>';
	}else if($detect->isTablet()){
		echo '<div class="col-xs-18 col-sm-12" style="Text-align:center;">
				<h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: 6%;">Get/Share Social Info</h1>
				<img class="ani" src="images/logo.png" style="height: auto;width: 60%;"><br>
				<div class="ani user photoFrame" style="margin-top:6%;width: 85%;padding-bottom: 8%;">
					<h2>All our Supported Social Media</h2><br>
					<h3>- Facebook</h3>
					<h3>- Instagram </h3>
					<h3>- Snapchat</h3> 
					<h3>- Tumblr</h3>
					<h3>- Twitter</h3>
					<h3>- Linkedin</h3>
					<h3>- Pinterest</h3>
					<h3>- Reddit</h3>
					<h3>- Wechat</h3>
					<h3>- Whatsapp</h3>
					<h3>- Youtube</h3>
					<h3>- Askfm</h3>
					<h3>- Flickr</h3>
					<h3>- Google</h3>
				</div><br>
				<div class="ani user photoFrame" style="margin-top: 6%;width: 85%;padding-bottom: 8%;padding-left: 2%;padding-right: 2%;">
					<h2 style="margin-bottom: 3%;">Features</h2>
					<h3>- Search Users Using Name Or Our Unique ID</h3>
					<h3>- Get Female Users</h3>
					<h3>- Get Male Users</h3>
					<h3>- Get Random Users</h3>
					<h3>- Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media</h3>
				</div>
				'.$facebookLoginBtn.'
			
			</div>';
	}else{
		echo '<div class="col-xs-6 col-sm-4">
			<div class="ani user photoFrame" style="margin-top:6%;float: left;width: 85%;padding-bottom: 8%;">
				<h2>All our Supported Social Media</h2><br>
				<h3>- Facebook</h3>
				<h3>- Instagram </h3>
				<h3>- Snapchat</h3> 
				<h3>- Tumblr</h3>
				<h3>- Twitter</h3>
				<h3>- Linkedin</h3>
				<h3>- Pinterest</h3>
				<h3>- Reddit</h3>
				<h3>- Wechat</h3>
				<h3>- Whatsapp</h3>
				<h3>- Youtube</h3>
				<h3>- Askfm</h3>
				<h3>- Flickr</h3>
				<h3>- Google</h3>
			</div>
		</div>				
		
		<div class="col-xs-6 col-sm-4" style="">
			<h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: 6%;">Get/Share Social Info</h1>
			<img class="ani" src="images/logo.png" style="height: auto;width: 60%;"><br>
			'.$facebookLoginBtn.'

		</div>
								
		<div class="col-xs-6 col-sm-4">
			<div class="ani user photoFrame" style="margin-top: 6%;float: right;width: 85%;padding-bottom: 8%;padding-left: 2%;padding-right: 2%;">
				<h2>Features</h2>
				<h3>- Search Users Using Name Or Our Unique ID</h3>
				<h3>- Get Female Users</h3>
				<h3>- Get Male Users</h3>
				<h3>- Get Random Users</h3>
				<h3>- Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media</h3>
			</div>
		</div>';
		
	}
	?>


		<!--<div class="col-xs-6 col-sm-4">
			<div class="ani user photoFrame" style="margin-top:6%;float: left;width: 85%;padding-bottom: 8%;">
				<h2>All our Supported Social Media</h2><br>
				<h3>- Facebook</h3>
				<h3>- Instagram </h3>
				<h3>- Snapchat</h3> 
				<h3>- Tumblr</h3>
				<h3>- Twitter</h3>
				<h3>- Linkedin</h3>
				<h3>- Pinterest</h3>
				<h3>- Reddit</h3>
				<h3>- Wechat</h3>
				<h3>- Whatsapp</h3>
				<h3>- Youtube</h3>
				<h3>- Askfm</h3>
				<h3>- Flickr</h3>
				<h3>- Google</h3>
			</div>
		</div>				
		
		<div class="col-xs-6 col-sm-4" style="">
			<h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: 6%;">Get/Share Social Info</h1>
			<img class="ani" src="images/logo.png" style="height: auto;width: 60%;"><br>
			<?php echo $facebookLoginBtn;?>

		</div>
								
		<div class="col-xs-6 col-sm-4">
			<div class="ani user photoFrame" style="margin-top: 6%;float: right;width: 85%;padding-bottom: 8%;padding-left: 2%;padding-right: 2%;">
				<h2>Features</h2>
				<h3>- Search Users Using Name Or Our Unique ID</h3>
				<h3>- Get Female Users</h3>
				<h3>- Get Male Users</h3>
				<h3>- Get Random Users</h3>
				<h3>- Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media</h3>
			</div>
		</div>-->
		
	
      </div>
</div>
<!--<br><img class="ani" src="images/logo.png" style="height: 50%;width:50%">
<br><h1 class="ani" style="color: #f1f1f1;font-weight: bolder;margin-bottom: -2%;">Konnect</h1>
<br><h4 class="ani" style="color: #f4f4f4;">Decription</h4>-->
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {
	
$('.ani').addClass('animated ZoomIn');

 });
</script>
</body>
	
	
