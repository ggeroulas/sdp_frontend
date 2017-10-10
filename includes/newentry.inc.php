<?php

	session_start();

	include_once 'dbh.inc.php';

	$journalID = $_SESSION['journalID'];
	$entryTitle = mysqli_real_escape_string($conn, $_GET['entryTitle']);
	$entryContent = mysqli_real_escape_string($conn, $_GET['entryContent']);
	$entryStatus = mysqli_real_escape_string($conn, $_GET['status']);
	date_default_timezone_set('Australia/Sydney');
	$date = date('Y-m-d');

	//Insert the user into the database
	$sql = "INSERT INTO journal_entries (journalID, entryTitle, entryContent, entryDate, entryStatus, isModified) VALUES 
	($journalID, '$entryTitle', '$entryContent', '$date', '$entryStatus', 0);";
	mysqli_query($conn, $sql);
	header("Location: ../login-land.php?newEntry=success");
	exit();