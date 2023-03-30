<?php
include("include/header.php");
?>

<?php
 extract($_REQUEST);
 $useritem=$_GET['circular_id'];
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));

 $viecircularquery=mysqli_query($con,"SELECT * FROM `notice` WHERE `circular_id`='$id' and `status` = \"Active\"");
$viecircularqueryresult=mysqli_fetch_assoc($viecircularquery)or die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='view_circular.php'</script>");
$imagepath= $viecircularqueryresult['file'];
        if($imagepath)
        {
                $imageencode = "upload/notice/$imagepath";
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
    <div id="layoutSidenav_content">
                <main>

                    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div>
                    <h2 id="dvLabel">View Circular/Notice</h2>
                </div>
            </div>
        </div>
        <div class="row">
        
            <div class="col-sm-1 col-xs-4">
                <p id="lblCirNo" style="font-weight:bold; font-size:13px;">Circular No:</p>
            </div>
            <div class="col-sm-3 col-xs-8">
                <p id="cirNumber" style="font-weight:bold; font-size:13px; text-align:left;"><?php echo $viecircularqueryresult['circularno']; ?></p>
            </div>
          
            <div class="col-sm-2 col-xs-4">   
                Dated:           
            </div>
            <div class="col-sm-2 col-xs-8">                
                <label id="date"><?php  echo date("d-m-Y", strtotime($viecircularqueryresult['datefrom'])); ?></label>
            </div>
            <div class="col-sm-3 col-xs-12">
                <label id="lnkdownloadhere"   style="cursor:pointer; font-size:15px;  color:blue; margin-right: 80px"><a href="<?php echo $imageencodesrc; ?>"  download="<?php echo $viecircularqueryresult['circularno']; ?>"  >Download Circular/Notice here</a></label>
            </div>

        </div>
  <div id="divPdf">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10 text-center">
                <u><p><strong><span style="font-size:23px;"><?php echo $viecircularqueryresult['subject']; ?></span></strong></p></u>
            </div>
            <div class="col-sm-1"></div>

        </div>
    </div>
    <?php if($viecircularqueryresult['message'])   { ?>
     <div id="Notice">
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
      <div id="divPdf">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                
                <frame>
    <embed type="application/pdf" 
src="<?php echo $imageencodesrc; ?>" 
width="90%" height="800" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" 
background-color="0xFF525659" top-toolbar-height="56" full-frame="" internalinstanceid="21" 
title="CHROME">
</frame>
      
   

  </div>
            <div class="col-sm-1"></div>

        </div>
    </div>
      <?php } ?>
 
 <br>

</main>
        <?php
include("include/footer.php");
    ?>