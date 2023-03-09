<?php include("include/header.php"); ?>
      <!-- Title -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Welcome Folks!</h1>
            </div>
            <div class="col-lg-12 text-center ">
                <p class="font-weight-bold text-light">Department Of Computer Applications</p>
            </div>
            <div class="col-lg-12 text-center ">
                <p class="font-weight-bold text-white">Graphic Era (Deemed To Be University)</p>
            </div>
        </div>
        <div class="flexbtn">
          <div>
            <a href="contact.html" class="btn btn-outline-light btn-lg">Connect with us</a>
          </div>
          <div>
            <a href="https://www.geu.ac.in" target="_blank" class="btn btn-outline-light btn-lg">Official Website</a>
          </div>
         
      </div>
      </div>
    

  </section>

 <!--images Carousel active class added using Jquery -->
 <div id="carouselExampleIndicators" class="carousel slide"data-interval="3000" data-ride="carousel">
    
    <div class="carousel-inner my-5" id="myCarousel">
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/1200x800/?city" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/1200x800/?motivational" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/1200x800/?inspiration" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/1200x800/?study" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/1200x800/?life" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- jquery for adding the active class -->
  <script>$('#myCarousel').find('.carousel-item').first().addClass('active');</script>


  
<!-- Course offered -->
 
<section >
  <h1>Courses Offered</h1>
  <p>Department of computer applications</p>
  <br>
  <div class="course-card">
      <div class="course-col">
    <h3>MCA</h3> 
    <p>Master of Computer Applications</p>
  </div>
      <div class="course-col">
    <h3>M.Sc IT</h3> 
    <p>Master of Science Information Technology</p>
  </div>
    <div class="course-col">
    <h3>BCA</h3> 
    <p>Bachelor's of Computer Applications</p>
  </div>
  <div class="course-col">
    <h3>B.Sc. IT</h3> 
    <p>Bachelor's of Information Technology</p>
  </div>
  <div class="course-col">
    <h3>B.Sc. CS</h3> 
    <p>Bachelor's of Computer Science</p>
  </div>
  
  
  </div>
</section>

  <!--carousel Career opportunity -->
   <div class="col-lg-12">
      <h1 class="text-center fw-bold display-4.2 mb-4">Career opportunity</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, quaerat?</p>
  </div>

  <div class="container-fluid my-5 ">
    <div class="row">
        <div class="col-12 m-auto">
            <div class="owl-carousel owl-theme">
                <div class="item mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/1200x800/?Full Stack Developer" alt="" class="card-img-top" >
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>Full Stack Developer</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem quos tempore ipsam in nesciunt totam officia eius.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/1200x800/?Software Engineer" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>Software Engineer</h4>
                                <p>Lorem ipsum dolor sit amet nesciunt totam officia eius.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/1200x800/?Data Analyst" alt="" class="card-img-top" >
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>Data Analyst</h4>
                                <p>Lorem ipsum dolor sit amet consectetur aditotam officia eius.</p>
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
      <button class="btn-outline-light btn-lg" type="button">About us</button>
    </div>
  </section>
      </div>

    <?php include("include/footer.php"); ?>
