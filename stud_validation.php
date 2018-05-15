<?php
require_once('dbconn.php');

$stud_fname = "";
$stud_lname = "";
$school_id = 0;
$stud_email = "";
$stud_password = "";
$stud_contactno = 0;
$stud_fnameErr = $stud_lnameErr = $school_idErr = $stud_emailErr = "";
$stud_passwordErr = $stud_contactnoErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//check Firstname 
 if (empty($_POST['stud_fname'])) {
    $stud_fnameErr = "Firstname is required\n";
	$valid = false; 
  } 
  else {		
	$stud_fname = test_input($_POST['stud_fname']); 
	}
//check Lastname
   if (empty($_POST['stud_lname'])) {
    $stud_lnameErr = "Lastname is required\n";
	$valid = false; 
  } 
  else {		
	$school_id = test_input(strtolower($_POST['school_id'])); 
	try   {      
		$sql =("SELECT * FROM tbl_student WHERE school_id = :school_id"); 
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
   if (empty($_POST['stud_email'])) {
    $stud_emailErr = "Email is required\n";
	$valid = false; 
  } 
  else {		
	$stud_email = test_input($_POST['stud_email']); 
 }
//check password
  if (empty($_POST['stud_password'])) {
    $stud_passwordErr = "Password is required\n";
	$valid = false; 
  } 
  else if (strlen($_POST['stud_password'])>=8){		
	$stud_password = test_input($_POST['stud_password']); 
 }
 else{
	$stud_passwordErr = "Password should contain at least 8 characters\n";
	$valid = false; 
 }
//check phone number
  if (empty($_POST['stud_contactno'])) {
    $stud_contactnoErr = "Contact number is required\n";
	$valid = false; 
  } 
  else {		
	$stud_contactno = test_input($_POST['stud_contactno']); 
 }

  if ($valid == true) { 	  
	try {   
		$sql = "INSERT INTO tbl_student(stud_fname,
								stud_lname,
								school_id,
								stud_email,
								stud_password,
								stud_contactno) 
					VALUES (    :stud_fname,  
								:stud_lname,
								:school_id,
								:stud_email,
								:stud_password,
								:stud_contactno)";       
		$stmt = $conn->prepare($sql);      
		$stmt->bindParam(':stud_fname', $stud_fname, PDO::PARAM_STR);
		$stmt->bindParam(':stud_fname', $stud_lname, PDO::PARAM_STR);
		$stmt->bindParam(':stud_fname', $school_id, PDO::PARAM_STR);
		$stmt->bindParam(':stud_fname', $stud_email, PDO::PARAM_STR);
		$stmt->bindParam(':stud_fname', $stud_password, PDO::PARAM_STR);
		$stmt->bindParam(':stud_fname', $stud_contactno, PDO::PARAM_STR);

		$stmt->execute();  
		$_SESSION['stud_id'] = $stud_id;
		$_SESSION['school_id'] = strtoupper($school_id);
		$_SESSION['stud_id'] = $row['stud_id'];
		if(!isset($_SESSION['cart'])){
			echo '<script type="text/javascript">alert("You have successfully registered!");</script>';
			echo "<script>setTimeout(\"location.href = 'home.php';\",1);</script>";  
		}
		else{
			echo '<script type="text/javascript">alert("You have successfully registered!\n\nYou may now complete your order.");</script>';
			echo "<script>setTimeout(\"location.href = 'checkout.php';\",1);</script>";  
		}
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

