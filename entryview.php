

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
							<?php include 'includes/entryview.inc.php' ?>	
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

        <script>

        	function hideEntry() {
                    
                    window.location.href = "includes/changestatus.inc.php?entry=" + <?php echo $_SESSION['entryID']; ?> + "&newStatus=Hidden";
                    
                }

            function unhideEntry() {
                    
                    window.location.href = "includes/changestatus.inc.php?entry=" + <?php echo $_SESSION['entryID']; ?> + "&newStatus=Active";
                    
                }    

            function archiveEntry() {
                    
                    window.location.href = "includes/changestatus.inc.php?entry=" + <?php echo $_SESSION['entryID']; ?> + "&newStatus=Archived";
                    
                }    

        </script>

    </body>

</html>

