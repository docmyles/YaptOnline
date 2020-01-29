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
//sign in information for database server
	$servername = "localhost";
	$dbusername = "jperez";
	$dbpassword = "Bt7H4PTz";
	$dbname = "jperez";

	//This is the code that runs Amazon AWS Email service.
	putenv('HOME=/var/www');
	// Replace path_to_sdk_inclusion with the path to the SDK as described in
	// http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
	define('REQUIRED_FILE','/var/www/aws/aws-autoloader.php');

	// Replace sender@example.com with your "From" address.
	// This address must be verified with Amazon SES.
	define('SENDER', 'support@orgspot.org');

	// Replace recipient@example.com with a "To" address. If your account
	// is still in the sandbox, this address must be verified.
	//define('RECIPIENT', 'tbeever@netlander.com');


	// Specify a configuration set. If you do not want to use a configuration
	// set, comment the following variable, and then
	// 'ConfigurationSetName' => CONFIGSET argument below.
	//define('CONFIGSET','ConfigSet');

	// Replace us-west-2 with the AWS Region you're using for Amazon SES.
	define('REGION','us-east-1');

	define('SUBJECT','Welcome!');

	define('HTMLBODY','<h1>Welcome to Yapt</h1>'.
	                  '<p>Welcome to Yet Another Productivity Tool.</p>');
	define('TEXTBODY','Thank you so much for becoming a member of Yapt, a tool
					to assist with any of your productivity needs.');

	define('CHARSET','UTF-8');

	require REQUIRED_FILE;

	use Aws\Ses\SesClient;
	use Aws\Ses\Exception\SesException;

	$client = SesClient::factory(array(
	    'version'=> 'latest',
	    'region' => REGION
	));






//create an array called errors
	$errors = array();

	$_SESSION['success'] = "";

	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

//Checks if register is Post
	if (isset($_POST['register']))
	{
		//variables to clense and store username as string.
		$username = mysqli_real_escape_string($conn,$_POST['register_username']);


		//these variables are to check to make sure user typed password correctly
		//and to check if fields are blank.
		$password = mysqli_real_escape_string($conn,$_POST['register_password']);
		$password2 = mysqli_real_escape_string($conn,$_POST['register_password2']);

		//this stores the password in to a new variable then encrypts to send to DB.
		$newpassword = password_hash($password, PASSWORD_DEFAULT);

		//email address variable as string.
		$emailaddress = mysqli_real_escape_string($conn,$_POST['register_email']);
		define('RECIPIENT', $emailaddress);

		//this sets the security answers when users register new account
		$securityAnswer1 = mysqli_real_escape_string($conn,$_POST['securityAnswer1']);
		$securityAnswer2 = mysqli_real_escape_string($conn,$_POST['securityAnswer2']);
		$securityAnswer3 = mysqli_real_escape_string($conn,$_POST['securityAnswer3']);

		//this will store the security question in the form of an int
		//intention to have each question tied to a value.
		$securityQuestion1 = $_POST['select1'];
		$securityQuestion2 = $_POST['select2'];
		$securityQuestion3 = $_POST['select3'];
		//this checks DB for account with same username and/or email
		//to avoid duplicate accounts.
		$username_results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		$email_results = mysqli_query($conn, "SELECT * FROM users WHERE useremail='$emailaddress'");


		//to check if fields are empty
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

		//check if answers are empty
		//commented out for test use
	/*<-----remove this to activate code	if (empty($securityAnswer1)){
			array_push($errors, "Answer1 is required");
		}

		if (empty($securityAnswer2)){
			array_push($errors, "Answer2 is required");
		}

		if (empty($securityAnswer3)){
			array_push($errors, "Answer3 is required");
		} remove this to activate code--->*/

		//if result is more than 0 than there is an account
		//already attached with username
		if (mysqli_num_rows($username_results) > 0){
			array_push($errors,"Username already exists");
		}

		//account exists with email.
		if (mysqli_num_rows($email_results) > 0){
			array_push($errors,"Email address already in use");
		}

		//if there are no errors then information will be uploaded to DV.
		//Account will be created.
		if (count($errors) == 0) {
			$query = "INSERT INTO users (username, userpass, useremail) VALUES('$username', '$newpassword', '$emailaddress')";
			mysqli_query($conn,$query);

			$newResults = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
			$newRow = $newResults->fetch_assoc();
			$userID = $newRow['userID'];
			//this will upload answers and question values to DV.
			$newQuery = "INSERT INTO recovery (userID, firstQuestion, secondQuestion, thirdQuestion, firstAnswer, secondAnswer, thirdAnswer) VALUES('$userID', '$securityQuestion1', '$securityQuestion2', '$securityQuestion3', '$securityAnswer1', '$securityAnswer2', '$securityAnswer3')";
			mysqli_query($conn,$newQuery);

			//will send you back to homepage.
			header('location: index.php');
			//this will send a welcome email to new users.
			try {
			     $result = $client->sendEmail([
			    'Destination' => [
			        'ToAddresses' => [
			            RECIPIENT,
			        ],
			    ],
			    'Message' => [
			        'Body' => [
			            'Html' => [
			                'Charset' => CHARSET,
			                'Data' => HTMLBODY,
			            ],
						'Text' => [
			                'Charset' => CHARSET,
			                'Data' => TEXTBODY,
			            ],
			        ],
			        'Subject' => [
			            'Charset' => CHARSET,
			            'Data' => SUBJECT,
			        ],
			    ],
			    'Source' => SENDER,

			]);
			     $messageId = $result->get('MessageId');
			     echo("Email sent! Message ID: $messageId"."\n");

			} catch (SesException $error) {
			     echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
			}
		}



	}


	//check that login is POST
	if (isset($_POST['login']))
	{
		//clenses both fields before checking DB.
		$username = mysqli_real_escape_string($conn,$_POST['username']);

		$password = mysqli_real_escape_string($conn,$_POST['password']);



		//Check if fields are empty.
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {

			//retrives a account with same username string.
			$results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

			//this verifies password
			$row = $results->fetch_assoc();
			if(password_verify($password, $row['userpass']))
			{

				if (mysqli_num_rows($results) == 1) {

					//this logs in the user and creates a session.
					$_SESSION['username'] = $username;
					$_SESSION['user_id'] = $row['userID'];
					$_SESSION['success'] = "You are now logged in";

					//checks if its the first time loging in.
					//or if pass was typed incorrectly
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


//This is the code that recovers your password if forgotten
//Please note that the HTML on the reset.php must be changed.
//This code will still work but it will not save the password fields
//Instead it will send a temp password to the email typed in.
	if (isset($_POST['Recover']))
	{
		define('SUBJECT','Account Recovery');

		define('HTMLBODY','<h1>Yapt Support</h1>'.
		                  '<p>On this email there will be a temporary password attached.
													Use this password to log in then you may use the account
													tab to change to a new secure password.</p>');

		$emailaddress = mysqli_real_escape_string($_POST['Email_address']);
		$username = mysqli_real_escape_string($_POST['Username']);


		ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    $to = $emailaddress;

    echo "The email message was sent.";

		$password = mysqli_real_escape_string(rand(1000,5000)); // Generate random number between 1000 and 5000 and assign it to a local variable.

		$password2 = password_hash($password, PASSWORD_DEFAULT);//encrypt temp PASSWORD

		$results = mysqli_query($conn, "SELECT * FROM users WHERE useremail='$emailaddress' AND username = '$username'");

		$row = $results->fetch_assoc();
		$name = $row['username'];

		$query = "UPDATE users SET userpass = '$password2' WHERE username = '$name' AND useremail = '$emailaddress' ";

		define('TEXTBODY','Temporary password is '$password'');

			mysqli_query($conn,$query);

			try {
			     $result = $client->sendEmail([
			    'Destination' => [
			        'ToAddresses' => [
			            RECIPIENT,
			        ],
			    ],
			    'Message' => [
			        'Body' => [
			            'Html' => [
			                'Charset' => CHARSET,
			                'Data' => HTMLBODY,
			            ],
						'Text' => [
			                'Charset' => CHARSET,
			                'Data' => TEXTBODY,
			            ],
			        ],
			        'Subject' => [
			            'Charset' => CHARSET,
			            'Data' => SUBJECT,
			        ],
			    ],
			    'Source' => SENDER,
			    
			]);
			     $messageId = $result->get('MessageId');
			     echo("Email sent! Message ID: $messageId"."\n");

			} catch (SesException $error) {
			     echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
			}
		}
			header('location: index.php');

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
