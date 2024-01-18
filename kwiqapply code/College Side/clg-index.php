 <!---------------- Session starts form here ----------------------->
	<?php  
	session_start();
	if (!$_SESSION["auth_user2"])
	{
		header('location: ../index.php?session=failed');
	} 
	require('../includes/dbcon.php');
	?>
<!---------------- Session Ends form here ------------------------>
<title>College Admin</title>
	<?php include('../Common/clg-admin-header.php') ?>
	<?php include('../Common/clg-admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-dark admin-dashboard pl-3">
				<h4>College Admin Dashboard </h4>
			</div>
			<div class="row pt-3 mx-0">
                        <div class="col-3 px-10">
                            <a href="applicants.php"><div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">
									<?php
									$query = "SELECT COUNT(*) FROM applic_det where clg_id='".$_SESSION['auth_user2']['clog_id']."'";
                                    $result = mysqli_query($con,$query);
                                    $rows = mysqli_fetch_row($result);
                                    echo $rows[0];
                                                    ?>

								</h1>
                                <h6 class="text-uppercase text-white">Applicants</h6>
                            </div></a>
                        </div>
                        <div class="col-3 px-10">
						<a href="add_course.php"><div class="bg-success text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">
									<?php
									$query2 = "SELECT COUNT(*) FROM course_details where college_id='".$_SESSION['auth_user2']['clog_id']."'";
                                    $result2 = mysqli_query($con,$query2);
                                    $rows2 = mysqli_fetch_row($result2);
                                    echo $rows2[0];
                                                    ?>

								</h1>
                                <h6 class="text-uppercase text-white">Courses</h6>
                            </div></a>
                        </div>
                    </div>
				
		</main>
	
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>