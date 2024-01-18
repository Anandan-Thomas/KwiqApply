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
    
    if (isset($_POST['submit'])) {
        $clg_admin = stripslashes($_REQUEST['clg_admin']);    
        $clg_admin = mysqli_real_escape_string($con, $clg_admin);
        $clg_pass = stripslashes($_REQUEST['clg_pass']);
        $clg_pass = mysqli_real_escape_string($con, $clg_pass);
        
        $query    = "SELECT * FROM clg_adm_det WHERE clg_admin='$clg_admin' AND clg_pass='$clg_pass'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            foreach($result as $data){
                $clg_id=$data['clg_id'];
                $clg_adm_name=$data['clg_adm'];
            }
            $_SESSION['auth'] = true;
            $_SESSION['auth_user2'] = [
                'clog_id'=>$clg_id,
                'clog_name'=>$clg_adm_name
            ];
            header("Location: College Side/clg-index.php");
            } else {
                $_SESSION['alertmsg']="Invalid Username or Password";
                header("Location: clg-admin-login.php");
            }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">College Admin Login</h1>
        <input type="text" class="login-input" name="clg_admin" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="clg_pass" placeholder="Password"/>
        <?php include('alertmsg.php'); ?>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?>
</body>
</html>
