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

<div class="input-group">
	<label>Retype Password</label>
	<input type = "password" name = "register_password2">
</div>

  <div class ="input-group">
  <label for="select1">Security question(1):</label>
  <select class="form-control" name="select1">
    <option value = 1>What was the house number and street name you lived in as a child?</option>
    <option value = 2>In what town or city was your first full time job?</option>
    <option value = 3>In what town or city did you meet your spouse/partner?</option>
    <option value = 4>What school did you attend for sixth grade?</option>
    <option value = 5>What is your maternal grandmother's maiden name?</option>
    <option value = 6>What is your mother's maiden name?</option>
  </select>
</div>

<div class ="input-group">
  <label>Answer(1)</label>
  <input type ="text" name= "securityAnswer1">
</div>

<div class ="input-group">
  <label for="select2">Security question(2):</label>
  <select class="form-control" name="select2">
    <option value = 1>What was the house number and street name you lived in as a child?</option>
    <option value = 2>In what town or city was your first full time job?</option>
    <option value = 3>In what town or city did you meet your spouse/partner?</option>
    <option value = 4>What school did you attend for sixth grade?</option>
    <option value = 5>What is your maternal grandmother's maiden name?</option>
    <option value = 6>What is your mother's maiden name?</option>
  </select>
</div>

<div class ="input-group">
  <label>Answer(2)</label>
  <input type ="text" name= "securityAnswer2">
</div>

<div class ="input-group">
  <label for="select3">Security question(3):</label>
  <select class="form-control" name="select3">
    <option value = 1>What was the house number and street name you lived in as a child?</option>
    <option value = 2>In what town or city was your first full time job?</option>
    <option value = 3>In what town or city did you meet your spouse/partner?</option>
    <option value = 4>What school did you attend for sixth grade?</option>
    <option value = 5>What is your maternal grandmother's maiden name?</option>
    <option value = 6>What is your mother's maiden name?</option>
  </select>
</div>

  <div class="input-group">
    <label>Answer(3)</label>
    <input type ="text" name= "securityAnswer3">
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
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br/>
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


</html>
