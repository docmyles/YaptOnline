<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:Index.php
*Purpose: shows all current contacts.
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

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/Styles.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">
<meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit-no">
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

	$sql = "SELECT * FROM contacts WHERE user = '$_SESSION[username]'";
	$result = $conn->query($sql);


?>
<title>Yapt</title>


			<body>
			<?php include('topbar.php')?>



			<h6> Contacts </h6>



					<div class="table-responsive">
						<div class="row">
							<div class="col-lg-12 mx-auto">
								<table class="table table-bordered table-sm table-striped">

								<thead>
									<tr>
										<th scope="col"> Name: </th>
										<th scope="col"> Phone: </th>
										<th scope="col"> Email: </th>
										<th scope="col"> Company: </th>
										<th scope="col"> Comments: </th>
									</tr>
								</thead>


							<?php

							// output data of each row

							while($row = $result->fetch_assoc())
								{
								echo"<tr><td><a href='editContacts.php?edit=$row[rowID]'>{$row["firstName"]} {$row["lastName"]}</a></td>  <td>{$row["phoneNumber"]}</td>  <td>{$row["emailAddress"]}</td>  <td>{$row["companyName"]}</td>  <td>{$row["comments"]}</td></tr>";

								}
							?>

								</table>
							</div>
						</div>
					</div>


			</body>



			<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a> - <a href="privacy.php">Privacy</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>


			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>
