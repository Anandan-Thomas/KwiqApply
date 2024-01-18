<?php  
	session_start();
	require('includes/dbcon.php');
?>
	
<!-- --------------------------------Apply------------------------------------- -->
<?php 
	if (isset($_GET['c_id'],$_GET['course_name'],$_GET['clg_id'])) {
		$c_id=$_GET['c_id'];
		$course_name=$_GET['course_name'];
		$clg_id=$_GET['clg_id'];
		$u_id=$_SESSION['auth_user']['ulog_id'];
		$query2="INSERT INTO `applic_det`( `user_id`, `course_id`,`clg_id`, `course_name`) VALUES ('$u_id','$c_id','$clg_id','$course_name')";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			
			header('Location: about.php?id='.$clg_id.'');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
