<?php
include("include/header.php");
require("permission_check.php");
?>

<?php

    extract($_REQUEST);
 $useritem=$_GET['header_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));


    $studentnamequery=mysqli_query($con,"SELECT * FROM `header` WHERE `header_id`='$id' AND `header_status` = \"Active\"");
$res=mysqli_fetch_assoc($studentnamequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='headerpage.php?AppType=64%20|%20ApplicationType=website%20Content&Mid=1'</script>");
$studentID=$res['header_name'];

    $status="InActive";
    ?>

     <?php
    
if (isset($submit)) 
{
    extract($_POST);
 
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
    $query="UPDATE `header` SET `header_status`='$status',`header_disablereason`='$InputDeleteReason',`header_disableby`='$log',`header_disabletime`='$date' WHERE `header_id` ='$id'";   
mysqli_query($con,$query);
echo "<script language='javascript'>alert('$studentID Header Is Deleted');window.location='headerpage.php?AppType=64%20|%20ApplicationType=website%20Content&Mid=1'</script>";
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
                                             
                                              <h4>Reason For  Delete <?php echo $studentID;?></h4>  
                                                <div class="col-md-12">

                                                    <div class="form-floating mb-3 mb-md-0">
                                                       
                                                        <textarea class="form-control" id="InputDeleteReason" name="InputDeleteReason" rows="3" cols="60" required></textarea>
                                                        <label for="inputLastName"></label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          
                                            <div class="mt-6 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Yes"/>
                                                <input class="btn btn-danger" type="submit" value="Back" onclick="goBack()">
                                                 
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