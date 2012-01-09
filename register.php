<?php
session_start();
if(isset($_SESSION['regError'])){
$error = $_SESSION['error'];
}
else{$error = "";}
$user ="";

#### All the Includes ####
include("lib/lgin.php");	 	 //login info
include('lib/design.php');		     //	Design aspects of the project - i.e.- the header heading();



######################################### DESIGN ASPECTS ###########################################
heading($user);																					   #
background();
####################################################################################################

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resgister on Fall of Kingdoms</title>
<!-- Style Sheets and fonts from google -->
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="css/design.css" />
<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Squada+One' rel='stylesheet' type='text/css'>
<script src="js/jQuery.js"></script>
<script src="js/fokFunctions.js"></script>
<script>
$(function(){
		
//#################################################################################
//		IT IS NOT FINISHED, HIDING THE FORM
//#################################################################################
	$('#userInfo').hide();
	$('#contactInfo').hide()
$('.inputs').focus(function(){	
					$(this).val("");
							});
							});
</script>
</head>

<body>

<!-- NEED TO FORMAT THE REGISTER PAGE -->

<form action="lib/registrationCheck.php" method="post">
<div id="userInfo">
<table>
<tr>
<td>
username:</td><td><input name="username" type="text" value="username" id="usernameInput" class="inputs"/></td>
</tr><tr><td>password:</td><td><input name="password" type="password" value="" id="passwordInput" class="inputs"/></td>
</tr><tr><td>Re-type password:</td><td><input name="re-password" type="password" value="" id="passwordInput" class="inputs"/></td></tr></table>
</div>
<div id="contactInfo">
<input name="Name" type="text" value="Name" id="nameInput" class="inputs"/>
<input name="Address" type="text" value="address" id="addressInput" class="inputs"/>
<input name="Zip" type="text" value="zip" id="zipInput" class="inputs"/>
<input name="City" type="text" value="city" id="cityInput" class="inputs"/>
<input name="State" type="text" value="state" id="statebInput" class="inputs"/>
</div>
</body>
</html>