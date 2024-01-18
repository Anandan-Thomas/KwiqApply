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
    
    if (isset($_POST['admn'])) {
        $admin = stripslashes($_REQUEST['admn']);    
        $admin = mysqli_real_escape_string($con, $admin);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM admindet WHERE adm_user='$admin' AND adm_pass ='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            foreach($result as $data){
                
                $user_name=$data['udm_user'];
                

            }
            $_SESSION['auth'] = true;
            $_SESSION['auth_user1'] = [
                
                'alog_name'=>$user_name
                
            ]; 
            
            header("Location: Admin/admin-index.php");
            } else {
                $_SESSION['alertmsg']="Invalid Username or Password";
                header("Location: adminlogin.php");
            }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Admin Login</h1>
        <input type="text" class="login-input" name="admn" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <?php include('alertmsg.php'); ?>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">College Admin? <a href="clg-admin-login.php">Click here!</a></p>
  </form>
<?php
    }
?>
</body>
</html>
