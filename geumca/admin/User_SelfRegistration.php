<?php

    session_start();
    include("include/config.php");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="GEU-Department Of Computer Applications">
<link rel="shortcut icon" href="image/favicon.ico">
    <title>GEU-Department Of Computer Applications</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-12">
                <!-- Nested Row within Card Body -->

                <div class="row">

                    <div class="col-lg-12">
                        </div>

                    
                        <?php 
                        $congrautionmsg="";
                        $schoolquerycode=mysqli_query($con,"SELECT * FROM `school`");
$schoolquerycoderesult=mysqli_fetch_assoc($schoolquerycode);
$school_code=$schoolquerycoderesult['school_code'];
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `status` ='Active'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];
 $dateyear=$studentsessionqueryrow1['fyear'];
 extract($_POST);
  if(isset($Register))
{


       date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Pending";
 //$dateyear=date('y');
 $startno="001";
 $id1="U".$dateyear."".$school_code;
 

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
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='User_SelfRegistration.php'</script>";
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


 mysqli_query($con,"INSERT INTO `user`(`first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `photo`,`dob`, `number`, `email`, `type`, `status`, `session`, `createdtime`) VALUES ('$inputFirstName','$inputMiddleName','$inputLastName','$id','$id','$password_gen','$inputuserphotoupload','$inputDateofbirth','$inputStudentNumber','$inputStudentEmail','user','$status','$studentsessionyearrecord','$date')") or die(mysqli_error());
 //echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id\"');window.location='User_SelfRegistration.php'</script>";
 
    $congrautionmsg=nl2br("$inputFirstName $inputMiddleName $inputLastName Record Added Successfully\r\nYour User id is:- $id\r\nPassword Will be same As User ID\r\n Contact The Admin To Activate Your ID");

    }
   
}  
else
{   
        $id1="U".$dateyear."".$school_code."".$startno;

        $password_gen1=SHA1($id1); 
     
mysqli_query($con,"INSERT INTO `user`(`first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `photo`, `dob`, `number`, `email`, `type`, `status`, `session`, `createdtime`) VALUES ('$inputFirstName','$inputMiddleName','$inputLastName','$id1','$id1','$password_gen1','$inputuserphotoupload','$inputDateofbirth','$inputStudentNumber','$inputStudentEmail','user','$status','$studentsessionyearrecord','$date')") or die(mysqli_error());


 $congrautionmsg=nl2br("$inputFirstName $inputMiddleName $inputLastName Record Added Successfully\r\n User id is:- $id1\r\nPassword Will be same As User ID\r\n Contact The Admin To Activate Your ID");
//echo "<script language='javascript'>alert(' \"$inputFirstName \" Added Successfully & id is \"$id1\"');window.location='User_SelfRegistration.php'</script>";

}
}
 ?>
 <div class="text-center">
 <h5 align="text-center" style="font-family:'type'; color:#f7260f" ><b>
 <?php echo $congrautionmsg;?>
  </b></h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form  action="User_SelfRegistration.php" method="POST" onSubmit="return check();" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="inputFirstName" id="inputFirstName" required 
                                            placeholder="First Name">
                                             <label>First Name</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="inputMiddleName" id="inputMiddleName"
                                            placeholder="Middle Name">
                                            <label>Middle Name</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="inputLastName" id="inputLastName"
                                            placeholder="Last Name">
                                            <label>Last Name</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-7 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" id="inputStudentEmail" name="inputStudentEmail" required 
                                        placeholder="Email Address">
                                        <label>Email ID</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">

                                    <input type="file" class="form-control form-control" id="inputStudentPhoto"
                                        placeholder="Profile Photo" name="inputStudentPhoto"  onchange="ValidateinputStudentPhotoInput(this);" accept=".jpg,.jpeg">
                                         <label>Profile Photo</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="inputStudentNumber"  required 
                                            id="inputStudentNumber" placeholder="Mobile Number">
                                            <label>Mobile Number</label>
                                    </div>
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" name="inputDateofbirth" 
                                            id="inputDateofbirth" required placeholder="Date Of Birth">
                                            <label>Date Of Birth</label>
                                    </div>
                                </div>
                               
                                    <input  class="btn btn-primary btn-user btn-block" type="submit" name="Register" id="Register" value="Register Account">
                                    
                                
                                
                            </form>
                            <hr>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
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

</body>

</html>