<?php  
	session_start();
	require('../includes/dbcon.php');
?>
	
<!-- --------------------------------Apply------------------------------------- -->
<?php 
	if (isset($_POST['btn_save2'])) {
		$testing=$_POST["testing"];
		$app_status=$_POST["stat"];
		$query2="UPDATE `applic_det` SET `app_status`='$app_status' WHERE `aplic_id`='$testing'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			$_SESSION['alertmsg']="Status updation successful!";
			header('Location: applicants.php');
		}
		else{
			echo "Record not updated";
		}
	}
?>

