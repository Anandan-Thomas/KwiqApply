<?php  
	session_start();
	if (!$_SESSION["auth_user1"])
	{
		header('location: ../index.php?session=failed');
	} 
	require('../includes/dbcon.php');
?>
	
<!-- --------------------------------Delete Feedback------------------------------------- -->
<?php 
	if (isset($_GET['fb_id'])) {
		$fb_id=$_GET['fb_id'];
		$query1="DELETE FROM `user_feedback` where fb_id='$fb_id'";
		$run1=mysqli_query($con,$query1);
		if ($run1) {
			$_SESSION['alertmsg']="FeedBack Deleted Successfully!";
			header('Location: feedback.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete User------------------------------------- -->
<?php 
	if (isset($_GET['user_id'])) {
		$user_id=$_GET['user_id'];
		$query2="DELETE FROM userdet where user_id='$user_id'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			$_SESSION['alertmsg']="User Deleted Successfully!";
			header('Location: usermanage.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete College------------------------------------- -->
<?php 
	if (isset($_GET['clg_id'])) {
		$clg_id=$_GET['clg_id'];
		$query3="DELETE FROM admin_add_clg where clg_id='$clg_id'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			$_SESSION['alertmsg']="College Deleted Successfully!";
			header('Location: clg_details.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete College Admin------------------------------------- -->
<?php 
	if (isset($_GET['clg_admin'])) {
		$clg_admin=$_GET['clg_admin'];
		$query4="DELETE FROM clg_adm_det where clg_admin='$clg_admin'";
		$run4=mysqli_query($con,$query4);
		if ($run4) {
			$_SESSION['alertmsg']="College Admin Deleted Successfully!";
			header('Location: clgadm_manage.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>