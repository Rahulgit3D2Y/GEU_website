<?php
include("include/header.php");
?>
       <?php
   extract($_POST);
   $id=$_GET['circular_id'];
   //echo $id;
    $noticequery=mysqli_query($con,"SELECT * FROM `notice` WHERE `circular_id`='$id' AND `status`=\"Active\"");
$res=mysqli_fetch_assoc($noticequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='notice.php'</script>");
$noticeid=$res['circularno'];

    $status="InActive";
    ?>

     <?php
    
if (isset($submit)) 
{
    extract($_POST);
 
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$query="UPDATE `notice` SET `status`='$status',`disablereason`='$InputDeleteReason',`disableby`='$log',`disabletime`='$date' WHERE `circular_id` ='$id'";   
mysqli_query($con,$query);
  echo "<script language='javascript'>alert('$noticeid Is Deleted');window.location='notice.php'</script>";
}

    ?>
     <?php
    
if (isset($cancel)) 
{
    extract($_POST);
echo "<script>window.location='student.php'</script>";
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
                                         <form action="notice_delete.php?circular_id=<?php echo $id;?>" method="POST">
                                        <div class="row mb-3">
                                             
                                              <h4>Reason For  Delete <?php echo $noticeid;?></h4>  
                                            <div class="col-md-12">
                                                    <div class="form-floating">
                                                    <textarea class="form-control" id="InputDeleteReason" name="InputDeleteReason" rows="3" cols="60" required></textarea>
                                                        <label for="InputDeleteReason">Reason</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="mt-6 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Yes"/>
                                                <a href=notice.php class="btn btn-secondary " Value="No">No</a>
                                                 
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