<?php
##Start the session##
session_start();

#### All the Includes ####
include("lib/lgin.php");	 	 //login info
include("lib/functions.php");	 // Several functions I want to use
include('lib/design.php');		     //	Design aspects of the project - i.e.- the header heading();

#### Variables ####

# if there is a user session #
if(isset($_SESSION['usrnme'])){
	$user = $_SESSION['usrnme'];
}
else{$user="";}

## Error- If there was an error on the previous login attempt##
if(isset($_SESSION['error'])){$error = $_SESSION['error'];}
else{$error = "";}

## LOGOUT // Look for a $_GET['logout'].. if it is present run the function logout() located in the lib/functions.php file.##
if(isset($_GET['logout'])){
	if($user){
	logout($user);
	}
}
if(isset($_SESSION['usrnme'])){
header('Location:memberIndex.php');	
}

######################################### DESIGN ASPECTS ###########################################
heading($user);																					   #
background();
latestNews();
####################################################################################################

	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to Fall of Kingdoms</title>
<!-- Style Sheets and fonts from google -->
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="css/design.css" />
<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Squada+One' rel='stylesheet' type='text/css'>

<!-- jQuery Starts Here -->
<script src="js/jQuery.js"></script>
<script src="js/fokFunctions.js"></script>
<script>
$(function(){
		   
		  	setInterval(function(){usernameCheck()}, 8000);
			
		   // For the username and password inputs to clear when you click in them
		   $('.inputs').focus(function(){
					$(this).val("");
		$(this).css({'color':'#3F3F3F'});					
									   });
		   
		
		   });

</script>
</head>
<body>

<!-- Login Box -->
<div id="loginContainer"><div id="loginBox"><div id="loginBox_GrayBar"><?php if($user){echo"welcome back, ".$user;} else{echo "login";}?></div>
<img src="img/login.png" id="loginPicture"/>


<!-- Inputs and the labels -->
<form method="post" action="lib/loginCheck.php" id="loginForm">
<table id="loginInput">
<tr>
<td><label id="user">username:</label></td><td><input class="inputs" id="username" name="username" value="username" /></td></tr>
<tr>
<td><label id="pass">password:</label></td><td><input class="inputs" id="password" name="password" value="password" type="password" /></td></tr>
<input type="submit" name="submit" id="indexSubmit" value="Submit"/>
</table>
</form>
<div id="loginError"><?php echo $error; ?></div>
</div></div>

<!-- New Player Section. Register button and new player guide link -->
<div id="newPlayer"><div id="newPlayer_GrayBar">new player</div>
<p>Are you new to Fall of Kingdoms? Well let us help you get started! You can read through our new player"s guide. Also, go ahead and get registered so you can begin playing.</p>
</div>

<!-- Current players links. Misc link to information -->
<div id="currentPlayer"><div id="currentPlayer_GrayBar">current player</div>
   <a href= "#">leaderboards</a><br />
   <a href= "#">class guides</a><br />
   <a href= "#">skill calculator</a>

</div>

<!-- LORE CONTAINER - A link to read the lore behind the game --> 
<div id="loreContainer"><div id="loreContainer_GrayBar">the lore</div>
<p>We are still working on getting all of the lore compiled. But we invite you to check out what we do have.</p>
</div>

<!-- MEDIA CONTAINER - Holds all media i.e. screenshots and wallpapers. Video if Applicable -->
<div id="mediaContainer"><div id="mediaContainer_GrayBar">media</div>
<a href="#">Check out the Screenshots</a><br/>
<a href="#">Wallpapers are now available</a><br />
<a href="#">More media coming soon</a>
</div>


<!-- CONTACT CONTAINER -->
<div id="contactContainer"><div id="contactContainer_GrayBar">contact</div>
<p>
Chris Johnson<br />
Lubbock, Texas<br />
cjohnson8527@gmail.com
</p>
</div>
</body>
</html>