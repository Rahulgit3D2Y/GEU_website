<?php

include("include/header.php");
require("permission_check.php");
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header">
                                      <h3 class="text-center font-weight-light my-3">BulK Permission Withdrawal</h3>
                                    </div>
                                    <div class="card-body">

                                      <?php 
if(isset($ModuleUserPermissionrevoke))
{
   foreach ($_POST['ModuleUserPermission'] as $key => $value)
    {
      # code...
      $subjectpermission=$_POST['ModuleUserPermission'][$key];
     // $c_id=$_POST['c_id'][$key];
      $deleteqry="UPDATE `modulepermission` SET `modulepermission`='No' WHERE `moduleuser_id`='$subjectpermission'";
   $delteres=mysqli_query($con,$deleteqry);
   
   }
echo "<script language='javascript'>alert('Module Permission Withdrawal Sucessfully');window.location='$Currentwebsiteurl'</script>";
}
                                      ?>

                                         <?php 
if(isset($CourseUserPermissionrevoke))
{
   foreach ($_POST['CourseUserPermission'] as $key => $value)
    {
      # code...
      $subjectpermission=$_POST['CourseUserPermission'][$key];
     // $c_id=$_POST['c_id'][$key];
      $deleteqry="UPDATE `mst_subjectpermission` SET `subjectpermission`='False' WHERE `id`='$subjectpermission'";
   $delteres=mysqli_query($con,$deleteqry);
   
   }
echo "<script language='javascript'>alert('Course Permission Withdrawal Sucessfully');window.location='BulkPermissionWithdrawal.php'</script>";
}
                                      ?>
                                      <form method="POST" accept="#" name="ModuleUserPermissionrevoke">
                                      <div class='container'>
                                      <div class="row">
                                         <div class="col-sm-6">
                                          <div class="card">
      <div class="card-body">
                            <div class="form-floating mb-3 mb-md-0">            
  <h2>Module Permission Withdrawal</h2>
  <input type='checkbox' id='checkallusers'  value=''> Select All<br/>
  <select id='ModuleUserPermission'name='ModuleUserPermission[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `user`  WHERE `status` = \"Active\" AND `id`!='1' AND `id`!='9'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]." ".$rowcourse[2]." ".$rowcourse[3];?></;?></option>

<?php
}
?>
  </select>
   <div class="mt-4 mb-0" >
                                                  <input class="btn btn-success " type="submit" name="ModuleUserPermissionrevoke"  id="ModuleUserPermissionrevoke" value="Remove Module Permission" >                                          </div>

</div>
</div>
</div>
</div>
</form>
<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
<div class="form-floating mb-3 mb-md-0">
        <h2>Course Permission Withdrawal</h2>
        <form method="POST" accept="#" name="CourseUserPermissionrevoke">
  <input type='checkbox' id='CourseUserPermissionallusers' value=''> Select All<br/>
  <select id='CourseUserPermission'name='CourseUserPermission[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `user`  WHERE `status` = \"Active\" AND `id`!='1' AND `id`!='9'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]." ".$rowcourse[2]." ".$rowcourse[3];?></;?></option>

<?php
}
?>
  </select>
  <div class="mt-4 mb-0">
                                                 <input class="btn btn-success " type="submit" name="CourseUserPermissionrevoke"  id="CourseUserPermissionrevoke" value="Remove Course Permission" >                                           </div>
  
        </div>
      </div>
      </div>
    </div>
</div>
</div>
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


<script type='text/javascript'>
 $(document).ready(function(){
   $("#checkallusers").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#ModuleUserPermission option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#ModuleUserPermission option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#ModuleUserPermission").change(function(){
 
    // When total options equals to total selected option
    if($("#ModuleUserPermission option").length == $("#ModuleUserPermission option:selected").length) {
       $("#checkallusers").prop("checked", true);
    } else {
       $("#checkallusers").prop("checked", false);
    }
   });
 });
 </script>

 <script type='text/javascript'>
 $(document).ready(function(){
   $("#CourseUserPermissionallusers").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#CourseUserPermission option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#CourseUserPermission option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#CourseUserPermission").change(function(){
 
    // When total options equals to total selected option
    if($("#CourseUserPermission option").length == $("#CourseUserPermission option:selected").length) {
       $("#CourseUserPermissionallusers").prop("checked", true);
    } else {
       $("#CourseUserPermissionallusers").prop("checked", false);
    }
   });
 });
 </script>