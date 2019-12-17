<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:editContacts.php
*Purpose:Allows user to edit his/her contacts.
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
<title> Yapt </title>
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

		$rowid = $_GET["edit"];
		$rowid = (int)$rowid;
		$sql = "SELECT * FROM contacts WHERE rowID='$rowid'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$f_name = $row['firstName'];
		$l_name = $row['lastName'];
		$phone = $row['phoneNumber'];
		$email = $row['emailAddress'];
		$company = $row['companyName'];
		$comments = $row['comments'];


	if (isset($_POST['send']))
	{
		$f_name = mysqli_real_escape_string($conn,$_POST['f_name']);
		$l_name = mysqli_real_escape_string($conn,$_POST['l_name']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$company = mysqli_real_escape_string($conn,$_POST['company']);
		$comments = mysqli_real_escape_string($conn,$_POST['comments']);


	$sql = "UPDATE contacts SET firstName='$f_name', lastName='$l_name', phoneNumber='$phone',emailAddress='$email', companyName='$company',comments='$comments' WHERE rowID='$rowid'";
	 // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

	}

	if (isset($_POST['delete']))
	{
		$sql = "DELETE FROM contacts WHERE rowID = '$rowid'";
			 // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
	    $stmt->execute();



	header("Location: index.php");
	exit;
	}




?>
<body>
<?php include('topbar.php')?>
<h6> Edit Contact </h6>
<form  method="POST">

	<div class="container">



		<div class="form-row">
							<div class="form-group col-md-2">
								<label for="f_name">First Name</label>
							<input type='text' class="form-control" name='f_name' value="<?php echo $f_name; ?>">
							</div>

							<div class="form-group col-md-2">
								<label for="l_name">Last Name</label>
							<input type="text"class="form-control" name="l_name" value="<?php echo $l_name;?>">
							</div>

							<div class="form-group col-md-2">
								<label for="phone">Phone#</label>
							<input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
							</div>

							<div class="form-group col-md-2">
								<label for="company">Company</label>
							<input type="text" class="form-control" name="company" value="<?php echo $company;?>">
							</div>

		</div>
							<div class="form-row">
								<div class="form-group col-md-5">
									<label for="email">Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo $email;?>">
								</div>
							</div>

							<div class="form-group">
								<label for="comments">Comments</label>
								<textarea class="form-control" name="comments"><?php echo $comments; ?> </textarea>
							</div>

							<button onclick="saved()" type="submit" class="btn btn-success" name="send">Save Change</button>
							<button onclick="deleted()" type="submit" class="btn btn-success" name="delete">Delete Contact</button>

	</div>


			</form>

			<script>
			function saved() {
			  alert("Change Saved!");
			}

			function deleted() {
			  alert("Contact has been erased!");
			}
			</script>



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
