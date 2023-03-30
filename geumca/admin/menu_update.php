<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

extract($_REQUEST);
 $id=$_GET['menu_id'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

$updatedatatcoursequery=mysqli_query($con,"SELECT * FROM `menu` WHERE `menu_id`='$id' AND `status` = \"Active\"");
$result=mysqli_fetch_assoc($updatedatatcoursequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='menu.php'</script>");
$resultcoursename=$result['course_name'];

if(isset($submit))
{


$courseupdatequery="UPDATE `menu` SET `menu_name`='$inputMenuName',`menu_icon`='$inputMenuIcon',`menu_order`='$inputMenuOrder',`updateby`='$log',`updatetime`='$date' WHERE `menu_id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$courseupdatequery);
echo "<script language='javascript'>alert(' \"$inputMenuName \" Update Successfully');window.location='menu_update.php?menu_id=$id'</script>";
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
                                                        required="inputMenuName" value="<?php echo $result['menu_name']; ?>" />
                                             <label for="inputMenuName">Menu Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputMenuIcon" name="inputMenuIcon" type="text" placeholder="Enter your Menu Icon" 
                                                        required="inputMenuIcon" value="<?php echo $result['menu_icon']; ?>" />
                                                        <label for="inputMenuIcon">Menu Icon</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      <input class="form-control" id="inputMenuOrder" name="inputMenuOrder" type="text" placeholder="Enter your Menu Order" 
                                                        required="inputMenuOrder" value="<?php echo $result['menu_order']; ?>" />
                                                        <label for="inputMenuOrder">Menu Order</label>
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