<?php include("include/header.php"); ?>
      <!-- Title -->
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
      <div class="container-fluid">
        <div class="row" id="wel_head">
            
            <div class="col-lg-12 text-center ">
                <p class="font-weight-bold text-light" id="first-p">Department Of Computer Applications</p>
            </div>
            <div class="col-lg-12 text-center ">
                <p class="font-weight-bold text-white" id="first-p">Graphic Era (Deemed To Be University)</p>
            </div>
        </div>
        <div class="flexbtn">
          <div>
            <!--<a href="contact.php" class="btn btn-outline-light btn-lg">Connect with us</a>-->
          </div>
          
         
      </div>
      </div>
    

  </section>
<!-- main_notice -->
<section class="my-3 p-3" style="background-color:#9A208C;">
  <div class="row">
    <div class="col-md-6 container">
      <h1 class="display-5 fw-normal text-success">Celebrating <span class="text-warning"> 30 Years</span></h1>
      <p class="fs-5 text-light">The Graphic Era Educational Society (GEES), established in 1993, is a non-profit organization that aims to mobilize world-class education and generate resources for providing and supporting quality education for all. The society recognizes the right of every individual to lead a life of dignity and self-respect in a just and equitable manner. Initially, Graphic Era Educational Society inaugurated its operations as Graphic Era Institute of Technology, which achieved the distinction of being the first self- financed educational institute in North India, offering engineering courses. The Institute was the culmination of the dream of its visionary founder, Prof. (Dr) Kamal Ghanshala, to change the destiny of thousands of youth by providing an excellent and holistic professional education. He had visualized an educational hub that would cater to the academic aspirations of innumerable young men and women and his vision took a concrete shape in the form of Graphic Era Institute.</p>
      </p>
    </div>
    <div class="col-md-6 container">
      <h1 class="display-5 fw-normal" style="color:#3F0071">Latest Notices</h1>
      <div class="dflex flex-column container py-3 main-notice">
      <?php

$count = 0;
 $noticequery=mysqli_query($con,"SELECT * FROM `notice` WHERE `status`='Active'  ORDER BY `circular_id` DESC LIMIT 4");
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
     <br>
     <a class="btn btn-outline-warning" href="notices.php" role="button">See more  </a>
    </div>
  </div>
</section>

  
<!-- Course offered -->
 
<section >
  <h1>Courses Offered</h1>
  <h3 class="text-dark fw-bold">Department of computer applications</h3>
  <div class="course-card text-light">
      <div class="course-col">
        <h3>MCA</h3> 
        <p class="text-white">Master of Computer Applications</p>
      </div>
      <div class="course-col">
    <h3>M.Sc IT</h3> 
    <p class="text-white">Master of Science Information Technology</p>
  </div>
    <div class="course-col">
    <h3 >BCA</h3> 
    <p class="text-white">Bachelor's of Computer Applications</p>
  </div>
  <div class="course-col">
    <h3 >B.Sc. IT</h3> 
    <p class="text-white">Bachelor's of Information Technology</p>
  </div>
  <div class="course-col">
    <h3 >B.Sc. CS</h3> 
    <p class="text-white">Bachelor's of Computer Science</p>
  </div>
  
  
  </div>
</section>

  <!--carousel Career opportunity -->
   <div class="col-lg-12">
      <h1 class="text-center fw-bold display-4.2 mb-4">Career Prospects</h1>
     <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, quaerat?</p>-->
  </div>

  <div class="container-fluid my-5 ">
    <div class="row">
        <div class="col-12 m-auto">
            <div class="owl-carousel owl-theme">
                <div class="item mb-4">
                    <div class="card border-0 shadow">
                        <!-- <img src="https://source.unsplash.com/1200x800/?Full Stack Developer" alt="Full Stack Developer" class="card-img-top" > -->
                        <div class="card-body">
                            <div class="card-title text-center">
                             <h4>Full Stack Developer</h4>
                                 <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem quos tempore ipsam in nesciunt totam officia eius.</p>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card border-0 shadow">
                        <!-- <img src="https://source.unsplash.com/1200x800/?Software Engineer" alt="Software Engineer" class="card-img-top"> -->
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>Software Engineer</h4>
                                 <!--  <p>Lorem ipsum dolor sit amet nesciunt totam officia eius.</p>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 shadow">
                        <!-- <img src="https://source.unsplash.com/1200x800/?Data Analyst" alt="Data Analyst" class="card-img-top" > -->
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>Data Analyst</h4>
                                  <!-- <p>Lorem ipsum dolor sit amet consectetur aditotam officia eius.</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




  <!-- Call to Action -->

  <section class="colored-section my-5 p-4" id="cta">

    <div class="container">

      <h3 class="heading">Explore More With Department Of Computer Appilcations
        Join Us</h3>
      
    </div>
  </section>
      </div>

      
<!-- Button for the Top -->

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
    }
</script>
    <?php include("include/footer.php"); ?>
