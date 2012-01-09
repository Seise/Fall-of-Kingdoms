<?php
function heading($user){
	
	###if the user is logged on, give them the option to go ahead and logout
	if(isset($user)){
		if(!$user = ""){
	echo '<div id = "logout"><a href="index.php?logout=1">Logout</a></div>';}}
 if(!isset($user)){
		   $dropDownEmpty = "You are not logged in";
		   }
 if($user = ""){
   $dropDownEmpty = "You are not logged in";
 }
### The titlebar  with the logo in this bar ###
### Also contains the drop down menus as well. Will need to add the jQuery behavior as well. ###
echo '
<div id="titleBar"><img id="mainTitle" src="img/mainTitle.png" title="Fall of Kingdoms "/></div>
<div id="dropDownMenus">
<!-- Drop Down Menus -->
<div id="charDropDown"><div id="charText">Characters</div></div>
<div id="friendDropDown"><div id="friendText">Friends</div></div>
<div id="messageDropDown"><div id="messageText">Messages</div></div>
<!-- Actual lists -->
<div id="characterList" class="drops">
</div>
<div id="friendList" class="drops">'.$user.'</div>
<div id="messageList" class="drops"></div>

</div>
';
};

### This is the background as well as a div to cover up the picture so you dont select it everytime you click in that area. ###
function background(){
	echo "<div id ='backgroundCover'></div>";
	echo '<img src="img/bodybackground.png" id="backgroundPic"/>';
};


function latestNews(){
echo'
<!-- Latest News- Essentially the blog for the site. Keep people up to date. -->
<div id="latestNews"><div id="latestNews_GrayBar">latest news</div>';
include('lgin.php');
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);
	if($mysqli){
		$dbcheck = $mysqli->select_db($db_database);
	$sql = "SELECT * FROM latestnews ORDER BY articleId DESC";
	$result = $mysqli->query($sql);
	}
if($result){
while($row = $result->fetch_object()){
		## BASIC INFO ##
		$title = $row->articleTitle;
		$content = $row->articleContent;
		$picture = $row->articleImg;
		
		## AND DO SOMETHING WITH THIS INFORMATION##
	echo"<div class='articleContainer'>";
	echo "<div class ='articlePicture'><img src=".$picture." /></div>";
	echo "<div class='articleTitle'>".$title."</div>";
	echo "<div class='articleContent'>".$content."</div>";
	echo'</div><br />';
		
	}

	}
	echo "</div>";
};