<!DOCTYPE html>
<html>
	<head>
		<title>eJournal | Entries</title>
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
						<div class="entry_stuff">
							<div class="toggles">
								<form>
									<input type="radio" name="status" value="active"><label>Active Entries</label>
									<input type="radio" name="status" value="all"><label>All Entries</label>
									<input type="submit" value="Apply">
								</form>							
							</div>
							<div class="entryList">
								<button><a href="newentry.php">New Entry</a></button>
								<ul>
									<?php

									session_start();

									if (isset($_GET['journal'])) {
										$_SESSION['journalID'] = $_GET['journal'];
									}
									
									include 'includes/dbh.inc.php';
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
								</ul>
							</div>
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

