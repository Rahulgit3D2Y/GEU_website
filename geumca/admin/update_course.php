<?php
include("include/header.php");
require("permission_check.php");
?>


<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
//$type = "Single";
//extract($_POST);
extract($_REQUEST);
 $id=$_GET['course_id'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

$updatedatatcoursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id`='$id' and `status` = \"Active\"");
$result=mysqli_fetch_assoc($updatedatatcoursequery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='course.php'</script>");
$resultcoursename=$result['course_name'];

if(isset($submit))
{
/*
 // $rs=mysqli_query($con,"select * from course where course_id2='$inputFirstName' or course_name='$inputLastName'");
    $rs=mysqli_query($con,"select * from course where course_id2='$inputFirstName' ");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('$inputFirstName  allready in used');window.location='course.php'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}
 $rs1=mysqli_query($con,"select * from course where course_name='$inputLastName'");
if (mysqli_num_rows($rs1)>0)
{
    echo "<script language='javascript'>alert('$inputLastName  allready in used');window.location='course.php'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}
  $dateformat = date("d-m-Y", strtotime($_POST['issuedate']));
mysqli_query($con,"insert into course(course_id2,course_name,course_duration,course_fee,school_id,status,createdby,createdtime) values ('$inputFirstName','$inputLastName','$inputCourseDuration','$inputCourseFee','$inputSchoolName','$status','$log','$date')") or die(mysqli_error());
echo "<script language='javascript'>alert('Course  \"$inputLastName \" Added Successfully');window.location='course.php'</script>";
*/
if($resultcoursename==$inputLastName)
{
  $courseupdatequery="UPDATE `course_detail` SET `course_name`='$inputLastName',`course_acroym`='$inputCourseacc',`course_duration`='$inputCourseDuration',`department_id`='$inputDepartmentName',`updateby`='$log',`updatetime`='$date' WHERE `course_id` = '$id' and `status`=\"Active\"";
mysqli_query($con,$courseupdatequery);
echo "<script language='javascript'>alert(' \"$inputLastName \" Update Successfully');window.location='$Currentwebsiteurl'</script>";  
}
else
{
  $rsCOURSECHECKQUERY=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_name`='$inputLastName'");
if (mysqli_num_rows($rsCOURSECHECKQUERY)>0)
{
    echo "<script language='javascript'>alert('$inputLastName Course name Already exits');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}     
}


  

$courseupdatequery="UPDATE `course_detail` SET `course_name`='$inputLastName',`course_acroym`='$inputCourseacc',`course_duration`='$inputCourseDuration',`updateby`='$log',`updatetime`='$date' WHERE `course_id` = '$id' and `status`=\"Active\"";
mysqli_query($con,$courseupdatequery);
echo "<script language='javascript'>alert(' \"$inputLastName \" Update Successfully');window.location='$Currentwebsiteurl'</script>";
}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                   
                                     
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Course</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             <!--   <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="inputSchoolName" id="inputSchoolName"  required="inputSchoolName">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"Select * from school  where status = \"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{

echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";

}
?>
      </select>
                                                        <label for="inputSchoolName">School</label>
                                                    </div>
                                                </div>-->
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="inputDepartmentName" id="inputDepartmentName"  required="inputDepartmentName">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `campus` WHERE  `status`=\"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[0]==$result['department_id'])
{
echo "<option value='$rowcourse[0]' selected='selected'>$rowcourse[1]</option>";
}
else
echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";

}
?>
      </select>
                                                        <label for="inputDepartmentName">Campus</label>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="Number" placeholder="Enter your Course Id" value="<?php echo $result['course_id2']; ?>" required="inputFirstName" minlength="3" maxlength="3" min="100" max="999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly/>
                                                        <label for="inputFirstName">Course ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Course name" 
                                                        required="inputLastName" value="<?php echo $result['course_name']; ?>" />
                                                        <label for="inputLastName">Course Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCourseacc" name="inputCourseacc" type="text" value="<?php echo $result['course_acroym']; ?>" placeholder="Enter your Course Acc" 
                                                        required="inputCourseacc" />
                                                        <label for="inputCourseacc">Course Acc</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          <div class="row mb-3">
                                            <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputCourseType" id="inputCourseType" required="inputCourseType" onchange="inputCourseType()">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
          <option  value="Yearly" <?php
       if($result['course_type']=="Yearly")
       {
        echo "selected";
       }
       ?>>Yearly</option>
           
           <!--<option  value="Semester">Semester</option>-->
                                                        </select>
                                                        <label for="inputCourseType">Course Type</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCourseDuration" name="inputCourseDuration" type="text" placeholder="Enter your Course Duration"  max="1" min="1" maxlength="1" minlength="1" 
                                                         oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                        required="inputCourseDuration"  value="<?php echo $result['course_duration']; ?>" />
                                                        <label for="inputCourseDuration">Course Duration</label>
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