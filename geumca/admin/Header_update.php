<?php
include("include/header.php");
require("permission_check.php");
?>
<?php


  extract($_REQUEST);
 $useritem=$_GET['header_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));

date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

$updatedatatcoursequery=mysqli_query($con,"SELECT * FROM `header` WHERE `header_id`='$id' AND `header_status` = \"Active\"");
$result=mysqli_fetch_assoc($updatedatatcoursequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='headerpage.php?AppType=64%20|%20ApplicationType=website%20Content&Mid=1'</script>");
$resultcoursename=$result['course_name'];

if(isset($submit))
{


$courseupdatequery="UPDATE `header` SET `header_name`='$inputMenuName',`header_url`='$inputMenuUrl',`header_order`='$inputMenuOrder',`header_newpagetraget`='$inputTargetUrl',`header_updateby`='$log',`header_updatetime`='$date' WHERE `header_id` = '$id' AND `header_status`=\"Active\"";
mysqli_query($con,$courseupdatequery);
echo "<script language='javascript'>alert(' \"$inputMenuName \" Update Successfully');window.location='$Currentwebsiteurl'</script>";
}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                   
                                     
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Menu</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             
                                                 
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                              <input class="form-control" id="inputMenuName" name="inputMenuName" type="text" placeholder="Enter your Menu Name" 
                                                        required="inputMenuName" value="<?php echo $result['header_name']; ?>" />
                                             <label for="inputMenuName">Menu Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputMenuUrl" name="inputMenuUrl" type="text" placeholder="Enter your Menu Icon" 
                                                        required="inputMenuUrl" value="<?php echo $result['header_url']; ?>" />
                                                        <label for="inputMenuUrl">Menu Url</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      <input class="form-control" id="inputMenuOrder" name="inputMenuOrder" type="text" placeholder="Enter your Menu Order" 
                                                        required="inputMenuOrder" value="<?php echo $result['header_order']; ?>" />
                                                        <label for="inputMenuOrder">Menu Order</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                       <select class="form-select" name="inputTargetUrl" id="inputTargetUrl" required="inputTargetUrl">
                                          <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                          
                                        <option value="No" <?php  if($result['header_newpagetraget']=="No") {
                                            echo "selected";
                                        } ?>>Self</option>
                 <option value="Yes" <?php  if($result['header_newpagetraget']=="Yes") {
                                            echo "selected";
                                        } ?> <?php  if($result['header_pagemore']=="No") {
                                            echo "disabled";
                                        } ?>>New Window</option>
                                                    
                                                            
                                                </select>
                                                        <label for="inputTargetUrl">Target Url</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                           

                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Update"/>                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php
include("include/footer.php");
?>