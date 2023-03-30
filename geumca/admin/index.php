<?php
/*$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . 
                "://" . $_SERVER['HTTP_HOST'] . 
                $_SERVER['REQUEST_URI'];
    echo $base_url;
    $meta_tags = get_meta_tags($base_url);
    echo $meta_tags['_token'];*/
session_start();
include("include/config.php");


function generateRandomString($length=6)
{
    return substr(str_shuffle(str_repeat($x='0123456789',ceil($length/strlen($x)))),1,$length);
}
 $captchasettingshow=generateRandomString();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin-Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="arosXOI6xQSbe7eLsFWBWfY21u1P0JqIFIJaqcvE">
    <link rel="stylesheet"  type="text/css" href="css/all.css"/>
  <link rel="shortcut icon" href="image/favicon.ico">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="https://www.bootstrapdash.com/demo/star-laravel-free/template/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="https://www.bootstrapdash.com/demo/star-laravel-free/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

  <!-- plugin css -->
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <!-- end plugin css -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->
  <script type="text/javascript">
        function myFunction()
{
  var x = document.getElementById("pass");
  if (x.type === "password")
  {
    x.type = "text";
  } 
  else 
  {
    x.type = "password";
  }
}
  </script>
    
      <script language="javascript">
function check()
{

 if(document.form.loginid.value=="")
  {
    alert("Plese Enter Login Id");
  document.form.loginid.focus();
  return false;
  }
   if(document.form.pass.value=="")
  {
    alert("Plese Enter Password");
  document.form.pass.focus();
  return false;
  }
  if(document.form.InputCaptchaValue.value=="")
  {
    alert("Plese Enter Captcha");
  document.form.InputCaptchaValue.focus();
  return false;
  }
  if(document.form.ShowCaptchaValue.value=="")
  {
    alert("Plese Enter Captcha");
  document.form.ShowCaptchaValue.focus();
  return false;
  }
  if(document.form.ShowCaptchaValue.value!=document.form.InputCaptchaValue.value)
  {
    alert("Captcha does not match Try Again");
  document.form.InputCaptchaValue.focus();
  return false;
  }
  return true;
}
</script>

  </head>

<?php
$sql1=mysqli_query($con,"SELECT `id`,`wrong_pass_time` FROM `user`  WHERE `wrong_pass_count`=\"3\" ");
                                        while($result1=mysqli_fetch_assoc($sql1))
    {
     $expiretime1= date("d-m-Y");
     $wrong_pass_timing1 = $result1['wrong_pass_time'];
     $activitytime1= date('d-m-Y',strtotime('+1 days',strtotime($wrong_pass_timing1)));
     $studentdelete1= date('d-m-Y',strtotime('-1 days',strtotime($expiretime1)));
     if($expiretime1>=$activitytime1)
     {
     $updatewrongquery1= "UPDATE `user` SET `wrong_pass_count`='0',`wrong_pass_time`='',`wrong_pass_reset_type`='auto' WHERE `wrong_pass_time`='$studentdelete1'";
       mysqli_query($con,$updatewrongquery1);
     }

    } 

$captchasetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"captcha\" "); 
$captchasettingres=mysqli_fetch_assoc($captchasetting);
$popupstatus=$captchasettingres['popupstatus'];
?>
  <!---------------------  View User  Modal ---------------------------->
<div class="modal fade" id="ShowUserDetail" tabindex="-1" aria-labelledby="ShowUserDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="ShowUserDetailLabel">User Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        
      <div class="modal-body">

Name:- Paritosh Bisht    
<br>   
Mail:- <a href="mailto:Paritoshbisht05@gmail.com">Paritoshbisht05@gmail.com</a>
<br>
Mobile:-<a href="tel:7302020015">7302020015</a> 
   <br>

<div class="icon-bar" align="center">
    Follow Us On
    <br>
 <a  href="https://www.facebook.com/paritoshbisht19/" target="_blank"><i class="fab fa-facebook-square"></i></a>&nbsp;
 <a  href="https://www.instagram.com/paritoshbisht_19/"  target="_blank"><i class="fab fa-instagram"></i></a>&nbsp;
 <a  href="https://twitter.com/ParitoshBisht"  target="_blank"><i class="fab fa-twitter"></i></a>&nbsp;
 <a  href="https://www.linkedin.com/in/paritoshbisht/"  target="_blank"><i class="fab fa-linkedin"></i></a>
 </div>      
        
      </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end User modal ------------------------------------------> 
  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url(image/login_1.jpg); background-size: cover;">
  <!--<div id="login-box-inner" style="background-color: rgba(128, 128, 128, 0.35)">-->
  <div class="row w-100 mx-auto" >
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper" style="background-color: rgba(128, 128, 128, 0.35)">
        <form  name="form" method="POST" action="dashboard.php"  onSubmit="return check();" >
          <div class="form-group">
          <!--  <label class="label">Username</label>-->
            <div class="input-group">
              <input type="text" class="form-control" name="loginid" id="loginid" placeholder="Username" autocomplete="off">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <!--<label class="label">Password</label>-->
            <div class="input-group">
              <input type="password" name="pass" id="pass" class="form-control" placeholder="*********" autocomplete="off" onpaste="return false;" ondrop="return false;">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-key"></i>
                </span>
              </div>
            </div>
          </div>
          <?php if($popupstatus=="Active") { ?>
       <div class="row">
        <div class="form-group col-6">
          <!--<label>Enter Captcha</label>-->
          <input type="text" class="form-control" name="InputCaptchaValue" id="InputCaptchaValue" size="8" placeholder="Enter Captcha" autocomplete="off" pattern=".{6,}" maxlength="6" onpaste="return false;" ondrop="return false;">
        </div>
        <div class="form-group col-4">
        
              <input type="text" name="ShowCaptchaValue" id="ShowCaptchaValue" value="<?php echo $captchasettingshow;?>" size="3"  style="color: #f6f4f4; background-color: #5b5a5a; font-size:18px; font-family:&#39;Arial&#39;;"   readonly oncopy="return false;" onpaste="return false;" ondrop="return false;">
              </div>
 <div class="form-group col-2">
          <span class="fas fa-sync-alt" onclick="window.location.reload();" style="color:lightgreen; cursor:pointer;"></span>
            </div> 
      </div>
<?php } ?>
          <div class="form-group">
              <input type="checkbox"  onclick="myFunction()"><span style="font-family:'type'; color:black;">&emsp;Show Password</span>
              <br>
           <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Login"/>
          </div>
          <div class="form-group d-flex justify-content-between">
            
            <a href="forget_password.php" class="text-small forgot-password text-blue">Forgot Password?</a>
            <a href="forget_login.php" class="text-small forgot-password text-blue">Forgot Login Id?</a>
          </div>
        
        </form>
      </div>
      <br>
      <p class="footer-text text-center" data-bs-toggle="modal" data-bs-target="#ShowUserDetail">copyright © <?php echo date("Y"); ?> Paritosh Bisht. All rights reserved.</p>
    </div>
  </div>
</div>

    </div>
  </div>

    <!-- base js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    <script src="js/app.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    </body>
</html>