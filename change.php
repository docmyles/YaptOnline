<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:change.php
*purpose: Allows users to change their passwords once logged in
*to the application.
*************************************************************/?>


<?php include('connection.php')?>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107709825-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-107709825-2');
</script>

<link href="css/Styles.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width = device-width, initial-scale = 1">

<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	?>

</head>
<title> Yapt </title>

	<body>

	<?php include('topbar.php')?>
<h6> Account </h6>
					<form method="POST">
						<div class="container">
						<div class="form-row">

							<div class="form-group col-md-2">
								<label for="currentpassword">Current password</label>
								<input type="password" class="form-control" name="currentpassword">
							</div>

							<div class="form-group col-md-2">
								<label for="newpassword1">New password</label>
								<input type="password" class="form-control" name="newpassword1">
							</div>

							<div class="form-group col-md-2">
								<label for="newpassword2">Retype Password</label>
								<input type="password" class="form-control" name="newpassword2">
							</div>


						</div>
						<button type="submit" class="btn btn-success" name="Save">Save Change</button>
						</div>
					</form>



	</body>

<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a> - <a href="privacy.php">Privacy</a> - <a href="help.php">Help</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 </html>
