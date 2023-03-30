<?php
session_start();
 
  @$_SESSION['alogin']; 
  error_reporting(1);
 include("include/config.php");
   // include("header_main.php")
// $login = $_SESSION["alogin"];
?>
<?php
extract($_POST);

//echo "<BR>";
if (!isset($_SESSION['alogin']))
{
  echo "<script>window.location='index.php'</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change password</title>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
       <link rel="shortcut icon" href="image/favicon.ico">

    <link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>


</head>
<body>
    <?php
  

date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
if (isset($_POST['save'])) 

{
    $login = $_SESSION["alogin"];
    
    $old1 = $_POST['old'];
    $old = SHA1($old1);
    $new1 = $_POST['new'];
    $new = SHA1($new);
    $conpass1 = $_POST['conpass'];
    $conpass = SHA1($conpass1);
$select = "SELECT `password`,`hash_password` FROM `user` WHERE `login` = '$login'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='changepassword.php'</script>");

$oldp = $data['password'];
$roldp = $data['hash_password'];
   if (($oldp==$old) || ($roldp==$old)) 
    {
        if ($new == $conpass) 
        {
            $update = "UPDATE `user` SET `password` = '$new',`pass` = '$new1',`oldpass` = '$old1',`change_pass_time` = '$date' WHERE `login` = '$login' and `password` = '$old' or `login` = '$login' and `hash_password` = '$old' ";
            $query1 = mysqli_query($con,$update);
              if($query1)
            {
               echo "<script language='javascript'>alert('your password change succesfully');window.location='signout.php'</script>";  
            }
            else
             {
               echo "<script language='javascript'>alert('Error Please Contact To Administrator');window.location='changepassword.php'</script>";
            }
            }
            else
            {

            echo"<script language='javascript'>alert('your New and Confirm password do not match');window.location='changepassword.php'</script>";  
            }
        
    }
  else
    {
        echo "<script language='javascript'>alert('your Current password is wrong');window.location='changepassword.php'</script>";
    }
 }
?>

   
      
    <script type="text/javascript" language="JavaScript">
        function right(e) {
            if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2))
                return false;
            else if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3)) {
                alert("Sorry, you do not have permission to right click.");
                return false;
            }
            return true;
        }
        document.onmousedown = right;
        document.onmouseup = right;
        if (document.layers) window.captureEvents(Event.MOUSEDOWN);
        if (document.layers) window.captureEvents(Event.MOUSEUP);
        window.onmousedown = right;
        window.onmouseup = right;

    </script>

    <script type="text/javascript">
        if (document.layers) {
            //Capture the MouseDown event.
            document.captureEvents(Event.MOUSEDOWN);

            //Disable the OnMouseDown event handler.
            document.onmousedown = function () {
                alert("Sorry, you do not have permission to right click.");
                return false;
            };
        }
        else {
            //Disable the OnMouseUp event handler.
            document.onmouseup = function (e) {
                if (e != null && e.type == "mouseup") {
                    //Check the Mouse Button which is clicked.
                    if (e.which == 2 || e.which == 3) {
                        //If the Button is middle or right then disable.
                        alert("Sorry, you do not have permission to right click.");
                        return false;
                    }
                }
            };
        }

        //Disable the Context Menu event.
        document.oncontextmenu = function () {
            alert("Sorry, you do not have permission to right click.");
            return false;
        };
    </script>
