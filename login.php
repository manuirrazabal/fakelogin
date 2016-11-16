<?php

/**
 * Fake Login page test.
 *
 * REQUIREMENTS
 * _____________________________________________
 * Meets the following requirements:
 * 1. Has a place for the username, password and a login button.
 * 2. The username, password and login button are placed inside a box and centered horizontally and vertically in the page. 
 * 3. Use CSS classes, no use of style attributes. 
 * 4. Uses ajax to submit the username and password for verification.
 * 5. If the username submitted is hr@auphansoftware.com and password is hello, 
 * 	  then show a message saying "Login Successful." 
 *    otherwise, flash a message showing "Incorrect Username/Password".
 * 6. If the username is not an email prevent the user from pressing login.
 * 7. The page should look decent.  (Perhaps rounded corners, background image/color, drop shadows... it's up to you.)
 * 8. Be in one file. (Easier for us to review your work.)
 * _____________________________________________


 * @author     	  Manuel Irrazabal Puebla <manuel.irrazabalp@gmail.com>
 * @phoneNumber   +16042099518
 *
 *
 */
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Fake Login</title>	
    <!--CDN Jquery -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:300);
		
		body {
		  background: #76b852; /* fallback for old browsers */
		  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
		  background: -moz-linear-gradient(right, #76b852, #8DC26F);
		  background: -o-linear-gradient(right, #76b852, #8DC26F);
		  background: linear-gradient(to left, #76b852, #8DC26F);
		  font-family: "Roboto", sans-serif;
		  -webkit-font-smoothing: antialiased;
		  -moz-osx-font-smoothing: grayscale;      
		}
		
		.login-block {
		  width: 360px;
		  padding: 20% 0 0;
		  margin: auto;
		}
		
		.login_title {
			color: #76b852;
			font-size: 1.5em;
			font-weight: bold;
			margin: 0 0 10px 0;
			border-bottom: 1px solid #eee;
			padding-bottom: 15px;
			text-align:left;
		}
		
		.form {
		  position: relative;
		  z-index: 1;
		  background: #FFFFFF;
		  max-width: 360px;
		  margin: 0 auto 100px;
		  padding: 45px;
		  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
		}
		
		.form input {
		  font-family: "Roboto", sans-serif;
		  outline: 0;
		  background: #f2f2f2;
		  width: 100%;
		  border: 0;
		  margin: 15px 0 3px 0;;
		  padding: 15px;
		  box-sizing: border-box;
		  font-size: 14px;
		}
		.form .loginbtn, #modal-content button{
		  font-family: "Roboto", sans-serif;
		  text-transform: uppercase;
		  outline: 0;
		  background: #4CAF50;
		  width: 100%;
		  border: 0;
		  padding: 15px;
		  color: #FFFFFF;
		  font-size: 14px;
		  -webkit-transition: all 0.3 ease;
		  transition: all 0.3 ease;
		  cursor: pointer;
		}
		.loginbtn:hover, .loginbtn:active,.loginbtn:focus {
		  background: #43A047;
		}	
		
		.form .errors {
		  margin: 15px 0 0;
		  color: red;
		  font-size: 12px;
		}	
		
			
		
		/* Modal CSS */
		
		#modal-background {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: white;
			opacity: .50;
			-webkit-opacity: .5;
			-moz-opacity: .5;
			filter: alpha(opacity=50);
			z-index: 1000;
		}
		
		#modal-content {
			background-color: white;
			border: 7px solid #76b852;
			box-shadow: 0 0 20px 0 #222;
			-webkit-box-shadow: 0 0 20px 0 #222;
			-moz-box-shadow: 0 0 20px 0 #222;
			display: none;
			height: 175px;
			left: 49%;
			margin: -120px 0 0 -160px;
			padding: 10px;
			position: absolute;
			top: 45%;
			width: 320px;
			z-index: 1000;
		}
		
		#modal-content p{
			font-family: "Roboto", sans-serif;
			text-align: center;	
			margin-top: 50px;
		}
		
		#modal-content button{
			margin-top:30px;
		}
	
		#modal-background.active, #modal-content.active {
			display: block;
		}
		
	</style>
    
    
    <script type="text/javascript">
		
		// Validate EMAIL.
		function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}
		
		
		
		$(function(){
			// Function to call modal box
			$("#modal-box").click(function () {
				$("#modal-content,#modal-background").toggleClass("active");
			});
			
			
			$('#login-form').submit(function(e){
				var errors = false;
								
				$(".errors").remove();
				
				
				//validate email field has entry
				if($("#email").val() === ""){
					$("#email").after("<span class='errors'> Please enter your username. </span>");
					errors = true; 
					                           
				}else if(!validateEmail($("#email").val())){
					$("#email").after( "<span class='errors'> Please enter a valid email. </span> ") 
					errors = true;
				}
				
				//Validate password
				if($("#password").val() === ""){
					$("#password").after( "<span class='errors'>Please enter your password.  </span> ");
					errors = true;
				}
				
				//FAKE VALIDATION IF THE USERNAME IS hr@auphansoftware.com AND PASSWORD hello.
				//SHOW MESSAGE LOGIN SUCCESSFUL OR ERROR INSTEAD.
				if(errors == false){
					if($("#email").val() == "hr@auphansoftware.com" && $("#password").val() === "hello"){
						$("#modal-text").text("Login Successful");
					}else{
						$("#modal-text").text("Incorrect Username/Password");
					}
					
					//Call modal box to show message.
					$( "#modal-box" ).click();
					errors = true;
				}

				return !errors;
			});
			
			
		});
	</script>
    
</head>


<body>
	<div class="login-block">
  		<div class="form">
        	<h5 class="login_title">Login</h5>
            <form class="login-form" id="login-form" method="post">
             	<input type="email" name="email" id="email" placeholder="Email" />
              	<input type="password" name="password" id="password" placeholder="Password" />
              	<input type="submit" name="loginbtn"  class="loginbtn"  value="login" />
            </form>
  		</div>
	</div>
 
    
    <!-- Modal Box -->
    <div id="modal-background"></div>
    <div id="modal-content">
        <p id="modal-text"></p>
        <button id="modal-box">Close</button>
    </div>
</body>
</html>

