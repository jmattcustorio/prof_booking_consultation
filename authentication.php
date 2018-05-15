<?php
require_once('dbconn.php');
$schoolID = "";
$password = "";
$usertype = "";
$schoolIDErr = $passwordErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//check School ID
   if (empty($_POST['schoolID'])) {
	$valid = false; 
  } 
  else {		
	$schoolID = test_input(strtolower($_POST['schoolID'])); 
 }

//check password
  if (empty($_POST['password'])) {
	$valid = false; 
 }
 else{
	$password = test_input($_POST['password']); 
	$password = md5($password);
 }
 //check if user login as admin
 if (isset($_POST['usertype'])) {
	 $usertype = $_POST['usertype'];
 }
 else{
	 $usertype = "user";
 }
 if ($valid == true) { 	  
	try {   
		$sql = "SELECT * FROM tbl_student WHERE school_id = :school_id";       
		$stmt = $conn->prepare($sql);      
		$stmt->bindParam(':schoolID', $schoolID, PDO::PARAM_STR);
		$stmt->execute();   
		$total = $stmt->rowCount(); 								
		if($total>0){
			foreach ($stmt->fetchAll() as $row)   {  
				if($row['status']!="Active"){
					echo '<script type="text/javascript">alert("Account not found!");</script>';
					echo "<script>setTimeout(\"location.href = 'login.php';\",1);</script>";
				}
				else if($row['password']==$password){
					if($row['usertype']=="admin" && $usertype == "user"){
						$_SESSION['usertype'] = $row['usertype'];
						$_SESSION['school_id'] = $row['school_id'];
						if(!isset($_SESSION['cart'])){
							echo '<script type="text/javascript">alert("You have successfully logged in!");</script>';
							echo "<script>setTimeout(\"location.href = 'home.php';\",1);</script>"; 
						}
						else{
							echo '<script type="text/javascript">alert("You have successfully logged in!\n\nYou may now complete your order.");</script>';
							echo "<script>setTimeout(\"location.href = 'checkout.php';\",1);</script>";  
						}
					} 
					elseif ($row['usertype']=="admin" && $usertype == "admin"){
						$_SESSION['usertype'] = $row['usertype'];
						$_SESSION['school_id'] = $row['school_id'];
						$_SESSION['access'] = "yes";
						echo '<script type="text/javascript">alert("You have successfully logged in as admin!");</script>';
						echo "<script>setTimeout(\"location.href = 'admin.php';\",1);</script>";
					} 
					elseif($row['usertype']==$usertype){
						$_SESSION['usertype'] = $row['usertype'];
						$_SESSION['school_id'] = strtoupper($row['school_id']);
						if(!isset($_SESSION['cart'])){
							echo '<script type="text/javascript">alert("You have successfully logged in!");</script>';
							echo "<script>setTimeout(\"location.href = 'home.php';\",1);</script>"; 
						}
						
					}
					else{
						$school_idErr = "You are not registered as admin!";
						$valid = false;
					}
				}
				else{
					$school_idErr = "School ID and password did not match!";
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
 function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>

