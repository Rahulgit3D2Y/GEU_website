<?php
include("include/header.php");
require("permission_check.php");
?>
<!---------------------  addnotes  Modal ---------------------------->
<div class="modal fade" id="addMenu" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddNotesLabel" aria-hidden="true">
	<?php 
 
extract($_POST);
extract($_GET);
    
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addmenu))
{
    $menustatus="Active";
     $rs=mysqli_query($con,"SELECT * FROM `menu` WHERE `menu_name`='$menuname' AND  `menu_icon`='$menuicon' ");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    //echo "<script language='javascript'>alert('$menuname')</script>";
    //echo "<script language='javascript'>alert('$menuicon')</script>";
    //echo "<script language='javascript'>alert('$menuorder')</script>";
    //echo "<script language='javascript'>alert('$menustatus')</script>";
    //echo "<script language='javascript'>alert('$log')</script>";
    //echo "<script language='javascript'>alert('$date')</script>";
        mysqli_query($con,"INSERT INTO `menu`(`menu_name`, `menu_icon`, `menu_order`, `status`, `createdby`, `createdtime`) VALUES ('$menuname','$menuicon','$menuorder','$menustatus','$log','$date')");


echo "<script language='javascript'>alert('$menuname Menu Added succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <?php
   $menuorder=mysqli_query($con,"SELECT * FROM `menu`ORDER BY `menu_id` DESC LIMIT 1;");
$menuorderresult=mysqli_fetch_assoc($menuorder);
$menu_order=$menuorderresult['menu_order'];
$increase_menu_order=$menu_order+1;
?>
                    
      <div class="modal-body">
              
          <div class="row mb-3">
          <div class="col-md-4">
             <label for="menuname" class="col-form-label">Menu Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="menuname" name="menuname" required>
          </div>
          <div class="col-md-4">
            
             <label for="menuicon" class="col-form-label">Menu Icon<span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="fas fa-abc" id="menuicon" name="menuicon" required>
           <a href= "https://www.w3schools.com/icons/icons_reference.asp" target="_blank">Use Only Font Awesome 5 Icons</a>
          </div>
          <div class="col-md-4">
            
             <label for="menuorder" class="col-form-label">Menu Order<span style="color: red">*</span> </label>
            <input type="text" value="<?php echo $increase_menu_order;?>" class="form-control" id="menuorder" name="menuorder"  required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addmenu" id="addmenu" value="Add" >
    
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
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenu"> <span class="fas fa-plus-circle"></span> Add Menu Name</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Menu
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Menu Name</th>
                                            <th>Menu Icon</th>
                                            <th>Menu Order</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `menu` WHERE `status`='Active'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['menu_id'];     
$created_user_id=$result['createdby'];
$updated_user_id=$result['updateby'];
//$modulename=$result['popupname'];


                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];


                                        ?>

                                        <tr>        
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $result['menu_name']; ?></td>
                                    <td> <a href="#"><i class="<?php echo $result['menu_icon']; ?>"></i></a></td>
                                    <td><?php echo $result['menu_order']; ?></td>
                                    <td><?php echo  $user_login_name; ?></td>
                                    <td><?php echo $upadted_user_login_name; ?></td>
                                    <td><a href="menu_update.php?menu_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                    <td><a href="menu_delete.php?menu_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a></td>       
                                            
                                            
                                              
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