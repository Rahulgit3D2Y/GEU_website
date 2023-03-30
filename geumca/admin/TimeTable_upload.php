<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
  date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";


  if(isset($submit))
{
 extract($_POST);
    
 $dateyear=$_POST['inputsessionyear']; 
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

	    $rnotice=mysqli_query($con,"SELECT * FROM `timetable` WHERE `timetable_session`='$studentsessionyearrecord' AND `timetable_courseid` ='$inputCourseName' AND `timetable_semester` ='$inputSemester' AND `timetable_section` ='$inputSection' AND `timetable_status` = '$status'");
if (mysqli_num_rows($rnotice)>0)
{
    echo "<script language='javascript'>alert('Time Table For $studentsessionyearrecord  $inputSemester $inputSection Already upload ');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
} 
$profilephotouploadname="timetable_".date('dmY')."".time(); 
    $extension  = pathinfo( $_FILES["inputFileUpload"]["name"], PATHINFO_EXTENSION );
    $studentphotoupload = $_FILES['inputFileUpload']['name'];
    $tmpphotoname = $_FILES['inputFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = 'upload/timetable/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);

        mysqli_query($con,"INSERT INTO `timetable`(`timetable_session`, `timetable_courseid`, `timetable_semester`, `timetable_section`, `timetable_fileupload`, `timetable_status`, `timetable_createdby`, `timetable_createdtime`) VALUES ('$studentsessionyearrecord','$inputCourseName','$inputSemester','$inputSection','$basename','$status','$log','$date')") or die(mysqli_error("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='$Currentwebsiteurl'</script>"));
echo "<script language='javascript'>alert('Time Table For $studentsessionyearrecord Added Successfully')</script>"; 
    echo "<script>window.location='$Currentwebsiteurl'</script>";
}


  ?>
  
   <script type="text/javascript">
          var _validFileExtensions = [".pdf"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid extensions, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    const fi = document.getElementById('inputFileUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 500) {
                    alert(
                      "File too Big, please select a file less than 500kb");
                   document.getElementById("inputFileUpload").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
       </script>
 <script type="text/javascript" src="https://js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
               
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Time Table</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo $Currentwebsiteurl; ?>" method="POST"  onsubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                             
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" >
          <option selected="selected" value=""disabled selected>-- Select --</option>
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
                                                        <label for="inputsessionyear"> Select Session</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputCourseName" id="inputCourseName"  onselect="document.getElementById('$inputSchoolName');" <?php if($login_user_type!="superuser"){?>required<?php } ?>>
          <option selected="selected" value=""disabled selected>-- Select --</option>
<?php
$rscourse=mysqli_query($con,"SELECT course_detail.`course_id`,course_detail.`course_id2`,course_detail.`course_name`,course_detail.`course_acroym`,mst_subjectpermission.`c_id`,mst_subjectpermission.`id`,mst_subjectpermission.`subjectpermission` FROM `course_detail` INNER JOIN `mst_subjectpermission` on mst_subjectpermission.`c_id`=course_detail.`course_id2`   WHERE `status` = \"Active\" AND mst_subjectpermission.`id`='$log' AND mst_subjectpermission.`subjectpermission`=\"True\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[1])
{
    ?>
    <option value='<?php echo $rowcourse[1]; ?>'
    
><?php echo $rowcourse[3]; ?></option>
<?php
}

}
?>
      </select>
                                                        <label for="inputCourseName"> Select Course </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputSemester" id="inputSemester"  required="inputSemester" >
          <option selected="selected" value=""disabled selected>-- Select --</option>
          <?php for($i=1;$i<=6;$i++) { ?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

          <?php }  ?>
                                                        </select>
                                                        <label for="inputSemester">Semester</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputSection" id="inputSection"  required="inputSection" >
          <option selected="selected" value=""disabled selected>-- Select --</option>
          <?php for($i='A';$i<'Z';$i++) { ?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

          <?php }  ?>
                                                        </select>
                                                        <label for="inputSection">Section</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFileUpload" name="inputFileUpload" type="file" onchange="ValidateSingleInput(this);" accept=".pdf"/>
                                                        <label for="inputFileUpload">File </label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                         
                               
                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="ADD" />                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
    
                            </div>
                           
                        </div>
                        <br>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               TimeTable Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Session</th>
                                            <th>Course</th>
                                            <th>Semester</th>
                                            <th>Section</th>
                                            <th>FileName</th>
                                            <th>Added By</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `timetable` WHERE `timetable_status`=\"ACTIVE\" AND `timetable_session`='$activesession_record' ORDER BY `timetable`.`timetable_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['timetable_id'];
$inputCourseNameType=$noticequeryresult['timetable_courseid'];
$created_user_id=$noticequeryresult['timetable_createdby'];

 $user_name_result=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
$user_name_resultrow12=mysqli_fetch_array($user_name_result);
$user_login_name=$user_name_resultrow12['first_name']." ".$user_name_resultrow12['middle_name']." ".$user_name_resultrow12['last_name'];
                    $coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$inputCourseNameType'");
                    $resultcoursequery=mysqli_fetch_array($coursequery);
                    $course_name=$resultcoursequery['course_acroym'];
                     $imagepath= $noticequeryresult['timetable_fileupload'];
                     $filenames="TimeTable_".$noticequeryresult['timetable_session']."_".$course_name."_".$noticequeryresult['timetable_semester']."_".$noticequeryresult['timetable_section'];
                     $filename=str_replace('.', '', $filenames);
        if($imagepath)
        {
                $imageencode = "upload/timetable/$imagepath";
        }
        else
        {
          $imageencode = "upload/timetable/error.pdf";

        }
              // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;
    
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['timetable_session']; ?></td>
                                            <td><?php echo $course_name; ?></td>
                                            <td><?php echo $noticequeryresult['timetable_semester']; ?></td>
                                            <td><?php echo $noticequeryresult['timetable_section']; ?></td>
                                           <td><a href="<?php echo $imageencodesrc; ?>" download="<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td>
                                              <a href="TimeTable_delete.php?timetable_id=<?php echo urlencode(base64_encode($id)); ?>"><span class='fas fa-trash'></span></a>
                                            </td>
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
 <?php include("include/footer.php"); ?>