<!DOCTYPE html>
<?php/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:addContact.php
*purpose:Allows user to add contact to his/her contact list.
*************************************************************/?>
<?php include('connection.php')?>
<html>

<link href="css/Styles.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
<meta name="viewport" content="width= device-width, initial-scale = 1">
<?php
	session_start(); 
	$f_name = mysqli_real_escape_string($conn,$_POST['f_name']);
	$l_name = mysqli_real_escape_string($conn,$_POST['l_name']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$company = mysqli_real_escape_string($conn,$_POST['company']);
	$comments = mysqli_real_escape_string($conn,$_POST['comments']);
	
	
	if (isset($_POST["send"]))
	{
		
		$sql = "INSERT INTO contacts (firstName, lastName, phoneNumber, emailAddress, companyName, comments, user) VALUES ('$f_name', '$l_name', '$phone', '$email', '$company', '$comments','$_SESSION[username]')";
			
		if ($conn->query($sql) === TRUE) 
		{
			echo "New record created successfully";
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>
		<title>Yapt</title>

		
			

		<body>
		<?php include('topbar.php')?>
			
	

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
								<label for="phone">Phone#</label>
									<input type="text" class="form-control" name="phone" placeholder="123-456-7890">
								</div>

								<div class="form-group col-md-2">
								<label for="company">Company</label>
									<input type="text" class="form-control" name="company" placeholder="NetLander">
								</div>
							</div>
						
							<div class="form-row">

								<div class="form-group col-md-5">
								<label for="email">Email</label>
								<input type="text" class="form-control" name="email" placeholder="JohnDoe@NetLander.com">
								</div>
							</div>
								
							<div class="form-group">
							<textarea class="form-control" name="comments" placeholder="Comments"></textarea>
							</div>
									
							<button onclick="saved()" type="submit" class="btn btn-primary" name="send">Add Contact</button>
						</div>	
			</form>

			<script>
			function saved() {
			  alert("Contact added!");
			}
			
			
			</script>
	
	
		</body>

			<footer class="page-footer font-small blue">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a><br />
					<font color="white"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="white">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>



			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			
</html>


	
