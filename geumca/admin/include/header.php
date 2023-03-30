<?php

    session_start();
    include("config.php");
 
  @$_SESSION['alogin']; 
  error_reporting(1);
 ?>
 <?php
extract($_POST);


if (!isset($_SESSION['alogin']))
{
   
    echo "<script>window.location='index.php'</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GEU-Department Of Computer Applications</title>
          <link rel="shortcut icon" href="image/favicon.ico">
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!---- Exrta css ---->
         <link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
         <link href=" https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" />
          <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
       
    </head>
    <body class="sb-nav-fixed"  oncontextmenu="return false">

         
       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php"><?php 
$schol=mysqli_query($con,"SELECT * FROM `school` WHERE `status` = \"Active\"");
$res1=mysqli_fetch_assoc($schol); ?>
<h2 style="text-transform:uppercase;"><?php
echo $school_short_name_record = $res1['school_srtname'];
 $today_date_1=date('Y-m-d');
                                            
                                         
?></h2></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   
                    <!--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->
                </div>
            </form>
            <!-- Navbar-->
           
 
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

           
                
                   <?php
$loginsession = $_SESSION["alogin"];
$q=mysqli_query($con,"SELECT * FROM `user` WHERE `login` ='$loginsession'  and `status` = \"Active\"");
$res=mysqli_fetch_assoc($q);
$login_user_type = $res['type'];
$log = $res['id'];
$login_user_status= $res['status'];


$useractivesessionquery=mysqli_query($con,"SELECT * FROM `user` WHERE `id` ='$log'");
$resuseractivesessionquery=mysqli_fetch_assoc($useractivesessionquery);
$activesession_record=$resuseractivesessionquery['current_session'];
$activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `session_year` ='$activesession_record'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['fyear'];





//echo $res['first_name'] ." ".$res['middle_name']  ." ". $res['last_name'];
//echo $res['first_name']; &emps;echo $res['middle_name']; echo $res['last_name'];
$dateformat1 = date("d-m-Y", strtotime($res['dob']));

 $hash_pass ="e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd";
                    ?>  
                   
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span style=" font-size:15px; color: white;" aria-expanded="false">  <?php echo $res['first_name'] ." ".$res['middle_name']  ." ". $res['last_name']; ?></span> <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li> <a class="dropdown-item" href="profile.php">Profile</a></li>
                     <?php if ($login_user_type=="superuser") { ?>

                       <li> <a class="dropdown-item" href="loginrecord.php">Login Record</a></li>
                        <li> <a class="dropdown-item" href="advance_setting.php">Advance Setting </a></li>
                     <?php } ?>
                        <li><a class="dropdown-item" href="changepassword.php">Change password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="signout.php?AppType=0%20|%20ApplicationType=Session%20Destroy&Mid=0">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <?php if ($login_user_type=="superuser" || $login_user_type=="admin") { ?>
                              <a class="nav-link" href=""  data-bs-toggle="modal" data-bs-target="#sessionmodal" >
                                <div class="sb-nav-link-icon"></div>
                                <?php echo $activesession_record;?>&nbsp;<i class="fas fa-edit"></i>
                            </a>
                             <?php } ?>
                             <div class="sb-sidenav-menu-heading">Interface</div>

<?php 
       $menulistqry="SELECT * FROM `menu` WHERE `status`='Active' ORDER BY `menu`.`menu_order` ASC";
       $menulistres=mysqli_query($con,$menulistqry);
       while($menulistdata=mysqli_fetch_assoc($menulistres))
        {
$rmenu_id=$menulistdata['menu_id'];
//echo $rmenu_id;
$menuaccessqry="SELECT * from `modulepermission` WHERE modulepermission.`modulemenu_id`='$rmenu_id' AND modulepermission.`modulepermission`='Yes' AND modulepermission.`moduleuser_id`='$log'";
$menuaccessres=mysqli_query($con,$menuaccessqry);
$menuaccessrow=mysqli_num_rows($menuaccessres);
//echo $menuaccessrow;
if($menuaccessrow>0)
         {

          ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $menulistdata['menu_id'];?>" aria-expanded="false" aria-controls="collapse<?php echo $menulistdata['menu_id'];?>">
                                <div class="sb-nav-link-icon"><i class="<?php echo $menulistdata['menu_icon'];?>"></i></div>
                                <?php echo $menulistdata['menu_name'];?>
                                
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapse<?php echo $menulistdata['menu_id'];?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                              
                                     <?php 
          
       $submenulistqry="SELECT * from `submenu`
               INNER JOIN `modulepermission` ON modulepermission.`modulesubmenu_id`=submenu.`submenu_id`
        WHERE submenu.`status`='Active' AND submenu.`menu_id`='$rmenu_id' AND submenu.`submenu_display`='Yes' AND  modulepermission.`modulepermission`='Yes' AND modulepermission.`moduleuser_id`='$log' ORDER BY submenu.`submenu_order` ASC";
       $submenulistres=mysqli_query($con,$submenulistqry);
       while($submenulistdata=mysqli_fetch_assoc($submenulistres))
        {
         ?>
            <a class="nav-link" href="<?php echo $submenulistdata['submenu_url'];?>?AppType=<?php echo $submenulistdata['submenu_id'];?> | ApplicationType=<?php echo $menulistdata['menu_name'];?>&Mid=<?php echo $submenulistdata['menu_id'];?>"><?php echo $submenulistdata['submenu_name'];?></a>
                                <?php } ?>  
                               
                               </nav>

                            </div>
                           <?php } } ?> 

                             </div>

                    </div>
               <?php 
           $url= basename($_SERVER['REQUEST_URI']);
          // echo $url;
           if ($url=="school.php")
            {
                   // code...
            }
            else
            {
                $schooladdquery=mysqli_query($con,"SELECT * FROM `school` WHERE `school_id`=\"1\"");
$result=mysqli_fetch_assoc($schooladdquery);
$nm=$result['own_filled'];
if ($nm == "No")
 {
    echo "<script language='javascript'>alert('Add School Name First');window.location='school.php'</script>";
}

            }    


?>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $res['login']; ?>
                    </div>
                </nav>
            </div>

            
<?php 
if($login_user_status!="Active") 
{
    echo "<script>window.location='signout.php'</script>";
}

$Birthdaysetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"Birthday message\" "); 
$Birthdaysettingres=mysqli_fetch_assoc($Birthdaysetting);
$Birthdaymessagepopupstatus=$Birthdaysettingres['popupstatus'];
$usersendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"admin message\" "); 
$usersendmessagesettingres=mysqli_fetch_assoc($usersendmessagesetting);
$usersendmessagesettingstatus=$usersendmessagesettingres['popupstatus'];

$studentsendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"admin message\" "); 
$studentsendmessagesettingres=mysqli_fetch_assoc($studentsendmessagesetting);
$studentsendmessagesettingstatus=$studentsendmessagesettingres['popupstatus'];

?>
<?php $Currentwebsiteurl=basename($_SERVER['REQUEST_URI']); 
                                 
$documentuplaodsetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"photo upload\" "); 
$documentuplaodsettingres=mysqli_fetch_assoc($documentuplaodsetting);
$documentuplaodsettingpopupstatus=$documentuplaodsettingres['popupstatus'];

$fileuploaduserquery=mysqli_query($con,"SELECT `photo` FROM `user` WHERE `id`='$log'");
$fileuploaduserqueryresultrs=mysqli_fetch_assoc($fileuploaduserquery);
$fileuploaduserqueryresultrsphoto=$fileuploaduserqueryresultrs['photo'];
if($fileuploaduserqueryresultrsphoto)
$fileuploaduserqueryresultrsphotovalue = "True";
else
$fileuploaduserqueryresultrsphotovalue ="False";     
                                ?>