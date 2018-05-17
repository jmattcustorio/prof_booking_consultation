<?php
	session_start();
	unset($_SESSION['usertype']);
	unset($_SESSION['fname']);
	unset($_SESSION['userid']);
	session_destroy();
	header('location: index.php');

?>