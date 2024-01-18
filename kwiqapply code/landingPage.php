<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KwiqApply - A College Admission Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
   <?php
   session_start(); 
   require('includes/dbcon.php');
   include('includes/navbar.php'); 
   include('alertmsg.php'); ?>
    <!-- Navbar End -->

    <!-- Header Start -->
    <form action="course.php" method="POST">
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Apply to your dream courses at your dream colleges in Kerala from your home!</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <input type="text" class="form-control border-light" name="search" style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button type="submit" name="sub-search" class="btn btn-secondary px-4 px-lg-5">Search</button> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- College Details -->
    <div class="container-fluid py-5">
        <div class="container py-5">
        <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                      
                        <h1 class="display-4">Checkout These College!</h1>
                    </div>
                </div>
</div>
        
        <?php
       
                $picfile_path ='College Side/clg_campus_photo/';
                $sql="Select * from clg_page_details";
                $r=mysqli_query($con, $sql);
                $s=mysqli_num_rows($r);
                if($s > 0){
                    while($row=mysqli_fetch_assoc($r)) {
                        echo "<div class='row'>";
                        $picsrc=$picfile_path.$row['clg_photo'];
                        
                echo "<div class='col-lg-4 col-md-6 bg-info pb-4'>
                 <a class='courses-list-item position-relative d-block overflow-hidden mb-2' href='about.php?id=".$row['cl_id']."'>
                       <img class='img-fluid' src='$picsrc.' alt='>
                        <div class='courses-text'>
                            <h4 class='text-center text-dark px-3'>".$row['clg_name']."</h4>
                            <div class='border-top w-100 mt-3'>
                                <div class='d-flex justify-content-between p-4'>
                                    <span class='text-dark'><i class='fa fa-user mr-2'></i>Courses Provided:".$row['clg_courses']."</span>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                 </div>";
                }}
                ?>
                </div>
            </div>
            </div>



    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>KwiqApply</h1>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Kottayam,Kerala</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+913463426363</p>
                    <p><i class="fa fa-envelope mr-2"></i>kwiqapply@gmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Want to help us get better?</h3>
                    <h4><a class="text-white-50" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Share your feeback!</a></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">KwiqApply</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>