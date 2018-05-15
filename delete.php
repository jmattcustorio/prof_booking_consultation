
<?php


$id = $_POST['id'];


try {
	$connect = new PDO('mysql:host=localhost;dbname=booking_consultation', 'root', '');
} catch(Exception $e) {
	exit('Unable to connect to database.');
}


$sql = "DELETE from tbl_reservation WHERE reservation_id=".$id;
$q = $connect->prepare($sql);
$q->execute();


?>