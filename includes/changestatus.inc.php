<?php

	include_once 'dbh.inc.php';

	$newStatus = mysqli_real_escape_string($conn, $_GET['newStatus']);
	$journalEntryID = mysqli_real_escape_string($conn, $_GET['entry']);

	$sql = "UPDATE journal_entries SET entryStatus='$newStatus' WHERE journalEntryID='$journalEntryID' ";

	if (mysqli_query($conn, $sql)) {
	    header("Location: ../entryview.php?changeStatus=success");
		exit();
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}


	header("Location: ../entryview.php?changeStatus=success");
	exit();