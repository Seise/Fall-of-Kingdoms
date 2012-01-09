// JavaScript Document
$('#characterList').hide();
$('#friendList').hide();
$('#messageList').hide();
// ################# USED ON INDEX.PHP ####################################\\
// VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV\\
function usernameCheck(){
				//checks to make sure that the username and password fields are not blank... 
				//if so they refill the field with username and password respectively
				var usernameVal = $('#username').val();
				var passwordVal = $('#password').val();
				if(usernameVal ==""){
				$('#username').val("username");
				$('#username').css({'color':'red'});
				}
				if(passwordVal ==""){
				$('#password').val("password");
				$('#password').css({'color':'red'});
				}
		   };

 // ################# USED ON           ################################### \\
// VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV  \\

	var charNum = 0;
	var friendNum = 0;
	var messageNum = 0;
	
   $('#charText').click(function(){
					if(charNum == 0){
					$('#characterList').fadeIn()
									charNum = 1;
					}
					else{
						$('#characterList').fadeOut(500);
					charNum=0;
					}
									});
   
   
   $('#friendText').click(function(){
						if(friendNum == 0){
					$('#friendList').fadeIn()
									friendNum = 1;
					}
					else{
						$('#friendList').fadeOut(500);
					friendNum=0;
					}
										 });
   $('#messageText').click(function(){
						if(messageNum == 0){
					$('#messageList').fadeIn()
									messageNum = 1;
					}
					else{
						$('#messageList').fadeOut(500);
					messageNum=0;
					}
										 });
   
  