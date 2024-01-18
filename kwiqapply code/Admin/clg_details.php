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

		<title>Admin - College Details</title>
	</head>
	<body>
		<?php include('../Common/common-header.php') ?>
		<?php include('../Common/admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">College Management System </h4>
						
					</div>
				</div>
            </div>

				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="5">
								<tr class="table-tr-head table-three bg-warning text-dark">
									<th>College ID</th>
									<th>College Name</th>
									<th>Adminstration Office number</th>
									 <th>College Email</th> 
									<th>Date of joining</th> 
									<th></th>
									<th></th>
									<th></th>  
								</tr>
								<?php 
								$query="SELECT `clg_id`, `clgname`, `address`, `admphone`, `prin_name`, `prin_no`, `clg_email`, `otherno`, `clg_cert`, `auth_stamp_img`,`affiliate`, `DoE`, `DoB` FROM `admin_add_clg`";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row["clg_id"]."</td>";
									echo "<td>".$row["clgname"]."</td>";
									echo "<td>".$row["admphone"]."</td>";
									echo "<td>".$row["clg_email"]."</td>";
									echo "<td>".$row["DoB"]."</td>";			
									echo	"<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#clgprof'> Profile </button></td>
									<td><button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#clgcourse'> Courses </button></td>
									<td><a class='btn btn-danger' href=delete-function.php?clg_id=".$row['clg_id'].">Delete</a></td>";
									echo "</tr>";
								
								?>
							</table>				
						</section>
						<!-- college profile modal -->
						<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="clgprof" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">">
								<div class="modal-content">
									<div class="modal-header bg-info text-dark">
										<h4 class="modal-title text-center">College Profile!</h4>
									</div>
									<div class="modal-body">
											<div class="row">
											    <div class="col-md-10">
													<div class="form-group">
														<label for="clgname">College ID: </label><?php echo $row['clg_id']; ?>
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="clgname">College Name: </label><?php echo $row["clgname"]; ?>
													</div>
												</div>
								            </div>
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="addr">Address: </label><?php echo $row["address"]; ?>
													</div>
                                                </div>
								            </div>
											<div class="row">
												<div class="col-md-10">
												    <div class="form-group">
														<label for="clgadmno">College Administration Number: </label><?php echo $row["admphone"]; ?>
													</div>	
                                                </div>											
                                            </div>	
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="princi">Principal Name: </label><?php echo $row["prin_name"]; ?>
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="officeno">Principal Office Number: </label><?php echo $row["prin_no"]; ?>
													</div>
												</div>
                                            </div> 
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="email">College Email:</label><?php echo $row["clg_email"]; ?>
													</div>
												</div>
								            </div>
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="otherno">Other No: </label><?php echo $row["otherno"]; ?>
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="college cert">College Certificate: </label><?php echo $row["clg_cert"]; ?>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="affiliate">Affiliation with: </label><?php echo $row["affiliate"]; ?>
														
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="authorize">College authorized signature and stamp image: </label><?php echo $row["auth_stamp_img"]; ?>
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-10">
													<div class="form-group">
														<label for="estab">Date of Establishment: </label><?php echo $row["DoE"]; ?>
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="joining">Date of Joining: </label><?php echo $row["DoB"]; ?>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				
				<!-- course list -->
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="clgcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header bg-info text-dark">
										<h4 class="modal-title text-center">Course List!</h4>
									</div>
									<div class="modal-body">
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
								</tr>
								<?php 
								$query2="SELECT `c_id`, `course_name`, `sem_no`, `sem_fee`, `ug_pg` FROM `course_details` WHERE college_id='".$row['clg_id']."'";
								$run2=mysqli_query($con,$query2);
								while($row2=mysqli_fetch_array($run2)) {
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row2["c_id"]."</td>";
									echo "<td>".$row2["course_name"]."</td>";
									echo "<td>".$row2["sem_no"]."</td>";
									echo "<td>".$row2["sem_fee"]."</td>";
									echo "<td>".$row2["ug_pg"]."</td>";
									echo "</tr>";
								 }} ?>
								
							</table>				
						</section>
					</div>
				</div>	 
				<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<!-- course list end -->
					</div>
				</div>	 	
				<!-- php code ending ivide cheyyaam -->
			<!-- </div> -->
		</main>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	</body>
</html>


