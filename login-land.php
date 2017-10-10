<!DOCTYPE html>
<html>
	<head>
		<title>eJournal | Landing Page</title>
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
                            <li><a class="active">Home</a></li>
                            <li><a onclick="newJournal()" >Create New Journal</a></li>
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
								
								echo "Hello, " .$_SESSION['firstName']. " " .$_SESSION['lastName']. "! Use navigation above to select from journal entries or to create a new journal.";
							
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

