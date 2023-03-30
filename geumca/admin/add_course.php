<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";

$q=mysqli_query($con,"select * from school where status = \"Active\"");
$res=mysqli_fetch_assoc($q);

$inputSchoolName=$res['school_id'];
if(isset($submit))
{

$dateyear=$_POST['inputsessionyear']; 

$studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

 // $rs=mysqli_query($con,"select * from course where course_id2='$inputFirstName' or course_name='$inputLastName'");
    $rs=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$inputFirstName' ");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('$inputFirstName course id is allready in used');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}
 $rs1=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_name`='$inputLastName'");
if (mysqli_num_rows($rs1)>0)
{
    echo "<script language='javascript'>alert('$inputLastName course name is allready in used');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}
  $dateformat = date("d-m-Y", strtotime($_POST['issuedate']));
mysqli_query($con,"insert into course_detail(course_id2,course_name,course_acroym,course_duration,school_id,status,createdby,createdtime,course_type,department_id) values ('$inputFirstName','$inputLastName','$inputCourseacc','$inputCourseDuration','$inputSchoolName','$status','$log','$date','$inputCourseType','$inputDepartmentName')") or die(mysqli_error());

mysqli_query($con,"insert into mst_subjectpermission(c_id, `id`, `subjectpermission`, `created`) values ('$inputFirstName','1','True','$date')") or die(mysqli_error());

mysqli_query($con,"insert into mst_subjectpermission(c_id, `id`, `subjectpermission`, `created`) values ('$inputFirstName','9','True','$date')") or die(mysqli_error());

echo "<script language='javascript'>alert('Course  \"$inputLastName \" Added Successfully');window.location='$Currentwebsiteurl'</script>";

}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Course</h3></div>
                                    <div class="card-body">
                                      
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             <!--   <div class="col-md-3">
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
$rscourse=mysqli_query($con,"SELECT * FROM `campus` WHERE `status`=\"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{

echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";

}
?>
      </select>
                                                        <label for="inputDepartmentName">University</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your Course Id" required="inputFirstName" minlength="3" maxlength="3" max="3" min="3"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="Enter The Number" />
                                                        <label for="inputFirstName">Course ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Course name" 
                                                        required="inputLastName" />
                                                        <label for="inputLastName">Course Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCourseacc" name="inputCourseacc" type="text" placeholder="Enter your Course Acc" 
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
           <option selected="selected" value="Yearly">Yearly</option>
           <!--<option  value="Semester">Semester</option>-->
                                                        </select>
                                                        <label for="inputCourseType">Course Type</label>
                                                    </div>
                                                </div>
                                              <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCourseDuration" name="inputCourseDuration" type="text" placeholder="Enter your Course Duration" max="1" min="1" maxlength="1" minlength="1" 
                                                        required="inputCourseDuration" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                        <label for="inputCourseDuration">Course Duration</label>
                                                    </div>
                                                </div>   
                                                
                                            </div>

                                           <!--<div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="issuedate" name="issuedate" type="date" placeholder="Create a password" />
                                                        <label for="inputPassword">Date Of Issue</label>
                                                    </div>
                                                </div>-->
                                              <!--  <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>                                            </div>
                                        </form>
                                    </div>
                                   <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php
          include("include/footer.php");  
      ?>