<?php
    session_start();
    require('../includes/dbcon.php');
    error_reporting(0);

    
    
    $detid=$_POST["detid"];
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

    $spp =$_POST["spp"];
    $cert10 =$_POST["cert10"];
    $cert12 =$_POST["cert12"];
    $othcert    =$_POST["othcert"];
   
    
    
    
    
    if(isset($_POST["frmnext"]))
    {
        

      
        
            
            $cert10 = $_FILES['cert10']['name'];
			$tmp_name=$_FILES['cert10']['tmp_name'];
			$path = "stud_certs/".$cert10;
			move_uploaded_file($tmp_name, $path);

		    $cert12 = $_FILES['cert12']['name'];
			$tmp_name_sig=$_FILES['cert12']['tmp_name'];
			$path = "stud_certs/".$cert12;
			move_uploaded_file($tmp_name_sig, $path);

            $othcert = $_FILES['othcert']['name'];
			$tmp_name_sig2=$_FILES['othcert']['tmp_name'];
			$path = "stud_certs/".$othcert;
			move_uploaded_file($tmp_name_sig2, $path);

            $spp = $_FILES['spp']['name'];
            $tmp_name_sig3=$_FILES['spp']['tmp_name'];
            $path = "studentpic/".$spp;
            move_uploaded_file($tmp_name_sig3, $path);
        
       
        if($detid == "")
        $detid = DetCode();
        $sql2  = "INSERT INTO `u_reg_data` VALUES (";
        $sql2 .= "'" . $detid . "',";
        $sql2 .= "'" . $_SESSION['auth_user']['ulog_id'] ."',";
        $sql2 .= "'" . $stfn . "',";
        $sql2 .= "'" . $uphn2 . "',";
        $sql2 .= "'" . $dob . "',";
        $sql2 .= "'" . $ufname . "',";      
        $sql2 .= "'" . $ufphn . "',";
        $sql2 .= "'" . $umname . "',";       
        $sql2 .= "'" . $umphn . "',";        
        $sql2 .= "'" . $gen . "',";        
        $sql2 .= "'" . $padr . "',";
        $sql2 .= "'" . $past . "',";
        $sql2 .= "'" . $papin . "',";       
        $sql2 .= "'" . $natn . "',";
        $sql2 .= "'" . $relg . "',";
        $sql2 .= "'" . $cat . "',";        
        $sql2 .= "'" . $nob1 . "',";
        $sql2 .= "'" . $yop1 . "',";
        $sql2 .= "'" . $tm1 . "',";
        $sql2 .= "'" . $mo1 . "',";       
        $sql2 .= "'" . $pom1 . "',";
        $sql2 .= "'" . $nob2 . "',";
        $sql2 .= "'" . $yop2 . "',";
        $sql2 .= "'" . $tm2 . "',";
        $sql2 .= "'" . $mo2 . "',";        
        $sql2 .= "'" . $pom2 . "',"; 
        $sql2 .= "'" . $spp . "',";      
        $sql2 .= "'" . $cert10 . "',";
        $sql2 .= "'" . $cert12 . "',";
        $sql2 .= "'" . $othcert . "')";

        
      mysqli_query($con, $sql2);
      
     
      $_SESSION['alertmsg']="Details Uploaded Successfully!";
        header('location:../landingPage.php');
        // echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        
        
    }
    
    
    function DetCode()
{
      $con = mysqli_connect("localhost", "root", "", "project");
      $rs  = mysqli_query($con,"select CONCAT('DE',LPAD(RIGHT(ifnull(max(u_adm_id),'DE00000000'),8) + 1,8,'0')) from u_reg_data");
      return mysqli_fetch_array($rs)[0];
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
        <form id="adform" action="admsnform.php" method="post" enctype="multipart/form-data">
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
                        <b>Enter your details!</b> </font>
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
                    
                    
                  </tr>
                  <tr>
                    <td><font style="font-family: Verdana;">Student's Full Name</font></td>
                    <td  colspan="3"> <input type="text" id="stfn" name="stfn"  VT="NM" required="true"> </td>
                   </tr>
                  <tr>
                    <td> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3"> 
                    <input type="text" id="uphn2" name="uphn2" placeholder="Mobile Number"  VT="PH" required="true"></td>
                  </tr>
                  <tr>
                    <td> <font style="font-family: Verdana;">Date of birth</font>  </td>
                    <td colspan="3"> 
                    <input type="date" id="dob" name="dob" placeholder="Date of birth" required="true"></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"> <input type="text" id="ufname" name="ufname"  VT="NM" required="true"> </td>
                   </tr>
                 
                  <tr>
                    
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <input type="text" id="ufphn" name="ufphn"  VT="PH" required="true"> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <input type="text" id="umname" name="umname"  VT="NM" required="true"></td>
                </tr>
                
                <tr>
                   
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <input type="text" id="umphn" name="umphn"  VT="PH" required="true"></td>
                </tr>
                
                
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                    
                </tr>
                
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><input type="text" id="padr" name="padr" class="ad" required="true"><br>
                          <input type="text" id="past" name="past" class="ad" placeholder="State" style="margin-top: 4px;" ><br>
                          <input type="text" id="papin" name="papin" class="ad" placeholder="Pin" style="margin-top: 4px;" ><br>
                    </td>
                </tr>   
               
                
                
                <tr>
                    <td><font style="font-family: Verdana;"> State</font>
                    <td><input type="text" id="natn" name="natn" required="true"></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td><input type="text" id="relg" name="relg" required="true"></td>
                </tr>    
               
                <tr>
                    <td colspan="4"><input type="radio" id="cat" name="cat" value="SC" required="true"><font style="font-family: Verdana;">
                        SC
                        <input type="radio" id="cat" name="cat" value="ST"><font style="font-family: Verdana;">ST</font>
                        <input type="radio" id="cat" name="cat" value="OBC"><font style="font-family: Verdana;">OBC</font>
                        <input type="radio" id="cat" name="cat" value="GEN"><font style="font-family: Verdana;">GEN</font></td>
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
                               <td><input type="text" id="nob1" name="nob1" required="true"></td>
                               <td><input type="text" id="yop1" name="yop1" class="actab" required="true"></td>
                               <td><input type="text" id="tm1" name="tm1" class="actab" required="true"></td>
                               <td><input type="text" id="mo1" name="mo1" class="actab" required="true"></td>
                               <td><input type="text" id="pom1" name="pom1" class="actab" required="true"></td>
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td><input type="text" id="nob2" name="nob2" required="true"></td>
                               <td><input type="text" id="yop2" name="yop2" class="actab" required="true"></td>
                               <td><input type="text" id="tm2" name="tm2" class="actab" required="true"></td>
                               <td><input type="text" id="mo2" name="mo2" class="actab" required="true"></td>
                               <td><input type="text" id="pom2" name="pom2" class="actab" required="true"></td>
                           </tr>
                           <tr class="formp">
								<label for="college cert">Student Passport Photo: </label>
								<input type="file" id="spp" name="spp"  class="form-control" required="true">
                             </tr>
                             
                           <tr class="formp">
								<label for="college cert">10th Certificate: </label>
								<input type="file" id="cert10" name="cert10"  class="form-control" required="true">
                             </tr>
                            <tr class="formp">
								<label for="college cert">12th Certificate: </label>
								<input type="file" id="cert12" name="cert12"  class="form-control" required="true">
                             </tr>
                             <tr class="formp">
								<label for="college cert">Other Certificates: </label>
								<input type="file" id="othcert" name="othcert"  class="form-control">
                             </tr>
                           
                            </tbody>
                       </table>
                       
                           
                 
                 
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="frmnext" name="frmnext" value="DONE"></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
