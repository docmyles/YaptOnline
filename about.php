<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:about.php
*Purpose: Tells user about application.
*************************************************************/?>

<!doctype html>

<html lang="en">

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



	<div class="pos-f-t" style="">
					<div class="collapse" id="navbarToggleExternalContent">
						<div class="bg-dark p-4">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="login.php">Login</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="register.php">Register</a>
								</li>

							</ul>
						</div>
					</div>

				</div>
					<nav class="navbar navbar-dark bg-dark">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</nav>
</head>

<body id="page-top">
	<section style="padding:8rem 0 5rem 0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">About Yapt</h5>
							Hi - Yapt Online is a productivity tool designed by Netlander to manage your life and goals in one location.
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



</body>

	<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="about.php">About Yapt</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
