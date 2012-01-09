<?php
session_start();
$user = $_SESSION['usrnme'];

//Simple exit message
#	if(isset($_GET['exit'])){
#	$fp = fopen("chat/gameroom.html", 'a');
#	fwrite($fp, "<div class='msgln'><i>User ". $user ." has left the Lobby.</i><br></div>");
#	fclose($fp);
#	header("Location: memhome.php?logout=1"); //Redirect the user
#	}

include('lgin.php');
include('functions.php');
include('design.php');
$connect = new mysqli($db_host, $db_user, $db_pass, $db_database);
if($connect){
	$dbcheck = $connect->select_db($db_database);

	$query = "SELECT * FROM gamerooms";
	$result = $connect->query($query);
	
}
$heading()

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/gameroom.css" />
</head>

<body bgcolor="7A7A7A">

</div><br /><br />
<center>Welcome to the Game Lobby</center>
<?php
if(isset($_SESSION['usrnme'])){
?>
<div id="wrapper">
	<div id="menu">
		<p class="welcome">Welcome, <b><?php echo $_SESSION['usrnme']; ?></b></p><div id="colors"><p id="whiteChange">White</p><p id="grayChange">Grey</p></div>
		
		<div style="clear:both"></div>
	</div>	
	<div id="chatbox"><?php
	if(file_exists("chat/gameroom.html") && filesize("chat/gameroom.html") > 0){
		$handle = fopen("chat/gameroom.html", "r");
		$contents = fread($handle, filesize("chat/gameroom.html"));
		fclose($handle);
		
		echo $contents;
	}
	?></div>
	
	<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  id="submitMSG" value="Send" />
	</form>
</div>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	$('#whiteChange').click(function(){
		$("#chatbox").css({"color":"#FFFFFF"},4000);
		});
	$('#grayChange').click(function(){
		$("#chatbox").css({"color":"#3F3F3F"},4000);
		});


	//If user submits the form
	$("#submitMSG").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
	
						   
	
function loadnscroll(){
$("#chatbox").load("chat/gameroom.html");
$("#chatbox").each( function(){

var scrollHeight = Math.max(this.scrollHeight, this.clientHeight);
this.scrollTop = scrollHeight - this.clientHeight;
cache:false;
});
}
	setInterval(function(){loadnscroll()}, 1000);

	
});
</script>
<?php
}
?>
<br />


<div id="roomContainer">
<div id="gamerooms">
<?php
while ($row = $result->fetch_object()){
	$number = $row->idNum;
	$title = $row->tableName;
	$text = $row->tableDescription;
	$map = $row->gameMap;
	
	$mode = $row->gameMode;
	$p1 = $row->player1;
	$p2 = $row->player2;
	$plevel = $row->playerLevel;
	$access = $row->access;
	
	$title = ucwords(strtolower($title));
	
	//echo '<a href="prebattlefield.php?room='.$number.'"><div class="gameRoom" id="gameRoom'.$number.'">';
echo "<a href='prebattlefield.php?room=".$number."'>
		<div class='eachRoom'>
		<img class='gameRoomLogo' src='gameRoomLogo.png' />
		<div id='greybarz'><div class='gamenumber'>Game Room ".$number."</div><div class='title'>".$title."</div></div>
		<ul class='gameMode'> <li>Game Mode:</li><li id='modeName'>".$mode."</li></ul><hr class='gameHR' />
		<ul class='gameMap'> <li>Game Map:</li><li id='mapName'>".$map."</li></ul><hr class='gameHR' />
		<div class='description'>Description:</div>
		<div class='descriptionText'>".$text."</div>
		<div class='access'>".$access."</div>
	<div 
</div></a>
";
}
?>
</div>

</div>





</body>
</html>