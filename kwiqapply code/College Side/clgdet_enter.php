<?php  
session_start();
require('../includes/dbcon.php');

 	if (isset($_POST['btn_save'])) {

		$clgname=$_POST["clgname"];

		$address=$_POST["address"];

		$admphone=$_POST["admphone"];
		
		$pn=$_POST["pn"];
		
		$pon=$_POST["pon"];
		
		$email=$_POST["email"];
		
		
		
		$otherno=$_POST["otherno"];
		
	   $clgcert=$_POST["clgcert"];
		
		$affil=$_POST["affil"];
		
		$signature=$_POST['signature'];

		$clgg_id=$_SESSION['auth_user2']['clog_id'];
		
        
        
        
		$doE=$_POST["doE"];
		
		$doJ=$_POST["doJ"];
        $clgcert = $_FILES['clgcert']['name'];
			$tmp_name=$_FILES['clgcert']['tmp_name'];
			$path = "images/".$clgcert;
			move_uploaded_file($tmp_name, $path);

		$signature = $_FILES['signature']['name'];
			$tmp_name_sig=$_FILES['signature']['tmp_name'];
			$path = "images/".$signature;
			move_uploaded_file($tmp_name_sig, $path);
        $query="INSERT INTO `admin_add_clg` VALUES ('$clgg_id','$clgname','$address','$admphone','$pn','$pon','$email','$otherno','$clgcert','$affil','$signature','$doE','$doJ')";
 		$run=mysqli_query($con, $query);

		
 		if ($run) {
			$_SESSION['alertmsg']="College details uploaded successfully!";
			 header("Location: collegedetform.php?upload=success");

 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
    }
    ?>