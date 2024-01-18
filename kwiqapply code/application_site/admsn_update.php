<?php
    session_start();
    require('../includes/dbcon.php');
    error_reporting(0);

    $ids=$_GET['id'];
    $showq="SELECT * from `u_reg_data` where u_id=$ids";
    $showdata=mysqli_query($con,$showq);
    

    $stfn=$_POST["stfn"];
    $uphn2=$_POST["uphn2"];
    $dob=$_POST["dob"];

    $ufname=$_POST["ufname"];
    $ufphn=$_POST["ufphn"];
    
    $umname=$_POST["umname"];
    $umphn=$_POST["umphn"];
    
    $gen=$_POST["gen"];
    
    $padr=$_POST["padr"];
    $past=$_POST["past"];
    $papin=$_POST["papin"];
    
    
    $natn=$_POST["natn"];
    $relg=$_POST["relg"];
    $cat=$_POST["cat"];
    
    
    $nob1=$_POST["nob1"];
    $yop1=$_POST["yop1"];
    $tm1=$_POST["tm1"];
    $mo1=$_POST["mo1"];
    $pom1=$_POST["pom1"];
    
    $nob2=$_POST["nob2"];
    $yop2=$_POST["yop2"];
    $tm2=$_POST["tm2"];
    $mo2=$_POST["mo2"];
    $pom2=$_POST["pom2"];
   
    
    
    
    
    if(isset($_POST["frmnext"]))
    {
       
            $sql="UPDATE `u_reg_data` SET 
            `s_full_name`='$stfn',`s_mob`='$uphn2',`s_dob`='$dob',
            `sf_name`='$ufname',`sf_mob`='$ufphn',`sm_name`='$umname',`sm_mob`='$umphn',
            `s_addr`='$padr',`s_state`=' $past',`s_pin`='$papin',`s_natn`='$natn',`s_relg`='$relg',
            `s_b1`='$nob1',`s_year1`='$yop1',`s_tm1`='$tm1',`s_mo1`='$mo1',`s_pom1`='$pom1',
            `s_b2`='$nob2',`s_year2`='$yop2',`s_tm2`='$tm2',`s_mo2`='$mo2',`s_pom2`='$pom2'
            where u_id=$ids";

        
      mysqli_query($con, $sql);
      
     
      $_SESSION['alertmsg']="Profile Updated Successfully!";
        header('location:../landingPage.php');
        
        
    }

