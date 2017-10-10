<?php
                                    
                                    session_start();

                                    include 'dbh.inc.php';

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