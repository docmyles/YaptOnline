<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:help.php
*purpose:Allows user to send email with issues.
*************************************************************/?>
<html>
<head>
<link href="css/Styles.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width= device-width, initial-scale = 1">
</head>



		<title>Yapt Help</title>




		<body>
			<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
				<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Yapt</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">

					 <li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					 </li>

					 <li class="nav-item">
						<a class="nav-link" href="register.php">Register</a>
					</li>
				 </ul>
			 </div>
			</div>
			</nav>

<?php
	if (isset($_POST['send']))
	{
		ini_set( 'display_errors', 1 );
	 	error_reporting( E_ALL );
		$from = mysqli_real_escape_string($_POST['email']);
		$to = "support@yaptonline.com";
		$subject = "test";
		$message = mysqli_real_escape_string($_POST['issues']);
		$headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
	}
?>


  <section style="padding:4rem 0 3rem 0">
    <p style="text-align:center;font-size:180%;"> <strong>Yapt Online Help</strong></p>
  </section>
			<form method="post">

						<div class="container">

							<div class="form-row">

								<div class="form-group col-md-2">
								<label for="f_name">First Name</label>
									<input type="text" class="form-control" name="f_name" placeholder="First Name">
								</div>

								<div class="form-group col-md-2">
								<label for="l_name">Last Name</label>
									<input type="text" class="form-control" name="l_name" placeholder="Last Name">
								</div>

								<div class="form-group col-md-2">
								<label for="phone">Phone Number</label>
									<input type="text" class="form-control" name="phone" placeholder="xxx-xxx-xxxx">
								</div>
							</div>

							<div class="form-row">

								<div class="form-group col-md-5">
								<label for="email">Email</label>
								<input type="text" class="form-control" name="email" placeholder="JohnDoe@NetLander.com">
								</div>
							</div>

							<div class="form-group">
							<textarea class="form-control" name="issues" placeholder="Please explain the issues you're experiencing"></textarea>
							</div>

							<button onclick="saved()" type="submit" class="btn btn-success" name="send">Send</button>
						</div>
			</form>

			<script>
			function saved() {
			  alert("Email Sent!");
			}


			</script>


		</body>

			<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a> - <a href="privacyLogOut.php">Privacy</a> - <a href="helpLogOut.php">Help</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>



			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
