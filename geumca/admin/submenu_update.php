<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

extract($_REQUEST);
 $id=$_GET['submenu_id'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

$updatedatatcoursequery=mysqli_query($con,"SELECT * FROM `submenu` WHERE `submenu_id`='$id' AND `status` = \"Active\"");
$result=mysqli_fetch_assoc($updatedatatcoursequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='submenu.php'</script>");
$resultcoursename=$result['course_name'];

if(isset($submit))
{


$courseupdatequery="UPDATE `submenu` SET `menu_id`='$inputMenuId',`submenu_name`='$inputSubMenuName',`submenu_url`='$inputSubMenuUrl',`submenu_order`='$inputSubMenuOrder',`submenu_display`='$inputSubMenuDisplay',`updateby`='$log',`updatetime`='$date' WHERE `submenu_id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$courseupdatequery);
echo "<script language='javascript'>alert(' \"$inputSubMenuName \" Update Successfully');window.location='submenu_update.php?submenu_id=$id'</script>";
}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                   
                                     
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update SubMenu</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             <div class="col-md-2">
                                        <div class="form-floating mb-3 mb-md-0">
                        <select class="form-select" name="inputMenuId" id="inputMenuId"  onchange="MenuChangeFunction()">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `menu` WHERE `status`='Active'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[0]==$result['menu_id'])
{
    ?>
    <option value='<?php echo $rowcourse[0]; ?>' selected ><?php echo $rowcourse[1]; ?></option>
<?php
}
else
{
?>
 <option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]; ?></option>

<?php
}
}
?>
      </select>
                                    <label for="inputMenuId">Menu Name</label>
                                                    </div>
                                                </div>

                                                 <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" name="inputSubMenuDisplay"  value="<?php echo $result['submenu_display'];?>" id="inputSubMenuDisplay" required="inputSubMenuDisplay">
          <option selected="selected" disabled selected>-- Select an option --</option>
          <option  value="Yes" <?php
       if($result["submenu_display"]=="Yes")
       {
        echo "selected";
       }
       ?>>Yes</option>
 <option  value="No" <?php
       if($result["submenu_display"]=="No")
       {
        echo "selected";
       }
       ?>>No</option>
 
                                                        </select>
                                             <label for="inputSubMenuDisplay">SubMenu Display</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                              <input class="form-control" id="inputSubMenuName" name="inputSubMenuName" type="text" placeholder="Enter your Menu Name" 
                                                        required="inputSubMenuName" value="<?php echo $result['submenu_name']; ?>" />
                                             <label for="inputSubMenuName">SubMenu Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSubMenuUrl" name="inputSubMenuUrl" type="text" placeholder="Enter your Menu Icon" 
                                                        required="inputSubMenuUrl" value="<?php echo $result['submenu_url']; ?>" />
                                                        <label for="inputSubMenuUrl">SubMenu Url</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      <input class="form-control" id="inputSubMenuOrder" name="inputSubMenuOrder" type="text" placeholder="Enter your Menu Order" 
                                                        required="inputSubMenuOrder" value="<?php echo $result['submenu_order']; ?>" />
                                                        <label for="inputSubMenuOrder">SubMenu Order</label>
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