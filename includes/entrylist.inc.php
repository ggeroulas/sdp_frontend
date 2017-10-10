<?php

									session_start();

									if (isset($_GET['journal'])) {
										$_SESSION['journalID'] = $_GET['journal'];
									}
									
									include 'dbh.inc.php';
									if (!isset($_GET['status']) || $_GET['status'] !== "all") {
										$sql = "SELECT entryTitle, journalEntryID, entryStatus FROM journal_entries WHERE entryStatus = 'Active' AND journalID =" .$_SESSION['journalID'] ;
									} else {
										$sql = "SELECT entryTitle, journalEntryID, entryStatus FROM journal_entries WHERE journalID =" .$_SESSION['journalID'] ;
									}
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
	   									// output data of each row
	   									while($row = mysqli_fetch_assoc($result)) {
		   									echo '<li><a href=entryview.php?entry=' .$row["journalEntryID"]. '>' .$row["entryTitle"]. "</a></li>";
		   									if ($row["entryStatus"] !== 'Active') {
		   										echo "^".$row["entryStatus"];
		   									}
	 									}
									} else {
									    echo "<li><a>No entries found!</a></li>";
									}

									?>	

