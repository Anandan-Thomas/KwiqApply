<?php

    session_start();
    require('../includes/dbcon.php');
    error_reporting(0);


    $q=mysqli_query($con,"select username from userdet where user_id='".$_SESSION['auth_user']['ulog_id']."'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['username'];
$id=$_SESSION['auth_user']['ulog_id'];

$result = mysqli_query($con,"SELECT * FROM u_reg_data WHERE u_id='".$_SESSION['auth_user']['ulog_id']."'");
                    
                    while($row = mysqli_fetch_array($result))
                      {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
        <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
        
        
    </head>
    <body>
        <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                 <td style="width:3%;"><br><br><img src="./images/kwiqapplylogo.png" width="75%"> </td>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:35px;">
                     <br><br>
                    KWIQAPPLY STUDENT CARD</font></center>
                
                <br>
                <br>
                
                </td>
                    <td colspan="2" width="3%" >
                   <?php
                  
                    $picfile_path ='studentpic/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM u_reg_data where u_id='".$_SESSION['auth_user']['ulog_id']."'");
                        
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['st_foto'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                        echo"<div>";
                      }            
                   ?>
                        </td>
                 </tr>       
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">FULL NAME  </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $row[2];?> </td>
                 </tr>
                 
                 
                <tr>
                    <td> <font style="font-family: Verdana;">ID  </font> </td>
                    <td colspan="3"> <?php echo $id ?> </td>
                </tr>
                  
                
                <tr>
                    <td> <font style="font-family: Verdana;">Student Mobile No. </font> </td>
                    <td colspan="3"> <?php echo $row[3] ?> </td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Date of Birth </font> </td>
                      <td colspan="3"> <?php echo $row[4]  ?> </td>
                </tr>
                  
                
                
                  <tr>
                    <td > <font style="font-family: Verdana;">Father's Name </font>  </td>
                    <td colspan="3"> <?php echo  $row[5] ?><br>
                    
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Mobile No. </font></td>
                    <td  colspan="3"><?php echo $row[6] ?> </td>
                   </tr>
                 
                  
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <?php echo $row[7] ?></td>
                </tr>
                
                <tr>
                    
                     <td> <font style="font-family: Verdana;">Mother's Mobile No.</font></td>
                    <td> <?php echo $row[8] ?></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Gender </font>
                     <td  colspan="3"><?php echo $row[9] ?></td>
                </tr>
                
               
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><?php echo 'Address :'. $row[10] ?><br>
                          <?php echo 'State :'. $row[11] ?><br>
                          <?php echo 'Pin :'. $row[12] ?><br>
                          
                </td>
                </tr>   
               
                
                                
                <tr>
                    <td><font style="font-family: Verdana;"> State </font>
                    <td> <?php echo $row[13] ?></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td> <?php echo $row[14] ?></td>
                </tr>    
               
                <tr>
                    <td> <font style="font-family: Verdana;">Category</font>
                    <td colspan="3">  <?php echo $row[15] ?>
                </td>
                </tr> 
                  
                 
                 
                
                
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total</font><br><font style="font-family: Verdana;font-size: small"> Mark</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark</font> <br><font style="font-family: Verdana;font-size: small">Obtained</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">% of</font><br><font style="font-family: Verdana;font-size: small"> Marks</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><?php echo $row[16] ?></td>
                               <td><?php echo $row[17] ?></td>
                               <td><?php echo $row[18] ?></td>
                               <td><?php echo $row[19] ?></td>
                               <td><?php echo $row[20] ?></td>
                               
                               
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td><?php echo $row[21] ?></td>
                               <td><?php echo $row[22] ?></td>
                               <td><?php echo $row[23] ?></td>
                               <td><?php echo $row[24] ?></td>
                               <td><?php echo $row[25] ?></td>
                               
                           </tr>
                           <tr>
                           <td colspan="2" width="40%" >
                   <?php
                  
                    $picfile_path ='stud_certs/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM u_reg_data where u_id='".$_SESSION['auth_user']['ulog_id']."'");
                        
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['s_10cert'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='400px' style='height:400px;'>";
                        echo "10th Certificate";
                        echo"<div>";
                      }            
                   ?>
                   </td>
                   <td colspan="2" width="40%" >
                   <?php
                  
                    $picfile_path ='stud_certs/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM u_reg_data where u_id='".$_SESSION['auth_user']['ulog_id']."'");
                        
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['s_12cert'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='400px' style='height:400px;'>";
                        echo "12th Certficate";
                        echo"<div>";
                      }            
                   ?>
                    </tr>
                           
                            </tbody>
                       </table>
                       
                           
                               
                 
                       </table></center>
                               </div>
                            </div>
            </div>
        <?php
              }
        
       
             echo "<center><a href='admsn_update.php?id=$id'>Update your profile!</a></center>";
             ?>
             <center><a href="../landingPage.php">Back to Main Page!</a></center>
             
    </body>
</html>


                     