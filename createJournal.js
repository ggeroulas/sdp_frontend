
                function newJournal() {
                    
                    var journalName = prompt("Please enter journal name:", "");
                    if (journalName == null || journalName == "") {
                        //TODO
                    } else {
                    	window.location.href = "includes/newjournal.inc.php?journalName=" + journalName;
                    	
                    }
                    
                }