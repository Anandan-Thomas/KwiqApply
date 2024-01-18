<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["auth_user1"])
	{
		header('location: ../index.php?session=failed');
	} 
	require('../includes/dbcon.php');

?>
<!---------------- Session Ends form here ------------------------>

<!doctype html>
<html lang="en">
	<head>
		<script src="Bootstrap/js/app.js"></script>
		<script src="Bootstrap/js/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
		<title>Admin - Student Details</title>
	</head>
	<body>
		<?php include('../Common/common-header.php') ?>
		<?php include('../Common/admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">College Admin Management System</h4>
						
					</div>
				</div>
				

				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="5">
								<tr class="table-tr-head table-three bg-warning text-dark">
									<th>College Admin ID</th>
									<th>College Admin username</th>
									<th>College Name</th>
									<th></th>
								</tr>
								<?php 
								$query="SELECT `clg_id`, `clg_admin` FROM `clg_adm_det`";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									$query2="SELECT `clgname` FROM `admin_add_clg` WHERE `clg_id`=".$row["clg_id"]."";
									$run2=mysqli_query($con,$query2);
								while($row2=mysqli_fetch_array($run2)){
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row["clg_id"]."</td>";
									echo "<td>".$row["clg_admin"]."</td>";
									echo "<td>".$row2["clgname"]."</td>";
									echo	"<td width='170'><a class='btn btn-danger' href=delete-function.php?clg_admin=".$row['clg_admin'].">Delete</a></td>";
									echo "</tr>";
								}}
								?>
							</table>				
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	</body>
</html>


