<?php
include("include/header.php");
require("permission_check.php");
?>

<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
$own_filled = "Yes";
//extract($_POST);
$schoolquery=mysqli_query($con,"select * from school");
$result=mysqli_fetch_assoc($schoolquery);
$result['own_filled'];
if(isset($submit))
{
    $inputSrtSchoolPhotoupload = $_FILES['inputSrtSchoolPhoto']['name'];
    $tmpphotoname = $_FILES['inputSrtSchoolPhoto']['tmp_name'];
    $uploadfolder = 'upload/school_logo/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$inputSrtSchoolPhotoupload);

        $schooladd="UPDATE `school` SET `school_name`='$inputSchoolName',`school_code`='$inputSchoolCode',`admission_number_starting`='$inputAdmissionNumber',`school_srtname`='$inputSrtSchoolName',`school_photo`='$inputSrtSchoolPhotoupload',`school_number`='$inputSchoolNumber',`school_email`='$inputSchoolEmail',`school_address`='$inputSchoolAddress',`school_country`='$inputSchoolCountry',`school_state`='$inputSchoolState',`school_district`='$inputSchoolDistrict',`school_city`='$inputSchoolCity',`school_pincode`='$inputSchoolPincode',`own_filled`='$own_filled',`createdby`='$log',`createdtime`='$date' WHERE `school_id` = \"1\"";
        mysqli_query($con,$schooladd);
echo "<script language='javascript'>alert('records Added')</script>"; 
    echo "<script>window.location='school.php'</script>";
}



