<?php
  session_start();
    include("admin/include/config.php");
     error_reporting(1);
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="geumca">
    <link rel="canonical" href="https://geumca.in/index.php">
    
   
    <meta name="keywords" content="Graphic Era, Graphic Era Deemed to be University ,Graphic Era (Deemed to be University), Department of Computer Application,geu mca, MCA, BCA, Master of Computer Application, Bachelor of Computer Application, GEU Academic Calendar, GEU Notice, MSC.IT, BSC.CS, BSC.IT, Bachelor's of Information Technology, Master of Science Information Technology, Graphic Era Admission, GEU Admission, GEU Syllabus, Top University,Department Of Computer Application,MCA,M.Sc(IT),BCA,B.Sc(IT),B.Sc(CS)">

    <meta itemprop="name" content="Graphic Era (Deemed to be University), Dehradun, Uttarakhand">
<meta itemprop="keywords" content="Graphic Era, GEU, Top Ranked University Dehradun, Best Engineering College, Computer Science, Engineering College Dehradun, Engineering Admission 2022, MBA College Dehradun, Best University in Uttarakhand,Department Of Computer Application,MCA,M.Sc(IT),BCA,B.Sc(IT),B.Sc(CS)">
<meta itemprop="description" content="Graphic Era (Deemed to be University) is the Top Ranked University in Dehradun for Engineering,  more. Admissions, 2022 open now!,MCA,M.Sc(IT),BCA,B.Sc(IT),B.Sc(CS)">

<meta name="twitter:card">
<meta name="twitter:site" content="Graphic Era, GEU, Top Ranked University Dehradun, Best Engineering College, Computer Science, Engineering College Dehradun, Engineering Admission 2022, MBA College Dehradun, Best University in Uttarakhand">
<meta name="twitter:title" content="Graphic Era (Deemed to be University), Dehradun, Uttarakhand">
<meta name="twitter:seoDescription" content="Graphic Era (Deemed to be University) is the Top Ranked University in Dehradun for Engineering, MCA,M.Sc(IT),BCA,B.Sc(IT),B.Sc(CS). Admissions, 2022 open now!">
<meta name="twitter:image:src">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Department of Computer Application || Graphic Era">
    <meta property="og:url" content="https://geumca.in/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Department of Computer Application || Graphic Era">
    <meta name="description" content="Graphic Era ">
    <meta property="og:description" content="The Department of Computer Application is an embodiment of the strength and excellence of Graphic Era Deemed to be University in the domain of Computer Applications. It hosts Department of Computer Applications which is one of the oldest departments of the institution functioning since 1998. The department of Computer Application provides a stimulating academic environment that amalgamates the best of conventional and modern pedagogy, rich and industry-relevant curriculum, through extremely competent faculty staff and intensive teaching-learning processes and continuous evaluation system.">
    <meta property="og:image" content="https://geumca.in/images/finallogo.png">
  <link rel="icon" type="image/x-icon" href="admin/image/favicon.ico">
  <!-- owl-carousel css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- owl-carousel theme css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  $activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['fyear'];
?>
  <div id="page-container">
    <div id="content-wrap">
  <section class="colored-section" id="sub-title">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-xl navbar-dark">
        <!-- Just an image -->
      <nav class="navbar navbar-light ">
          <a class="navbar-brand" href="index.php">
              <img src="images/finallogo.png"class="logo" alt="Computer Applications">
          </a>
     </nav>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto">
           <?php 
$sql=mysqli_query($con,"SELECT * FROM `header` WHERE `header_status`='Active' AND `header_display`='Active' AND `header_pagemore`='No' ORDER BY `header_order` ASC");
                                        while($result=mysqli_fetch_assoc($sql))
    {
?>

            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo $result['header_url']; ?>"><?php echo $result['header_name']; ?></a>
            </li>
          <?php } ?>
              <li class="nav-item">
                <div class="dropdown">
                  <div class="dropdown-toggle py-2 btn-lg" type="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family:serif;">More</div>
                  <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuButton" style="background-color:#ECF2FF; max-height: 600px;overflow-y: auto;">      
                      <?php 
$sqlformoreheader=mysqli_query($con,"SELECT * FROM `header` WHERE `header_status`='Active' AND `header_display`='Active' AND `header_pagemore`='Yes' ORDER BY `header_order` ASC");
                                        while($sqlformoreheaderresult=mysqli_fetch_assoc($sqlformoreheader))
    {
?>
            
              <a  class="dropdown-item text-white bg-dark my-1" href="<?php echo $sqlformoreheaderresult['header_url']; ?>" <?php if($sqlformoreheaderresult['header_newpagetraget']=="Yes") { ?> target ="_blank" <?php } ?> ><?php echo $sqlformoreheaderresult['header_name']; ?></a>
           
          <?php } ?> 

                  </div>
                </div>
              </li>
          </ul>

        </div>
      </nav>
    </div>
