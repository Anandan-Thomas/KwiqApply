<?php
if(isset($_SESSION['username']))
header('location: index.php');
 ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style4.css"/>
</head>
<body style="background-image:url('./img/site2.png');
             background-repeat:no-repeat;
            background-size:cover;">
<?php
   require('includes/dbcon.php');
    session_start();
    
    
    if (isset($_POST['login_btn'])) {
        $username = stripslashes($_REQUEST['username']);    
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM userdet WHERE username='$username' AND pass='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            foreach($result as $data){
                $user_id=$data['user_id'];
                $user_name=$data['username'];
                $user_em=$data['email'];

            }
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'ulog_id'=>$user_id,
                'ulog_name'=>$user_name
                       
            ];
            $_SESSION['alertmsg']="Welcome to Kwiqapply Main Page!";
            header("Location: landingPage.php");
            } 
             else {
                $_SESSION['alertmsg']="Invalid Email or Password";
            header("Location: index.php");
            exit(0);
                
        } 
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="login_btn" class="login-button"/>
        <?php include('alertmsg.php'); ?>
        <p class="link">Don't have an account? <a href="signup2.php">Register Now</a></p>
        <p class="link"><a href="adminlogin.php">Admin login</a></p>
  </form>
<?php
    }
?>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
