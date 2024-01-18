<?php  
	session_start();
	if (!$_SESSION["auth_user1"]&&["auth_user2"])
	{
		header('location: ../index.php?session=failed');
	} 
	require('../includes/dbcon.php');
?>
	
<!-- --------------------------------Delete College------------------------------------- -->
<?php 
	if (isset($_GET['clg_id'])) {
		$clg_id=$_GET['clg_id'];
		$query2="delete from admin_add_clg where clg_id='$clg_id'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			$_SESSION['alertmsg']="College details deleted. Please enter the details as soon as possible!";
			header('Location: collegedetform.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Desc------------------------------------- -->
<?php 
	if (isset($_GET['cl_id'])) {
		$cl_id=$_GET['cl_id'];
		$query3="delete from clg_page_details where cl_id='$cl_id'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			$_SESSION['alertmsg']="College description deleted. Please enter the details as soon as possible!";
			header('Location: college_desc.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Course------------------------------------- -->
<?php 
	if (isset($_GET['c_id'])) {
		$c_id=$_GET['c_id'];
		$query4="delete from course_details where c_id='$c_id'";
		$run4=mysqli_query($con,$query4);
		if ($run4) {
			$_SESSION['alertmsg']="Course deleted!";
			header('Location: add_course.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
