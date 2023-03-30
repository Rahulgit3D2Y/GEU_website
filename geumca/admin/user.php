<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
  $schoolquerycode=mysqli_query($con,"SELECT * FROM `school`");
$schoolquerycoderesult=mysqli_fetch_assoc($schoolquerycode);
$school_code=$schoolquerycoderesult['school_code'];
 
  if(isset($submit))
{
        $dateyear=$_POST['inputsessionyear']; 

       date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
 //$dateyear=date('y');
 $startno="001";
 $id1="U".$dateyear."".$school_code;
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

    // USER PHOTO UPLOAD CODE
    $inputuserphotoupload = $_FILES['inputStudentPhoto']['name'];
    $tmpaadharname = $_FILES['inputStudentPhoto']['tmp_name'];
    $folder2 = 'upload/user_photo/';
    //$destination = $folder.$filename;
    move_uploaded_file($tmpaadharname, $folder2.$inputuserphotoupload);

//$message= "YOUR ADMISSION IS SUCCESSFULLY COMPLETED IN $student_result_coursename\n YOUR STUDENT ID IS $id \n AND PASSWORD WILL BE SAME AS USERID;
 // $rs=mysqli_query($con,"select * from course where course_id2='$inputFirstName' or course_name='$inputLastName'");
    $rs=mysqli_query($con,"SELECT * FROM `user` WHERE `first_name`='$inputFirstName' AND `number`='$inputStudentNumber' AND `email` = '$inputStudentEmail' AND `dob` = '$inputDateofbirth' ");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
exit;
}   
$idquerygen=mysqli_query($con,"SELECT `user_id` FROM  `user` WHERE LEFT(`user_id`,7) LIKE '%$id1%' ORDER BY `user_id` DESC LIMIT 1");
 if (mysqli_num_rows($idquerygen)>0)
{
    if ($idquerygenrow=mysqli_fetch_row($idquerygen)) 
    {
       $uid = $idquerygenrow['0'];
        $get_numbers = str_replace("U","",$uid);
        //$id_increase = $uid+1;
        $id_increase = $get_numbers+1;
        $get_string = str_pad($id_increase,7,0,STR_PAD_LEFT);
        $id = "U".$get_string;

      $password_gen = SHA1($id);


 mysqli_query($con,"INSERT INTO `user`(`first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `hash_password`, `photo`,`dob`, `number`, `email`, `type`, `status`, `session`,`createdby`, `createdtime`) VALUES ('$inputFirstName','$inputMiddleName','$inputLastName','$id','$id','$password_gen','$hash_pass','$inputuserphotoupload','$inputDateofbirth','$inputStudentNumber','$inputStudentEmail','$inputUserType','$status','$studentsessionyearrecord','$log','$date')") or die(mysqli_error());
 if($usersendmessagesettingstatus=="Active") {
$message= "YOUR SUCCESSFULLY REGISTERED AS $inputUserType\n YOUR USER ID IS $id \n AND PASSWORD WILL BE SAME AS USERID";

$fields = array(
            "message" => $message,
            "language" => "english",
            "route" => "v3",
          "numbers" => $inputStudentNumber,
        );
 
       $curl = curl_init();
 
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: WJqcz1MxPpUSm7ZXk92t43wCifs80BdhYNAnTjyHOLK6ElGIvggW7oJHmeaDMrztnbTcPjvdVhxwZi56",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
    }
        echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully');window.location='student_print.php?admission_id=$id' target='_blank'</script>";
//echo "window.location='<a href=\"student_print.php?admission_id=$id;\" target=\"_blank\"></a>'";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.location='student.php'</script>";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully');window.location='student_print.php?admission_id=$id' target='_blank'</script>";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.open('student_print.php?admission_id=$id');</script>";
    //echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.open('student_print.php?admission_id=$id','_blank','toolbar=yes, location=yes, directories=no. status=no, menubar=yes, scrollbars=yes, resizable=yes, copyhistory=yes, width=800,height=800');</script>";
   // echo "<meta http-equiv=\"refresh\" content=\"0; URL=student.php\">";
    }
   
}  
else
{   
        $id1="U".$dateyear."".$school_code."".$startno;

        $password_gen1=SHA1($id1); 
     
mysqli_query($con,"INSERT INTO `user`(`first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `hash_password`, `photo`, `dob`, `number`, `email`, `type`, `status`, `session`, `createdby`, `createdtime`) VALUES ('$inputFirstName','$inputMiddleName','$inputLastName','$id1','$id1','$password_gen1','$hash_pass','$inputuserphotoupload','$inputDateofbirth','$inputStudentNumber','$inputStudentEmail','$inputUserType','$status','$studentsessionyearrecord','$log','$date')") or die(mysqli_error());
if($usersendmessagesettingstatus=="Active") {
$message= "YOUR SUCCESSFULLY REGISTERED AS $inputUserType\n YOUR USER ID IS $id \n AND PASSWORD WILL BE SAME AS USERID";

$fields = array(
            "message" => $message,
            "language" => "english",
            "route" => "v3",
          "numbers" => $inputStudentNumber,
        );
 
       $curl = curl_init();
 
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: WJqcz1MxPpUSm7ZXk92t43wCifs80BdhYNAnTjyHOLK6ElGIvggW7oJHmeaDMrztnbTcPjvdVhxwZi56",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
    }

//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully');window.location='student_print.php?admission_id=$id'</script>";
echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id1\"');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.open('student_print.php?admission_id=$id');</script>";
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.open('student_print.php?admission_id=$id','_blank','toolbar=yes, location=yes, directories=no. status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400,height=400');</script>";
   // echo "<meta http-equiv=\"refresh\" content=\"0; URL=student.php\">";
}
	
}
  ?>
     <script type="text/javascript">
          let _validFileExtensions = [".jpg", ".jpeg"];    
