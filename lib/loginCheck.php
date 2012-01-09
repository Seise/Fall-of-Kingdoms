<?php
session_start();
	# GET THE POSTS FROM THE LOGIN BOX #
	#username#
$user = strtolower($_POST['username']);
$user = ucwords($user);
	#password#
$password = $_POST['password'];
	#include the info#
include('lgin.php');
	#login to the database using that info#
$connect = new mysqli($db_host, $db_user, $db_pass, $db_database);
if($connect){
	$dbcheck = $connect->select_db($db_database);

	$query = "SELECT * FROM user WHERE Username ='".$user."' AND  Password ='".$password."'";
		#querying the DB#
	$result = $connect->query($query);
	if($result){
	}
		#if there is a result, BINGO, we are in#
	$check = mysqli_num_rows($result);

if($check == 1){

		#Now if we find the match, we need to go ahead and tell the DB that we are logged in and our status is online#
	$dbcheck = $connect->select_db($db_database);
	$loggedQuery = "UPDATE user SET loggedOn = 1, status = 'online' WHERE Username = '$user' ";
	$query = $connect->query($loggedQuery);
		#If we had errors on the last attempt, lets forget about it#
	if(isset($_SESSION['error'])){
		unset($_SESSION['error']);
	}
		# So lets start a new session that has our username and lgin = 1"
	$_SESSION['usrnme'] = $user;
	$_SESSION['lgin'] = 1;
		#And we are wisked away to memberIndex.php
	header("Location: ../memberIndex.php");
}
else{
		#If you messed up... Error is given and we send you back to try again#
	$_SESSION['error'] = "Oops, try logging in again";
	header("Location: ../index.php");
	
}
}

?>