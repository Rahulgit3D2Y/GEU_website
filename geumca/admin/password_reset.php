<?php

include("include/header.php");
require("permission_check.php");
?>


<?php
$login ="";
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
$loge = $_SESSION["alogin"];
//$type = "Single";
//extract($_POST);
if(isset($search))
{
    $logintype = $_POST['inputLoginType'];

    if($logintype=="Admin")
    {

$login = $_POST['inputFirstName'];

$select = "SELECT `login`,`status` FROM `user` WHERE `login` = '$login' AND `status` = \"Active\" AND `login`!='superuser'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Login Id is Not Correct');window.location='$Currentwebsiteurl'</script>");

$ologin = $data['login'];

 }
    elseif($logintype=="Student")
    {
 $login = $_POST['inputFirstName'];
 //   $date = $_POST['dob'];
   // $number = $_POST['number'];
$select = "SELECT `admission_id`,`status`,`login_status` FROM `student` WHERE `admission_id` = '$login' AND `status`!= \"InActive\"";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Admission Number is Not Correct');window.location='$Currentwebsiteurl'</script>");
//$olddob = $data['dob'];
//$num= $data['phone'];
$ologin = $data['admission_id'];
$loginstatus = $data['login_status'];
$studentcurrentstatus =$data['status'];
if($studentcurrentstatus == "Withdrawal")
{
   echo "<script language='javascript'>alert('Admission Is Withdrawal');window.location='$Currentwebsiteurl'</script>"; 
   exit(); 
}

    }
else
{
    echo "<script language='javascript'>alert('Select Login Type');window.location='$Currentwebsiteurl'</script>";
}
}
if(isset($submit))
{
    $logintype = $_POST['inputLoginType'];

    if($logintype=="Admin")
    {

$login = $_POST['inputFirstName'];

$select = "SELECT `login`,`status` FROM `user` WHERE `login` = '$login' AND `status` = \"Active\" AND `login`!='superuser'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Login Id is Not Correct');window.location='$Currentwebsiteurl'</script>");

$ologin = $data['login'];


    if ($ologin==$login) 
    {
             $resetpassword = SHA1($ologin);
            $update = "UPDATE `user` SET `password` = '$resetpassword',`pass`='$ologin',`password_reset_by`='$log',`password_reset_time`='$date',`wrong_pass_count`='0',`wrong_pass_time`='' where login = '$login'";
            $query1 = mysqli_query($con,$update);
            if($query1)
            {
               echo "<script language='javascript'>alert('your password Updated as same login Id');window.location='$Currentwebsiteurl'</script>";  
            }
            else
             {
               echo "<script language='javascript'>alert('error contact to administrator');window.location='$Currentwebsiteurl'</script>";
            }
            
    }
  else
    {
        echo "<script language='javascript'>alert('Login Id is Not Correct');window.location='$Currentwebsiteurl'</script>";
    }
    

 
    }
    elseif($logintype=="Student")
    {
 $login = $_POST['inputFirstName'];
 //   $date = $_POST['dob'];
   // $number = $_POST['number'];
$select = "SELECT `admission_id`,`status`,`login_status` FROM `student` WHERE `admission_id` = '$login' AND `status`!= \"InActive\"";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Admission Number is Not Correct');window.location='$Currentwebsiteurl'</script>");
//$olddob = $data['dob'];
//$num= $data['phone'];
$ologin = $data['admission_id'];
$loginstatus = $data['login_status'];
$studentcurrentstatus =$data['status'];
if($studentcurrentstatus == "Withdrawal")
{
   echo "<script language='javascript'>alert('Admission Is Withdrawal');window.location='$Currentwebsiteurl'</script>"; 
   exit(); 
}
if ($loginstatus=="Active")
 {
   
    if ($ologin==$login) 
    {
             $resetpassword = SHA1($ologin);
            $update = "UPDATE `student` SET `password` = '$resetpassword',`pass`='$ologin',`password_reset_by`='$log',`password_reset_time`='$date',`wrong_pass_count`='0',`wrong_pass_time`='' WHERE `admission_id` = '$login'";
            $query1 = mysqli_query($con,$update);
            if($query1)
            {
               echo "<script language='javascript'>alert('your password Updated as same admission Number');window.location='$Currentwebsiteurl'</script>";  
            }
            else
             {
               echo "<script language='javascript'>alert('error contact to administrator');window.location='$Currentwebsiteurl'</script>";
            }
            
    }
  else
    {
        echo "<script language='javascript'>alert('Admission Number is Not Correct');window.location='$Currentwebsiteurl'</script>";
    }
    
 }
 else
    {
       echo "<script language='javascript'>alert('Password is Not Generated');window.location='$Currentwebsiteurl'</script>"; 
    }
    }
else
{
    echo "<script language='javascript'>alert('Select Login Type');window.location='$Currentwebsiteurl'</script>";
}
}
?>
  <?php 
