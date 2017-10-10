<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>eJournal | Sign Up</title>
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
						<h2 class="welcome_title">Sign Up</h2>
					</div>
					<div class="form">
						<form action="includes/signup.inc.php" method="POST">
							<div id="first">
								<input type="text" name="firstName" placeholder="First Name" />
							</div>
							<div id="last">
								<input type="text" name="lastName" placeholder="Last Name" />
							</div>
						<br />
						<input type="email" name="emailAddress" placeholder="Email Address" />
						<br />
						<br />
						<input type="text" name="username" placeholder="Username" />
						<br />
						<br />
						<input type="password" name="password" placeholder="Password" />
						<br />
						<br />
						<input type="password" name="confirmPassword" placeholder="Confirm Password" />
						<br />
						<br />
						<button type="submit" name="submit">Sign Up</button>
						<br />
						<br />
						<a href="login.php">Sign In</a>
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