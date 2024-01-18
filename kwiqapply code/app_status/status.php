<?php

    session_start();
    require('../includes/dbcon.php');
    error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Application Status</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Application Status</h2>
      

      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col">Application ID</th>
              <th scope="col">College Name</th>
              <th scope="col">Course Name</th>
              <th scope="col">Current Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
            <?php 
								$query="SELECT `aplic_id`, `clg_id`, `course_name`, `app_status` FROM `applic_det` WHERE user_id='".$_SESSION['auth_user']['ulog_id']."'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									$query2="SELECT `clgname` FROM `admin_add_clg` WHERE `clg_id`=".$row["clg_id"]."";
									$run2=mysqli_query($con,$query2);
								while($row2=mysqli_fetch_array($run2)){
									echo "<tr class='text-dark'>";
									echo "<td>".$row["aplic_id"]."</td>";
									echo "<td><a href='../about.php?id=".$row['clg_id']."'>".$row2["clgname"]."</a></td>";
									echo "<td>".$row["course_name"]."</td>";
                  echo "<td><a href='#' class='more'>".$row["app_status"]."</a></td>";
                }} ?>
            
            </tr>
          </tbody>
        </table>
        <center><a href="../landingPage.php">Back to Main Page!</a></center>
      </div>
    </div>
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>