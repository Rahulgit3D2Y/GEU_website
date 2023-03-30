<?php include("include/subheader.php"); ?>
<?php 
 extract($_POST);
 extract($_REQUEST);
  extract($_GET);

 ?>
      <!-- Title -->
      <title>Time Table - DCA | GEU </title>
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-center fw-bold display-4 mb-5">Time Table</h1>
            </div>    
        </div>
      </div>
  </section>

  <!-- Content -->

<section>
    <form class="d-flex p-3 tcolor"  method="POST" action="timeTable.php">
      <div class="form-group ">
     <label for="session-dropdown">Session:</label>
           <select class="form-control" name="inputsessionyear" id="session-dropdown"  required="inputsessionyear" >
          <option selected="selected" value=""disabled selected>-- Select --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[0])
{?>
<option value='<?php echo $rowsession[1];?>'<?php if($activesession_record_add==$rowsession[1])
{
    echo"selected";
}elseif ($inputsessionyear==$rowsession[1])
 {
  echo"selected";
} ?>><?php echo $rowsession[1];?></option>
<?php
}
}
?>
      </select>
          
      </div>
      <div class="form-group ">
        <label for="course-dropdown">Course:</label>
       
           <select class="form-control" name="inputCourseName" id="course-dropdown" required>
          <option selected="selected" value=""disabled selected>-- Select --</option>
<?php
$rscourse=mysqli_query($con,"SELECT course_detail.`course_id`,course_detail.`course_id2`,course_detail.`course_name`,course_detail.`course_acroym` FROM `course_detail`  WHERE `status` = \"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[1])
{
    ?>
    <option value='<?php echo $rowcourse[1]; ?>'
     <?php if($inputCourseName==$rowcourse[1])
{
    echo "selected";
}?>
><?php echo $rowcourse[3]; ?></option>
<?php
}

}
?>
      </select>
      </div>
      <div class="form-group ">
        <label for="semester-dropdown">Semester:</label>
        <select class="form-control" name="InputSemester" id="semester-dropdown" required>
          <option selected="selected" value=""disabled selected>-- Select --</option>
          <?php for($i=1;$i<=6;$i++) { ?>
<option value="<?php echo $i; ?>" <?php if($InputSemester==$i) { echo "Selected"; }?>><?php echo $i; ?></option>

          <?php }  ?>
                       
        </select>
      </div>
      <div class="form-group ">
        <label for="section-dropdown">Section:</label>
        <select class="form-control" name="InputSection" id="section-dropdown" required>
          <option selected="selected" value=""disabled selected>-- Select --</option>
          <?php for($i='A';$i<'Z';$i++) { ?>
<option value="<?php echo $i; ?>" <?php if($InputSection==$i) { echo "Selected"; }?>><?php echo $i; ?></option>

          <?php }  ?>
        </select>
      </div>
      <div class="form-group">
       <br>
       <input class="btn btn-success "type="submit" name="search" id="search" Value="Search"/>
        
      </div>   
     <div class="loader"></div>   
    </form>

    <script>
      window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    loader.classList.add("loader--hidden");

    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });
    </script>
</section>
<?php  
 extract($_POST);
 extract($_REQUEST);
if(isset($search))
{
    $inputsessionyearType = $_POST['inputsessionyear'];
    $inputCourseNameType = $_POST['inputCourseName']; 
    $InputSemesterType =$_POST['InputSemester']; 
    $InputSectionType=$_POST['InputSection'];

     $rstudent=mysqli_query($con,"SELECT * FROM `timetable` WHERE `timetable_session`='$inputsessionyearType' AND `timetable_courseid` ='$inputCourseNameType' AND `timetable_semester` ='$InputSemesterType' AND `timetable_section` ='$InputSectionType' AND `timetable_status` = 'Active'");
if (mysqli_num_rows($rstudent)<1)
{
     $studenterrormsg="TimeTable is not uploaded yet";

} 
 else
 { 
$result12=mysqli_query($con,"SELECT * FROM `timetable` WHERE `timetable_session`='$inputsessionyearType' AND `timetable_courseid` ='$inputCourseNameType' AND `timetable_semester` ='$InputSemesterType' AND `timetable_section` ='$InputSectionType' AND `timetable_status` = 'Active'");

$coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$inputCourseNameType'");
                    $resultcoursequery=mysqli_fetch_array($coursequery);
                        $course_name=$resultcoursequery['course_acroym'];

            $row1=mysqli_fetch_array($result12);
            //$filepath=$row1['student_status'];
            $studenterrormsg="";
            $imagepath= $row1['timetable_fileupload'];
            $filenames= "TimeTable_".$inputsessionyearType."_".$course_name."_".$InputSemesterType."_".$InputSectionType;
                        $filename=str_replace('.', '', $filenames);
        if($imagepath)
        {
                $imageencode = "admin/upload/timetable/$imagepath";
        }
        else
        {
          $imageencode = "admin/upload/timetable/error.pdf";
        }
       // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;
    }
 ?>
 <?php if($studenterrormsg) { ?>
<h1> <span style="font-family:'type'; color:red;"><?php echo $studenterrormsg;?></span></h1>
<?php } else {
 ?>
 <div>
          <label id="lnkdownloadhere"   style="cursor:pointer; font-size:15px;  color:blue; margin-right: 80px"><a href="<?php echo $imageencodesrc; ?>"  download="<?php echo $filename; ?>"  >Click Here to download</a></label>
        </div>
<div class="iframe-body">
  <iframe src="<?php echo $imageencodesrc; ?>" width="1000" height="1000" id="pdf-iframe"> </iframe>
</div>
<?php }  } ?>
    </div>
    </div>
  <?php include("include/footer.php"); ?>