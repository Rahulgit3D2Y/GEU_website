<?php
include("include/header.php");
require("permission_check.php");
?>
<!---------------------  addnotes  Modal ---------------------------->
<div class="modal fade" id="addDepartment" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddNotesLabel" aria-hidden="true">
	<?php 
 
extract($_POST);
extract($_GET);
    
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addDepartment))
{
    $departmentstatus="Active";
     $rs=mysqli_query($con,"SELECT * FROM `department` WHERE `department_name`='$DepartmentName' AND  `school_id`='$SchoolName' ");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    //echo "<script language='javascript'>alert('$DepartmentName')</script>";
    //echo "<script language='javascript'>alert('$SchoolName')</script>";
    //echo "<script language='javascript'>alert('$menuorder')</script>";
    //echo "<script language='javascript'>alert('$departmentstatus')</script>";
    //echo "<script language='javascript'>alert('$log')</script>";
    //echo "<script language='javascript'>alert('$date')</script>";
        mysqli_query($con,"INSERT INTO `department`(`department_name`, `school_id`, `status`, `createdby`, `createdtime`) VALUES ('$DepartmentName','$SchoolName','$departmentstatus','$log','$date')");


echo "<script language='javascript'>alert('$DepartmentName Menu Added succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
                    
      <div class="modal-body">
              
          <div class="row mb-3">
          <div class="col-md-4">
             <label for="SchoolName" class="col-form-label">College Name<span style="color: red">*</span> </label>
            <select class="form-select" name="SchoolName" id="SchoolName"  required="SchoolName" >
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rsschool=mysqli_query($con,"SELECT * FROM `school`  WHERE `status` = \"Active\"");
      while($rowschool=mysqli_fetch_array($rsschool))
{
if($rowschool[1])
{
echo "<option value='$rowschool[0]'>$rowschool[1]</option>";
}

}
?>
      </select>
          </div>
          <div class="col-md-4">
            
             <label for="DepartmentName" class="col-form-label">Department Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="DepartmentName" name="DepartmentName" required>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addDepartment" id="addDepartment" value="Add" >
    
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
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartment"> <span class="fas fa-plus-circle"></span> Add Department</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Department
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>College Name</th>
                                            <th>Department Name</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `department` WHERE `status`='Active'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['department_id'];  
   $sid=$result['school_id'];     
$created_user_id=$result['createdby'];
$updated_user_id=$result['updateby'];
//$modulename=$result['popupname'];


                                    $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                    $row12=mysqli_fetch_array($result123);
                                    $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                    $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                    $row1=mysqli_fetch_array($result12);
                                    $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                    $schoolname=mysqli_query($con,"SELECT * FROM `school`  WHERE `status` = \"Active\" AND `school_id`=\"$sid\"");
                                    $schoolnamerow1=mysqli_fetch_array($schoolname);
                                    $school_name=$schoolnamerow1['school_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $school_name; ?></td>
                                            
                                            <td><?php echo $result['department_name']; ?></td>
                                            <td><?php echo  $user_login_name; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                           
                                            
                                            
                                              
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