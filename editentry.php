<!DOCTYPE html>
<html>
	<head>
		<title>Edit Entry</title>
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
                                ?>   
								</div>
							</li>
                            <li><a href="search.php">Search</a></li>
                            <li style="float:right"><a href="login.php">Log Out</a></li>
                        </ul>
                    </div>
					
					<div class="journal_container">				
						<div class="textEdit">
								<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

								<div id="editor">
								  <?php
                                    
                                    session_start();

                                    include 'includes/dbh.inc.php';

                                    $sql = "SELECT entryContent FROM journal_entries WHERE journalEntryID =" .$_SESSION['entryID'];
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        echo $row['entryContent'];
                                        }
                                    } else {
                                        echo "<p>Error... could not retrieve entry content...</p>";
                                    }

                                ?>
								</div>
						</div>

						<div class="createOptions">
							<button onclick="saveVersion()">Save Version</button>
							<button>Cancel</button>
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

                function saveVersion() {
                    var quill = new Quill('#editor');
                    var entryContent = quill.container.firstChild.innerHTML;
                    //redirect to php script to save version and update the database accordingly
                    window.location.href = "includes/newversion.inc.php?entryContent=" + entryContent;

                }

        </script>
        <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
        <script>
            var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
            
            var editor = new Quill('#editor', {
            modules: { toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline', 'strike']
                ]
            },
            theme: 'snow'
        });
        </script>

    </body>

</html>

