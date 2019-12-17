<?php include('connection.php')?>

<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:privacy.php
*Purpose: Explains privacy policy.
*************************************************************/?>
<!DOCTYPE html>
<html>
	<?php include('topbar.php')?>
 <head>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/Styles.css" rel="stylesheet" type="text/css">

   <meta name="viewport" content="width = device-width, initial-scale = 1">

<title> Privacy Policy </title>

</head>
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

    <body>
			<section style="padding:8rem 0 5rem 0">
       <p style="text-align:center;font-size:180%;"> <strong>Yapt Online Privacy Policy</strong></p>
         <p style="text-align:center;font-size:140%;"> Thank you for entrusting Yapt Online for your life productivity tool and personal information. Having access to your private information is a serious responsibility, and we want to let you know how we're handling it.</p>
           <p style="text-align:center;font-size:140%"> We only collect the information you choose to give us, and we process it with your consent, we only require the minimum amount of personal information that is necessary to fulfill the purpose of your interaction with us; we don't sell it to third parties; and we only use it as this Privacy Statement describes.</p>






 </section>
</body>







<section class="bg-light">
  <footer class="page-footer font-small blue">
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
