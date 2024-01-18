<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style4.css"/>
</head>
<body style="background-image:url('./img/site2.png');
             background-repeat:no-repeat;
            background-size:cover;">
    
<?php
    session_start();
    require('includes/dbcon.php');
    
    if (isset($_REQUEST['username'])) {
        
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $mobilen = stripslashes($_REQUEST['mobilenumber']);
        $mobilen = mysqli_real_escape_string($con, $mobilen);
        $pass = stripslashes($_REQUEST['pass']);
        $pass = mysqli_real_escape_string($con, $pass);
        $cpass = stripslashes($_REQUEST['cpass']);
        $cpass = mysqli_real_escape_string($con, $cpass);

        

        $emailq="SELECT * from userdet where email='$email'";
        $query2=mysqli_query($con,$emailq);
        $ec=mysqli_num_rows($query2);
        if($ec>0){
            $_SESSION['alertmsg']="Email already exists! Try another email.";
            header("Location: signup2.php");
        } else{
            if($pass===$cpass){
                $query="INSERT INTO `userdet`(`username`, `email`, `pass`, `con_pass`, `mobilenum`) VALUES ('$username','$email','$pass','$cpass','$mobilen')";
                $result= mysqli_query($con, $query);
                if ($result) {
                        echo "<div class='form'>
                              <h3>You have registered successfully.</h3><br/>
                              <p class='link'>Click here to <a href='index.php'>Login</a></p>
                              </div>";
                    } else{
                        $_SESSION['alertmsg']="Registration not successful!";
                        header("Location: signup2.php");
                    }
            }else{
                $_SESSION['alertmsg']="Password is not matching!";
                header("Location: signup2.php");

            }
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Create an ACCOUNT!</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required><br>
        <input type="text" class="login-input" name="mobilenumber" placeholder="Mobile Number" required /><br>
        <input type="password" class="login-input" name="pass" placeholder="Password" required><br>
        <input type="password" class="login-input" name="cpass" placeholder="Confirm Password" required><br>
        <?php include('alertmsg.php'); ?>
        <input type="submit" name="submit" value="Register" class="login-button"><br>
        <p class="link">Already have an account? <a href="index.php">Login here</a></p>
<?php
    }
?>
</body>
</html>