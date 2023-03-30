<?php

include("include/header.php");
require("permission_check.php");
?>





 <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Course BulK Permission</h3>
                                    </div>
                                    <div class="card-body">
                                         <?php 
if(isset($ModuleUserPermissionAdd))
{
	date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
   foreach ($_POST['ModuleUserPermission'] as $key => $value)
    {
      # code...
     $userpermission=$_POST['ModuleUserPermission'][$key];
    
    $deleteqry="DELETE FROM `mst_subjectpermission` WHERE `id`='$userpermission'";
   $delteres=mysqli_query($con,$deleteqry);




     foreach ($_POST['ModulePermission'] as $key => $value)
    {
      # code...
     $Courseid=$_POST['ModulePermission'][$key];
    

       
  mysqli_query($con,"INSERT INTO `mst_subjectpermission`(`c_id`,`id`,`subjectpermission`,`addby`,`created`) values ('$Courseid','$userpermission','True','$log','$date')",$cn) or die(mysqli_error());

     
    
  } 
   }


echo "<script language='javascript'>alert('Course Permission Add Successfully');window.location='$Currentwebsiteurl'</script>";
}
                                      ?>
                                         <form action="" method="POST"  name="ModuleUserPermissionAdd">
                                           <div class='container'>
                                      <div class="row">
                                         <div class="col-sm-4">
                                          <div class="card">
      <div class="card-body">
                            <div class="form-floating mb-3 mb-md-0">            
  <h2>User Name</h2>
  <input type='checkbox' id='checkallusers'  value=''> Select All<br/>
  <select id='ModuleUserPermission'name='ModuleUserPermission[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `user`  WHERE `status` = \"Active\" AND `id`!='1' AND `id`!='9' ");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]." ".$rowcourse[2]." ".$rowcourse[3];?></;?></option>

<?php
}
?>
  </select>
   

</div>
</div>
</div>
</div>

<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<div class="form-floating mb-3 mb-md-0">
        <h2>Course Name</h2>
       
  <input type='checkbox' id='CourseUserPermissionallusers' value=''> Select All<br/>
  <select id='ModulePermission'name='ModulePermission[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `course_detail`  WHERE `status`=\"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[1]; ?>'><?php echo $rowcourse[2];?></;?></option>

<?php
}
?>
  </select>

  
        </div>
      </div>
      </div>
    </div>
</div>

</div>         

                        <div class="mt-4 mb-0" align="center" >
                             <input class="btn btn-success " type="submit" name="ModuleUserPermissionAdd"  id="ModuleUserPermissionAdd" value=" Course Permission" >                                  
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
<!--<div class="mt-4 mb-0" >
                                                  <input class="btn btn-success " type="submit" name="ModuleUserPermissionrevoke"  id="ModuleUserPermissionrevoke" value="Remove Module Permission" >                                          </div>-->


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
       $('#ModulePermission option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#ModulePermission option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#ModulePermission").change(function(){
 
    // When total options equals to total selected option
    if($("#ModulePermission option").length == $("#ModulePermission option:selected").length) {
       $("#CourseUserPermissionallusers").prop("checked", true);
    } else {
       $("#CourseUserPermissionallusers").prop("checked", false);
    }
   });
 });
 </script>

 <script type='text/javascript'>
 $(document).ready(function(){
   $("#CollegeUserPermissionallusers").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#CampusPermission option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#CampusPermission option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#CampusPermission").change(function(){
 
    // When total options equals to total selected option
    if($("#CampusPermission option").length == $("#CampusPermission option:selected").length) {
       $("#CollegeUserPermissionallusers").prop("checked", true);
    } else {
       $("#CollegeUserPermissionallusers").prop("checked", false);
    }
   });
 });
 </script>