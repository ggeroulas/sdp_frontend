<!DOCTYPE html>
<html>
	<head>
		<title>New Entry</title>
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
						<div class="textEdit">
								<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
								
								<div id="editor">
								  <p id="entryContent">Edit Entry Here!</p>
								</div>
						</div>

						<div class="createOptions">
							<button onclick="saveEntry()">Save</button>
							<button onclick="saveDraft()">Save as Draft</button>
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

                function saveEntry() {
                    var quill = new Quill('#editor');
                    var entryContent = quill.container.firstChild.innerHTML;
                    var entryTitle = prompt("Please enter entry title", "")
                    if (entryTitle == null || entryTitle =="") {

                    } else {
                        window.location.href = "includes/newentry.inc.php?entryTitle=" + entryTitle + "&entryContent=" + entryContent + "&status=Active";
                    }

                }

                function saveDraft() {
                    var quill = new Quill('#editor');
                    var entryContent = quill.container.firstChild.innerHTML;
                    var draftTitle = prompt("Please enter draft title", "")
                    if (draftTitle == null || draftTitle =="") {

                    } else {
                        window.location.href = "includes/newentry.inc.php?entryTitle=" + draftTitle + "&entryContent=" + entryContent + "&status=Draft";
                    }
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

