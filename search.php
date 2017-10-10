<!DOCTYPE html>
<html>
	<head>
		<title>Search Journals</title>
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
                            <li><a>Search</a></li>
                            <li style="float:right"><a href="login.php">Log Out</a></li>
                        </ul>
                    </div>
					<div class="journal_container">
					   <div class="searchCriteria"> 
						   <form action="search.php" method="POST">
							   <input type="text" name="search" placeholder="Search"><br/><br/>
							   <label>Select Date</label>
							   <input type="date" name="date"><br/><br/>
							   <label>Select Dates</label>
							   <label>From</label>
							   <input type="date" name="date1">
							   <label style="padding-left:5px">To</label>
							   <input type="date" name="date2"><br/><br/>
							   <button>Search</button>
						   </form>
					   </div>

					   <div class="searchResults">
							<ul>
							   <?php include 'includes/search.inc.php'; ?>
							</ul>     
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

