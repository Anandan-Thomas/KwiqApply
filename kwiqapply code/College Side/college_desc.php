<!---------------- Session starts form here ----------------------->
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

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
		<title>College Description Page</title>
	</head>
	<body>
		<?php include('../Common/clg-admin-header.php') ?>
		<?php include('../Common/clg-admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">College Description!</h4>
						<?php $q="select cl_id from clg_page_details where cl_id='".$_SESSION['auth_user2']['clog_id']."'";
                                 $result=mysqli_query($con,$q);
                                 $row=mysqli_num_rows($result);
                                 if($row == 0) : 
						echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#collegedesc'> Enter College Description! </button>"; ?>
                        <?php else:
							echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#collegedesc_upd'> Update College Description! </button>"; ?>
					<?php endif; ?>
				</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="collegedesc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Enter the details that needs to be shown to the Student/User!</h4>
									</div>
									<div class="modal-body">
										<form action="clgdp_enter.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="clgname">College Name: </label>
														<input type="text" name="clg_name" class="form-control" required="" placeholder="Enter Name">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="descrip">College Description: </label>
														<textarea id="clg_dp" name="clg_dp" class="form-control" placeholder="Type the description to be showed here..." rows="10" cols="50" required></textarea>
													</div>
                                                </div>
												<div class="col-md-4">
												    <div class="form-group">
														<label for="clgcourse">Courses Provided: </label>
														<textarea id="clg_c" name="clg_c"  class="form-control" placeholder="Type the courses provided..." rows="10" cols="50" required></textarea>
													</div>	
                                                </div>	
												<div class="col-md-10">
												    <div class="form-group">
														<label for="clglink">College Link: </label>
														<input type="text" name="clg_l"  class="form-control"  placeholder="Type the college link...">
													</div>	
                                                </div>												
                                            </div>	
											
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="collegephoto">College Campus Photo: </label>
														<input type="file" name="clg_photo" class="form-control">
													</div>
												</div>
											</div>
											
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_desc" value="Save Data">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  
				
				<!-- updation -->
				<?php 
					$query2="SELECT `clg_name`, `clg_desc`, `clg_courses`,`clg_link` FROM `clg_page_details` where cl_id='".$_SESSION['auth_user2']['clog_id']."'";
					$run2=mysqli_query($con,$query2);
					if (isset($_POST['btn_desc2'])) {

						$clg_dp=$_POST["clg_dp"];
						$clg_c=$_POST["clg_c"];
						$clg_l=$_POST["clg_l"];
						$colllege_id=$_SESSION['auth_user2']['clog_id'];     
						
						$query3="UPDATE `clg_page_details` SET `clg_desc`='$clg_dp',`clg_courses`='$clg_c',`clg_link`='$clg_l' WHERE cl_id='$colllege_id'";
						 $run3=mysqli_query($con, $query3);
				
				
						
						 if ($run3) {
							$_SESSION['alertmsg']="Updation successful!";
											
						 }
						 else {
							 echo "Your Data has not been submitted";
						 }
					}
					?>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="collegedesc_upd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Update the college page description details!</h4>
									</div>
									<div class="modal-body">
										<?php while($row2=mysqli_fetch_array($run2)) { ?>
										<form action="" method="post" enctype="multipart/form-data">
											<div class="row mt-10">
												<div class="col-md-10">
													<div class="form-group">
														<label for="descrip">College Description: </label>
														<input type="text" name="clg_dp" class="form-control" value="<?php echo $row2["clg_desc"];?>" placeholder="Type the description to be showed here...">
													</div>
                                                </div>
												<div class="col-md-10">
												    <div class="form-group">
														<label for="clgcourse">Courses Provided: </label>
														<input type="text" name="clg_c"  class="form-control" value="<?php echo $row2["clg_courses"];?>" placeholder="Type the courses provided...">
													</div>	
                                                </div>		
												<div class="col-md-10">
												    <div class="form-group">
														<label for="clglink">College Link: </label>
														<input type="text" name="clg_l"  class="form-control" value="<?php echo $row2["clg_link"];?>" placeholder="Type the college link...">
													</div>	
                                                </div>										
                                            </div>	
											<?php } ?>
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_desc2" value="Save Data">
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

				<div class="row w-10">

					<div class="col-md-10 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="2">
								<tr class="table-tr-head table-three bg-warning text-dark">
									<th>College ID</th>
									<th>College Name</th>
									<th width="1000px"><center>College Description</center></th>
									<th>Courses Provided</th>
									<th>College link</th>
									<th>College Photo</th>
									<th></th>
								</tr>
								<?php 
								$query="SELECT `cl_id`, `clg_name`, `clg_desc`, `clg_link`, `clg_courses`, `clg_photo` FROM `clg_page_details` where cl_id='".$_SESSION['auth_user2']['clog_id']."'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row["cl_id"]."</td>";
									echo "<td>".$row["clg_name"]."</td>";
									echo "<td>".$row["clg_desc"]."</td>";
									echo "<td>".$row["clg_courses"]."</td>";
									echo "<td>".$row["clg_link"]."</td>";
									echo "<td>".$row["clg_photo"]."</td>";
									echo	"<td width='170'><a class='btn btn-danger' href=delete-function.php?cl_id=".$row['cl_id'].">Delete</a></td>";
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


