<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>eJournal | Sign In</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1 class="header_title">eJournal</h1>
			</div>
			<div class="content">
				<div class="welcome_box">
					<div class="welcome">
						<h2 class="welcome_title">Sign In</h2>
					</div>
					<div class="form">
						<form action="includes/login.inc.php" method="POST">
						<input type="text" name="username" placeholder="Username" />
						<br />
						<br />
						<input type="password" name="password" placeholder="Password" />
						<br />
						<br />
						<button type="submit" name="submit">Sign In</button>
						<br />
						<br />
						<a href="registration.php">Sign Up</a>
						</form>
					</div>
				</div>
			</div>
			<div class="footer">
				<div id="copyright">
					Copyright &copy; 2017 Team 6ess. All rights reserved.
				</div>
			</div>
		</div>
	</body>
</html>
