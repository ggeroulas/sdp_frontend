<!DOCTYPE html>
<html>
	<head>
		<title>eJournal | View Entry</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1 class="header_title">eJournal</h1>
			</div>
			<div class="content">
				<div class="main_box">
                    <div class="nav">
                        <ul>
                            <li><a class="active" href="login-land.php">Home</a></li>
                            <li><a onclick="newJournal()">Create New Journal</a></li>
                            <li class="dropdown">
								<a href="javascript:void(0)" class="dropbtn">Journals</a>
								<div class="dropdown-content">
								  <?php include 'includes/showjournals.inc.php' ?>	
								</div>
							</li>
                            <li><a href="search.php">Search</a></li>
                            <li style="float:right"><a href="login.php">Log Out</a></li>
                        </ul>
                    </div>
					
					<div class="journal_container">
						<div class="journalView">
							<?php

								session_start();

								include 'includes/dbh.inc.php';

								$entryID = $_SESSION['entryID'];


								//echo out the original entry
								$sql = "SELECT entryContent, entryTitle, entryDate, entryStatus FROM journal_entries WHERE journalEntryID = '$entryID'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								echo "Status: " .$row["entryStatus"];
								echo "<br><br>Original creation date: " .$row["entryDate"];
								echo "<br><br>Title: " .$row["entryTitle"];
								echo "<br><br>Content: " .$row["entryContent"];


								//echo out all modified entries, ORDER BY version ASC -- show the version, modifiedDate, and entryContent
								$sql = "SELECT version, modifiedDate, entryContent FROM modified_entries WHERE journalEntryID = '$entryID' ORDER BY version ASC";
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)) {
									echo "<br><br>Version: " .$row["version"];
									echo "<br><br>Date: " .$row["modifiedDate"];
									echo "<br><br>Content: " .$row["entryContent"];
								}
								
							?>	
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div id="copyright">
					Copyright &copy; 2017 Team 6ess. All rights reserved.
				</div>
			</div>
        </div>
        
        <script type="text/javascript" src="createJournal.js"></script>

    </body>

</html>

