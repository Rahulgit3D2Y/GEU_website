<?php
include("include/header.php");
?>


<?php
$localIP = gethostbyname(trim(exec("hostname")));
$IP = $_SERVER['REMOTE_ADDR'];
//$rip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
if(isset($submit))
{
    

    //$dateformat = date("d-m-Y", strtotime($_POST['inputPasswordConfirm']));
       $query="UPDATE `user` SET `first_name` ='$inputFirstName',`middle_name` ='$inputmiddleName',`last_name` ='$inputLastName' ,`dob`='$inputPasswordConfirm',`email`='$inputEmail',`number`='$inputPassword',`updateby`='$log',`updatetime`='$date' WHERE `id` ='$log'  AND `status` = \"Active\""; 
mysqli_query($con,$query);
echo "<script language='javascript'>alert('records updated')</script>";
    echo "<script>window.location='profile.php'</script>";

    //    mysqli_query($con,"insert into admin(jobname,jobdate,status,addby,created) values ('$inputFirstName','$dateformat','$status','$log','$date')") or die(mysqli_error());
//echo "<script language='javascript'>alert('Job \"$inputFirstName \" Added Successfully');window.location='job.php'</script>";
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

$studentPhotoupdatequery="UPDATE `user` SET `photo` = '$studentphotoupload',`updateby`='$log',`updatetime`='$date' WHERE `id` = '$log' AND `status`=\"Active\"";
mysqli_query($con,$studentPhotoupdatequery);
echo "<script language='javascript'>alert('Photo Update Successfully');window.location='profile.php'</script>";
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
            <input type="hidden" name="PopinputStudentId" value="<?php echo $log;?>">
        <input type="hidden" name="unlinkprofilephoto" value="<?php echo $res['photo'];?>">
     </div>
        <div class="container-fluid">
    <div class="row">
          <?php 
        $imagepath= $res['photo'];
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
          
        <div class="text-center">
  
        <img src="<?php echo $imageencodesrc; ?>" class="rounded" alt="<?php echo $result['first_name'] ." ".$result['middle_name']  ." ". $result['last_name']; ?>" width="200" height="200">
 
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
       <!---------------------  View Ip  Modal ---------------------------->
<div class="modal fade" id="ShowIpModal" tabindex="-1" aria-labelledby="ShowIpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="ShowIpModalLabel">User Ip Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
         <form action="#" method="POST">
      <div class="modal-body">
        <?php
        if(isset($logindetailTRUNCATE))
        {
          $logindetailTRUNCATEquery="TRUNCATE `logindetail`";
mysqli_query($con,$logindetailTRUNCATEquery);
  echo "<script language='javascript'>alert('Login Detail Truncate');window.location='profile.php'</script>";
//echo "<script>window.location='profile.php'</script>";

        }
?>       
Server Ip:-<?php echo $localIP;?>
<br>
User Ip:-<?php echo $IP ; ?>  
        
<br>
      
        <input type="submit" class = "btn btn-success" name="logindetailTRUNCATE" id="logindetailTRUNCATE" value="Login Detail TRUNCATE">
        </form>
      </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end IP modal ------------------------------------------>                <!---------------------  View Password  Modal ---------------------------->
<div class="modal fade" id="ShowUserPasswordModal" tabindex="-1" aria-labelledby="ShowUserPasswordModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="ShowUserPasswordModalLabel">User Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        
      <div class="modal-body">

       <div class="table-responsive">
       <table class="table table-bordered">
  <thead>
    <tr>
      <th>S.no</th>
      <th>Login Id</th>
      <th>Name</th>
      <th>Date</th>
      <th>Expire Date</th>
      <th>Active</th>

      
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = 0;
                                        $discountsql=mysqli_query($con,"SELECT * FROM `user` WHERE `status`=\"Active\" AND `wrong_pass_count`='3'");
                                        while($discountresult=mysqli_fetch_assoc($discountsql))
    {
        $count+=1;
        $id=$discountresult['id'];
        $Userexpiretime= date('d-m-Y',strtotime('+1 days',strtotime($discountresult['wrong_pass_time'])));

?>
    <tr>
         <td><?php echo $count; ?></td>
         <td><?php echo $discountresult['login']; ?></td>
         <td><?php echo $discountresult['first_name']; ?></td>
         <td><?php echo $discountresult['wrong_pass_time']; ?></td>
         <td><?php echo $Userexpiretime; ?></td>
        <td><a href="?UserPasswordCountReset=<?php echo $id;?>"><span class='fas fa-plus-circle'></span></a></td>
    </tr>
    <?php
if((isset($_GET['UserPasswordCountReset'])) && $_GET['UserPasswordCountReset']=="$id")
   {

$query="UPDATE `user` SET `wrong_pass_count`='0',`wrong_pass_reset_type`='admin' WHERE `id` ='$id'";   
mysqli_query($con,$query);
  echo "<script language='javascript'>alert('Password Count Reset');window.location='profile.php'</script>";
  }
?>

<?php } ?>
  </tbody>
</table>
</div>
        
        
      </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end Password modal ------------------------------------------>



  


           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card shadow-lg border-0 rounded-lg mt-2">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Profile</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="container-fluid">
                                                <?php if ($login_user_type=="superuser") {?><a href="#"  data-bs-toggle="modal" data-bs-target="#ShowIpModal" style=" color:text-decoration:none"> Show Ip</a><br>
                                                <a href="#"  data-bs-toggle="modal" data-bs-target="#ShowUserPasswordModal" style=" color:text-decoration:none"> User Pasword</a>
                                             
                                                   <?php } ?>
    <div class="row mb-3">
        <div class="text-center">
        <?php 
        $imagepath= $res['photo'];
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
          
            <input type="hidden" name="user_photo_upload_delete" id="user_photo_upload_delete" value="<?php echo $res['photo'];?>">
        <img src="<?php echo $imageencodesrc;?>" class="rounded" alt="<?php echo $res['first_name'] ." ".$res['middle_name']  ." ". $res['last_name']; ?>" width="200" height="200">
 
     </div>
 </div>

</div>
<?php if ($login_user_type=="superuser") { ?>
<div class="row mb-3">
  <div class="mt-4 mb-0" align="center">

         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View Photo</button>
    </div>
</div>
<?php } else {?>
  
<?php } ?>

                                            <div class="row mb-3">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text"  value="<?php echo $res['first_name']; ?>" placeholder="Enter your First Name" required />
                                                        <label for="inputFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputmiddleName" name="inputmiddleName" type="text" value="<?php echo $res['middle_name']; ?>" placeholder="Enter your Middle Name"  />
                                                        <label for="inputmiddleName">Middle Name</label>
                                                    </div>
                                                </div> 
                                               <div class="col-md-4">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text"  value="<?php echo $res['last_name']; ?>" placeholder="Enter your Last Name" required />
                                                        <label for="inputLastName">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           <div class="form-floating mb-3">
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputEmail" name="inputEmail" type="email"  value="<?php echo $res['email']; ?>" placeholder="name@example.com"  required  />
                                                <label for="inputEmail">Email address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="inputPassword" type="text" maxlength="10" minlength="0" min="0" max="10" value="<?php echo $res['number']; ?>" placeholder="Enter your Number"   required  />
                                                        <label for="inputPassword">Number</label>
                                                    </div>
                                                </div>
                                                
                                                   <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="<?php echo $res['dob']; ?>" name="inputPasswordConfirm" type="Date" id="inputPasswordConfirm" placeholder="Enter your Date Of Birth" required  />
                                                        <label for="inputPasswordConfirm">Date Of Birth </label>
                                                    
                                                    </div>
                                                </div>
                                               
                                               
                                            </div>
                                            <?php if ($login_user_type=="superuser") {?>
                                                
                                              <div class="mt-4 mb-0" align="center">
                                                
                                           <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Update"/>      
                                            </div>


                                               <?php } else {?>
                                            
                                        <?php } ?>
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