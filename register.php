<?php include('connection.php')?>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:register.php
*Purpose: Allows user to register.
*************************************************************/?>

<html>
<head>
	<title> Yapt </title>
	<link href="css/Landing.css" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width= device-width, initial-scale = 1">
</head>
<body>
		<div class="container">
		<div class="col align-self-center" style="width: 600px; margin-top: 50px;">
		<div class="jumbotron">
	<div class="header">
	<h2>Yapt</h2>
	</div>

<form class="form-horizontal" method="post" action="register.php">

		<?php include('errors.php'); ?>

<div class="input-group">
<label>New Member Username</label>
<input type ="text" name= "register_username">
</div>

<div class="input-group">
<label>New Member Email address</label>
<input type ="text" name ="register_email">
</div>

<div class="input-group">
<label>New Member Password</label>
<input type = "password" name= "register_password">
</div>

<div class="input">
	<label>Retype Password</label>
	<input type = "password" name = "register_password2">
</div>

<div class="input-group">
<button type="submit" class="btn" name="register">Register</button>
</div>
	<p>
			Already a member? <a href="login.php">Sign in</a>
	</p>

</div>
</form>

			<footer class="page-footer font-small blue">
				<div class="footer-copyright text-center">
					<a href="about.php">About Yapt</a><br />
					<font color="white"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="white">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


</html>
