<?php include('connection.php')?>

<?php/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:Login.php
*Purpose: Allows user to log into the application.
*************************************************************/?>

<html>
	<head>
		<title> Yapt </title>
		<link href="css/Landing.css" rel="stylesheet" type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<meta name="viewport" content="width = device-width, initial-scale = 1">
	</head>
	
	<body>
		<div class="container">
		<div class="col align-self-center" style="width: 600px; margin-top: 50px;">
		<div class="jumbotron">
		
		<div class="form-group">
		
		<h2>Yapt</h2>
		
		</div>
		
		<form class="form-horizontal" method="post" action="login.php">
			
			<?php include('errors.php'); ?>
			
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			
			
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			
			
			<div class="input-group">
				<button type="submit" class="btn" name="login">Login</button>
			</div>
			
			<p>
				Not a member? <a href="register.php">Sign up.</a>
			</p>

			<p>
				 <a href="reset.php">Forgot Password?</a>
			</p>

			
		</div>
		</div>
		</div>
		
		
		</form>
		
	</body>

			<footer class="page-footer font-small blue">
				<div class="footer-copyright text-center">
					<a href="about.php">About Yapt</a><br />
					<font color="white"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="white">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


	
</html>