function ValidateinputStudentPhotoInput(oInput) {
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
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    const fi = document.getElementById('inputStudentPhoto');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("inputStudentPhoto").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
      </script> 
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4">
                            <div class="card-body">
                                    <div align="center">
                                <a target="_blank"  href="User_SelfRegistration.php">User Self Registration Link</a>
                                </div>
                            </div>
                        </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add User </h3></div>
                                    <div class="card-body">
                                       
                                        <form action="" method="post"  onSubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                              <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" onselect="document.getElementById('$inputsessionyear');">
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
                                                        <label for="inputsessionyear"> Select Session</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your First Name" 
                                                        required="inputFirstName" />
                                                        <label for="inputFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputMiddleName" name="inputMiddleName" type="text" placeholder="Enter your Middle Name" 
                                                         />
                                                        <label for="inputMiddleName">Middle Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Last Name" 
                                                         />
                                                        <label for="inputLastName">Last Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentPhoto" name="inputStudentPhoto" type="file" onchange="ValidateinputStudentPhotoInput(this);" accept=".jpg,.jpeg"
                                                         />
                                                        <label for="inputStudentPhoto">User Photo</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="row mb-3">
                                               <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateofbirth" name="inputDateofbirth" type="date" placeholder="Enter your Date Of Birth" 
                                                        required="inputDateofbirth" />
                                                        <label for="inputDateofbirth">Date Of Birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentNumber" name="inputStudentNumber" type="text" placeholder="Enter your Student Number" 
                                                        required="inputStudentNumber" maxlength="10" />
                                                        <label for="inputStudentNumber">Mobile Number</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                          <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentEmail" name="inputStudentEmail" type="email" placeholder="Enter your Email Id" required="inputStudentEmail" />
                                                        <label for="inputStudentEmail">Email Id</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputUserType" id="inputUserType" required="inputUserType">
                                          <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                          <?php if($login_user_type=="superuser") { ?>
                                            <option  value="superuser">Super User</option>
                                        <?php } ?>
           													<option  value="admin">Admin</option>
                                                           <option value="user">User</option>
                                                    
                                                            
          										</select>
                                                        <label for="inputUserType">User Type</label>
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
                        <br>
                         <?php if($login_user_type=="superuser"||$login_user_type=="admin") { ?>
                        <div class="card mb-4">
                            <div class="card-body">
                               <a href="#"  data-bs-toggle="modal" data-bs-target="#BulkUserDelete"> Bulk User Delete
                                   </a>&#160;&#160;&#160;&#160;
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#BulkUserApprove"> Bulk User Apporve
                                   </a>
                            </div>
                        </div>
                    <?php } ?>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               User
                            </div>
                            <div class="card-body">
                              <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>User Id</th>
                                            <th>Login Id</th>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Email</th>
                                            <th>Date Of Birth</th>
                                            <th>User Type</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `user` WHERE `status`=\"ACTIVE\" AND `id` != '1' AND `id` != '9'");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['id'];
