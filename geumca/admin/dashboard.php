<?php
session_start();
error_reporting(1);
include("include/config.php");
?>

<?php
$IP = $_SERVER['REMOTE_ADDR'];
  
$utype="admin";
date_default_timezone_set('Asia/Kolkata');      
$datetime=date("Y-m-d h:i:sa");
$datetimeexpire=date("d-m-Y");
extract($_POST);
extract($_GET);
extract($_REQUEST);

if(isset($submit))
{
$loginid=mysqli_real_escape_string($con,$_POST['loginid']);
$pass1=mysqli_real_escape_string($con,$_POST['pass']);
$pass2=SHA1($pass1);
//$cookie_name = "Loginid";
//$cookie_value = $loginid;
//setcookie($cookie_name, $cookie_value, "/");
//$cookie_name = "Password";
//$cookie_value = $pass;
//setcookie($cookie_name, $cookie_value,  "/");

    if($ShowCaptchaValue!=$InputCaptchaValue)
    {
      echo ("<script language='javascript'>alert('Captcha does not match Try Again');window.location='index.php'</script>");
    exit();  
    }
$logincheckuserid=mysqli_query($con,"SELECT * FROM `user` WHERE `login`='$loginid'");
$logincheckuseridresultrs2=mysqli_fetch_assoc($logincheckuserid)or die("<script language='javascript'>alert('User Id is incorrect');window.location='index.php'</script>");
    $rs2=mysqli_query($con,"SELECT `status`,`wrong_pass_count` FROM `user` WHERE `login`='$loginid'");
$resultrs2=mysqli_fetch_assoc($rs2);
$resultrs2count1=$resultrs2['wrong_pass_count'];
$resultrs2status=$resultrs2['status'];

$tcountwrongatt='2';
$totalcountwrongatt = $tcountwrongatt-$resultrs2count1;

$tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
    if($resultrs2count1 >= "3")
    {
    echo ("<script language='javascript'>alert('Id is de-Actived Due to Wrong Password Many Time Please Contact to Adminstartor');window.location='index.php'</script>");
    exit();
    }
    if($resultrs2status=="InActive")
     {
    echo ("<script language='javascript'>alert('User Id Not Found');window.location='index.php'</script>");
    exit();
     }
 

  $rs=mysqli_query($con,"SELECT * FROM `user` WHERE `login`='$loginid' AND `password`='$pass2' AND `status` = \"Active\" OR `login`='$loginid' AND `hash_password`='$pass2'  AND `status` = \"Active\"");
     if(mysqli_num_rows($rs)<1)
  {
     
    $rs1=mysqli_query($con,"SELECT `wrong_pass_count` FROM `user` WHERE `login`='$loginid'");
 if (mysqli_num_rows($rs1)>0)
{
    if ($row=mysqli_fetch_row($rs1)) 
    {
        $uid = $row['0'];
        $id_increase = $uid+1;
        $get_string = str_pad($id_increase,1,0,STR_PAD_LEFT);
        $id = $get_string;
        $updatewrongquery= "UPDATE `user` SET `wrong_pass_count`='$id',`wrong_pass_time`='$datetimeexpire' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery);
        mysqli_query($con,"INSERT INTO `logindetail` (`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) values ('$utype','$loginid','$pass1','Failed','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    }
}
$rs23=mysqli_query($con,"SELECT `status`,`wrong_pass_count` FROM `user` WHERE `login`='$loginid'");
$resultrs23=mysqli_fetch_assoc($rs23);
$resultrs2count=$resultrs23['wrong_pass_count'];
    if($resultrs2count >= "3")
    {
    echo ("<script language='javascript'>alert('Id is de-Actived Due to Wrong Password Many Time Please Contact to Adminstartor');window.location='index.php'</script>");
    exit();
    }

 echo ("<script language='javascript'>alert('$resultrs2count attempt Invalid Username or Password $totalcountwrongatt attempt left');window.location='index.php'</script>"); 

  }

  elseif($loginid == $pass1)
  {
    mysqli_query($con,"INSERT INTO `logindetail` (`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) values ('$utype','$loginid','$pass1','Success','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    $updatewrongquery1= "UPDATE `user` SET `wrong_pass_count`='0' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery1);
  $updateusersession= "UPDATE `user` SET `current_session`='$temp_activesession_record' WHERE `login`='$loginid'";
        mysqli_query($con,$updateusersession);
   echo "<script>window.location='changepassword.php'</script>";
           
       $_SESSION['alogin']=$loginid;
       $_SESSION['apass']=$pass1;
       $_SESSION['adatetime']=$datetime;
  }
else
{
     mysqli_query($con,"INSERT INTO `logindetail` (`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) values ('$utype','$loginid','$pass1','Success','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    $updatewrongquery1= "UPDATE `user` SET `wrong_pass_count`='0' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery1);
        $updateusersession= "UPDATE `user` SET `current_session`='$temp_activesession_record' WHERE `login`='$loginid'";
        mysqli_query($con,$updateusersession);
echo "<script>window.location='dashboard.php'</script>";
       $_SESSION['alogin']=$loginid;
       $_SESSION['apass']=$pass1;
       $_SESSION['adatetime']=$datetime;
}

    

}
     
 if(!isset($_SESSION['alogin']))
{
    echo "<script>window.location='index.php'</script>";
        exit();
}
?>
     
<?php
include("include/header.php");
?>




          <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <marquee behavior="alternate">
                        <h6 style="font-size: 16px; color: red">
                            <b>We're at your service, please send your grievances at paritoshbisht05@gmail.com 24X7</b>
                        </h6>
                    </marquee>
                        <h1 class="mt-1" style="text-transform:capitalize;"><?php 
$schoolfullname=mysqli_query($con,"SELECT * FROM `school` WHERE `status` = \"Active\"");
$schoolfullnameresult=mysqli_fetch_assoc($schoolfullname); 
                        echo $schoolfullnameresult['school_name']; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <!---- Start Of First Row-->
                        
                        <div class="row">
                          
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                 <a  style=" color: white; text-decoration:none ">    <div class="card-body">Total carousel / Active carousel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <?php
                                            
                                          $CarouseldetailFetch=mysqli_query($con,"SELECT count(`carousel_id`) FROM `carousel` WHERE `carousel_status` = 'Active'");
                                          $CarouseldetailFetchResult=mysqli_fetch_array($CarouseldetailFetch);
                                          $CarouseldetailFetchtotal= $CarouseldetailFetchResult[0];

                                           $CarouseldetailFetch1=mysqli_query($con,"SELECT count(`carousel_id`) FROM `carousel` WHERE `carousel_status` = 'Active' AND `carousel_display`='Active'");
                                          $CarouseldetailFetchResult1=mysqli_fetch_array($CarouseldetailFetch1);
                                          $CarouseldetailFetchtotal1= $CarouseldetailFetchResult1[0];

                                       ?>
                                      <?php
                                        echo $CarouseldetailFetchtotal;
                                       ?>/ <?php
                                        echo $CarouseldetailFetchtotal1;
                                       ?>
                                          
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                  <a style=" color: white; text-decoration:none">   <div class="card-body">Notice</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          
                                              <?php
                                            
                                          $NoticedetailFetch=mysqli_query($con,"SELECT count(`circular_id`) FROM `notice` WHERE `status` = 'Active' AND `noticesession`='$activesession_record'");
                                          $NoticedetailFetchResult=mysqli_fetch_array($NoticedetailFetch);
                                          $NoticedetailFetchtotal= $NoticedetailFetchResult[0];

                                       ?>
                                      <?php
                                        echo $NoticedetailFetchtotal;
                                       ?>
                                        
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                   <a style=" color: white; text-decoration:none">  <div class="card-body">Contact Detail</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <?php
                                            
                                          $ContactdetailFetch=mysqli_query($con,"SELECT count(`contactus_id`) FROM `contactus` WHERE `contactus_status` = 'Active' AND `contactus_session`='$activesession_record'");
                                          $ContactdetailFetchResult=mysqli_fetch_array($ContactdetailFetch);
                                          $ContactdetailFetchtotal= $ContactdetailFetchResult[0];

                                       ?>
                                      <?php
                                        echo $ContactdetailFetchtotal;
                                       ?>
                                      
                                      
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                  <a style=" color: white; text-decoration:none">  <div class="card-body"> Total Course</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                         <?php
                                            
                                          $CoutsedetailFetech=mysqli_query($con,"SELECT count(`course_id2`) FROM `course_detail` WHERE `status` = \"Active\"");
                                          $CoutsedetailFetechResult=mysqli_fetch_array($CoutsedetailFetech);
                                          $CoutsedetailFetechtotal= $CoutsedetailFetechResult[0];

                                       ?>
                                      <?php
                                        echo $CoutsedetailFetechtotal;
                                       ?>
                                    <!--    <a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                       <!--- End Of First Row--->
                       



                    <div class="modal fade" id="DateOFbirthdaymodalpopup" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Wishing Happy Birthday</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" style="font-size:medium; font-family:Calibri; color:deepskyblue;">Wishing you a birthday filled with sweet moments and wonderful memories to cherish always! Happy Birthday Dear <?php echo $res['first_name'] ." ".$res['middle_name']  ." ". $res['last_name']; ?></div>
        
        <br>
         <div class="" style="font-size:medium; color:#289fc6; font-family:Calibri;">Greating From <?php echo $schoolfullnameresult['school_name']; ?> 
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>      



<!-- fILE UPLOAD MODULE -->

<div class="modal fade" id="userfileuploadmodalpopup" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false" >
    <script src="js/fileupload.js"></script>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <?php if(isset($photoupload))
        {
           $studentphotoupload = $_FILES['inputStudentPhoto']['name'];
    $tmpphotoname = $_FILES['inputStudentPhoto']['tmp_name'];
    $uploadfolder = 'upload/user_photo/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$studentphotoupload);

$studentPhotoupdatequery="UPDATE `user` SET `photo` = '$studentphotoupload' WHERE `id` = '$log'";
mysqli_query($con,$studentPhotoupdatequery);
echo "<script language='javascript'>alert('Photo Upload Successfully');window.location='dashboard.php'</script>";

        } 
       
      
        ?>
        <h5 class="modal-title" id="myModalLabel">Pending Document Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span style="color: red;"> Please Upload Your Pending Document*</span>
       <?php if($fileuploaduserqueryresultrsphoto) { } else { ?>
        <form action="" method="POST" name="photoupload" onSubmit="return check();" enctype="multipart/form-data">
              <div class="mb-3">
            <label for="DiscountRemark" class="col-form-label">Photo Upload</label>
            <input type="file" class="form-control" id="inputStudentPhoto" name="inputStudentPhoto"  onchange="ValidateinputStudentPhotoInput(this);" accept=".jpg,.jpeg" required>
          </div>
           <div class="mt-4 mb-0" align="center">
            <input class="btn btn-success" type="submit" name="photoupload" id="photoupload" value="Upload" >
          </div>
      </form>
<?php } ?>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 


                           
                </main>
                 <?php
include("include/footer.php");
    ?>

