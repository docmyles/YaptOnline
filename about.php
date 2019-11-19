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

</head>

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

	<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="about.php">About Yapt</a> - <a href="privacy.php">Privacy</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