$created_user_id=$noticequeryresult['createdby'];
$updated_user_id=$noticequeryresult['updateby'];
                                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td>

                                            <?php echo $noticequeryresult['user_id']; ?></td>
                                            <td>
                                                <?php  if($login_user_type=="superuser") {echo  $noticequeryresult['login']; } else { echo str_pad(substr($noticequeryresult['login'], -1), strlen($noticequeryresult['login']), '*', STR_PAD_LEFT);} ?>
                                                </td>
                                            <td><?php echo $noticequeryresult['first_name'] ." ".$noticequeryresult['middle_name']  ." ". $noticequeryresult['last_name']; ?></td>
                                             
                                            <td><?php  if($login_user_type=="superuser") {echo  $noticequeryresult['number']; } else { echo str_pad(substr($noticequeryresult['number'], -3), strlen($noticequeryresult['number']), '*', STR_PAD_LEFT);} ?></td>
                                            <td><?php echo $noticequeryresult['email']; ?></td>
                                            <td><?php  echo date("d-m-Y", strtotime($noticequeryresult['dob'])); ?></td>
                                            <td><?php echo $noticequeryresult['type']; ?></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                             
                                             <td><a href="update_user.php?id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                             <td><a href="user_delete.php?id=<?php echo $id;?>"><span class='fas fa-trash'></span></a></td>
                                            
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>

                                       
                                    </tbody>
                                </table>
                            </div>
                                </div>
                                   </div>
                                      </div>

                        
                </main>
                <!---------------------  user Delete  Modal ---------------------------->
<div class="modal fade" id="BulkUserDelete" tabindex="-1" aria-labelledby="BulkUserDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">
 <?php 
 
if(isset($BulkDeleteuser))
{
    extract($_POST);
   date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
foreach($_POST['BulkUserDeleteid'] as $key => $value)
{

$BulkDeleteUserId=$_POST['BulkUserDeleteid'][$key];

$query="UPDATE `user` SET `status`='InActive',`disablereason`='$userdeletereason',`disableby`='$log',`disabletime`='$date' WHERE `id` ='$BulkDeleteUserId'";   
mysqli_query($con,$query);

   // echo "<script language='javascript'>alert('$BulkDeleteUserId')</script>";
       //echo "<script language='javascript'>alert('$userdeletereason')</script>";
       //echo "<script language='javascript'>alert('$date')</script>";
}
echo "<script language='javascript'>alert('User Delete Successfully');window.location='$Currentwebsiteurl'</script>";
}
?>
        <h5 class="modal-title" id="BulkUserDeleteLabel">User Delete </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST"  name="BulkDeleteUser">
                                           <div class='container'>
                                      <div class="row">
                                         <div class="col-sm-6">
                                          <div class="card">
      <div class="card-body">
                            <div class="form-floating mb-3 mb-md-0">            

                               Bulk User Delete <h2>User Name</h2>
  <input type='checkbox' id='checkdeleteuser'  value=''> Select All<br/>
  <select id='BulkUserDelete'name='BulkUserDeleteid[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `user`  WHERE `status` = \"Active\" AND `id`!='1' AND `id`!='9'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]." ".$rowcourse[2]." ".$rowcourse[3];?></;?></option>

<?php
}
?>
  </select>

   

</div>
</div>
</div>
</div>
<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
<div class="form-floating mb-3 mb-md-0">
      <input class="form-control" id="userdeletereason" name="userdeletereason" type="text" placeholder="Enter your User Delete Reason" required="userdeletereason" />
                                                        <label for="userdeletereason">User Delete Reason</label>
    
</div>
<div class="mt-4 mb-0" align="center" >
                             <input class="btn btn-success " type="submit" name="BulkDeleteuser"  id="BulkDeleteuser" value="User Delete" >                                  
                        </div>
</div>
</div>
</div>


