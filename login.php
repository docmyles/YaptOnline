<?php include('connection.php')?>

<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:Login.php
*Purpose: Allows user to log into the application.
*************************************************************/?>

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

		<title> Yapt </title>
		<link href="css/Landing.css" rel="stylesheet" type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<meta name="viewport" content="width = device-width, initial-scale = 1">
	</head>

	<body>
		<p style="text-align:center;font-size:160%;"><strong>Yapt Online</strong></p>
		<div class="container">
		<div class="col align-self-center" style="width: 400px; margin: 0 auto;">
		<div class="jumbotron">

		<div class="form-group">

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
			<p>
				 <a href="reset.php">Forgot Password?</a>
			</p>

			<div class="input-group">
				<button type="submit" class="btn btn-success" name="login">Login</button>
			</div>

			<p>
				Not a member? <a href="register.php">Sign up.</a>
			</p>

		</div>
		</div>
		</div>


		</form>

	</body>

    <section class="bg-light">
			<footer class="page-footer font-small blue">
				<div class="footer-copyright text-center">
					<a href="about.php">About Yapt</a> <a href="#">Privacy</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>
    </section>


</html>