if(isset($button))
{
    $logintype = $_POST['inputLoginType'];
    if($logintype=="Admin")
    {
         $login = $_POST['inputFirstName'];
 //   $date = $_POST['dob'];
   // $number = $_POST['number'];
$select = "SELECT * FROM `user` WHERE  `status` = 'Active'  AND `login` = '$login' AND `login`!='superuser'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Login Id is not Correct');window.location='$Currentwebsiteurl'</script>");

    }
    elseif($logintype=="Student")
    {
    $login = $_POST['inputFirstName'];
 //   $date = $_POST['dob'];
   // $number = $_POST['number'];
$select = "SELECT * FROM `student`,`course_detail` WHERE student.`status`!= 'InActive' AND student.`course_id` = course_detail.`course_id2` AND student.`admission_id` = '$login'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Admission Number is Not Correct');window.location='$Currentwebsiteurl'</script>");
$studentcurrentstatus1 = $data['status'];

}
else
{
    echo "<script language='javascript'>alert('Select Login Type');window.location='$Currentwebsiteurl'</script>";
}
}
?>

<!---------------------  UserPasswordResetPhoto  Modal ---------------------------->
<div class="modal fade" id="UserPasswordResetPhoto" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddNotesLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                   
      <div class="modal-body">
              
         
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addmenu" id="addmenu" value="Add" >
    
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end UserPasswordResetPhoto modal ------------------------------------------>
         
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-2">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Reset</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                         <select class="form-select" name="inputLoginType" id="inputLoginType" required="inputLoginType">
                                          <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                          <option  value="Admin" <?php
       if($logintype=="Admin")
       {
        echo "selected";
       }
       ?>>Admin</option>
 <!--<option  value="Student" <?php
       if($logintype=="Student")
       {
        echo "selected";
       }
       ?>>Student</option>-->
                                                           
                                                            
                                                            
                                                </select>
                                                        <label for="inputLoginType">User Type</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input align="center" class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter Login Id" required="inputFirstName"  value="<?php echo $login; ?>" />
                                                        <label for="inputFirstName">Student ID / Login ID</label>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="btn btn-success "type="submit" name="search" id="search" Value="search"/>
                                                    </div>
                                                </div>

                                                
                                                    <?php if($login) { ?>
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success" type="submit" name="submit" id="submit" Value="Reset"/>
                                                <!--<input class="btn btn-info "type="submit" name="show" id="show" Value="Show"/>-->
                                                <input type="submit" value="Show Detail" name="button" id= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserPasswordResetPhoto">
 
                                                                                             </div>
                                                                                         <?php } ?>
                                        </form>
                                    </div>
 <?php 
if(isset($button))
{
    $logintype = $_POST['inputLoginType'];
    if($logintype=="Admin")
    {
        ?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
         <?php 
        $imagepath= $data['photo'];
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
     
      <img src="<?php echo $imageencodesrc;?>" class="rounded" alt="<?php echo $data['first_name'] ." ".$data['middle_name']  ." ". $data['last_name']; ?>" width="180" height="180">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['first_name'] ." ".$data['middle_name']  ." ". $data['last_name']; ?></h5>
        <p class="card-text"><b>User Id:-</b> <?php echo $data['user_id']; ?> </p>
         <p class="card-text"><b>dob:-</b> <?php echo date("d-m-Y", strtotime($data['dob'])); ?> </p>
          <p class="card-text"><b>Number:-</b> <?php echo $data['number']; ?> </p>
          <p class="card-text"><b>Email:-</b> <?php echo $data['email']; ?> </p>
          


<?php
}
 elseif($logintype=="Student")
{
?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
          <?php 
        $imagepath= $data['photo'];
        if($imagepath)
        {
                $imageencode = "upload/student/$imagepath";
        }
        else
        {
          $imageencode = "upload/student/show.png";
        }
            // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data: '.mime_content_type($imageencode).';base64,'.$imageData;
         ?>
         
      <img src="<?php echo $imageencodesrc;?>" class="rounded" alt="<?php echo $data['first_name'] ." ".$data['middle_name']  ." ". $data['last_name']; ?>" height="180" width="180">
     
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['first_name'] ." ".$data['middle_name']  ." ". $data['last_name']; ?></h5>
        <p class="card-text"><b>Father Name:-</b> <?php echo $data['father_name']; ?> </p>
         <p class="card-text"><b>Course:-</b> <?php echo $data['course_name']; ?> </p>
          <p class="card-text"><b>Number:-</b> <?php echo $data['number']; ?> </p>
          <p class="card-text"><b>Email:-</b> <?php echo $data['email']; ?> </p>
          <p class="card-text"><b>Password Genrated:-</b> <?php if($data['login_status']=="Active"){?> Yes <?php } else { ?> No <?php } ?> </p>
        
      </div>
    </div>
  </div>
</div>
 

<?php
}
else
{
    echo "<script language='javascript'>alert('Select Login Type');window.location='$Currentwebsiteurl'</script>";
}
}
?>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </main>


                 <?php
                 
include("include/footer.php");
?>