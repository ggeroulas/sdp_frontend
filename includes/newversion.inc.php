<?php

	//echo "this is the php script for saving new versions of entries!";

	session_start();

	include 'dbh.inc.php';

	date_default_timezone_set('Australia/Sydney');
	$date = date('Y-m-d');

	$entryContent = $_GET['entryContent'];

	//find the journal entry, update isModified, set it to 1
	$entryID = $_SESSION['entryID'];

	$sql = "SELECT isModified FROM journal_entries WHERE journalEntryID = '$entryID'"; 
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row["isModified"]==0) {
		$sql = "UPDATE journal_entries SET isModified=1 WHERE journalEntryID = '$entryID'";
		mysqli_query($conn, $sql);

		//insert into modified_entries, journalentryid, the new content, the version, and the date
		$sql = "INSERT INTO modified_entries (journalEntryID, entryContent, version, modifiedDate) VALUES ('$entryID', '$entryContent', 2, '$date');";
		mysqli_query($conn, $sql);
	} else {
		$sql = "INSERT INTO modified_entries (journalEntryID, entryContent, version, modifiedDate) VALUES ('$entryID', '$entryContent', (SELECT MAX(version) FROM (SELECT * FROM modified_entries) AS m2 WHERE journalEntryID = '$entryID')+1, '$date');";
		mysqli_query($conn, $sql);
	}

	header("Location: ../login-land.php?editEntry=success");
	exit();

