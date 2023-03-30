<?php 
session_start();
 include("include/config.php");
?>

<?php

        $loginsession = $_SESSION["alogin"];
$q=mysqli_query($con,"SELECT * FROM `user` WHERE `login` ='$loginsession'  and `status` = \"Active\"");
$res=mysqli_fetch_assoc($q);
$login_user_type = $res['type'];
$log = $res['id'];
$Currenturl=basename($_SERVER['REQUEST_URI']); 
$url= parse_url($Currenturl, PHP_URL_PATH);
                   // echo $url;

    $submenuquery=mysqli_query($con,"SELECT * FROM `submenu` WHERE `submenu_url`='$url'");
while($submenuqueryresult=mysqli_fetch_assoc($submenuquery))
{
$subid=$submenuqueryresult['submenu_id'];
//echo $subid;
}
$perquery=mysqli_query($con,"SELECT * FROM `modulepermission` where `modulesubmenu_id`='$subid' and `moduleuser_id`='$log'");
while($perres=mysqli_fetch_assoc($perquery)){
$per_st=$perres['modulepermission'];

//echo $per_st;

}
if ($per_st!='Yes')
 {
    echo "<script language='javascript'>alert('permission is not alloted');window.location='dashboard.php'</script>";
}
else
{

}
?>
                                