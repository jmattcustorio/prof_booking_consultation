<?php
require_once('dbconn.php');
$school_id = "";
$password = "";
$usertype = "";
$schoolIDErr = $passwordErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$password = trim($_POST['password']);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	
	$school_id = trim($_POST['school_id']);
	$school_id = stripslashes($school_id);
	$school_id = htmlspecialchars($school_id);
	
	$password = md5($password);

	
 if (isset($_POST['usertype'])) {
	 $usertype = $_POST['usertype'];
 }
 else{
	 $usertype = "Student";
 }
 if ($valid == true) { 	  
	try {   
		$sql = "SELECT * FROM tbl_user WHERE school_id = :school_id";       
		$stmt = $conn->prepare($sql);      
		$stmt->bindParam(':school_id', $school_id, PDO::PARAM_STR);
		$stmt->execute();   
		$total = $stmt->rowCount(); 								
		if($total>0){
			foreach ($stmt->fetchAll() as $row){
				if ($row['password'] == $password){
					$_SESSION['userid'] = $row['userid'];
					$_SESSION['fname'] = $row['fname'];
					if ($usertype == "Professor"){
						echo '<script type="text/javascript">alert("You have successfully logged in!");</script>';
						echo "<script>setTimeout(\"location.href = 'dashboard-prof.php';\",1);</script>";  
					}
					else{
						echo '<script type="text/javascript">alert("You have successfully logged in!");</script>';
						echo "<script>setTimeout(\"location.href = 'student-calendar.php';\",1);</script>";  
					}
				}
				else{
					$usernameErr = "Invalid ID and/or password!";
					$valid = false;
				}
			}
		}
	}
	catch(PDOException $e) {   
		echo "Error: " . $e->getMessage(); 
	} 
	
	$conn = null; 
 }
}
 
?>

