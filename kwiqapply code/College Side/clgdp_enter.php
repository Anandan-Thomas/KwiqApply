<?php  
session_start();
require('../includes/dbcon.php');

 	if (isset($_POST['btn_desc'])) {

		$clg_name=$_POST["clg_name"];

		$clg_dp=$_POST["clg_dp"];

		$clg_c=$_POST["clg_c"];

		$clg_l=$_POST["clg_l"];
		
		$clg_photo=$_POST["clg_photo"];

		$colllege_id=$_SESSION['auth_user2']['clog_id'];     
        		
        $clg_photo = $_FILES['clg_photo']['name'];
			$tmp_name=$_FILES['clg_photo']['tmp_name'];
			$path = "clg_campus_photo/".$clg_photo;
			move_uploaded_file($tmp_name, $path);
		
        $query="INSERT INTO `clg_page_details`(`cl_id`, `clg_name`, `clg_desc`, `clg_courses`, `clg_photo`,`clg_link`) VALUES ('$colllege_id','$clg_name','$clg_dp','$clg_c','$clg_photo','$clg_l')";
 		$run=mysqli_query($con, $query);
		// echo $query;


		
 		if ($run) {
			$_SESSION['alertmsg']="College Description uploaded successfully!";
			 header("Location: college_desc.php?upload=success");

 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
    }
    ?>