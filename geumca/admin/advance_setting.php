<?php
include("include/header.php");
?>
<!---------------------  addnotes  Modal ---------------------------->
<div class="modal fade" id="addadvancesetting" tabindex="-1" aria-labelledby="AddNotesLabel" aria-hidden="true">
	<?php 
 
extract($_POST);
extract($_GET);
    $addnotesstatus = "InActive";
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addmodule))
{
     $rs=mysqli_query($con,"SELECT * FROM `advancesetting` WHERE `popupname`='$modulename'");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    
        mysqli_query($con,"INSERT INTO `advancesetting`(`popupname`,`popupstatus`, `popup_status`, `popupcreated`, `popupcreateddatetime`) VALUES ('$modulename','$addnotesstatus','Active','$log','$date')");


echo "<script language='javascript'>alert('Add succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   
                    
      <div class="modal-body">
              
           
          <div class="mb-3">
           <?php echo $fileuploaduserqueryresultrsphotovalue;?>
             <label for="addnotesremark" class="col-form-label">Module Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="modulename" name="modulename" required>
          </div>
        
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addmodule" id="addmodule" value="Add" >
    
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
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addadvancesetting"> <span class="fas fa-plus-circle"></span> Add Setting Name</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Module
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Module Name</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Module Name</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `advancesetting` WHERE `popup_status`='Active'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['popupid'];     
$created_user_id=$result['popupcreated'];
$updated_user_id=$result['popupupdateby'];
$modulename=$result['popupname'];


                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['popupname']; ?></td>
                                           
                                            
                                            
                                              <td>
                                              	<?php if($result['popupstatus']=="Active") {?>
                                              		<a href="advance_setting.php?popupid=<?php echo $result['popupid'];?>&action=Disable" onclick="return confirm('Do you really want to Disable <?php echo $modulename ?> Module?');"> Disable <?php echo $modulename ?><i class="fas fa-toggle-on fa-2x" aria-hidden="true" title="Disable <?php echo $modulename ?> Module"></i></a>
                                              	<?php } else { ?>
                                              		<a href="advance_setting.php?popupid=<?php echo $result['popupid'];?>&action=Enable" onclick="return confirm('Do you really want to  Enable <?php echo $modulename ?> Module?');">
 Enable <?php echo $modulename ?>
                                              			<i class="fas fa-toggle-off fa-2x" aria-hidden="true" title="Enable <?php echo $modulename ?> Module"></i></a>
                                              		
                                              		<?php } ?></td>
                                            
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
if($_GET['action']=='Enable')
{    
	date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$pid=intval($_GET['popupid']);    
$query=mysqli_query($con, "UPDATE `advancesetting` SET `popupstatus`='Active',`popupupdatedatetime`='$date',`popupupdateby`='$log' WHERE `popupid`='$pid'");
echo '<script>alert("Module Enable Succesfully")</script>';
  echo "<script>window.location.href='advance_setting.php'</script>";
}

?>
<?php
if($_GET['action']=='Disable')
{    
	date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$pid=intval($_GET['popupid']);    
$query=mysqli_query($con, "UPDATE `advancesetting` SET `popupstatus`='InActive',`popdisabletime`='$date',`popdisableby`='$log' WHERE `popupid`='$pid'");
echo '<script>alert("Module Disable Succesfully")</script>';
  echo "<script>window.location.href='advance_setting.php'</script>";
}

?>




<?php
include("include/footer.php");
?>