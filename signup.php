<?php session_start();
	if (!isset ($_SESSION['usertype'])){	
		$_SESSION['usertype']=$_GET['submit'];
	}
?>
<!doctype html>

<html>
	<header>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title> CCE-PBC: Registration </title>
		<link rel="stylesheet" type="text/css" href="stylesheets/signup.css" />
	</header>
		<center><body>
		<div id="bodyWrap">
			<div id="headbtn">
				<div id="logo"></div>
			</div>
						
			<div id="maincontent"> 
				<div id="mc1"> Register an Account </div>
				<form action="signup.php" method="post">
					<?php include ('validation.php');
					if ($valid != true){?>	
						<div style = "margin: 5px;border-radius: 5px 5px 5px 5px;">
							<h5 id = "mc25"><?php echo $stud_passwordErr ?></h5>
							<h5 id = "mc29"><?php echo $stud_contactnoErr ?></h5>
							<h5 id = "mc5"><?php echo $stud_fnameErr ?></h5>
							<h5 id = "mc9"><?php echo $stud_lnameErr ?></h5>
							<h5 id = "mc13"><?php echo $school_idErr ?></h5>
							<h5 id = "mc17"><?php echo $stud_emailErr ?></h5>
							<h5 id = "m21"><?php echo $confirmpassErr ?></h5>
						</div>
					<?php
					}?>
						
					<div id="mc2" class = "input-group">
					<div id="mc3">First Name: </div>
					<div id="mc4"><input type= "text" name = "fname" value = "<?php echo $fname?>"></div>
					</div>
					
					<div id="mc6" class = "input-group">
					<div id="mc7">Lastname: </div>
					<div id="mc8"><input type="text" name="lname" value = "<?php echo $lname?>"></div>
					</div>
					
					<div id="mc10" class = "input-group">
					<div id="mc11">ID Number: </div>
					<div id="mc12"><input type="number" name="school_id" value = "<?php echo $school_id?>"></div>
					</div>
					
					<div id="mc14" class = "input-group">
					<div id="mc15">Email: </div>
					<div id="mc16"><input type="text" name="email" value = "<?php echo $email?>"></div>
					</div>
					
					<div id="mc18" class = "input-group">
					<div id="mc19">Password: </div>
					<div id="mc20"><input type="password" name="password_1" value = "<?php echo $password_1?>"></div>
					</div>
					
					<div id="mc22" class = "input-group">
					<div id="mc23">Confirm Password: </div>
					<div id="mc24"><input type="password" name="password_2" value = "<?php echo $password_2?>"></div>
					</div>
					
					<div id="mc26" class = "input-group">
					<div id="mc27">Cell No.: </div>
					<div id="mc28"><input type="number" name="contactno" value = "<?php echo $contactno?>"></div>
					</div>
											
					<div id="mc30" class = "input-group">Already a member? <i><a href="">Sign in</a></i>
					<div id="mc31"><button type="submit" name="register">Register</button></div>
					<div id="mc32"><button type="reset" name="reset">Reset</button></div>
					</div>
					
				</form>
			</div>
		</div>
	</body></center>
	<center><div id="footer"><strong>Develop by: Montederamos | Sato | Custorio | (c) 2018 . Professors' Booking Consultation | Ver. BETA 0.1</strong></div></center>
</html>