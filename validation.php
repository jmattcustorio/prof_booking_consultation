<?php
require_once('dbconn.php');

$fullname = "";
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$address = "";
$telno = "";
$city = "";
$zip = "";
$password = "";
$usertype = "user";
$status = "Active";
$fullnameErr = $usernameErr = $emailErr = $passwordErr = $confirmpassErr = "";
$addressErr = $telnoErr = $cityErr = $zipErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//check fullname 
 if (empty($_POST['fullname'])) {
    $fullnameErr = "Fullname is required\n";
	$valid = false; 
  } 
  else {		
	$fullname = test_input($_POST['fullname']); 
	}
//check username
   if (empty($_POST['username'])) {
    $usernameErr = "Username is required\n";
	$valid = false; 
  } 
  else {		
	$username = test_input(strtolower($_POST['username'])); 
	try   {      
		$sql =("SELECT * FROM users WHERE username = :username"); 
		$stmt = $conn->prepare($sql);        
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);    
		$stmt->execute();
		$total = $stmt->rowCount(); 
		if($total>0){
			$usernameErr = "Username is already taken\n";
			$valid = false; 
		}  
	}
	catch(PDOException $e) {   
		echo "Error: " . $e->getMessage(); 
	} 
 }
//check email
   if (empty($_POST['email'])) {
    $emailErr = "Email is required\n";
	$valid = false; 
  } 
  else {		
	$email = test_input($_POST['email']); 
 }
//check password
  if (empty($_POST['password_1'])) {
    $passwordErr = "Password is required\n";
	$valid = false; 
  } 
  else if (strlen($_POST['password_1'])>=8){		
	$password_1 = test_input($_POST['password_1']); 
 }
 else{
	$passwordErr = "Password should contain at least 8 characters\n";
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
  if (empty($_POST['phone'])) {
    $telnoErr = "Phone number is required\n";
	$valid = false; 
  } 
  else {		
	$telno = test_input($_POST['phone']); 
 }
//check address
  if (empty($_POST['address'])) {
    $addressErr = "Address is required\n";
	$valid = false; 
  } 
  else {		
	$address = test_input($_POST['address']); 
 }
//check city
  if (empty($_POST['city'])) {
    $cityErr = "City is required\n";
	$valid = false; 
  } 
  else {		
	$city = test_input($_POST['city']); 
 }
//check zip
  if (empty($_POST['zip'])) {
    $zipErr = "Zip is required\n";
	$valid = false; 
  } 
  else {		
	$zip = test_input($_POST['zip']); 
 }
	
  if ($valid == true) { 	  
	try {   
		$sql = "INSERT INTO users(fullname,
								username,
								email,
								password,
								phone,
								address,
								city,
								zip,
								usertype,
								status) 
					VALUES (    :fullname,  
								:username,
								:email,
								:password,
								:phone,
								:address,      
								:city,
								:zip,
								:usertype,
								:status)";       
		$stmt = $conn->prepare($sql);      
		$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);   
		$stmt->bindParam(':phone', $telno, PDO::PARAM_STR);   
		$stmt->bindParam(':address', $address, PDO::PARAM_STR);
		$stmt->bindParam(':city', $city, PDO::PARAM_STR);
		$stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
		$stmt->bindParam(':usertype', $usertype, PDO::PARAM_STR);
		$stmt->bindParam(':status', $status, PDO::PARAM_STR);
		$stmt->execute();  
		$_SESSION['usertype'] = $usertype;
		$_SESSION['username'] = strtoupper($username);
		$_SESSION['userid'] = $row['userid'];
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

