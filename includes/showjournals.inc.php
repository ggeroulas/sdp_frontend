<?php

	include 'dbh.inc.php';

									$sql = "SELECT journalName, journalID FROM journals";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
	   									// output data of each row
	   									while($row = mysqli_fetch_assoc($result)) {
	   									echo '<a href="entrylist.php?journal=' .$row["journalID"].  '">' .$row["journalName"]. "</a>";
	 									}
									} else {
									    echo "<a>You have no journals!</a>";
									}

?>