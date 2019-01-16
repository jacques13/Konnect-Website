<html>
<head>
</head>
<body>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({appId: '288329941372483', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: 'Get share social media info',
link: 'http://localhost/myphp/joiner.com/menu.php',
picture: 'http://www.groupstudy.in/img/logo3.jpeg',
caption: 'We support more than 13+ social sites',
description: "All our Features Search Users Using Name Or Our Unique ID,Get Female Users,Get Male Users,Get Random Users and Click On A Users Info To Be Transfered To Their Profile Page Of That Social Media",
message: ""
});
});
});
</script>
<img src = "share_button.png" id = "share_button">
</body>
</html>