<script type="text/jscript" language="javascript">
        function shouldCancelbackspace(e) {
            var key;
            if (e) {
                key = e.which ? e.which : e.keyCode;
                if (key == null || (key != 8 && key != 13)) { // return when the key is not backspace key.
                    return false;
                }
            } else {
                return false;
            }


            if (e.srcElement) { // in IE
                tag = e.srcElement.tagName.toUpperCase();
                type = e.srcElement.type;
                readOnly = e.srcElement.readOnly;
                if (type == null) { // Type is null means the mouse focus on a non-form field. disable backspace button
                    return true;
                } else {
                    type = e.srcElement.type.toUpperCase();
                }


            } else { // in FF
                tag = e.target.nodeName.toUpperCase();
                type = (e.target.type) ? e.target.type.toUpperCase() : "";
            }


            // we don't want to cancel the keypress (ever) if we are in an input/text area
            if (tag == 'INPUT' || type == 'TEXT' || type == 'TEXTAREA') {
                if (readOnly == true) // if the field has been dsabled, disbale the back space button
                    return true;
                if (((tag == 'INPUT' && type == 'RADIO') || (tag == 'INPUT' && type == 'CHECKBOX'))
        && (key == 8 || key == 13)) {
                    return true; // the mouse is on the radio button/checkbox, disbale the backspace button
                }
                return false;
            }


            // if we are not in one of the above things, then we want to cancel (true) if backspace
            return (key == 8 || key == 13);
        }


        // check the browser type
        function whichBrs() {
            var agt = navigator.userAgent.toLowerCase();
            if (agt.indexOf("opera") != -1) return 'Opera';
            if (agt.indexOf("staroffice") != -1) return 'Star Office';
            if (agt.indexOf("webtv") != -1) return 'WebTV';
            if (agt.indexOf("beonex") != -1) return 'Beonex';
            if (agt.indexOf("chimera") != -1) return 'Chimera';
            if (agt.indexOf("netpositive") != -1) return 'NetPositive';
            if (agt.indexOf("phoenix") != -1) return 'Phoenix';
            if (agt.indexOf("firefox") != -1) return 'Firefox';
            if (agt.indexOf("safari") != -1) return 'Safari';
            if (agt.indexOf("skipstone") != -1) return 'SkipStone';
            if (agt.indexOf("msie") != -1) return 'Internet Explorer';
            if (agt.indexOf("netscape") != -1) return 'Netscape';
            if (agt.indexOf("mozilla/5.0") != -1) return 'Mozilla';


            if (agt.indexOf('\/') != -1) {
                if (agt.substr(0, agt.indexOf('\/')) != 'mozilla') {
                    return navigator.userAgent.substr(0, agt.indexOf('\/'));
                } else
                    return 'Netscape';
            } else if (agt.indexOf(' ') != -1)
                return navigator.userAgent.substr(0, agt.indexOf(' '));
            else
                return navigator.userAgent;
        }


        // Global events (every key press)


        var browser = whichBrs();
        if (browser == 'Internet Explorer') {
            document.onkeydown = function () { return !shouldCancelbackspace(event); }
        } else if (browser == 'Firefox') {
            document.onkeypress = function (e) { return !shouldCancelbackspace(e); }
        }

    </script>
     <script type="text/javascript" src="css/jquery.min.js"></script>
     <script type="text/javascript" src="css/bootstrap.min.js"></script>
    <script type="text/javascript">
        function disableBackButton() {
            window.history.forward();
        }
        setTimeout("disableBackButton()", 0);
    </script>
    <script language="JavaScript" type="text/javascript">
        var message = "function disabled";
        function rtclickcheck(keyp) {
            if (navigator.appName == "Netscape" && keyp.which == 3) {
                alert("Sorry, you do not have permission to right click.");
                return false;
            }
            if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
                alert("Sorry, you do not have permission to right click.");

                return false;
            }
        }
        document.onmousedown = rtclickcheck;
    </script>
       <script language="javascript">
function check()
{

   if(document.form.old.value=="")
  {
    alert("Plese Enter Current Password");
  document.form.old.focus();
  return false;
  }
  if(document.form.new.value=="")
  {
    alert("Plese Enter New Password");
  document.form.new.focus();
  return false;
  }
  if(document.form.conpass.value=="")
  {
    alert("Plese Enter Confirm Password");
  document.form.conpass.focus();
  return false;
  }
  if(document.form.conpass.value!=document.form.new.value)
  {
    alert("your New and Confirm password do not match");
  document.form.conpass.focus();
  return false;
  }
  if(document.form.old.value==document.form.conpass.value)
  {
    alert("your Current password & Old Password Should Not be same");
  document.form.conpass.focus();
  return false;
  }

  return true;
}
</script>
         <br>

    <div class="bg1" align="center">

<div class="col-md-3"></div>

<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:200px;">
     <br>
     <h4 align="left" style="font-family:'type'; color:#f7260f" ><b>Note:
       
        <b>
            <?php   //echo $login; ?>
        <br>&emsp;&emsp;*Password should not be same as loginid
        <br>&emsp;&emsp;*Password should minimum length 8 Character
        <br>&emsp;&emsp;*Password should alpha numeric
        <br>&emsp;&emsp;*Password should one character
    </b></h4>
<h2 align="center" style="font-family:'type'; color:#000066">Change Password</h2>
<div style="font-size:23px">


<form  method="post" action="" align="center" name="form" onsubmit="return check();" >

<br>
<label>Current password:

<input class="form-control" type="password" autocomplete="off"  name="old"  id="old"></label>
<br>
<label> New Password:

<input class="form-control" type="password" autocomplete="off" minlength="8" name="new" id="new" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
title="enter 8 digit password and Must contain at least one numbe and one uppercase and one lowercase letter"></label>
<br>
<label>Confirm Password:

<input class="form-control" type="password" autocomplete="off" minlength="8" name="conpass" id="conpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
title="enter 8 digit password and Must contain at least one number and one uppercase and one lowercase letter"></label>
<br>
<br><br>
<input type="submit"  name = "save" value="change password" />
<br>
<br>
</form>
</body>
</html>
