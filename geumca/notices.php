<?php include("include/subheader.php"); ?>

      <!-- Title -->
       <title>Notices - DCA | GEU </title>
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-center fw-bold display-4 mb-5">Notices</h1>
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

  <!-- Page Content -->

  <div class="container-fluid p-3">
    <h2>Check Notices and Updates Here </h2>
    <div class="dflex flex-column container py-3" style= "max-height: 600px; max-width: 900px;
    overflow-y: auto; background-color: #E3DFFD; ">
    <?php

  $count = 0;
   $noticequery=mysqli_query($con,"SELECT * FROM `notice` WHERE `status`='Active'  ORDER BY `circular_id` DESC");
  while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['circular_id'];
$created_user_id=$noticequeryresult['createdby'];
$result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
$row12=mysqli_fetch_array($result123);
$user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                 
                                  ?>
    
    
      <a class=" btn-outline-primary btn" id="notice_link"  href="view-circular.php?circular_id=<?php echo urlencode(base64_encode($id)); ?>"  target="_blank"><?php echo $count; ?>.<?php echo $noticequeryresult['subject']; ?> 
     -  <?php echo  date("d-m-Y", strtotime($noticequeryresult['createdtime']));  ?> </a>
      
      
   
      
     <?php } ?>
     </div>
  </div>
    </div>
     </div>

 <?php include("include/footer.php"); ?>