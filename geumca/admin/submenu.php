<?php
include("include/header.php");
require("permission_check.php");
?>
<!---------------------  addnotes  Modal ---------------------------->
<div class="modal fade" id="addsubMenu" tabindex="-1"data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddNotesLabel" aria-hidden="true">
	<?php 
 
extract($_POST);
extract($_GET);
    
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addsubmenu))
{
    $submenustatus="Active";
     $rs=mysqli_query($con,"SELECT * FROM `submenu` WHERE `submenu_name`='$submenuname' AND  `submenu_url`='$submenuurl' AND `menu_id`='$menuid' ");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    //echo "<script language='javascript'>alert('$menuid')</script>";
    //echo "<script language='javascript'>alert('$submenuname')</script>";
    //echo "<script language='javascript'>alert('$submenuurl')</script>";
    //echo "<script language='javascript'>alert('$submenuorder')</script>";
    //echo "<script language='javascript'>alert('$submenustatus')</script>";
    //echo "<script language='javascript'>alert('$log')</script>";
    //echo "<script language='javascript'>alert('$date')</script>";
        mysqli_query($con,"INSERT INTO `submenu`(`menu_id`,`submenu_name`, `submenu_url`, `submenu_order`,`submenu_display`, `status`, `createdby`, `createdtime`) VALUES ('$menuid','$submenuname','$submenuurl','$submenuorder','$submenudisplay','$submenustatus','$log','$date')");
        $currentid=mysqli_insert_id($con);
        mysqli_query($con,"INSERT INTO `modulepermission`(`modulemenu_id`,`modulesubmenu_id`, `moduleuser_id`, `modulepermission`) VALUES ('$menuid','$currentid','1','Yes')");
        mysqli_query($con,"INSERT INTO `modulepermission`(`modulemenu_id`,`modulesubmenu_id`, `moduleuser_id`, `modulepermission`) VALUES ('$menuid','$currentid','9','Yes')");
         //$currentid=mysqli_insert_id($con);


echo "<script language='javascript'>alert('$submenuname SubMenu Added succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">SubMenu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
                    
      <div class="modal-body">
              
          <div class="row mb-3">
            <div class="col-md-4">
             <label for="menuname" class="col-form-label">SubMenu Name<span style="color: red">*</span> </label>
            <select class="form-select" name="menuid" id="menuid"  onchange="MenuChangeFunction()">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `menu` WHERE `status`='Active'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[1])
{
    ?>
    <option value='<?php echo $rowcourse[0]; ?>'
   
><?php echo $rowcourse[1]; ?></option>
<?php
}

}
?>
      </select>
          </div>
           <div class="col-md-4">
            
             <label for="submenudisplay" class="col-form-label">SubMenu Display<span style="color: red">*</span> </label>
            <select class="form-select" name="submenudisplay" id="submenudisplay" required="submenudisplay">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
           <option  value="Yes">Yes</option>
           <option  value="No">No</option>
       
                                                        </select>
          </div>
          <div class="col-md-4">
             <label for="submenuname" class="col-form-label">SubMenu Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="submenuname" name="submenuname" required>
          </div>

          <div class="col-md-4">
            
             <label for="submenuurl" class="col-form-label">SubMenu Url<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="submenuurl" name="submenuurl" required>
          </div>
          <div class="col-md-4">
            
             <label for="submenuorder" class="col-form-label">SubMenu Order<span style="color: red">*</span> </label>
            <input type="text" value="<?php echo $increase_menu_order;?>" class="form-control" id="submenuorder" name="submenuorder"  required>
          </div>
<span id="mobile-availability-status" style="font-size:12px;"></span>
         
        </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addsubmenu" id="addsubmenu" value="Add" >
    
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end addnotes modal ------------------------------------------>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            <div class="card-body">
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubMenu"> <span class="fas fa-plus-circle"></span> Add SubMenu Name</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                SubMenu
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Menu Name</th>
                                            <th>SubMenu Name</th>
                                            <th>SubMenu Url</th>
                                            <th>SubMenu Display</th>
                                            <th>SubMenu Order</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            <th>Update</th>
                                            <th>Delete</th>

                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `submenu` WHERE `status`='Active'  ORDER BY `submenu`.`menu_id` ASC,`submenu`.`submenu_order` ASC");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['submenu_id'];   
      $menuid=$result['menu_id'];     
$created_user_id=$result['createdby'];
$updated_user_id=$result['updateby'];
//$modulename=$result['popupname'];


                                    $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                    $row12=mysqli_fetch_array($result123);
                                    $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                    $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                    $row1=mysqli_fetch_array($result12);
                                    $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                     $MenuFetch=mysqli_query($con,"SELECT * FROM `menu` WHERE `menu_id`=\"$menuid\"");
                                    $MenuFetchrow1=mysqli_fetch_array($MenuFetch);
                                    $Menu_name=$MenuFetchrow1['menu_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                             <td><?php echo $Menu_name; ?></td>
                                            <td><?php echo $result['submenu_name']; ?></td>
                                            <td><?php echo $result['submenu_url']; ?></td>
                                            <td><?php echo $result['submenu_display'];?></td>
                                            <td><?php echo $result['submenu_order'];?></td>
                                            <td><?php echo  $user_login_name; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                          
                                            <td><a href="submenu_update.php?submenu_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                            <td><a href="submenu_delete.php?submenu_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a></td>
                                            
                                            
                                              
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </main>





<?php
include("include/footer.php");
?>