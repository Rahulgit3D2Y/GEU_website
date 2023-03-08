<?php include("include/subheader.php"); ?>

      <!-- Title -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Contact</h1>
            </div>    
        </div>
      </div>
  </section>



    
<!------- Contact Us ------->
<section class="contact-us my-5">
  <div class="row">
      <div class="col  col-sm">
          <div>
              <i class="fa fa-home" id="icon"></i>
              <span>
                  <h5>Department Of Computer Applications | Graphic Era (Deemed To Be University)</h5>
                  <p>Clement Town, Dehradun, Uttarakhand, IN</p>
              </span>
          </div>
          <div>
              <i class="fa fa-phone"id="icon"></i>
              <span>
                  <h5>18008906027, 1800 18000 14/15, 1800 2701280</h5>
                  <p>9 Am to 6 Pm</p>
              </span>
          </div>
          <div>
              <i class="fa fa-envelope"id="icon"></i>
              <span>
                  <h5>enquiry@geu.ac.in</h5>
                  <p>Email us your query</p>
              </span>
          </div>
      </div>
      <div class="col col-sm ">
          <form method="POST" action="contactus.php" name="Contact-us">
          <input type="text" name="name" placeholder="Enter your name" required>
          <input type="email" name="email" placeholder="Enter email address" pattern=".+@gmail.com" required>
          <input type="number" name="Number" placeholder="Enter Mobile Number" minlength="9" maxlength="14" required>
          <input type="text" name="subject" placeholder="Enter your subject" required>
          <textarea rows="8" name="message" placeholder="Message" required></textarea>
          <input type="submit" class="hero-btn red-btn" value="Send Message" name="Sendmsg" id="Sendmsg">
          </form> 
      </div>
  </div>
</section>
<section class="location">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.893315425911!2d77.99264815104446!3d30.268620781712013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39092b9451ae8dfd%3A0xf39c46d34a152faa!2sGraphic%20Era%20(Deemed%20to%20be%20University)!5e0!3m2!1sen!2sin!4v1666007630235!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
    
    </div>
  <?php include("include/footer.php"); ?>