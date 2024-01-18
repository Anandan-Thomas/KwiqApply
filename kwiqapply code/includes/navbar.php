
<div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="landingPage.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>KwiqApply</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                </div>
            </div>
          
            <div class="mx-2">
            <?php if(isset($_SESSION['auth_user']))  ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                             <?= $_SESSION['auth_user']['ulog_name']; ?>
                        </a>
                        <div class="dropdown-menu m-0">
                            <!-- profile -->
                        <?php 
                        require('includes/dbcon.php');
                           $q="select u_id from u_reg_data where u_id='".$_SESSION['auth_user']['ulog_id']."'";
                                 $result=mysqli_query($con,$q);
                                 $row=mysqli_num_rows($result);
                                 if($row > 0) : ?>
                                 <a href="application_site/admsnreport.php" class="dropdown-item">My Profile</a>   
                                    
                                    
                                 <?php else : ?>
                                    
                            <a href="application_site/admsnform.php" class="dropdown-item">My Profile</a>
                            <?php endif; ?>
                            <!-- application status -->
                            <?php 
                            $q2="select u_id from u_reg_data where u_id='".$_SESSION['auth_user']['ulog_id']."'";
                                 $result2=mysqli_query($con,$q2);
                                 $row2=mysqli_num_rows($result2);
                                 if($row2 > 0) : ?>
                                 <a href="app_status\status.php" class="dropdown-item">Application Status</a>   
                            <?php endif; ?>
                            <a href="logout.php" class="dropdown-item">Logout</a>                           
                        </div>
                    </div>
            </div>
        </nav>
    </div>
   