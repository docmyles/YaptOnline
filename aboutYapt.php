<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:aboutYapt.php
*Purpose: Tells users about application.
*************************************************************/?>

<!DOCTYPE html>

<html lang="en">

<?php include('connection.php')?>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107709825-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107709825-2');
</script>

	<link href="css/Landing.css" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Yapt | About</title>


<?php include('topbar.php')?>


</head>

<?php session_start();

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

<body id="page-top">
	<section style="padding:8rem 0 5rem 0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
          <p style="text-align:center;font-size:180%;"> <strong>About Yapt Online</strong></p>
           <p style="text-align:center;font-size:140%;"> <strong>Yapt Online</strong> is a productivity tool designed by Netlander to manage your life.</p>
            <p style="text-align:center;font-size:140%;color:gray"> <strong> Our goal</strong> is to help you achive the best you can be by keeping track of everything from life goals, finances, car maintenance and anything in between! Register now, take a tour, and start getting your life on track today!</p>
						</div>
					</div>
				</div>
    	</section>



</body>

	<section class="bg-light">
		<footer class="page-footer font-small blue fix-bottom">
					<div class="footer-copyright text-center">
						<a href="about.php">About Yapt</a> - <a href="privacy.php">Privacy</a> - <a href="help.php">Help</a><br />
						<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
						<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
					</div>
		</footer>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
