<?php include("include/subheader.php"); ?>
      <!-- Title -->
      <title>Academic Calender - DCA | GEU </title>
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-center fw-bold display-4 mb-5">Academic Calender</h1>
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

  <!-- Content -->
<br>
<?php  
 extract($_POST);
 extract($_REQUEST);

  

     $rstudent=mysqli_query($con,"SELECT * FROM `academiccalender` WHERE  `academiccalender_status`= 'Active' AND  `academiccalender_session`='$activesession_record_add' AND `academiccalender_display`= 'Active' ");
if (mysqli_num_rows($rstudent)<1)
{
     $studenterrormsg="Academic Calender is not uploaded yet";

} 
 else
 { 
$result12=mysqli_query($con,"SELECT * FROM `academiccalender` WHERE  `academiccalender_status`= 'Active' AND  `academiccalender_session`='$activesession_record_add'  AND `academiccalender_display`= 'Active' ");


            $row1=mysqli_fetch_array($result12);
            $academiccalendersessionfilename=$row1['academiccalender_session'];
            $academiccalenderType=$row1['academiccalender_type'];
            $studenterrormsg="";
            $imagepath= $row1['academiccalender_file'];
        if($imagepath)
        {
                $imageencode = "admin/upload/academiccalender/$imagepath";
        }
        else
        {
          $imageencode = "admin/upload/academiccalender/error.pdf";
        }
       // Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data:'.mime_content_type($imageencode).';base64,'.$imageData;
    }
 ?>
 <?php if($studenterrormsg) { ?>
<h1> <span style="font-family:'type'; color:red;"><?php echo $studenterrormsg;?></span></h1>
<?php } else {
 ?>
 <div>
          <label id="lnkdownloadhere"   style="cursor:pointer; font-size:15px;  color:blue; margin-right: 80px"><a href="<?php echo $imageencodesrc; ?>"  download="<?php echo "academiccalender_".$academiccalendersessionfilename."_".$academiccalenderType; ?>"  >Click Here to download</a></label>
        </div>
<div class="iframe-body">
  <iframe src="<?php echo $imageencodesrc; ?>" width="1000" height="1000" id="pdf-iframe"> </iframe>
</div>
<?php }  ?>
    </div>
    </div>
  <?php include("include/footer.php"); ?>