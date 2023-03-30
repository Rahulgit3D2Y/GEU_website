<?php
session_start();
?>

  
<!DOCTYPE html>
<html>
<head>
    <title>Forget password</title>
    <link rel="icon" type="image/icon" href="image/favicon.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
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
if(document.form.login.value=="")
  {
    alert("Plese Enter Login");
  document.form.login.focus();
  return false;
  }
   if(document.form.number.value=="")
  {
    alert("Plese Enter Number");
  document.form.number.focus();
  return false;
  }
   if(document.form.dob.value=="")
  {
    alert("Plese Enter Date Of Birth");
  document.form.dob.focus();
  return false;
  }
 
}
</script>

<style>
  table{width:30% !important; text-align: center; margin: auto; margin-top: 100px;}
  .success{color: green;}
  .error{color: red;}
  .frm{width:70% !important;  margin: auto; margin-top: 100px;}
</style>
</head>
<body>
     


     <div class="container">
        <br><br><br>
    <div class="row justify-content-center">
<div class="col-lg-9">
    
</div>
<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:100px;">
     <br> <br>
<h2 align="center" style="font-family:'type'; color:#000066">Forget Password</h2>
<div style="font-size:23px">
    <?php
    
    include("include/config.php");

date_default_timezone_set('Asia/Kolkata');      
$currentdate=date("d-m-Y h:i:sa");
if (isset($_POST['save'])) 

{
    
function generateRandomString($length=8)
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&@#$',ceil($length/strlen($x)))),1,$length);
}
 $passgen=generateRandomString();
$hash_pass=SHA1($passgen);
//echo $hash_pass;
//echo $passgen;

    $login = $_POST['login'];
    $date = $_POST['dob'];
    $number = $_POST['number'];
$select = "select dob,number,status from user where login = '$login'and status = \"Active\"";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query)or die("<script language='javascript'>alert('Login ID is Not Correct');window.location='forget_password.php'</script>");
$olddob = $data['dob'];
$num= $data['number'];
    if ($olddob==$date && $num==$number ) 
    {
        
            $update = "UPDATE `user` SET `password`='$hash_pass',`pass`='$passgen',`forget_password_time`='$currentdate',`wrong_pass_count`='0',`wrong_pass_time`='' WHERE `login` ='$login'";
             //UPDATE `user` SET `password`='$hash_pass',`pass`='$passgen',`forget_password_time`='$currentdate' where `login` = '$login';
            $query1 = mysqli_query($con,$update);
            if($query1)
            {
               $showres = "Your Password is :- $passgen";  
               echo "<h2 class='error' align='center'>$showres</h2>";
 
              
            }
            else
             {
               echo "<script language='javascript'>alert('error contact to administrator');window.location='forget_password.php'</script>";
            }
            
    }
  else
    {
        echo "<script language='javascript'>alert('your input data is wrong');window.location='forget_password.php'</script>";
    }
 }
?>
     
 <?php
//echo "<h2 class='error' align='center'>$showres</h2>";

    ?>

<form  method="post" action="" align="center" name="form" onSubmit="return check();" >
<label>Login:
<input class="form-control" type="text" name="login" autocomplete="off"  id="login">
</label>
<br>
<label> Number:
<input class="form-control" type="text" name="number" autocomplete="off" id="number" maxlength="10" minlength="10" ></label>
<br>
<label>Date Of Birth:
<input class="form-control" type="date" name="dob" autocomplete="off" id="dob" style="width: 220px;">
</label>
<br>
<br>
<input  type="submit" name = "save" value="Reset" />
<h4><a class="btn btn-success " align="right"  href=index.php> SIGN IN</a></div></h4>
</form>
<br>
<br>
</body>
</html>
