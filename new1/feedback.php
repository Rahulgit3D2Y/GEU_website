<?php include("include/subheader.php"); ?>

      <!-- Title -->
      <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Feedback</h1>
            </div>    
        </div>
      </div>
  </section>


  <!-- pagination -->
  <div class="container ">
    <nav aria-label="Page navigation example">
      <ul class="">
  <!-- button dropdown for mobile view -->
        <div class="btn-group dropright mview pagination" role="group">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Feedback Options
          </button>
          <div class="dropdown-menu ">
              <a class="page-link  btn btn-danger " href="#" onclick="loadForm('forms/Alumini_form.html')">Alumini </a>
              <a class="page-link  btn btn-danger" href="#" onclick="loadForm('forms/Employer_form.html')">Employer </a>
              <a class="page-link  btn btn-danger" href="#" onclick="loadForm('forms/Student_form.html')">Student </a>
              <a class="page-link  btn btn-danger" href="#" onclick="loadForm('forms/Parent_form.html')">Parent </a>
              <a class="page-link  btn btn-danger" href="#" onclick="loadForm('forms/Teacher_form.html')">Teacher </a>
          </div>
        </div>
<!--  button FOR  desktop view-->
      <div class="dview pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" onclick="loadForm('forms/Alumini_form.html')">Alumini </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" onclick="loadForm('forms/Employer_form.html')">Employer </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" onclick="loadForm('forms/Student_form.html')">Student </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" onclick="loadForm('forms/Parent_form.html')">Parent </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" onclick="loadForm('forms/Teacher_form.html')">Teacher </a>
          </li>
      </div>
      </ul>
    </nav>
  </div>
  
  <!-- 16:9 aspect ratio -->
    <div class="form-area ">
      <iframe src="forms/Student_form.html" id="iframe" name="iframe" width="1000"    height="1000" frameborder="0" ></iframe>
    </div>
</div>




<?php include("include/footer.php"); ?>