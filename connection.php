<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:connections.php
*purpose: establishes connection to database and hosts
*current sessions.
*************************************************************/


	session_start();

	$servername = "localhost";
	$dbusername = "jperez";
	$dbpassword = "Bt7H4PTz";
	$dbname = "jperez";


	$errors = array();
	$_SESSION['success'] = "";

	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);



	if (isset($_POST['register']))
	{
		$username = mysqli_real_escape_string($conn,$_POST['register_username']);

		$password = mysqli_real_escape_string($conn,$_POST['register_password']);
		$password2 = mysqli_real_escape_string($conn,$_POST['register_password2']);
		$newpassword = password_hash($password, PASSWORD_DEFAULT);

		$emailaddress = mysqli_real_escape_string($conn,$_POST['register_email']);

		//this sets the security answers when users register new account
		$securityAnswer1 = mysqli_real_escape_string($conn,$_POST['securityAnswer1']);
		$securityAnswer2 = mysqli_real_escape_string($conn,$_POST['securityAnswer2']);
		$securityAnswer3 = mysqli_real_escape_string($conn,$_POST['securityAnswer3']);

		//this will store the security question in the form of an int
		$securityQuestion1 = $_POST['select1'];
		$securityQuestion2 = $_POST['select2'];
		$securityQuestion3 = $_POST['select3'];

		$username_results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		$email_results = mysqli_query($conn, "SELECT * FROM users WHERE useremail='$emailaddress'");



		if(empty($username)){
			array_push($errors, "Username is required");

		}

		if (empty($password)){
			array_push($errors, "Password is required");
		}

		if (empty($password2)){
			array_push($errors, "Password is required");
		}

		if ($password2 != $password){
			array_push($errors, "Passwords dont match");
		}

		if (empty($emailaddress)){
			array_push($errors, "Email Address is required");
		}

	/*	if (empty($securityAnswer1)){
			array_push($errors, "Answer1 is required");
		}

		if (empty($securityAnswer2)){
			array_push($errors, "Answer2 is required");
		}

		if (empty($securityAnswer3)){
			array_push($errors, "Answer3 is required");
		} */

		if (mysqli_num_rows($username_results) > 0){
			array_push($errors,"Username already exists");
		}

		if (mysqli_num_rows($email_results) > 0){
			array_push($errors,"Email address already in use");
		}

		if (count($errors) == 0) {
			$query = "INSERT INTO users (username, userpass, useremail) VALUES('$username', '$newpassword', '$emailaddress')";
			mysqli_query($conn,$query);

			$newResults = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
			$newRow = $newResults->fetch_assoc();
			$userID = $newRow['userID'];

			$newQuery = "INSERT INTO recovery (userID, firstQuestion, secondQuestion, thirdQuestion, firstAnswer, secondAnswer, thirdAnswer) VALUES('$userID', '$securityQuestion1', '$securityQuestion2', '$securityQuestion3', '$securityAnswer1', '$securityAnswer2', '$securityAnswer3')";
			mysqli_query($conn,$newQuery);

			header('location: index.php');
		}



	}



	if (isset($_POST['login']))
	{

		$username = mysqli_real_escape_string($conn,$_POST['username']);

		$password = mysqli_real_escape_string($conn,$_POST['password']);




		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {


			$results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

			$row = $results->fetch_assoc();
			if(password_verify($password, $row['userpass']))
			{

				if (mysqli_num_rows($results) == 1) {


					$_SESSION['username'] = $username;
					$_SESSION['user_id'] = $row['userID'];
					$_SESSION['success'] = "You are now logged in";

					if ($row['firstLogin'] != True){
						mysqli_query($conn,"UPDATE users SET firstLogin = 1 WHERE username = '$username'");
						header('location: welcome.php');
					}else{
								header('location: index.php');
							 }
				}else {
					array_push($errors, "Wrong username/password combination");
				}
		}
	}


	}



	if (isset($_POST['Recover']))

	{





		$emailaddress = mysqli_real_escape_string($conn,$_POST['Email_address']);
		$username = mysqli_real_escape_string($conn,$_POST['Username']);
		$password = mysqli_real_escape_string($conn,$_POST['New_password']);
		$password2 = mysqli_real_escape_string($conn,$_POST['New_password2']);

		if ($password2 == $password)
		{



		#$password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
		#$password = "password";
		$password = password_hash($password, PASSWORD_DEFAULT);
		$results = mysqli_query($conn, "SELECT * FROM users WHERE useremail='$emailaddress' AND username = '$username'");

		$row = $results->fetch_assoc();
		$name = $row['username'];

		$to      = $emailaddress; // Send email to our user
		$subject = 'Password Reset'; // Give the email a subject
		$message = '

		Thanks for using Yapt!
		This is a password reset you may now log in with the following credentials.


		------------------------
		Username: '.$name.'
		Password: '.$password.'
		------------------------
		 You can use your new password at the home page here:
		 http://dev.orgspot.org/dog/Yapt/login.php
		 ';

		 // Our message above including the link

		$headers = 'From:noreply@Yapt.com' . "\r\n"; // Set from headers
		mail($to, $subject, $message, $headers); // Send our email
		$query = "UPDATE users SET userpass = '$password' WHERE username = '$name' AND useremail = '$to' ";

			mysqli_query($conn,$query);
			header('location: index.php');
		}

		else{
		 echo "Passwords dont match!";
		}

	}






	if(isset($_POST['Save']))
	{

		 $oldpassword = $_POST['currentpassword'];
		 $newpassword1 = $_POST['newpassword1'];
		 $newpassword2 = $_POST['newpassword2'];


		 $results = mysqli_query($conn, "SELECT * FROM users WHERE username ='$_SESSION[username]'");

		 $row = $results->fetch_assoc();




		if(password_verify($oldpassword, $row['userpass']))
		{



				if (empty($newpassword1))
					{
						array_push($errors, "Password is required");
					}

				if (empty($newpassword2))
					{
						array_push($errors,"Password is required");

					}

				if ($newpassword2 != $newpassword1 )
					{
						array_push($errors,"Passwords do not match");
					}




					if (count($errors) == 0)
					{
						$newpassword1 = password_hash($newpassword1, PASSWORD_DEFAULT);
						$query = "UPDATE users  SET userpass = '$newpassword1' WHERE username = '$_SESSION[username]'";

						mysqli_query($conn,$query);
						header('location: index.php');
					}



		}

	}


?>
