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

		<title>Admin - Course Details</title>
	</head>
	<body>
		<?php include('../Common/clg-admin-header.php') ?>
		<?php include('../Common/clg-admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Course Details!</h4>
						
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coursedet"> Enter Course Details! </button>
					</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="coursedet" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Please fill out this form!</h4>
									</div>
									<div class="modal-body">
										<form action="clgcoursedet_enter.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="coursename">Course Name: </label>
														<input type="text" name="co_name" class="form-control" required="" placeholder="Enter Course Name">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="semno">Number of Semesters: </label>
														<input type="int" name="sem_no" class="form-control" placeholder="Enter Number of semesters" required></textarea>
													</div>
                                                </div>
												<div class="col-md-4">
												    <div class="form-group">
														<label for="semfee">Fee Rate per Semester: </label>
														<input type="text" name="fr_sem"  required><br><br>
													</div>	
                                                </div>											
                                            </div>	
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="ugpg_">UG/PG Course: </label>
														<select class="browser-default custom-select" name="ugpg">
															<option selected>Select</option>
															<option value="UG">UG</option>
															<option value="PG">PG</option>
														</select>
													</div>
												</div>
												
												
											</div>
											
											
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="save_course" value="Save Data">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  
				
				<!-- END OF THE FORM -->

				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="5">
								<tr class="table-tr-head table-three bg-warning text-dark">
								    <th>Course ID</th>			
									<th>Course Name</th>
									<th>Number of Semesters</th>
									<th>Fee rate per Semester</th>
									<th>UG/PG</th>
									<th></th>
								</tr>
								<?php 
								$query="SELECT `c_id`, `course_name`, `sem_no`, `sem_fee`, `ug_pg` FROM `course_details` WHERE college_id='".$_SESSION['auth_user2']['clog_id']."'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row["c_id"]."</td>";
									echo "<td>".$row["course_name"]."</td>";
									echo "<td>".$row["sem_no"]."</td>";
									echo "<td>".$row["sem_fee"]."</td>";
									echo "<td>".$row["ug_pg"]."</td>";
									echo	"<td width='170'> <a class='btn btn-danger' href=delete-function.php?c_id=".$row['c_id'].">Delete</a></td>";
									echo "</tr>";
								}
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


