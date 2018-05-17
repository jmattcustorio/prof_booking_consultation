<!--Version 1.1.0 -->


<?php session_start();?>
<!doctype html>

<html>
	<header>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>CCE - PBC</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/home.css" />
		
	</header>
		<center><body>
			<div id="bodyWrap">
				<div id="headbtn"> 
					<div id="logo"></div>
				</div>
				<div id="buttons">
					<div id="title"> Professors' Booking Consultation </div>
						<?php
					if(isset($_SESSION['fname'])){
						?>
						<div id="welcome">Welcome <?php echo strtoupper($_SESSION['fname'])?></div>
						<?php
					}
					
				?>
				<?php
					if(isset($_SESSION['fname'])){
						if($_SESSION['usertype']=="Professor"){
						?>
						<div id="dboard"><a href="calendar.php"> Calendar </a></div>
						<?php
						}
						else{
						?>
							<div id="dboard"><a href="student-calendar.php"> Calendar </a></div>
						<?php
						}
					}
				?>				
				<?php
					if(isset($_SESSION['fname'])){
						?>
						<div id="logout"><a href="logout.php">Log Out</a></div>
						<?php
					}
					else{
						?>					
						<meta name="viewport_signup" content="width=device-width, initial-scale=1">
								<style>

								/* The Modal (background) */
								.modal_signup {
									display: none;
									position: fixed;
									z-index: 1;
									padding-top: 100px;
									left: 0;
									top: 0;
									width: 100%;
									height: 100%;
									overflow: auto;
									background-color: rgb(0,0,0);
									background-color: rgba(0,0,0,0.4);
								}

								/* Modal Content */
								.signup-content {
									position: relative;
									background-color: black;
									margin: auto;
									padding: 0;
									border: 1px solid #888;
									width: 50%;
									height: 50%;
									box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
									-webkit-animation-name: animatetop;
									-webkit-animation-duration: 0.4s;
									animation-name: animatetop;
									animation-duration: 0.4s
								}

								/* Add Animation */
								@-webkit-keyframes animatetop {
									from {top:-300px; opacity:0} 
									to {top:0; opacity:1}
								}

								@keyframes animatetop {
									from {top:-300px; opacity:0}
									to {top:0; opacity:1}
								}

								/* The Close Button */
								.signupclose {
									color: white;
									float: right;
									font-size: 28px;
									font-weight: bold;
								}

								.signupclose:hover,
								.signupclose:focus {
									color: #000;
									text-decoration: none;
									cursor: pointer;
								}

								.signup-header {
									padding: 2px 16px;
									background-color: gold;
									color: black;
								}

								.signup-body {padding: 2px 16px;}

								.btn_signup{
									color: white;
									margin-top: 10px;
									font-size: 25px;
									width: 300px;
									height: 50px;
									border: 2px solid gold;
									background-color: black;
									display: block;
								}
								.btn_signup:hover{
									background-color: yellow;
									color: black;
								}
								.btn_professor{
									color: white;
									margin-top: 80px;
									margin-bottom: 10px;
									font-size: 25px;
									width: 250px;
									height: 100px;
									border: 2px solid gold;
									background-color: yellow;
								}
								.btn_professor:hover{
									background-color: black;
									color: white;
								}
								.btn_student{
									color: black;
									margin-top: 10px;
									margin-bottom: 10px;
									font-size: 25px;
									width: 250px;
									height: 100px;
									border: 2px solid gold;
									background-color: yellow;
								}
								.btn_student:hover{
									background-color: black;
									color: white;
								}	
								</style>
								</head>
								<body>

								<!-- Trigger/Open The Modal -->
								<button id="signup" class="btn_signup">Sign Up</button>

								<!-- The Modal -->
								<div id="signup_modal" class="modal_signup">

								  <!-- Modal content -->
								  <div class="signup-content">
								  
									<div class="signup-header">
									  <span class="signupclose">&times;</span>
									  <h2>Create your Account</h2>
									</div>
									<form method="get" action="signup.php">
										<div class="signup-body">
										  <input type = "submit" name="submit" class="btn_professor" value = "Professor" >
										  <input type  ="submit" name="submit" class="btn_student" value = "Student">
										</div>
									</form>
								  </div>
								  
								</div>

								<script>
									
									var modal_signup = document.getElementById('signup_modal');
									var btn_signup = document.getElementById("signup");
									var span = document.getElementsByClassName("signupclose")[0];
									btn_signup.onclick = function() {
										modal_signup.style.display = "block";
									}
										span.onclick = function() {
											modal_signup.style.display = "none";
										}
									window.onclick = function(event) {
										if (event.target == modal_signup) {
											modal_signup.style.display = "none";
										}
									}
								</script>
						<meta name="viewport_login" content="width=device-width, initial-scale=1">
								<style>

								/* The Modal (background) */
								.modal_login {
									display: none;
									position: fixed;
									z-index: 1;
									padding-top: 30px;
									left: 0;
									top: 0;
									width: 100%;
									height: 100%;
									overflow: auto;
									background-color: rgb(0,0,0);
									background-color: rgba(0,0,0,0.4);
								}

								/* Modal Content */
								.login-content {
									position: relative;
									background-color: black;
									margin: auto;
									padding: 0;
									border: 1px solid #888;
									width: 50%;
									box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
									-webkit-animation-name: animatetop;
									-webkit-animation-duration: 0.4s;
									animation-name: animatetop;
									animation-duration: 0.4s
								}

								/* Add Animation */
								@-webkit-keyframes animatetop {
									from {top:-300px; opacity:0} 
									to {top:0; opacity:1}
								}

								@keyframes animatetop {
									from {top:-300px; opacity:0}
									to {top:0; opacity:1}
								}

								/* The Close Button */
								.loginclose {
									color: white;
									float: right;
									font-size: 28px;
									font-weight: bold;
								}

								.loginclose:hover,
								.loginclose:focus {
									color: #000;
									text-decoration: none;
									cursor: pointer;
								}

								.login-header {
									padding: 2px 16px;
									background-color: gold;
									color: black;
								}

								.login-body {padding: 2px 16px;}

								.login-footer {
									padding: 2px 16px;
									background-color: gold;
									color: black;
								}
								.btn_login{
									color: white;
									margin-top: 10px;
									font-size: 25px;
									width: 250px;
									height: 50px;
									border: 2px solid gold;
									background-color: black;
								}
								.btn_login:hover{
									background-color: yellow;
									color: black;
								}
								</style>
								</head>
	<body>

								<!-- Trigger/Open The Modal -->
								<button id="login" class="btn_login">Log In</button>

								<!-- The Modal -->
								<div id="login_modal" class="modal_login">

								  <!-- Modal content -->
								  <div class="login-content">
								  
									<div class="login-header">
									  <span class="loginclose">&times;</span>
									  <h2>Log Into Your Account</h2>
									</div>
									
									<div class="login-body">
									  <div id="content"><h2> College of Computing in Education </h2></div>
						<div id="mc1"> Login to your Account </div>
						
						<form action="index.php" method="post">
							<?php include ('authentication.php');
								if ($valid != true){?>	
									<h5><?php echo $usernameErr ?></h5>
							<?php
							}?>
						<div id="mc2">ID Number: </div>
						<div id="mc3"><input type="number" name="school_id" required></div>
						
						<div id="mc5">Password:</div>
						<div id="mc6"><input type="password" name="password" required></div>
						<div id = "mc10"></div>
						<div id="mc9"><button type="submit" name="login">Log in</button></div>
						<div id = "mc10"></div>
						</form>
						</div>
						
						<div class="login-footer">
						  <h3> &nbsp;</h3>
						</div>
					  </div>
					</div>

					<script>
						var modal_login = document.getElementById('login_modal');
						var btn_login = document.getElementById("login");
						var span = document.getElementsByClassName("loginclose")[0];
						btn_login.onclick = function() {
							modal_login.style.display = "block";
						}
							span.onclick = function() {
								modal_login.style.display = "none";
							}
						window.onclick = function(event) {
							if (event.target == modal_login) {
								modal_login.style.display = "none";
							}
						}
					</script>	

					<?php
				}
			?>
				
			</div>
			</div>
	</body></center>
		<center><div id="footer"><strong>Develop by: Montederamos | Sato | Custorio | (c) 2018 . Professors' Booking Consultation | Ver. BETA 0.1</strong></div></center>
	</html>