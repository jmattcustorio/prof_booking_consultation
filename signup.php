<?php session_start();?>
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
				<div id="mc1"> Sign Up as Student</div>
					<form action="student.php" method="post">
						<?php include ('stud_validation.php');
						if ($valid != true){?>	
						<?php
						}?>
						<div id="mc2" class = "input-group">
						<div id="mc3">First Name: </div>
						<div id="mc4"><input type="text" name="fname" value = "<?php echo $fname?>"></div>
						<div id="mc5"><?php echo $stud_fnameErr ?></div>
						</div>
						
						<div id="mc6" class = "input-group">
						<div id="mc7">Lastname: </div>
						<div id="mc8"><input type="text" name="lname" value = "<?php echo $lname?>"></div>
						<div id="mc9"><?php echo $stud_lnameErr ?></div>
						</div>
						
						<div id="mc10" class = "input-group">
						<div id="mc11">ID Number: </div>
						<div id="mc12"><input type="number" name="school_id" value = "<?php echo $school_id?>"></div>
						<div id="mc13"><?php echo $school_idErr ?></div>
						</div>
						
						<div id="mc14" class = "input-group">
						<div id="mc15">Email: </div>
						<div id="mc16"><input type="text" name="email" value = "<?php echo $email?>"></div>
						<div id="mc17"><?php echo $stud_emailErr ?></div>
						</div>
						
						<div id="mc18" class = "input-group">
						<div id="mc19">Password: </div>
						<div id="mc20"><input type="password" name="password_1" value = "<?php echo $password_1?>"></div>
						<div id="mc21"><?php echo $stud_passwordErr ?></div>
						</div>
						
						<div id="mc18" class = "input-group">
						<div id="mc19">Confirm Password: </div>
						<div id="mc20"><input type="password" name="password_2" value = "<?php echo $password_2?>"></div>
						<div id="mc21"><?php echo $confirmpassErr?></div>
						</div>
						
						<div id="mc22" class = "input-group">
						<div id="mc23">Cell No.: </div>
						<div id="mc24"><input type="number" name="contactno" value = "<?php echo $contactno?>"></div>
						<div id="mc25"><?php echo $stud_contactnoErr ?></div>
						</div>
						
			</div>
						
						<div id="mc26" class = "input-group">Already a member? <i><a href="">Sign in</a></i>
						<div id="mc27"><button type="submit" name="register">Register</button></div>
						<div id="mc28"><button type="reset" name="reset">Reset</button></div>
						</div>
					</form>
			</div>
		</div>
	</body></center>
	<center><div id="footer"><strong>Develop by: Montederamos | Sato | Custorio | (c) 2018 . Professors' Booking Consultation | Ver. BETA 0.1</strong></div></center>
</html>