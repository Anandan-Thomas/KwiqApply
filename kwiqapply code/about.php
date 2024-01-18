<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KwiqApply</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <?php 
    session_start(); 
    require('includes/dbcon.php');
    include('includes/navbar.php');  ?>
    <!-- Navbar End -->
    <!-- Header Start -->
    <?php
                if (isset($_GET['id'])) {
                    
                    $id = (int)$_GET['id'];

$sql1= mysqli_query($con,"SELECT * FROM clg_page_details WHERE cl_id = $id");
$picfile_path ='College Side/clg_campus_photo/';

 while($s = mysqli_fetch_array($sql1)){
    $picsrc=$picfile_path.$s['clg_photo'];
               
    echo "<div class='jumbotron jumbotron-fluid page-header position-relative overlay-bottom' style='margin-bottom: 90px;'>
        <div class='container text-center py-5'>
            <h1 class='text-white display-1'>".$s['clg_name']."</h1>
            
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class='container-fluid py-5'>
        <div class='container py-5'>
            <div class='row'>
                <div class='col-lg-5 mb-5 mb-lg-0' style='min-height: 500px;'>
                    <div class='position-relative h-100'>
                        <img class='position-absolute w-100 h-100' src='$picsrc.' style='object-fit: cover;'>
                    </div>
                </div>
                <div class='col-lg-7'>
                    <div class='section-title position-relative mb-4'>
                        <h6 class='d-inline-block position-relative text-secondary text-uppercase pb-2'>About Us</h6>
                        
                    </div>
                    <p>".$s['clg_desc']."</p>";
                    $run2=mysqli_query($con,"SELECT `admphone`, `otherno`, `clg_email`,`address`,`affiliate` FROM `admin_add_clg` WHERE clg_id=$id");
								while($row2=mysqli_fetch_array($run2)) { 
                                    echo "Address: ".$row2['address']."";
                                    echo "<br><br>";
                                    echo "Affiliated with: ".$row2['affiliate']."";
                                    echo "<br><br>";
                                    echo "Contact Number(s): ".$row2['admphone']." , ".$row2['otherno']."";
                                    echo "<br>";
                                    echo "Email ID: ".$row2['clg_email']."";
                                    echo "<br><br>";
                                    echo "For more information about the college and its facilities, visit: <a href=#>".$s['clg_link']."</a>";
                                }
                    
                echo "</div>
            </div>
            <h1>Courses Provided!</h1>";
            echo "<div class='row w-100'>

					<div class='col-md-12 ml-2'>
						<section class='mt-3'>
							
							<table class='w-100 table-elements mb-5 table-three-tr' cellpadding='5'>
								<tr class='table-tr-head bg-secondary table-three text-dark'>
								    			
									<th>Course Name</th>
									<th>Number of Semesters</th>
									<th>Fee rate per Semester</th>
									<th>UG/PG</th>
                                    <th></th>
								</tr>";
								
								
								$run=mysqli_query($con,"SELECT `c_id`, `course_name`, `sem_no`, `sem_fee`, `ug_pg` FROM `course_details` WHERE college_id=$id");
								while($row=mysqli_fetch_array($run)) {
									echo "<tr class='text-dark bg-light'>
									 
									 <td>".$row["course_name"]."</td>
									 <td>".$row["sem_no"]."</td>
									 <td>".$row["sem_fee"]."</td>
									 <td>".$row["ug_pg"]."</td>
                                    
										<td width='170'>"; 
                                        $q1="SELECT aplic_id from applic_det where user_id='".$_SESSION['auth_user']['ulog_id']."' AND course_id='".$row['c_id']."'";
                                 $result4=mysqli_query($con,$q1);
                                 $row3=mysqli_num_rows($result4);
                                 if($row3 == 0) { echo "<a class='btn btn-danger' href=apply-function.php?c_id=".$row['c_id']."&course_name=".$row['course_name']."&clg_id=$id>Apply Now!</a></td>";
                                 } 
                                 else {
                                    echo "Applied!";
                                 }
                                 echo "</tr>";
								}
								
							echo "</table>		
        </div>
    </div>";
 }}
    ?>
    <!-- About End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>