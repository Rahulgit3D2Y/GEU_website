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
 $couid = $_POST['inputCourseName'];
$studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];




 // $rs=mysqli_query($con,"select * from course where course_id2='$inputFirstName' or course_name='$inputLastName'");
    $rs=mysqli_query($con,"SELECT * FROM `section_detail` WHERE `section_name`='$InputCouresection' AND `course_id`='$inputCourseName' AND `session`='$studentsessionyearrecord' ");
if (mysqli_num_rows($rs)>0)
{
echo "<script language='javascript'>alert('$InputCouresection section is already in used for this course for this session');window.location='$Currentwebsiteurl'</script>";
        
exit;
}

  $dateformat = date("d-m-Y", strtotime($_POST['issuedate']));

mysqli_query($con,"INSERT INTO `section_detail`(`section_name`,`course_id`,`semester`,`school_id`,`createdby`,`createdtime`,`department_id`,`status`,`session`) values ('$InputCouresection','$inputCourseName','$InputCourseSemester','$inputSchoolName','$log','$date','1','$status','$studentsessionyearrecord')") or die(mysqli_error());

echo "<script language='javascript'>alert('Section  \"$InputCouresection \" Added Successfully');window.location='$Currentwebsiteurl'</script>";

}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Section</h3></div>
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
                                        <select class="form-select" name="inputSession" id="inputSession"  required="inputSession">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[0])
{?>
<option value='<?php echo $rowsession[3];?>'<?php if($activesession_record==$rowsession[1])
{
    echo"selected";
} ?>><?php echo $rowsession[1];?></option>
<?php
}
}
?>
      </select>
      <label for="inputSession">Session</label>
</div>
</div>
                                      
                                                 <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="inputCourseName" id="inputCourseName"  required="inputCourseName">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `department_id`=\"$inputSchoolName\" AND `status`=\"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{

echo "<option value='$rowcourse[1]'>$rowcourse[2]</option>";

}
?>
      </select>
                                                        <label for="inputCourseName">Course</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                     <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="InputCourseSemester" name="InputCourseSemester" type="text" placeholder="Enter your Semester" 
                                                        required="InputCourseSemester" />
                                                        <label for="InputCourseSemester">Semester</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                     <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="InputCouresection" name="InputCouresection" type="text" placeholder="Enter your Section" 
                                                        required="InputCouresection" />
                                                        <label for="InputCouresection">Section</label>
                                                    </div>
                                                </div>
                                                
                                                       
                                           
                                            <div class="row mb-3">
                                                
                                                
                                                
                                            </div>

                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>                                            
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