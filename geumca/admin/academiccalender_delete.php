<?php
include("include/header.php");
require("permission_check.php");
?>
 <?php
   extract($_REQUEST);
 $useritem=$_GET['academiccalender_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));
   //echo $id;
    $studentnamequery=mysqli_query($con,"SELECT * FROM `academiccalender` WHERE `academiccalender_id` ='$id'  AND `academiccalender_status` = \"Active\"");
$res=mysqli_fetch_assoc($studentnamequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='academiccalender_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1'</script>");

;
$contentname=$res['academiccalender_session']."_".$res['academiccalender_type'];
    $status="InActive";
    ?>

     <?php
    
if (isset($submit)) 
{
    extract($_POST);
 
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
    $query="UPDATE `academiccalender` SET `academiccalender_status`='$status',`academiccalender_disablereason`='$InputDeleteReason',`academiccalender_disableby`='$log',`academiccalender_disabletime`='$date' WHERE `academiccalender_id` ='$id'";   
mysqli_query($con,$query);
echo "<script language='javascript'>alert('$contentname Is Deleted Successfully');window.location='academiccalender_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1'</script>";
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
                                             
                                              <h4>Reason For  Delete <?php echo $contentname;?> Academic Calender</h4>  
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
                                                <a href="academiccalender_upload.php?AppType=66%20|%20ApplicationType=website%20Content&Mid=1" class="btn btn-secondary " Value="No">No</a>
                                                 
                                                  </form>

                                            
                                                                      </div>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                         

<?php include("include/footer.php"); ?>