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

	    $rnotice=mysqli_query($con,"SELECT * FROM `carousel` WHERE `carousel_session`='$studentsessionyearrecord' AND `carousel_filealt` ='$inputFileAlt' AND `carousel_status` = '$status'");
if (mysqli_num_rows($rnotice)>0)
{
    echo "<script language='javascript'>alert('Syllabus For $studentsessionyearrecord  $inputSemester $inputSection Already upload ');window.location='$Currentwebsiteurl'</script>";
        
exit;
}

$profilephotouploadname="carousel_".date('dmY')."".time(); 
    $extension  = pathinfo( $_FILES["inputFileUpload"]["name"], PATHINFO_EXTENSION );
    $studentphotoupload = $_FILES['inputFileUpload']['name'];
    $tmpphotoname = $_FILES['inputFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = 'upload/carousel/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);

        mysqli_query($con,"INSERT INTO `carousel`(`carousel_session`,`carousel_file`, `carousel_filealt`, `carousel_filelink`, `carousel_status`, `carousel_display`, `carousel_createdby`, `carousel_createdtime`) VALUES ('$studentsessionyearrecord','$basename','$inputFileAlt','$inputFileLink','$status','$status','$log','$date')") or die(mysqli_error("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='$Currentwebsiteurl'</script>"));
echo "<script language='javascript'>alert('Time Table For $studentsessionyearrecord Added Successfully')</script>"; 
    echo "<script>window.location='$Currentwebsiteurl'</script>";
}


  ?>
  
   <script type="text/javascript">
          var _validFileExtensions = [".jpg", ".jpeg"];    
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
             
            if (!blnValid)
             {
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
                if (file >= 1024) {
                    alert(
                      "File too Big, please select a file less than 1MB");
                   document.getElementById("inputFileUpload").value=null; 
                     //return false;
                } 
            }
        }
    
             

                  
    return true;
}
       </script>
 
               
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Carousel</h3></div>
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
                                                        <input class="form-control" id="inputFileUpload" name="inputFileUpload" type="file" onchange="ValidateSingleInput(this);" accept=".jpg,.jpeg" placeholder="Upload Image" />
                                                        <label for="inputFileUpload">File </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFileAlt" name="inputFileAlt" type="text"  placeholder="Enter Image Alt" required  />
                                                        <label for="inputFileAlt">Image Alt </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFileLink" name="inputFileLink" type="text"  placeholder="Enter Image Link"  />
                                                        <label for="inputFileLink">Image Link </label>
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
                               Carousel Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Session</th>
                                            <th>Image</th>
                                            <th>Image Link</th>
                                            <th>Display</th>
                                            
                                            
                                            <th>Added By</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `carousel` WHERE `carousel_status`='Active'  ORDER BY `carousel`.`carousel_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['carousel_id'];

$created_user_id=$noticequeryresult['carousel_createdby'];

 $user_name_result=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
$user_name_resultrow12=mysqli_fetch_array($user_name_result);
$user_login_name=$user_name_resultrow12['first_name']." ".$user_name_resultrow12['middle_name']." ".$user_name_resultrow12['last_name'];
                   
                     $imagepath= $noticequeryresult['carousel_file'];
                     $filename="carousel_".$noticequeryresult['carousel_session']."_".$noticequeryresult['carousel_filealt'];
        if($imagepath)
        {
                $imageencode = "upload/carousel/$imagepath";
        }
        else
        {
          $imageencode = "upload/carousel/show.png";
        }
    // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;

                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['carousel_session']; ?></td>
                                            <td><a href="<?php echo $imageencodesrc; ?>" download="<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
                                            <td><?php echo wordwrap($noticequeryresult['carousel_filelink'],20,"<br>\n");  ?></td>
                                            <td><?php  if($noticequeryresult['carousel_display']=="Active"){ ?> <a href="carousel_upload.php?carousel_id=<?php echo $noticequeryresult['carousel_id'];?>&action=Hide&model=HideCarousel" onclick="return confirm('Do you really want to Hide <?php echo $filename ?> Carousel?');">Hide <?php } else { ?> <a href="carousel_upload.php?carousel_id=<?php echo $noticequeryresult['carousel_id'];?>&action=Show&model=ShowCarousel" onclick="return confirm('Do you really want to Show <?php echo $filename ?> Carousel?');">Show<?php }  ?></td>
                                            
                                            
                                            <td><?php echo $user_login_name; ?></td>
                                            <td>
                                              <a href="carousel_delete.php?carousel_id=<?php echo urlencode(base64_encode($id)); ?>"><span class='fas fa-trash'></span></a>
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
if($_GET['action']=='Hide'&&$_GET['model']=='HideCarousel')
{    
   // header("location:test4.php");
 date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['carousel_id']);    
$query=mysqli_query($con, "UPDATE `carousel` SET `carousel_display`='InActive',`carousel_displayclosetime`='$date',`carousel_displaycloseby`='$log' WHERE `carousel_id`='$pid'");
echo '<script>alert("Carousel Hide Succesfully")</script>';
  echo "<script>window.location.href='carousel_upload.php?AppType=68%20|%20ApplicationType=website%20Content&Mid=1'</script>";
}
elseif($_GET['action']=='Show'&&$_GET['model']=='ShowCarousel')
{    
    //header("location:test4.php");
   date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['carousel_id']);    
$query=mysqli_query($con, "UPDATE `carousel` SET `carousel_display`='Active',`Carousel_showdatetime`='$date',`carousel_showby`='$log' WHERE `carousel_id`='$pid'");
echo '<script>alert("Carousel Show Succesfully")</script>';
  echo "<script>window.location.href='carousel_upload.php?AppType=68%20|%20ApplicationType=website%20Content&Mid=1'</script>";
}

?>