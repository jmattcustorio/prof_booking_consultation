<?php
session_start();
require_once('dbconn.php');

$fname = "";
$lname = "";
$school_id = "";
$email = "";
$password_1 = "";
$password_2 = "";
$contactno = "";
$stud_fnameErr = $stud_lnameErr = $school_idErr = $stud_emailErr = $confirmpassErr = "";
$stud_passwordErr = $stud_contactnoErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//check Firstname 
	if (empty($_POST['fname'])) {
		$stud_fnameErr = "Firstname is required\n";
		$valid = false; 
	  } 
	else {		
		$fname = test_input($_POST['fname']); 
		}
	//check Lastname
	if (empty($_POST['lname'])) {
		$stud_lnameErr = "Lastname is required\n";
		$valid = false; 
	  } 
	else {		
		$lname = test_input($_POST['lname']); 
	}
		
		
	if (empty($_POST['school_id'])) {
		$school_idErr = "ID number is required\n";
		$valid = false; 
	} 
	else {		
		$school_id = test_input($_POST['school_id']); 
		try   {      
			$sql =("SELECT * FROM tbl_user WHERE school_id = :school_id"); 
			$stmt = $conn->prepare($sql);        
			$stmt->bindParam(':school_id', $school_id, PDO::PARAM_STR);    
			$stmt->execute();
			$total = $stmt->rowCount(); 
			if($total>0){
				$school_idErr = "ID Number is already taken\n";
				$valid = false; 
			}  
		}
		catch(PDOException $e) {   
			echo "Error: " . $e->getMessage(); 
		} 
	}
	 //check email
	if (empty($_POST['email'])) {
		$stud_emailErr = "Email is required\n";
		$valid = false; 
	  } 
	else {		
		$stud_email = test_input($_POST['stud_email']); 
	 }
	 
	  //check password
	if (empty($_POST['password_1'])) {
			$stud_passwordErr = "Password is required\n";
			$valid = false; 
		  } 
	else if (strlen($_POST['password_1'])>=8){		
			$password_1 = test_input($_POST['password_1']); 
		 }
	else{
			$stud_passwordErr = "Password should contain at least 8 characters\n";
			$valid = false; 
	}
		//check confirm password
	if (empty($_POST['password_2'])) {
			$confirmpassErr = "Please confirm password\n";
			$valid = false; 
	} 
	elseif($_POST['password_1'] != $_POST['password_2']){
			$confirmpassErr = "Passwords do not match\n";
			$valid = false; 
	}
	else{
			$password = md5($_POST['password_1']); 
	}
	//check phone number
	if (empty($_POST['contactno'])) {
		$stud_contactnoErr = "Contact number is required\n";
		$valid = false; 
	} 
	else {		
		$contactno = test_input($_POST['contactno']); 
	}

	
	if ($valid == true) { 	  
		try {   
			$sql = "INSERT INTO tbl_user(fname,
									lname,
									school_id,
									email,
									password,
									contactno,
									usertype) 
						VALUES (    :fname,  
									:lname,
									:school_id,
									:email,
									:password,
									:contactno,
									:usertype)";       
			$stmt = $conn->prepare($sql);      
			$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
			$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
			$stmt->bindParam(':school_id', $school_id, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':contactno', $contactno, PDO::PARAM_STR);
			$stmt->bindParam(':usertype', $_SESSION['usertype'], PDO::PARAM_STR);

			$stmt->execute(); 
			
			$_SESSION['fname'] = strtoupper($fname);
			
			
			try {   
				$sql = "SELECT * FROM tbl_user WHERE school_id = :school_id";       
				$stmt = $conn->prepare($sql);      
				$stmt->bindParam(':school_id', $school_id, PDO::PARAM_STR);
				$stmt->execute();   
				$total = $stmt->rowCount(); 								
				if($total>0){
					foreach ($stmt->fetchAll() as $row){
						$_SESSION['userid'] = $row['userid'];
					}
				}
			}
			catch(PDOException $e) {   
				echo "Error: " . $e->getMessage(); 
			} 
			
			echo '<script type="text/javascript">alert("You have successfully registered!");</script>';
			echo "<script>setTimeout(\"location.href = 'home.php';\",1);</script>";  
			
		}  
		catch(PDOException $e) {   
			echo "Error: " . $e->getMessage();  
		}  
		$conn = null; 
		
	}
}
 
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>

