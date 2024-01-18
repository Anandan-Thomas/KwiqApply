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
<title>Kwiqapply Admin</title>
	<?php include('../Common/common-header.php') ?>
	<?php include('../Common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-dark admin-dashboard pl-3">
				<h4>Admin Dashboard </h4>
			</div>
			<div class="row pt-3 mx-0">
                        <div class="col-3 px-10">
                            <a href="usermanage.php"><div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">
									<?php
									$query = "SELECT COUNT(*) FROM userdet";
                                    $result = mysqli_query($con,$query);
                                    $rows = mysqli_fetch_row($result);
                                    echo $rows[0];
                                                    ?>

								</h1>
                                <h6 class="text-uppercase text-white">Active Users</h6>
                            </div></a>
                        </div>
                        <div class="col-3 px-10">
						<a href="clg_details.php"><div class="bg-primary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">
									<?php
									$query2 = "SELECT COUNT(*) FROM admin_add_clg";
                                    $result2 = mysqli_query($con,$query2);
                                    $rows2 = mysqli_fetch_row($result2);
                                    echo $rows2[0];
                                                    ?>

								</h1>
                                <h6 class="text-uppercase text-white">Active Colleges</h6>
                            </div></a>
                        </div>
                        <div class="col-3 px-10">
						<a href="feedback.php"><div class="bg-secondary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">
									<?php
									$query3 = "SELECT COUNT(*) FROM user_feedback";
                                    $result3 = mysqli_query($con,$query3);
                                    $rows3 = mysqli_fetch_row($result3);
                                    echo $rows3[0];
                                                    ?>
								</h1>
                                <h6 class="text-uppercase text-white">Feedbacks</h6>
                            </div></a>
                        </div>
                    </div>
		</main>
	
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>