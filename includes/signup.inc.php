<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['emailAddress']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

	//Error handlers
	//Check for empty fields
	if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)) {
		header("Location: ../registration.php?registration=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("Location: ../registration.php?registration=invalid");
			exit();
		} else {
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../registration.php?registration=email");
				exit();
			} else {
				//check if password fields match
				if ($password !== $confirmPassword) {
					header("Location: ../registration.php?registration=passwordMismatch");
				exit();
				} else {
					$sql = "SELECT * FROM users WHERE username='$username'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck > 0) {
						header("Location: ../registration.php?registration=usertaken");
						exit();
					} else {
						//Hashing the password
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						//Insert the user into the database
						$sql = "INSERT INTO users (firstName, lastName, email, username, password) VALUES 
						('$firstName', '$lastName', '$email', '$username', '$hashedPwd');";
						mysqli_query($conn, $sql);
						header("Location: ../registration.php?registration=success");
						exit();
				}
			}
		}
	}

}} else {
	header("Location: ../registration.php");
	exit();
}