</div>
</div>
    
     </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end user modal ------------------------------------------>






<!---------------------  user User Approve  Modal ---------------------------->
<div class="modal fade" id="BulkUserApprove" tabindex="-1" aria-labelledby="BulkUserDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">
 <?php 
 
if(isset($BulkApproveuser))
{
    extract($_POST);
   date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
foreach($_POST['BulkUserApproveid'] as $key => $value)
{

$BulkApproveUserId=$_POST['BulkUserApproveid'][$key];

$query="UPDATE `user` SET  `hash_password`='$hash_pass',`status`='$inputUserStatusType',`statusactivereason`='$userApproveReason',`createdby`='$log',`statusactiveby`='$log',`statusactivetime`='$date' WHERE `id` ='$BulkApproveUserId'";   
mysqli_query($con,$query);

   // echo "<script language='javascript'>alert('$BulkDeleteUserId')</script>";
       //echo "<script language='javascript'>alert('$userdeletereason')</script>";
       //echo "<script language='javascript'>alert('$date')</script>";
}
echo "<script language='javascript'>alert('User $inputUserStatusType Successfully');window.location='$Currentwebsiteurl'</script>";
}
?>
        <h5 class="modal-title" id="BulkUserApproveLabel">User  Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST"  name="BulkApproveUser">
                                           <div class='container'>
                                      <div class="row">
                                         <div class="col-sm-6">
                                          <div class="card">
      <div class="card-body">
                            <div class="form-floating mb-3 mb-md-0">            

                             <h2>  Bulk User Approve</h2> User Name<br>
                              <h6> User ID&#160;|&#160;User Name</h6>
  <input type='checkbox' id='checkuserapprove'  value=''> Select All<br/>

  <select id='BulkApproveUser'name='BulkUserApproveid[]' required size="15" multiple>

    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `user`  WHERE `status` = \"Pending\" AND `id`!='1' AND `id`!='9'");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[5];?> | <?php echo $rowcourse[1]." ".$rowcourse[2]." ".$rowcourse[3];?></;?></option>

<?php
}
?>
  </select>

   

</div>
</div>
</div>
</div>
<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
         <div class="row mb-3">
         <div class="col-md-5">
<div class="form-floating mb-3 mb-md-0">
     <select class="form-select" name="inputUserStatusType" id="inputUserStatusType" required="inputUserStatusType">
                                          <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                          
                                        <option  value="Active">Approve</option>
                                       <option  value="Cancel">Cancel</option>
                                                          
                                                    
                                                            
                                                </select>
                                                <label for="inputUserStatusType">User Status</label>
</div>
</div>   
      <div class="col-md-7">
<div class="form-floating mb-3 mb-md-0">
      <input class="form-control" id="userApproveReason" name="userApproveReason" type="text" placeholder="Enter your User Delete Reason" required="userApproveReason" />
                                                        <label for="userApproveReason">User Approve Reason</label>
    </div>
</div>
  </div>
<div class="mt-4 mb-0" align="center" >
                             <input class="btn btn-success " type="submit" name="BulkApproveuser"  id="BulkApproveuser" value="User Approve" >                                  
                        </div>
</div>
</div>
</div>


</div>
</div>
    
     </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end User Approve modal ------------------------------------------>






<?php
include("include/footer.php");
    ?>
    

<script type='text/javascript'>
 $(document).ready(function(){
   $("#checkuserapprove").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#BulkApproveUser option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#BulkApproveUser option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#BulkApproveUser").change(function(){
 
    // When total options equals to total selected option
    if($("#BulkApproveUser option").length == $("#BulkApproveUser option:selected").length) {
       $("#checkuserapprove").prop("checked", true);
    } else {
       $("#checkuserapprove").prop("checked", false);
    }
   });
 });
 </script>


<script type='text/javascript'>
 $(document).ready(function(){
   $("#checkdeleteuser").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#BulkUserDelete option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#BulkUserDelete option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#BulkUserDelete").change(function(){
 
    // When total options equals to total selected option
    if($("#BulkUserDelete option").length == $("#BulkUserDelete option:selected").length) {
       $("#checkdeleteuser").prop("checked", true);
    } else {
       $("#checkdeleteuser").prop("checked", false);
    }
   });
 });
 </script>
