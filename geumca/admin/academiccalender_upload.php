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

	    $rnotice=mysqli_query($con,"SELECT * FROM `academiccalender` WHERE `academiccalender_session`='$studentsessionyearrecord' AND `academiccalender_type`='$inputSemesterType' AND  `academiccalender_status` = '$status'");
if (mysqli_num_rows($rnotice)>0)
{
    echo "<script language='javascript'>alert('Academic Calender For $studentsessionyearrecord $inputSemesterType  Already upload ');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
} 
$profilephotouploadname="academiccalender_".date('dmY')."".time(); 
    $extension  = pathinfo( $_FILES["inputFileUpload"]["name"], PATHINFO_EXTENSION );
    $studentphotoupload = $_FILES['inputFileUpload']['name'];
    $tmpphotoname = $_FILES['inputFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = 'upload/academiccalender/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);

        mysqli_query($con,"INSERT INTO `academiccalender`(`academiccalender_session`,`academiccalender_type`, `academiccalender_file`, `academiccalender_display`, `academiccalender_status`, `academiccalender_createdby`, `academiccalender_createdtime`) VALUES ('$studentsessionyearrecord','$inputSemesterType','$basename','InActive','$status','$log','$date')") or die(mysqli_error("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='$Currentwebsiteurl'</script>"));
echo "<script language='javascript'>alert('Academic Calender For $studentsessionyearrecord Added Successfully')</script>"; 
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Acadedmic Calender</h3></div>
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
                                                 <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputSemesterType" id="inputSemesterType"  required="inputSemesterType" >
          <option selected="selected" value=""disabled selected>-- Select --</option>
          
<option value="Even_Semester">Even Semester</option>
<option value="Odd_Semester">Odd Semester</option>

      
                                                        </select>
                                                        <label for="inputSemesterType">Semester Type</label>
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
                               Acadedmic Calender Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Session</th>
                                            <th>Semester Type</th>
                                            <th> Display</th>
                                            <th>FileName</th>
                                            <th>Added By</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `academiccalender` WHERE `academiccalender_status`=\"Active\" AND `academiccalender_session`='$activesession_record' ORDER BY `academiccalender`.`academiccalender_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['academiccalender_id'];

$created_user_id=$noticequeryresult['academiccalender_createdby'];

 $user_name_result=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
$user_name_resultrow12=mysqli_fetch_array($user_name_result);
$user_login_name=$user_name_resultrow12['first_name']." ".$user_name_resultrow12['middle_name']." ".$user_name_resultrow12['last_name'];
                    
                     $imagepath= $noticequeryresult['academiccalender_file'];
                     $filename="academiccalender_".$noticequeryresult['academiccalender_session']."_".$noticequeryresult['academiccalender_type'];
        if($imagepath)
        {
                $imageencode = "upload/academiccalender/$imagepath";
        }
        else
        {
          $imageencode = "upload/academiccalender/error.pdf";
        }
    // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;

                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['academiccalender_session']; ?></td>
                                        <td><?php echo $noticequeryresult['academiccalender_type']; ?></td>
                                        <td><?php  if($noticequeryresult['academiccalender_display']=="Active"){ ?> <a href="<?php echo $url;?>?academiccalender_id=<?php echo $noticequeryresult['academiccalender_id'];?>&action=Hide&model=HideAcademicCalender" onclick="return confirm('Do you really want to Hide <?php echo $filename ?> Academic Calender?');">Hide <?php } else { ?> <a href="<?php echo $url;?>?academiccalender_id=<?php echo $noticequeryresult['academiccalender_id'];?>&action=Show&model=ShowAcademicCalender" onclick="return confirm('Do you really want to Show <?php echo $filename ?> Academic Calender?');">Show<?php }  ?></td>
                                            <td><a href="<?php echo $imageencodesrc; ?>" download="<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td>
                                              <a href="academiccalender_delete.php?academiccalender_id=<?php echo urlencode(base64_encode($id)); ?>"><span class='fas fa-trash'></span></a>
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

 <?php
if($_GET['action']=='Hide'&&$_GET['model']=='HideAcademicCalender')
{    
   // header("location:test4.php");
 date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['academiccalender_id']);    
$query=mysqli_query($con, "UPDATE `academiccalender` SET `academiccalender_display`='InActive',`academiccalender_displayclosetime`='$date',`academiccalender_displaycloseby`='$log' WHERE `academiccalender_id`='$pid'");
echo '<script>alert("Academic Calender Hide Succesfully")</script>';
  echo "<script>window.location.href='$url?AppType=74%20|%20ApplicationType=website%20Content&Mid=1'</script>";
}
elseif($_GET['action']=='Show'&&$_GET['model']=='ShowAcademicCalender')
{    
    //header("location:test4.php");
   date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['academiccalender_id']);    
$query=mysqli_query($con, "UPDATE `academiccalender` SET `academiccalender_display`='Active',`academiccalender_showdatetime`='$date',`academiccalender_showby`='$log' WHERE `academiccalender_id`='$pid'");
echo '<script>alert("Academic Calender Show Succesfully")</script>';
  echo "<script>window.location.href='$url?AppType=74%20|%20ApplicationType=website%20Content&Mid=1'</script>";
}

?>