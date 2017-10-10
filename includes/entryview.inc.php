<?php
									
									session_start();

									if (isset($_GET['entry'])) {
										$_SESSION['entryID'] = $_GET['entry'];
									}

									include 'dbh.inc.php';

									$entryID = $_SESSION['entryID'];

									$sql = "SELECT entryContent, entryTitle, entryDate, entryStatus, isModified FROM journal_entries WHERE journalEntryID = '$entryID'";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
	   									// output data of each row
	   									while($row = mysqli_fetch_assoc($result)) {
		   									echo "Status: " .$row["entryStatus"];
		   									if ($row["entryStatus"] === "Active") {
		   										echo '<button><a href="editentry.php">Edit</a></button> <button onclick="hideEntry()">Hide</button> <button onclick="archiveEntry()">Archive</button>';
		   									} 
		   									if ($row["entryStatus"] === "Hidden") {
		   										echo '<button onclick="unhideEntry()">Unhide</button> <button onclick="archiveEntry()">Archive</button>';
		   									} 
		   									echo "<br><br>Original creation date: " .$row["entryDate"];
		   									echo "<br><br>Title: " .$row["entryTitle"];
		   									if ($row["isModified"] == 0) {
		   										echo "<br><br>Content: " .$row["entryContent"];
		   									} else {
		   										//else display the content of the latest version
		   										$sql = "SELECT entryContent, modifiedDate FROM modified_entries WHERE journalEntryID = '$entryID' ORDER BY version DESC LIMIT 1";
		   										$result = mysqli_query($conn, $sql);
		   										$row = mysqli_fetch_assoc($result);
		   										echo "<br><br>Content: " .$row["entryContent"];
		   										echo "<br><br>Last modified: " .$row["modifiedDate"]. '<button><a href="versionsview.php">Version History</a></button>';
		   									}
		   									
	 									}
									} else {
									    echo "<p>Not found!</p>";
									}

								?>