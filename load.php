<?php
//load.php

	$connect = new PDO('mysql:host=localhost;dbname=booking_consultation','root','');
	$data = array();
	$query = "SELECT * FROM tbl_reservation ORDER BY reservation_id";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row){
		$data[] = array(
			'id' => $row["reservation_id"],
			'title' => $row["title"],
			'start' => $row["start_event"],
			'end' => $row["end_event"]
		);
	}
	
	echo json_encode($data);
?>