if ($result['own_filled']=="No")
 {
?>
 <script type="text/javascript">
          let _validFileExtensions = [".jpg",".jpeg",".png"];    
function ValidateinputSrtSchoolPhotoInput(oInput)
 {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions.length; j++) {
                let sCurExtension = _validFileExtensions[j];
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


    const fi = document.getElementById('inputSrtSchoolPhoto');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("inputSrtSchoolPhoto").value=null; 
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
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">School Detail</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolName" name="inputSchoolName" type="text" placeholder="Enter your School Name" required="inputSchoolName"/>
                                                        <label for="inputSchoolName">School Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSrtSchoolName" name="inputSrtSchoolName" type="text" placeholder="Enter your School Short name" 
                                                        required="inputSrtSchoolName"  />
                                                        <label for="inputSrtSchoolName">School Short Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSrtSchoolPhoto" name="inputSrtSchoolPhoto" type="file"  onchange="ValidateinputSrtSchoolPhotoInput(this);" type="file"  accept=".jpg,.jpeg,.png"  required
                                                         />
                                                        <label for="inputSrtSchoolPhoto">School Photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCode" name="inputSchoolCode" type="text" placeholder="Enter your School Code" 
                                                        required="inputSchoolCode"  minlength="4" maxlength="4" min="4" max="4" />
                                                        <label for="inputSchoolCode">School Code</label>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolNumber" name="inputSchoolNumber" type="text" placeholder="Enter your School Number" 
                                                        required="inputSchoolNumber" minlength="10" maxlength="10" min="10" max="10" />
                                                        <label for="inputSchoolNumber">School Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolEmail" name="inputSchoolEmail" type="email" placeholder="Enter your School Email" required="inputSchoolEmail"  />
                                                        <label for="inputSchoolEmail">School Email</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                             <div class="row mb-3">
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolAddress" name="inputSchoolAddress" type="text" placeholder="Enter your School Address" 
                                                        required="inputSchoolAddress"  />
                                                        <label for="inputSchoolAddress">Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCountry" name="inputSchoolCountry" type="text" placeholder="Enter your Country" required="inputSchoolCountry"  />
                                                        <label for="inputSchoolCountry">Country</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolState" name="inputSchoolState" type="text" placeholder="Enter your State" 
                                                        required="inputSchoolState" />
                                                        <label for="inputSchoolState">State</label>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                                    <div class="row mb-3">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolDistrict" name="inputSchoolDistrict" type="text" placeholder="Enter your District" required="inputSchoolDistrict"  />
                                                        <label for="inputSchoolDistrict">District</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCity" name="inputSchoolCity" type="text" placeholder="Enter your City" required="inputSchoolCity" />
                                                        <label for="inputSchoolCity">City</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolPincode" name="inputSchoolPincode" type="text" placeholder="Enter your Pincode" required="inputSchoolPincode"  />
                                                        <label for="inputSchoolPincode">Pincode</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

   
<?php 
}
else
{
    if(isset($submit1))
{
        $schooladd="UPDATE `school` SET `school_name`='$inputSchoolName',`school_code`='$inputSchoolCode',`school_srtname`='$inputSrtSchoolName',`school_number`='$inputSchoolNumber',`school_email`='$inputSchoolEmail',`school_address`='$inputSchoolAddress',`school_country`='$inputSchoolCountry',`school_state`='$inputSchoolState',`school_district`='$inputSchoolDistrict',`school_city`='$inputSchoolCity',`school_pincode`='$inputSchoolPincode',`updateby`='$log',`updatetime`='$date' WHERE `school_id` = \"1\"";
        mysqli_query($con,$schooladd);
echo "<script language='javascript'>alert('records Added')</script>"; 
    echo "<script>window.location='school.php'</script>";
}

?>
              <!---------------------  View Student Photo  modal ---------------------------->
<div class="modal fade" id="schoolphoto" tabindex="-1" aria-labelledby="schoolphotoLabel" aria-hidden="true">
   
  <div class="modal-dialog">
    <script type="text/javascript">
          let _validFileExtensions = [".jpg",".jpeg",".png"];    
function ValidateinputStudentPhotoInput(oInput)
 {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions.length; j++) {
                let sCurExtension = _validFileExtensions[j];
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


    const fi = document.getElementById('PopinputSchoolPhoto');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("PopinputSchoolPhoto").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}


      </script>
       <?php
 extract($_POST);
if(isset($photo_upload))
{
    unlink("upload/school_logo/$unlinkprofilephoto");
    $studentphotoupload = $_FILES['PopinputSchoolPhoto']['name'];
    $tmpphotoname = $_FILES['PopinputSchoolPhoto']['tmp_name'];
    $uploadfolder = 'upload/school_logo/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$studentphotoupload);

$studentPhotoupdatequery="UPDATE `school` SET `school_photo` = '$studentphotoupload',`updateby`='$log',`updatetime`='$date' WHERE `school_id` = '1' and `status`=\"Active\"";
mysqli_query($con,$studentPhotoupdatequery);
echo "<script language='javascript'>alert('Photo Update Successfully');window.location='school.php'</script>";
}
 ?>
    
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="schoolphotoLabel">View Photo </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
         <div class="mb-3">
            <input type="hidden" name="PopinputStudentId" value="<?php echo $result['school_id'];?>">
        <input type="hidden" name="unlinkprofilephoto" value="<?php echo $result['school_photo'];?>">
     </div>
        <div class="container-fluid">
    <div class="row">
        <div class="text-center">
             <?php 
        $imagepath= $result['school_photo'];
        if($imagepath)
        {
                $imageencode = "upload/school_logo/$imagepath";
        }
        else
        {
          $imageencode = "upload/school_logo/show.png";
        }
            // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data: '.mime_content_type($imageencode).';base64,'.$imageData;
         ?>
  
        <img src="<?php echo $imageencodesrc;?>" class="rounded" alt="<?php echo $result['school_name']; ?>" width="100" height="100">
    
     </div>
 </div>
</div>
     <div class="mb-3">

         <label for="PopinputSchoolPhoto" class="col-form-label">School Logo</label>
        <input class="form-control" id="PopinputSchoolPhoto" name="PopinputSchoolPhoto"  onchange="ValidateinputStudentPhotoInput(this);" type="file"  accept=".jpg,.jpeg,.png"  required />
    </div>
        
</div>
  
      <div class="modal-footer">
         <input class="btn btn-success "type="submit" name="photo_upload" id="photo_upload" Value="Upload"/> 
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</form>

</div>

<!---------------------------------------------- end Student Photo  modal ------------------------------------------>
<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">School Detail</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolName" name="inputSchoolName" type="text" placeholder="Enter your School Name" required="inputSchoolName"  value="<?php echo $result['school_name']?>" />
                                                        <label for="inputSchoolName">School Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSrtSchoolName" name="inputSrtSchoolName" type="text" placeholder="Enter your School Short name" 
                                                        required="inputSrtSchoolName" value="<?php echo $result['school_srtname']?>"  />
                                                        <label for="inputSrtSchoolName">School Short Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#schoolphoto">View Photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                             <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCode" name="inputSchoolCode" type="text" placeholder="Enter your School Code" 
                                                        required="inputSchoolCode"  minlength="4" maxlength="4" min="4" max="4" value="<?php echo $result['school_code']?>"  />
                                                        <label for="inputSchoolCode">School Code</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolNumber" name="inputSchoolNumber" type="text" placeholder="Enter your School Number" 
                                                        required="inputSchoolNumber" minlength="10" maxlength="10" min="10" max="10" value="<?php echo $result['school_number']?>"  />
                                                        <label for="inputSchoolNumber">School Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolEmail" name="inputSchoolEmail" type="email" placeholder="Enter your School Email" required="inputSchoolEmail" value="<?php echo $result['school_email']?>"  />
                                                        <label for="inputSchoolEmail">School Email</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                             <div class="row mb-3">
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolAddress" name="inputSchoolAddress" type="text" placeholder="Enter your School Address" 
                                                        required="inputSchoolAddress" value="<?php echo $result['school_address']?>"  />
                                                        <label for="inputSchoolAddress">Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCountry" name="inputSchoolCountry" type="text" placeholder="Enter your Country" required="inputSchoolCountry" value="<?php echo $result['school_country']?>"  />
                                                        <label for="inputSchoolCountry">Country</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolState" name="inputSchoolState" type="text" placeholder="Enter your State" 
                                                        required="inputSchoolState" value="<?php echo $result['school_state']?>"  />
                                                        <label for="inputSchoolState">State</label>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                                    <div class="row mb-3">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolDistrict" name="inputSchoolDistrict" type="text" placeholder="Enter your District" required="inputSchoolDistrict" value="<?php echo $result['school_district']?>"  />
                                                        <label for="inputSchoolDistrict">District</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolCity" name="inputSchoolCity" type="text" placeholder="Enter your City" required="inputSchoolCity" value="<?php echo $result['school_city']?>"  />
                                                        <label for="inputSchoolCity">City</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputSchoolPincode" name="inputSchoolPincode" type="text" placeholder="Enter your Pincode" required="inputSchoolPincode"  value="<?php echo $result['school_pincode']?>"  />
                                                        <label for="inputSchoolPincode">Pincode</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit1" id="submit1" Value="Update"/>                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


<?php
}
?>

                     
           <!-- main content -->
            


  <?php
include("include/footer.php");
?>