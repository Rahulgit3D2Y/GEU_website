<?php
session_start();
include("include/config.php");
 @$_SESSION['alogin']; 
  error_reporting(1);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin-Logout</title>
  <link rel="stylesheet"  type="text/css" href="css/all.css"/>
  <link rel="shortcut icon" href="image/favicon.ico">
  </head>
<body>

<?php
date_default_timezone_set('Asia/Kolkata'); 
$date=date("Y-m-d h:i:sa");
$datetime=$_SESSION['adatetime'];
$loginid=$_SESSION['alogin'];

if($loginid)
{
  // remove all session variables
session_unset();

// destroy the session
session_destroy();
mysqli_query($con,"UPDATE `logindetail` SET `logout_datetime` = '$date' WHERE `loginid` = '$loginid' AND `login_datetime` = '$datetime'")or die(mysqli_error()); 
echo "<script>window.location='index.php'</script>";
}
else
{
  // remove all session variables
session_unset();

// destroy the session
session_destroy();
// Redirect
echo "<script>window.location='index.php'</script>";
}

?>

</body>
</html>