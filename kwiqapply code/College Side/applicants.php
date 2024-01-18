<?php  
	session_start();
	if (!$_SESSION["auth_user2"])
	{
		header('location: ../index.php?session=failed');
	} 
	require('../includes/dbcon.php');
?>

<!doctype html>
<html lang="en">
	<head>
		<script src="Bootstrap/js/app.js"></script>
		<script src="Bootstrap/js/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

		<title>Applicants</title>
	</head>
	<body>
		<?php include('../Common/clg-admin-header.php') ?>
		<?php include('../Common/clg-admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Applicant Details!</h4>
						
						
					</div>
				</div>

				<div class="row w-100">

					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="5">
								<tr class="table-tr-head table-three bg-warning text-dark">
								    <th>Application ID</th>			
									<th>User Id</th>
									<th>User Name</th>
									<th>Course Name</th>
									<th>Application Status</th>
									<th></th>
								</tr>
								<?php 
								$query="SELECT `aplic_id`, `user_id`, `course_name`, `app_status` FROM `applic_det` WHERE clg_id='".$_SESSION['auth_user2']['clog_id']."'";
								
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									$query2="SELECT `s_full_name` FROM `u_reg_data` WHERE u_id='".$row['user_id']."'";
									$run2=mysqli_query($con,$query2);
									while($row2=mysqli_fetch_array($run2)){
										$test1=$row['aplic_id'];
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$test1."</td>";
									echo "<td>".$row["user_id"]."</td>";
									echo "<td>".$row2["s_full_name"]."</td>";
									echo "<td>".$row["course_name"]."</td>";
									echo "<td>".$row["app_status"]."</td>";
									echo	"<td width='170'><a class='btn btn-danger' href=../application_site/a_stud_profile.php?user_id=".$row['user_id'].">Profile</a></td>";
									echo "</tr>";										
								}}
								?>
							</table>	
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#updatestat'> Update Status </button>
							<div class='row w-100'>
					<div class=' col-lg-6 col-md-6 col-sm-12 mt-1 '>
						<div class='modal fade bd-example-modal-lg' id='updatestat' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
							<div class='modal-dialog modal-lg'>
								<div class='modal-content'>
									<div class='modal-header bg-info text-white'>
										<h4 class='modal-title text-center'>Update Application Status here!</h4>
									</div>
									<div class='modal-body'>
										<form action='update.php' method='post'>
											<div class='row mt-3'>
												<div class='col-md-4'>
												     <div class='form-group'>
												        <label>Application ID</label>
												        <select class='browser-default custom-select' name='testing'>
														<option selected>Select</option>
															<?php
															$fet="SELECT aplic_id from applic_det";
															$res=mysqli_query($con,$fet);
															while($row7=mysqli_fetch_array($res)){
															?>
												        
												        <option value='<?php echo $row7['aplic_id'] ?>'><?php echo $row7['aplic_id']; }?> </option>
												        
												        </select>													
											        </div>
													<div class='form-group'>
														<label>Status</label>
														<select class='browser-default custom-select' name='stat'>
														<option selected>Select</option>
														<option value='Pending'>Pending</option>
														<option value='Accepted'>Accepted</option>
														<option value='Rejected'>Rejected</option>
													    </select>													
													</div>
												</div>
											</div>
											<div class='modal-footer'>
												<input type='submit' class='btn btn-primary' name='btn_save2' value='Save Data'>
												<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
											</div>
										</form>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	</body>
</html>


