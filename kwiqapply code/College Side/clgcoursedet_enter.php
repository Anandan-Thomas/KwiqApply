<?php
session_start();
require('../includes/dbcon.php');

 	if (isset($_POST['save_course'])) {

		$co_name=$_POST["co_name"];

		$sem_no=$_POST["sem_no"];

		$fr_sem=$_POST["fr_sem"];
		
		$ugpg=$_POST["ugpg"];

       $clgg_id=$_SESSION['auth_user2']['clog_id'];
		
		
        $query="INSERT INTO `course_details`(`college_id`, `course_name`, `sem_no`, `sem_fee`,`ug_pg`) VALUES ('$clgg_id','$co_name','$sem_no','$fr_sem','$ugpg')";
 		$run=mysqli_query($con, $query);

		
 		if ($run) {
			$_SESSION['alertmsg']="Course uploaded successfully!";
			 header("Location: add_course.php?upload=success");

 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
    }
    ?>