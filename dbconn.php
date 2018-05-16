<?php  
//connect to db
$servername = "localhost";  
$user_name = "root";  
$passcode = "";  
$dbname = "booking_consultation"; 
   
try {     
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name, $passcode); 
      
// set the PDO error mode to exception     
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
// echo "Connected successfully";     
}   

catch(PDOException $e)     
{   
// echo "Connection failed: " . $e->getMessage();     
} 
 
?> 
 
 