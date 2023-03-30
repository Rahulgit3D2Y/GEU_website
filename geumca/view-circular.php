<?php include("include/subheader.php"); ?>
      <!-- Title -->
      <title>Circular View - DCA | GEU </title>
      <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Circular View</h1>
            </div>    
        </div>
      </div>
  </section>
  <div class="loader"></div>
  <script>
    window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    loader.classList.add("loader--hidden");

    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });
  </script>
<?php 

 extract($_REQUEST);
 $useritem=$_GET['circular_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));

?>
 <?php
    $viecircularquery=mysqli_query($con,"SELECT * FROM `notice` WHERE `circular_id`='$id' and `status` = \"Active\"");
$viecircularqueryresult=mysqli_fetch_assoc($viecircularquery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='notices.php'</script>");

$imagepath= $viecircularqueryresult['file'];
        if($imagepath)
        {
                $imageencode = "admin/upload/notice/$imagepath";
        }
        else
        {
          $imageencode = "upload/user_photo/show.png";
        }
       // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;
?>
  <!-- text -->
    <div class="d-flex flex-column ccolor">
      <br>
      <div class="d-flex" >

        <div class="text-success font-weight-bold">Circular No:
          <span id="circular-number" class="ml-3"><?php echo $viecircularqueryresult['circularno']; ?></span>
        </div>
        <div class="text-warning font-weight-bold">Dated:
          <span id="circular-date" class="ml-3"><?php  echo date("d-m-Y", strtotime($viecircularqueryresult['datefrom'])); ?></span>
        </div>
       <?php if($viecircularqueryresult['file']) { ?>
        <div class="">
          <span id="lnkdownloadhere"   style="cursor:pointer; font-size:15px;  color:blue;"><a href="<?php echo $imageencodesrc; ?>"  download="<?php echo $viecircularqueryresult['circularno']; ?>"  >Download Circular/Notice here</a></span>
        </div>
    <?php } else { ?>
    <div class="">
          <span id="lnkdownloadhere"   style="cursor:pointer; font-size:15px;  color:blue;"><a >Download Circular/Notice here</a></span>
        </div>
    <?php } ?>
      </div>
      <div>
        <h2><?php echo wordwrap($viecircularqueryresult['subject'],70,"<br>\n"); ?></h2>
      </div>
    </div>
    <?php if($viecircularqueryresult['message'])   { ?>
     <div id="Notice"  class="container">
        <div class="row">
            <div class="well">
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header">
                                        <h6 class="text-center font-weight-light my-1">
                                            <div class="cssNotice" id="notice" style="text-align: left">
                 <?php echo $viecircularqueryresult['message'];?>  </div>
             </h6>
                 
                </div>
             </div>
         </div>
     </div> 
 </div>
            </div>
        </div>
    </div>
    <br>
        <?php }?>
     <?php if($viecircularqueryresult['file']) { ?>
    <div class="iframe-body" style="padding-bottom: 4%;">
      <iframe src="<?php echo $imageencodesrc; ?>" width="1000" height="1000" id="notice_pdf-iframe"> </iframe>
    </div>
    <?php } ?>
   </div>
   <?php include("include/footer.php"); ?>