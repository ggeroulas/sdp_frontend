<?php

	//echo "this is the script to search!";

	include 'dbh.inc.php';

	if (isset($_POST['search']) && $_POST['search'] !== '') {
		$keyword = mysqli_real_escape_string($conn, $_POST['search']);

		$sql = "SELECT journalEntryID, entryTitle FROM journal_entries WHERE entryContent LIKE '%$keyword%' ";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)) {
			echo '<li><a href=../entryview.php?entry=' .$row["journalEntryID"]. '>' .$row["entryTitle"]. "</a></li>";
		}
	}

	if (isset($_POST['date'])) {
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$formattedDate = date('Y-m-d', strtotime($date));


		$sql = "SELECT journalEntryID, entryTitle FROM journal_entries WHERE entryDate = '$formattedDate' ";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)) {
			echo '<li><a href=../entryview.php?entry=' .$row["journalEntryID"]. '>' .$row["entryTitle"]. "</a></li>";
		}
	}

	if (isset($_POST['date1']) && isset($_POST['date2'])) {
		$date1 = mysqli_real_escape_string($conn, $_POST['date1']);
		$date2 = mysqli_real_escape_string($conn, $_POST['date2']);

		$formattedDate1 = date('Y-m-d', strtotime($date1));
		$formattedDate2 = date('Y-m-d', strtotime($date2));



		$sql = "SELECT journalEntryID, entryTitle FROM journal_entries WHERE entryDate BETWEEN '$formattedDate1' AND '$formattedDate2' ";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)) {
			echo '<li><a href=../entryview.php?entry=' .$row["journalEntryID"]. '>' .$row["entryTitle"]. "</a></li>";
		}
	}

?>