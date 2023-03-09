<?php include("include/subheader.php"); ?>

      <!-- Title -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Syllabus</h1>
            </div>    
        </div>
      </div>
  </section>

  <!-- Content -->

  <section >
      <form class="d-flex p-3 scolor">
        <div class="form-group mr-2">
          <label for="course-dropdown">Course:</label>
          <select class="form-control" id="course-dropdown" required>
            <option value>Select One</option>
            <option>BCA</option>
            <option>BCA IT</option>
            <option>MCA</option>
          </select>
        </div>
        <div class="form-group mr-2">
          <label for="session-dropdown">Session:</label>
          <select class="form-control" id="session-dropdown" required>
            <option value>Select One</option>
            <option>Session 1</option>
            <option>Session 2</option>
            <option>Session 3</option>
          </select>
        </div>
        <div class="form-group mr-2">
          <label for="semester-dropdown">Semester:</label>
          <select class="form-control" id="semester-dropdown" required>
            <option value>Select One</option>
            <option>Semester 1</option>
            <option>Semester 2</option>
            <option>Semester 3</option>
            <option>Semester 4</option>
            <option>Semester 5</option>
            <option>Semester 6</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Check</button>
      </form>
  </section>

  <div class="iframe-body">
    <iframe src="pdf/holiday.pdf" width="1000" height="1000" id="pdf-iframe"> </iframe>
  </div>
</div>

  

 <?php include("include/footer.php"); ?>