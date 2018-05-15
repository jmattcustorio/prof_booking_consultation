<?php session_start();?>
<!doctype html>

<html>
	<header>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title> CCE-PBC: Registration </title>
		<link rel="stylesheet" type="text/css" href="stylesheets/student.css" />
	</header>
		<center><body>
		<div id="bodyWrap">
				<div id="headbtn">
					<div id="logo"></div>
				</div>
						<?php
					if(isset($_SESSION['username'])){
						?>
						<div id="welcome">Welcome <?php echo strtoupper($_SESSION['username'])?></div>
						<?php
					}
					else{
						?>
						<?php
					}
				?>
				<?php
					if(isset($_SESSION['username'])){
						?>
						<div id="logout"><a href="logout.php">Log Out</a></div>
						<?php
					}
					else{
						?>
						<?php
					}
				?>
				<?php
					if(isset($_SESSION['username'])){
						?>
						<div id="account"><a href="account.php"><img src = "Images/profile.png" alt = "Account" /></a></div>
						<?php
					}
				?>
				<?php
					if(isset($_SESSION['usertype'])){
						if($_SESSION['usertype'] == "admin"){
						?>
						<li><?php
							if(isset($_SESSION["access"])){?>
								<a href="admin.php">Admin</a><?php
							}
							else{?>
								<a href="login.php">Admin</a><?php
							}?>	
						</li>
						<?php
						}
					}
				?>
		
				
			<div id="maincontent"> 
				<div id="mc1"> Sign Up as Student</div>
					<form action="student.php" method="post">
						<?php include ('stud_validation.php');
						if ($valid != true){?>	
						<?php
						}?>
						<div id="mc2" class = "input-group">
						<div id="mc3">Name: </div>
						<div id="mc4"><input type="text" name="stud_fname" value = "<?php echo $stud_fname?>"></div>
						<div id="mc5"><?php echo $stud_fnameErr ?></div>
						</div>
						
						<div id="mc6" class = "input-group">
						<div id="mc7">Lastname: </div>
						<div id="mc8"><input type="text" name="stud_lname" value = "<?php echo $stud_lname?>"></div>
						<div id="mc9"><?php echo $stud_lnameErr ?></div>
						</div>
						
						<div id="mc10" class = "input-group">
						<div id="mc11">ID Number: </div>
						<div id="mc12"><input type="number" name="school_id" value = "<?php echo $school_id?>"></div>
						<div id="mc13"><?php echo $school_idErr ?></div>
						</div>
						
						<div id="mc14" class = "input-group">
						<div id="mc15">Email: </div>
						<div id="mc16"><input type="text" name="stud_email" value = "<?php echo $stud_email?>"></div>
						<div id="mc17"><?php echo $stud_emailErr ?></div>
						</div>
						
						<div id="mc18" class = "input-group">
						<div id="mc19">Password: </div>
						<div id="mc20"><input type="text" name="stud_password" value = "<?php echo $stud_password?>"></div>
						<div id="mc21"><?php echo $stud_passwordErr ?></div>
						</div>
						
						<div id="mc22" class = "input-group">
						<div id="mc23">Cell No.: </div>
						<div id="mc24"><input type="number" name="stud_contactno" value = "<?php echo $stud_contactno?>"></div>
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