<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
extract($_REQUEST);
 $id=$_GET['id'];
$updatedatatstudentquery=mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$id' AND `id`!='1' AND `status` = \"Active\"");
$result=mysqli_fetch_assoc($updatedatatstudentquery) OR die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='user.php'</script>");
$loginnamecheck=$result['login'];
?>
<?php
if(isset($submit))
{
  if($loginnamecheck==$inputLoginId)
  {
$studentupdatequery="UPDATE `user` SET `first_name`='$inputFirstName',`middle_name`='$inputMiddleName',`last_name`='$inputLastName',`login`='$inputLoginId',`dob`='$inputDateofbirth',`number`='$inputStudentNumber',`email`='$inputStudentEmail',`type`='$inputUserType',`updateby`='$log',`updatetime`='$date' WHERE `id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$studentupdatequery);

echo "<script language='javascript'>alert(' \"$inputFirstName \" Update Successfully');window.location='user.php'</script>";
  }
  else
  {
  

   $rs=mysqli_query($con,"SELECT * FROM `user` WHERE `login`='$inputLoginId'");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('$inputLoginId user name Already exits');window.location='update_user.php?id=$id'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}  

$studentupdatequery="UPDATE `user` SET `first_name`='$inputFirstName',`middle_name`='$inputMiddleName',`last_name`='$inputLastName',`login`='$inputLoginId',`dob`='$inputDateofbirth',`number`='$inputStudentNumber',`email`='$inputStudentEmail',`type`='$inputUserType',`updateby`='$log',`updatetime`='$date' WHERE `id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$studentupdatequery);

echo "<script language='javascript'>alert(' \"$inputFirstName \" Update Successfully');window.location='user.php'</script>";
    
}
 }

?>

       <!---------------------  View File  Modal ---------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
          <?php
 extract($_POST);
if(isset($photo_upload))
{
    unlink("upload/user_photo/$unlinkprofilephoto");
    $studentphotoupload = $_FILES['PopinputuserPhoto']['name'];
    $tmpphotoname = $_FILES['PopinputuserPhoto']['tmp_name'];
    $uploadfolder = 'upload/user_photo/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$studentphotoupload);

$studentPhotoupdatequery="UPDATE `user` SET `photo` = '$studentphotoupload',`updateby`='$log',`updatetime`='$date' WHERE `id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$studentPhotoupdatequery);
echo "<script language='javascript'>alert('Photo Update Successfully');window.location='update_user.php?id=$id'</script>";
}
 ?>
    
   <form action="#" method="POST" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
 <script type="text/javascript">
          let _validFileExtensions = [".jpg", ".jpeg"];    
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

const fi = document.getElementById('PopinputuserPhoto');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("PopinputuserPhoto").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}


      </script>
        <h5 class="modal-title" id="exampleModalLabel">View Photo </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        
      <div class="modal-body">
        <div class="mb-3">
            <input type="hidden" name="PopinputStudentId" value="<?php echo $id;?>">
        <input type="hidden" name="unlinkprofilephoto" value="<?php echo $result['photo'];?>">
     </div>
        <div class="container-fluid">
    <div class="row">
        <div class="text-center">
  <?php 
        $imagepath= $result['photo'];
        if($imagepath)
        {
                $imageencode = "upload/user_photo/$imagepath";
        }
        else
        {
          $imageencode = "upload/user_photo/show.png";
        }
       // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data: '.mime_content_type($imageencode).';base64,'.$imageData;
       
         ?>
   <img src="<?php echo $imageencodesrc;?>" class="rounded" alt="<?php echo $result['first_name'] ." ".$result['middle_name']  ." ". $result['last_name']; ?>" width="200" height="200">

     </div>
 </div>
</div>
     <div class="mb-3">

         <label for="PopinputuserPhoto" class="col-form-label">User Photo</label>
        <input class="form-control" id="PopinputuserPhoto" name="PopinputuserPhoto"  onchange="ValidateinputStudentPhotoInput(this);" type="file"  accept=".jpg,.jpeg"  required />
    </div>

        
        
      </div>
      <div class="modal-footer">
        <input class="btn btn-success "type="submit" name="photo_upload" id="photo_upload" Value="Upload"/>
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end View File modal ------------------------------------------>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Update User</h3></div>
                                    <div class="card-body">
                                        <form action="update_user.php?id=<?php echo $id; ?>" method="post"  onSubmit="return check();" enctype="multipart/form-data">
                                             <div class="row mb-3">
                                             
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your First Name" value="<?php echo $result['user_id']; ?>" 
                                                        required="inputFirstName" disabled />
                                                        <label for="inputFirstName">User Id</label>
                                                    </div>
                                                </div>
                                                <?php if ($login_user_type=="superuser") { ?>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLoginId" name="inputLoginId" type="text" placeholder="Enter your Middle Name"  value="<?php echo $result['login']; ?>" 
                                                         />
                                                        <label for="inputLoginId">Login Id</label>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                              <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLoginId" name="inputLoginId" type="text" placeholder="Enter your Middle Name"  value="<?php echo $result['login']; ?>" readonly
                                                         />
                                                        <label for="inputLoginId">Login Id</label>
                                                    </div>
                                                </div>
                                              <?php } ?> 
                                                
                                            </div>
                                            <div class="row mb-3">
                                             
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your First Name" value="<?php echo $result['first_name']; ?>" 
                                                        required="inputFirstName" />
                                                        <label for="inputFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputMiddleName" name="inputMiddleName" type="text" placeholder="Enter your Middle Name"  value="<?php echo $result['middle_name']; ?>" 
                                                         />
                                                        <label for="inputMiddleName">Middle Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Last Name" value="<?php echo $result['last_name']; ?>"
                                                         />
                                                        <label for="inputLastName">Last Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View Photo</button>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="row mb-3">
                                               <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateofbirth" name="inputDateofbirth" type="date" placeholder="Enter your Date Of Birth" value="<?php echo $result['dob']; ?>"
                                                        required="inputDateofbirth" />
                                                        <label for="inputDateofbirth">Date Of Birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentNumber" name="inputStudentNumber" type="text" placeholder="Enter your Student Number" value="<?php echo $result['number']; ?>"
                                                        required="inputStudentNumber" maxlength="10" />
                                                        <label for="inputStudentNumber">Mobile Number</label>
                                                    </div>
                                                </div>
                                                                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentEmail" name="inputStudentEmail" type="email" placeholder="Enter your Email Id" value="<?php echo $result['email']; ?>" required="inputStudentEmail" />
                                                        <label for="inputStudentEmail">Email Id</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputUserType" id="inputUserType" required="inputUserType">
                                          <option selected="selected" value=""  disabled selected>-- Select an option --</option>
                                          <?php if($login_user_type=="superuser") { ?>
<option  value="superuser" <?php
       if($result["type"]=="superuser")
       {
        echo "selected";
       }
       ?>>Super User</option>
         <?php } ?>
 <option  value="admin" <?php
       if($result["type"]=="admin")
       {
        echo "selected";
       }
       ?>>Admin</option>
 <option  value="user" <?php
       if($result["type"]=="user")
       {
        echo "selected";
       }
       ?>>User</option>

 
                                                            
          										</select>
                                                        <label for="inputUserType">User Type</label>
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
                       
                    
                </main>
                 <?php
include("include/footer.php");
    ?>