<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:ToDoList.php
*Purpose: Allows user to create ToDoList items.
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

	<title>To Do List</title>
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

	$task = mysqli_real_escape_string($conn,$_POST['myInput']);
	$sql = "SELECT * FROM todolist WHERE user = '$_SESSION[user_id]'";
	$result = $conn->query($sql);

  $sql2 = "SELECT * FROM users WHERE userID = '$_SESSION[user_id]'";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "   Score: " . $row["score"];
    }
  } else {
    echo "0 results";
  }


	if (isset($_POST["add"]))
	{

		$sql = "INSERT INTO todolist (task, user ) VALUES ('$task','$_SESSION[user_id]')";

		if ($conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
      $sql ="UPDATE users Set score = score + 10 WHERE userID ='$_SESSION[user_id]'";
      ($conn->query($sql));
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		header("Location: ToDoList.php");
	}

	if (isset($_GET['delete_task']))
	{
		$task_id = $_GET['delete_task'];
		$sql = "DELETE FROM todolist WHERE rowid = '$task_id'";
			 // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
	    $stmt->execute();



	header("Location: ToDoList.php");
	exit;
	}

	?>


	<body>
		<?php include('topbar.php')?>
<h6> To Do List </h6>


		<form method="post">

			<div class="container">

				<div class="form-row">

				  <div class="form-group col-md-10">
				 	<input type="text" class="form-control" name="myInput" placeholder="...">
				  </div>

				  <button onclick="saved()" type="submit" class="btn btn-success" name="add">Add</button>
				</div>


				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Task</th>
							<th scope="col">Remove</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<?php $i = 1; while($row = $result->fetch_assoc()) { ?>
							<td><?php echo $i;?></td>
							<td class="task"><?php echo $row['task']?></td>
							<td class="delete"><a href="ToDoList.php?delete_task=<?php echo $row['rowid']; ?>">x</a></td>
						</tr>
							<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</form>

		<script>
			function saved() {
			  alert("Item added! Good Job!");
			}

		</script>

	</body>








			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>

			<footer class="page-footer font-small blue bg-light">
				<div class="footer-copyright text-center">
					<a href="aboutYapt.php">About Yapt</a> - <a href="privacy.php">Privacy</a> - <a href="help.php">Help</a><br />
					<font color="black"> &copy; 2018 - <?php echo date("Y"); ?> <a href="http://www.netlander.com" target="_blank" >NetLander, Inc.</a><br />
					<small color="black">Made in Florida <i class="fal fa-rocket"></i></small>
				</div>
			</footer>
