<!-- Footer -->

  <footer class="" id="footer">
    <div class="d-flex  justify-content-center">
      <div>
        <i class="social-icon fab fa-facebook-f"></i>
        <i class="social-icon fab fa-twitter"></i>
       
        <a href="https://www.instagram.com/dca.geu/" target="_blank"><i class="social-icon fab fa-instagram"></i></a>
        <i class="social-icon fas fa-envelope"></i>
      </div>
      <div class="tour-frame px-3" style="border-left:2px #AD7BE9 solid; " >
        <span>Tour In</span>
        <a href="tour.php">
          <img src="images/VirtualTour.png" alt="369 View">
        </a>
      </div>
    </div>
    <div class="d-flex flex-column justify-content-around">
      <div class="list container-fluid">
        <a href="https://www.geu.ac.in/content/geu/en/careers.html" target="_blank">Careers</a>
        
       
        <a href="https://login.microsoftonline.com/" target="_blank">Email</a>
       
       
        <a href="https://www.geu.ac.in/content/geu/en/library.html" target="_blank">Library</a>
        <a href="https://www.geu.ac.in/content/geu/en/antiragging.html" target="_blank">Anti Ragging</a>
       
      </div>
      <div style="color:#120136">
        Department Of Computer Applications © <?php echo date('Y'); ?>
      </div>
    </div>
  </footer>

    
 </div> 
    



  
  <!-- init owl-carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"></script>
  <script>
      $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 15,
          nav: true,
          autoplay:true,
          responsive: {
              0: {
                  items: 1
              },
              600: {
                  items: 2
              },
              1000: {
                  items: 3
              }
          }
      })
  </script>
   <!-- lightbox -->
 <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
  <script>
  // Selecting the iframe element
  var iframe = document.getElementById("iframe");
  
  // Adjusting the iframe height onload event
  iframe.onload = function(){
      iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
  }
    function loadForm(formUrl) {
      document.getElementById("iframe").src = formUrl;
    }
  </script>

</body>

</html>
