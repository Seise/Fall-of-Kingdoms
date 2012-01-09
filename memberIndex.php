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
	$user = $_SESSION['usrnme'];}
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
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="css/design.css" />
<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Squada+One' rel='stylesheet' type='text/css'>
<!-- jQuery Starts Here -->
<script src="js/jQuery.js"></script>
<script src="js/fokFunctions.js"></script>
<script>

</script>
</head>

<body>
<!-- Where the buttons Reside! -->
<div id="buttonContainer">
<ul id="buttons">
<li class="button"><a href="#"><center><img src="img/managePic.png" /></center>Manage Characters</a></li> 
<li class="button"><a href="#"><center><img src="img/lobbyPic.png" /></center>Game Lobby</a></li> 
<li class="button"><a href="#"><center><img src="img/infoPic.png" /></center>Game Info</a></li>
</ul>
</div>
<!-- This will display a few of your messages -->
<div id="messageContainer"><div id="message_GrayBar">Messages</div>

</div>
<!-- Some info about your characters -->
<div id="characterResources"><div id="characterResources_GrayBar">Character Resources</div>
   <a href= "#">class guides</a><br />
   <a href= "#">class spells</a><br />
   <a href= "#">skill calculator</a>
   </div>
<!-- Show icons for your friends that are online and possibly offline...may add stat window to open on hover?-->
<div id="friendContainer"><div id="friendContainer_GrayBar">Friends</div></div>


<!-- LORE CONTAINER - A link to read the lore behind the game --> 
<div id="loreContainerMembers"><div id="loreContainer_GrayBar">the lore</div>
<p>We are still working on getting all of the lore compiled. But we invite you to check out what we do have.</p>
</div>

<!-- MEDIA CONTAINER - Holds all media i.e. screenshots and wallpapers. Video if Applicable -->
<div id="mediaContainerMembers"><div id="mediaContainer_GrayBar">media</div>
<a href="#">Check out the Screenshots</a><br/>
<a href="#">Wallpapers are now available</a><br />
<a href="#">More media coming soon</a>
</div>
</body>
</html>