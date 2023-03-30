<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
   extract($_POST);
    extract($_REQUEST);
  date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
$year=date("Y");
$month=date("m");
$sessionextract=mysqli_query($con,"SELECT * FROM `notice` ORDER BY `circular_id` DESC LIMIT 1;");
$sessionextractresult=mysqli_fetch_assoc($sessionextract);
$current_year_record=$sessionextractresult['circularno'];
$current_month_record=$sessionextractresult['noticemonth'];

//echo "<br>"; 
 if($month!=$current_month_record)
        {
            $id="/01";
        }
        else
        {
                $uid  = substr($current_year_record, -3);
$get_numbers = str_replace("/","",$uid);
$id_increase = $get_numbers+1;
 $get_string = str_pad($id_increase,2,0,STR_PAD_LEFT);
        $id = "/".$get_string;

        }

  if(isset($addnotice))
{

	    $rnotice=mysqli_query($con,"SELECT * FROM `notice` WHERE `circularno`='$inputNoticeNumber' AND `noticeyear` ='$year' AND `status` = '$status'");
if (mysqli_num_rows($rnotice)>0)
{
    echo "<script language='javascript'>alert('Notice \"$inputNoticeNumber\" Already in used');window.location='$Currentwebsiteurl'</script>";
        
exit;
} 
$extension  = pathinfo($_FILES["inputNoticeFileUpload"]["name"], PATHINFO_EXTENSION );
    if($extension)
    {
     $profilephotouploadname="Notice_".date('dmY')."".time(); 
    $studentphotoupload = $_FILES['inputNoticeFileUpload']['name'];
    $tmpphotoname = $_FILES['inputNoticeFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = 'upload/notice/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);   
    }
    else
    {
       $basename=""; 
    }

        mysqli_query($con,"INSERT INTO `notice`(`circularno`, `noticeyear`, `noticemonth`, `noticesession`, `noticetype`, `subject`, `file`, `message`, `datefrom`, `dateto`, `status`, `createdby`, `createdtime`) VALUES ('$inputNoticeNumber','$year','$month','$activesession_record','$inputNoticeType','$inputNoticeSubject','$basename','$inputNoticeMessage','$inputDateFrom','$inputDateTo','$status','$log','$date')") or die(mysqli_error("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='$Currentwebsiteurl'</script>"));

    echo "<script language='javascript'>alert('Notice \"$inputNoticeNumber\" Added Successfully');window.location='$Currentwebsiteurl'</script>";
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
    const fi = document.getElementById('inputNoticeFileUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("inputNoticeFileUpload").value=null; 
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Notice</h3></div>

                                    <div class="card-body">
                                        <form action="<?php echo $Currentwebsiteurl;?>" method="POST"  onSubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                             
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNoticeNumber" name="inputNoticeNumber" type="text" placeholder="Enter your Notice Number" required="inputNoticeNumber" value="<?php echo $school_short_name_record; ?>/CA/<?php echo date('m'); ?><?php echo $id; ?>" readonly />
                                                        <label for="inputNoticeNumber">Notice Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><?php $noticedatefromdate= date('Y-m-d');?>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateFrom" name="inputDateFrom" type="date" value="<?php echo date('Y-m-d');?>" 
                                                        required="inputDateFrom" />
                                                        <label for="inputDateFrom">Date From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><?php  $noticedatetodate= date('Y-m-d',strtotime('+7 days',strtotime($noticedatefromdate))); ?>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateTo" name="inputDateTo" type="date"   
                                                        required="inputDateTo" value="<?php echo $noticedatetodate; ?>" />
                                                        <label for="inputDateTo">Date To</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                        
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      
                                                        <input class="form-control" id="inputNoticeSubject" name="inputNoticeSubject" type="text" required/>
                                                        <label for="inputNoticeSubject">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNoticeFileUpload" name="inputNoticeFileUpload" type="file" onchange="ValidateSingleInput(this);" accept=".jpg,.jpeg,.pdf"/>
                                                        <label for="inputNoticeFileUpload">File </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputNoticeType" id="inputNoticeType" required="inputNoticeType">
                                          <option selected="selected" value=""disabled selected>-- Select an option --</option>
           													<option  value="Admin">Admin</option>
                                                            <option  value="Student">Student</option>
                                                            <option  value="Both" selected>Both</option>
                                                            
          										</select>
                                                        <label for="inputNoticeType">Notice For</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                               <div class="row mb-3">
                                                <div class="col-md-12">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                    <h6>Message</h6>
                                                    <textarea  class="form-control" name="inputNoticeMessage" id="inputNoticeMessage" cols="120" rows="6" style="width: 100%; height: 150px;"></textarea>
                                                <!--<label for="inputNoticeMessage">Message</label>-->

                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="addnotice" id="addnotice" Value="Add Notice" />                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
    
                            </div>
                           
                        </div>
                        <br>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Notice Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Notice Number</th>
                                            <th>Notice For</th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Subject</th>
                                            <!--<th>File</th>-->
                                            <th>Notice By</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `notice` WHERE `status`=\"ACTIVE\" ORDER BY `notice`.`circular_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['circular_id'];
$created_user_id=$noticequeryresult['createdby'];

 $user_name_result=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $user_name_resultrow12=mysqli_fetch_array($user_name_result);
                                                          $user_login_name=$user_name_resultrow12['first_name']." ".$user_name_resultrow12['middle_name']." ".$user_name_resultrow12['last_name'];
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['circularno']; ?></td>
                                            <td><?php echo $noticequeryresult['noticetype']; ?></td>
                                            <td><?php  echo date("d-m-Y", strtotime($noticequeryresult['datefrom'])); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($noticequeryresult['dateto'])); ?></td>
                                            <td><a href="circular_view.php?circular_id=<?php echo urlencode(base64_encode($id)); ?>" target="_blank"><?php echo $noticequeryresult['subject']; ?></a></td>
                                           <!-- <td>
                                                <?php if ($noticequeryresult['file']) { ?> <a href="#" onclick="window.open('upload/notice/<?php echo $noticequeryresult['file']; ?>','name','width=800,height=800');" ><?php echo $noticequeryresult['subject']; ?></a><?php } else { ?> <?php } ?></td>-->
                                            <td><?php echo $user_login_name; ?></td>
                                            <td>
                                              <a href="notice_delete.php?circular_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a>
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
 <?php
include("include/footer.php");
    ?>