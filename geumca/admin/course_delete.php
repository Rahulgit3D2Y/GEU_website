<?php
include("include/header.php");
require("permission_check.php");
?>
       <?php
   extract($_POST);
   $id=$_GET['course_id'];
   //echo $id;
    $coursenamequery=mysqli_query($con,"SELECT * FROM `course_detail` where  `course_id`='$id'  and `status` = \"Active\"");
$res=mysqli_fetch_assoc($coursenamequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='course.php'</script>");
$coursename=$res['course_name'];
    $status="InActive";
    ?>

     <?php
    
if (isset($submit)) 
{
    extract($_POST);

    
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
    $query="UPDATE `course_detail` SET `status`='$status',`disablereason`='$InputDeleteReason',`disableby`='$log',`disabletime`='$date' WHERE `course_id` ='$id'";   
mysqli_query($con,$query);
  echo "<script language='javascript'>alert('$coursename Is Deleted');window.location='course.php'</script>";
}

    ?>
     <?php
    
if (isset($cancel)) 
{
    extract($_POST);
echo "<script>window.location='course.php'</script>";
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
                                                   <h4>Reason For  Delete <?php echo $coursename;?></h4>  
                                                <div class="col-md-12">

                                                    <div class="form-floating">
                                                        <!--<input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Course name" 
                                                        required="inputLastName" />-->
                                                        <textarea class="form-control" id="InputDeleteReason" name="InputDeleteReason" rows="3" cols="60" required></textarea>
                                                        <label for="inputLastName"></label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Yes"/>
                                                  <a href=course.php class="btn btn-secondary " Value="No">No</a>
                                                  </form>
                                                
                                                 
                                                                                          </div>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                                             

 <?php
include("include/footer.php");
?>