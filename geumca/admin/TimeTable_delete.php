<?php
include("include/header.php");
require("permission_check.php");
?>
 <?php
   extract($_REQUEST);
 $useritem=$_GET['timetable_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));
   //echo $id;
    $studentnamequery=mysqli_query($con,"SELECT * FROM `timetable` WHERE `timetable_id` ='$id'  AND `timetable_status` = \"Active\"");
$res=mysqli_fetch_assoc($studentnamequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='TimeTable_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1'</script>");


$inputCourseNameType=$res['timetable_courseid'];
$coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$inputCourseNameType'");
                    $resultcoursequery=mysqli_fetch_array($coursequery);
                        $course_name=$resultcoursequery['course_acroym'];
$contentname=$res['timetable_session']."_".$course_name."_".$res['timetable_semester']."_".$res['timetable_section'];
    $status="InActive";
    ?>

     <?php
    
if (isset($submit)) 
{
    extract($_POST);
 
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
    $query="UPDATE `timetable` SET `timetable_status`='$status',`timetable_disablereason`='$InputDeleteReason',`timetable_disableby`='$log',`timetable_disabletime`='$date' WHERE `timetable_id` ='$id'";   
mysqli_query($con,$query);
echo "<script language='javascript'>alert('$contentname Is Deleted Successfully');window.location='TimeTable_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1'</script>";
}

    ?>
     <?php
    
if (isset($cancel)) 
{
    extract($_POST);
echo "<script>window.location='user.php'</script>";
}
    ?>      
           
                 <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">DO YOU WANT TO DELETE  </h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             
                                              <h4>Reason For  Delete <?php echo $contentname;?> TimeTable</h4>  
                                                <div class="col-md-12">

                                                    <div class="form-floating">
                                                        <!--<input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Course name" 
                                                        required="inputLastName" />-->
                                                        <textarea class="form-control" id="InputDeleteReason" name="InputDeleteReason" rows="3" cols="60" required></textarea>
                                                        <label for="inputLastName"></label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          
                                            <div class="mt-6 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Yes"/>
                                                <a href="TimeTable_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1" class="btn btn-secondary " Value="No">No</a>
                                                 
                                                  </form>

                                            
                                                                      </div>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                         

<?php include("include/footer.php"); ?>