<?php
function logout($user){
	include('lgin.php');
	$connect = new mysqli($db_host, $db_user, $db_pass, $db_database);
if($connect){
	$dbcheck = $connect->select_db($db_database);
	$loggedQuery = "UPDATE user SET loggedOn = 0, inChat = 0, playingGame = 0, status = 'offline' WHERE Username = '$user' ";
	$query = $connect->query($loggedQuery);
	$connectionClosed = $connect->close();
	unset($_SESSION['usrnme']);
	session_destroy();
	header('location:index.php');
}
};



?>