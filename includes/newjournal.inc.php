<?php

	session_start();


	include_once 'dbh.inc.php';

	$journalName = mysqli_real_escape_string($conn, $_GET['journalName']);
	$userID = $_SESSION['userID'];

	
	$sql = "INSERT INTO journals (journalName, userID) VALUES 
	('$journalName', '$userID');";
	mysqli_query($conn, $sql);
	header("Location: ../login-land.php?newJournal=success");
	exit();