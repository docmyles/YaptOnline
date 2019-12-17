<!DOCTYPE html>
<?php
/************************************************************
*
*Yapt-Copyright NetLander, Inc. 2018
*
*
*File Name:welcome.php
*welcome new users to the app.
*************************************************************/?>


<?php include('connection.php')?>
<html>
  <head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Styles.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit-no">

    <title> Welcome </title>
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

  <body class ="text-center">
    <?php include('topbar.php')?>
    <div class ="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main role="main" class="inner cover">
        <h1 class="cover-heading">Welcome to Yapt</h1>
      </main>
    </div>
  </body>


</html>
