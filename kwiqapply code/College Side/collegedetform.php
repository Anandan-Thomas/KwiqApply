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
		<title>College Details</title>
	</head>
	<body>
		<?php include('../Common/clg-admin-header.php') ?>
		<?php include('../Common/clg-admin-sidebar.php') ?>
		<?php include('../alertmsg.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">College Details!</h4>
						<?php $q="select clg_id from admin_add_clg where clg_id='".$_SESSION['auth_user2']['clog_id']."'";
                                 $result=mysqli_query($con,$q);
                                 $row=mysqli_num_rows($result);
                                 if($row == 0) :
						echo "<button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#collegedet'> Enter College Details! </button>";  ?>
						<?php else :
						echo "<button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#collegedetupd'> Update College Details! </button>";  ?>
                        <?php endif; ?>
					</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="collegedet" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Please fill out this form!</h4>
									</div>
									<div class="modal-body">
										<form action="clgdet_enter.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="clgname">College Name: </label>
														<input type="text" name="clgname" class="form-control" required="" placeholder="Enter Name">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="addr">Address: </label>
														<textarea id="address" name="address" class="form-control" placeholder="Enter Address" rows="4" cols="50" required></textarea>
													</div>
                                                </div>
												<div class="col-md-4">
												    <div class="form-group">
														<label for="clgadmno">College Administration Number: </label>
														<input type="tel" name="admphone"  required><br><br>
													</div>	
                                                </div>											
                                            </div>	
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="princi">Principal Name: </label>
														<input type="text" name="pn" class="form-control" required="">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="officeno">Principal Office Number: </label>
														<input type="tel" name="pon" class="form-control" required="" >
													</div>
												</div>
                                            </div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="email">College Email:</label>
														<input type="text" name="email" class="form-control" required="" placeholder="Enter Email">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Other No: </label>
														<input type="tel" name="otherno" class="form-control" placeholder="Enter Mobile Number">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="college cert">College Certificate: </label>
														<input type="file" name="clgcert" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="affiliate">Affiliation with: </label>
														<select class="browser-default custom-select" name="affil">
															<option selected>Select</option>
															<option value="MGU">MGU</option>
															<option value="KTU">KTU</option>
															<option value="AICTE">AICTE</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="authorize">College authorized signature and stamp image: </label>
														<input type="file" name="signature" class="form-control">
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="estab">Date of Establishment: </label>
														<input type="date" name="doE" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="joining">Date of Joining: </label>
														<input type="date" name="doJ" class="form-control">
													</div>
												</div>
												
											</div>
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
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
			
			$query2="SELECT `clg_id`, `clgname`, `address`, `admphone`, `prin_name`, `prin_no`, `clg_email`, `otherno`, `clg_cert`, `auth_stamp_img`,`affiliate`, `DoE`, `DoB` FROM `admin_add_clg` where clg_id='".$_SESSION['auth_user2']['clog_id']."'";
			$run2=mysqli_query($con,$query2);

 	if (isset($_POST['btn_upd'])) {

		$clgname=$_POST["clgname"];
		$address=$_POST["address"];
		$admphone=$_POST["admphone"];
		$pn=$_POST["pn"];
		$pon=$_POST["pon"];		
		$email=$_POST["email"];
		$otherno=$_POST["otherno"];
		$clgg_id=$_SESSION['auth_user2']['clog_id'];
		$doE=$_POST["doE"];
		$doJ=$_POST["doJ"];

        $query3="UPDATE `admin_add_clg` SET `clgname`='$clgname',`address`='$address',`admphone`='$admphone',`prin_name`='$pn',`prin_no`='$pon',`clg_email`='$email',`otherno`='$otherno',`DoE`='$doE',`DoB`='$doJ' WHERE `clg_id`='$clgg_id'";
 		$run3=mysqli_query($con, $query3);

		
 		if ($run3) {
 			echo "Updated Successfully!";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
    }
    ?>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" id="collegedetupd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Please fill out this form!</h4>
									</div>
									<div class="modal-body">
										<form action="" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-10">
												<?php while($ty=mysqli_fetch_array($run2))
                    {
                        ?>
													<div class="form-group">
														<label for="clgname">College Name: </label>
														<input type="text" name="clgname" class="form-control" required="" value="<?php echo $ty["clgname"] ?>" placeholder="Enter Name">
													</div>
												</div>
												<div class="col-md-10">
													<div class="form-group">
														<label for="addr">Address: </label>
														<input type="text" name="address" class="form-control" value="<?php echo $ty["address"] ?>" placeholder="Enter Address" rows="4" cols="50" required></textarea>
													</div>
                                                </div>
												<div class="col-md-4">
												    <div class="form-group">
														<label for="clgadmno">College Administration Number: </label>
														<input type="tel" name="admphone" value="<?php echo $ty["admphone"] ?>" required><br><br>
													</div>	
                                                </div>											
                                            </div>	
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="princi">Principal Name: </label>
														<input type="text" name="pn" class="form-control" value="<?php echo $ty["prin_name"] ?>" required="">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="officeno">Principal Office Number: </label>
														<input type="tel" name="pon" class="form-control" value="<?php echo $ty["prin_no"] ?>" required="" >
													</div>
												</div>
                                            </div>
											<div class="row">
												<div class="col-md-10">
													<div class="formp">
														<label for="email">College Email:</label>
														<input type="text" name="email" class="form-control" required="" value="<?php echo $ty["clg_email"] ?>" placeholder="Enter Email">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Other No: </label>
														<input type="tel" name="otherno" class="form-control" value="<?php echo $ty["otherno"] ?>" placeholder="Enter Mobile Number">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="estab">Date of Establishment: </label>
														<input type="date" value="<?php echo $ty["DoE"] ?>" name="doE" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="joining">Date of Joining: </label>
														<input type="date" value="<?php echo $ty["DoB"] ?>" name="doJ" class="form-control">
													</div>
												</div>
												<?php } ?>
											</div>
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_upd" value="Update Data">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
						</div>
				
				<!-- END OF THE FORM -->
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
								 </div>
								 </div>

				<div class="row w-100">

					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="5">
								<tr class="table-tr-head table-three bg-warning text-dark">
									<th>College ID</th>
									<th>College Name</th>
									<th>Address</th>
									<th>Admn Office number</th>
									<th>Principal Name</th>
									<th>Principal Office Number</th>
									<th>College Email</th>
									<th>Other Number</th>
									<th>College Certificate</th>
									<th>Authorized Stamp Image</th>
									<th>Affiliation with</th>
									<th>Date of Establishment</th>
									<th>Date of joining</th>
									<th></th>
								</tr>
								<?php 
								$query="SELECT `clg_id`, `clgname`, `address`, `admphone`, `prin_name`, `prin_no`, `clg_email`, `otherno`, `clg_cert`, `auth_stamp_img`,`affiliate`, `DoE`, `DoB` FROM `admin_add_clg` where clg_id='".$_SESSION['auth_user2']['clog_id']."'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr class='text-dark bg-light'>";
									echo "<td>".$row["clg_id"]."</td>";
									echo "<td>".$row["clgname"]."</td>";
									echo "<td>".$row["address"]."</td>";
									echo "<td>".$row["admphone"]."</td>";
									echo "<td>".$row["prin_name"]."</td>";
									echo "<td>".$row["prin_no"]."</td>";
									echo "<td>".$row["clg_email"]."</td>";
									echo "<td>".$row["otherno"]."</td>";
									echo "<td>".$row["clg_cert"]."</td>";
									echo "<td>".$row["auth_stamp_img"]."</td>";
									echo "<td>".$row["affiliate"]."</td>";
									echo "<td>".$row["DoE"]."</td>";
									echo "<td>".$row["DoB"]."</td>";			
									echo	"<td width='170'><a class='btn btn-danger' href=delete-function.php?clg_id=".$row['clg_id'].">Delete</a></td>";
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