$q=mysqli_query($con,"select username from userdet where user_id='".$_SESSION['auth_user']['ulog_id']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['username'];


 if (!isset($_SESSION['auth_user']['ulog_id']))
{
        echo "<br><h2>You are not Logged On Please Login to Access this Page</div></h2>";
        echo "<a href=index.php><h3 align=center>Click Here to Login</h3></a>";
        exit();
}




?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
         <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        
       

        <script type="text/javascript">
        function validate()
        {
            $('#adform input[type="text"]').each(function() {
                if(this.required)
                {
                    if(this.value=="")
                        $(this).addClass("inpterr");
                    else
                        $(this).addClass("inpterrc");
                }
              
                if($(this).attr("VT")=="NM")
                {
                    if((!isAlpha(this.value)) && this.value!="")
                    {
                       alert("Only Aplhabets Are Allowed . . .");
                       $(this).focus();
                    }
                }

                        if($(this).attr("VT")=="PH")
                        {
                                if((!isPhone(this.value)) && this.value!="")
                                {
                                        alert("Check the phone number format . . .");
                                        $(this).focus();
                                }
                        }

                        if($(this).attr("VT")=="EML")
                        {
                                if(!IsEmail($(this).val()) && this.value!="")
                                {
                                        alert("Invalid Email . . . .");
                                        $(this).focus();
                                }
                        }	

                        if($(this).attr("VT")=="PIN")
                        {
                                if((!IsPin(this.value)) && this.value!="")
                                {
                                        alert("Invalid Pin Code . . . .");
                                        $(this).focus();
                                }
                        }

            });
        }
        
                function isAlpha(x)
                {
                    var re = new RegExp(/^[a-zA-Z\s]+$/);
                    return re.test(x);
                }
        
		function isPhone(x)
		{
			
			var ph = new RegExp (/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);  
			//if(!ph.length<10)
			return ph.test(x);
		}
                
                
		
		function IsEmail(x) 
		{
  			var em = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
  			return em.test(x);
		}
		
		function IsPin(x) 
		{
  			var pin = new RegExp (/^\d{6}$/);
			
  			return pin.test(x);
		}		
        </script>
        
        <style type="text/css">
            .inpterr
            {
                border: 1px solid red;
                background: #FFCECE;

            }
            
            .inpterrc
            {
                border: 1px solid black;
                background: white;
            }
        </style>
            
        
        
        
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="adform" action="" method="post" enctype="multipart/form-data">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/kwiqbanner.png" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12">
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>Update your details!</b> </font>
                      </div>
                 </div>
                
             </div>
            
            <table class="frmtbl">
                
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                          <td> <font style="font-family: Verdana;"><h4>Welcome, <?php echo $stname;?></h4> </font> </td>
                    <td colspan="2"> 
                        <input type="hidden" id="detid" name="detid"></td>
                    
                    <?php while($row=mysqli_fetch_array($showdata))
                    {
                        ?>
                  </tr>
                  <tr>
                    <td><font style="font-family: Verdana;">Student's Full Name</font></td>
                    <td  colspan="3"> <input type="text" id="stfn" name="stfn" value="<?php echo $row[2];?>" VT="NM" required="true"> </td>
                   </tr>
                  <tr>
                    <td> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3"> 
                    <input type="text" id="uphn2" name="uphn2" placeholder="Mobile Number" value="<?php echo $row[3] ?>" VT="PH" required="true"></td>
                  </tr>
                  <tr>
                    <td> <font style="font-family: Verdana;">Date of birth</font>  </td>
                    <td colspan="3"> 
                    <input type="date" id="dob" name="dob" placeholder="Date of birth" value="<?php echo $row[4]  ?>" required="true"></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"> <input type="text" id="ufname" name="ufname" value="<?php echo  $row[5] ?>" VT="NM" required="true"> </td>
                   </tr>
                 
                  <tr>
                    
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <input type="text" id="ufphn" name="ufphn" value="<?php echo $row[6] ?>" VT="PH" required="true"> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <input type="text" id="umname" name="umname" value="<?php echo $row[7] ?>" VT="NM" required="true"></td>
                </tr>
                
                <tr>
                   
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <input type="text" id="umphn" name="umphn" value="<?php echo $row[8] ?>" VT="PH" required="true"></td>
                </tr>                
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><input type="text" id="padr" name="padr" value="<?php echo $row[10] ?>" class="ad" required="true"><br>
                          <input type="text" id="past" name="past" class="ad" value="<?php echo $row[11] ?>" placeholder="State" style="margin-top: 4px;" ><br>
                          <input type="text" id="papin" name="papin" class="ad" value="<?php echo $row[12] ?>" placeholder="Pin" style="margin-top: 4px;" ><br>
                    </td>
                </tr>   
               
                
                
                <tr>
                    <td><font style="font-family: Verdana;"> State</font>
                    <td><input type="text" id="natn" name="natn" value="<?php echo $row[13] ?>" required="true"></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td><input type="text" id="relg" name="relg" value="<?php echo $row[14] ?>" required="true"></td>
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
                               <td><input type="text" id="nob1" name="nob1" value="<?php echo $row[16] ?>" required="true"></td>
                               <td><input type="text" id="yop1" name="yop1" class="actab" value="<?php echo $row[17] ?>" required="true"></td>
                               <td><input type="text" id="tm1" name="tm1" class="actab" value="<?php echo $row[18] ?>" required="true"></td>
                               <td><input type="text" id="mo1" name="mo1" class="actab" value="<?php echo $row[19] ?>" required="true"></td>
                               <td><input type="text" id="pom1" name="pom1" class="actab" value="<?php echo $row[20] ?>" required="true"></td>
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td><input type="text" id="nob2" name="nob2" value="<?php echo $row[21] ?>" required="true"></td>
                               <td><input type="text" id="yop2" name="yop2" class="actab" value="<?php echo $row[22] ?>" required="true"></td>
                               <td><input type="text" id="tm2" name="tm2" class="actab" value="<?php echo $row[23] ?>" required="true"></td>
                               <td><input type="text" id="mo2" name="mo2" class="actab" value="<?php echo $row[24] ?>" required="true"></td>
                               <td><input type="text" id="pom2" name="pom2" class="actab" value="<?php echo $row[25] ?>" required="true"></td>
                           </tr>
                           <?php } ?>
                            </tbody>
                       </table>
                       
                           
                 
                 
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="frmnext" name="frmnext" value="UPDATE"></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
