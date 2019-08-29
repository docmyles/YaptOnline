<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:goals.php
*Purpose: Allows user to create goal items.
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

<?php include('connection.php')?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/Styles.css" rel="stylesheet" type="text/css">

<meta name="viewport" content="width = device-width, initial-scale = 1">

	<title>Goals</title>
</head>
<?php

	$goal = mysqli_real_escape_string($conn,$_POST['myInput']);
	$sql = "SELECT * FROM Goals WHERE user = '$_SESSION[user_id]'";
	$result = $conn->query($sql);


	if (isset($_POST["add"]))
	{

		$sql = "INSERT INTO Goals (goal, user ) VALUES ('$goal','$_SESSION[user_id]')";

		if ($conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		header("Location: goals.php");
	}

	if (isset($_GET['delete_goal']))
	{
		$goal_id = $_GET['delete_goal'];
		$sql = "DELETE FROM Goals WHERE rowid = '$goal_id'";
			 // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
	    $stmt->execute();



	header("Location: goals.php");
	exit;
	}

	?>


	<body>
		<?php include('topbar.php')?>

		<form method="post">

			<div class="container">

				<div class="form-row">

				  <div class="form-group col-md-10">
				  	<label for="myInput">Goals</label>
				 	<input type="text" class="form-control" name="myInput" placeholder="...">
				  </div>

				  <button onclick="saved()" type="submit" class="btn btn-primary" name="add">Add</button>
				</div>


				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Goal</th>
							<th scope="col">Remove</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<?php $i = 1; while($row = $result->fetch_assoc()) { ?>
							<td><?php echo $i;?></td>
							<td class="goal"><?php echo $row['goal']?></td>
							<td class="delete"><a href="goals.php?delete_goal=<?php echo $row['rowid']; ?>">x</a></td>
						</tr>
							<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</form>

		<script>
			function saved() {
			  alert("Item added!");
			}

		</script>

	</body>








			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>

			<footer class="page-footer font-small blue bg-dark">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a><br />
					<font color="white"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="white">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>
