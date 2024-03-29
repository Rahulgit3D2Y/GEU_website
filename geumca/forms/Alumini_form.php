<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Alumni</title>
  </head>
  <body >
    <form class="form p-3">
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-envelope"></i>
          <label for="email">Email:  </label>
          <input type="email" class="form-control" id="email" placeholder="Email" pattern=".+@gmail.com" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-user-graduate"></i>
          <label for="name">Alumni Name: </label>
          <input type="text" class="form-control" id="text" placeholder="" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-graduation-cap"></i>
          <label for="passout">Year of Passing out (UG/PG/Ph.D) </label>
          <input type="number" class="form-control" id="text" placeholder="20XX" maxlength="4" min="2018" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-building-columns"></i>
          <label for="Department">Department: </label>
          <input type="text" class="form-control" id="text" placeholder="" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-book"></i>
          <label for="program_name">Name of the Program: </label><br>
          <label for="program_name1"><input type="radio" name="program_name" id="program_name1" required>B.Tech</label><br>
          <label for="program_name2"><input type="radio" name="program_name" id="program_name2">M.Tech</label><br>
          <label for="program_name3"><input type="radio" name="program_name" id="program_name3">Ph.D</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-mobile-screen"></i>
          <label for="mob-num">Mobile Number: </label>
          <input type="number" class="form-control" placeholder="+91XXXX" minlength="9" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-question"></i>
          <label for="job_type">Type: </label><br>
          <label for="job_type1"><input type="radio" name="job_type" id="job_type1" required>Self-employed</label><br>
          <label for="job_type2"><input type="radio" name="job_type" id="job_type2">Private Sector</label><br>
          <label for="job_type3"><input type="radio" name="job_type" id="job_type3">Public Sector</label><br>
          <label for="job_type4"><input type="radio" name="job_type" id="job_type4">Academics</label><br>
          <label for="job_type5"><input type="radio" name="job_type" id="job_type5">Other</label><br>
          <label for="job_type6"><input type="text" name="job_type" id="job_type6" placeholder="If other explain"></label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-people-group"></i>
          <label for="org">Name of the Organization: </label><br>
          <label for="org1"><input type="radio" name="org" id="org1" required>Designation</label><br>
          <label for="org2"><input type="radio" name="org" id="org2">Present Location</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-briefcase"></i>
          <label for="field_work">Field of working: </label><br>
          <label for="field_work1"><input type="radio" name="field_work" id="field_work1" required>Core</label><br>
          <label for="field_work2"><input type="radio" name="field_work" id="field_work2">Inter-disciplinary</label><br>
          <label for="field_work3"><input type="radio" name="field_work" id="field_work3">IT Industry</label><br>
          <label for="field_work4"><input type="radio" name="field_work" id="field_work4">Administration</label><br>
          <label for="field_work5"><input type="radio" name="field_work" id="field_work5">Other:</label><br>
          <label for="field_work5"><input type="text" name="field_work" id="field_work5" placeholder="If other explain"></label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-book-open-reader"></i>
          <label for="prog_higher-edu">Progression to higher Education (After GEU) </label><br>
          <label for="prog_higher-edu1"><input type="radio" name="prog_higher-edu" id="prog_higher-edu1" required>Master’s Degree</label><br>
          <label for="prog_higher-edu2"><input type="radio" name="prog_higher-edu" id="prog_higher-edu2">Ph.D</label><br>
          <label for="prog_higher-edu3"><input type="radio" name="prog_higher-edu" id="prog_higher-edu3">Not Applicable</label><br>
          <label for="prog_higher-edu4"><input type="radio" name="prog_higher-edu" id="prog_higher-edu4">Other:</label><br>
          <label for="prog_higher-edu6"><input type="text" name="prog_higher-edu" id="prog_higher-edu5" placeholder="If other explain"></label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-regular fa-calendar-check"></i>
          <label for="admission-year">Year of admission: (After GEU) </label>
          <input type="number" class="form-control" placeholder="20XX" maxlength="4" min="2018" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-file-invoice"></i>
          <label for="prog-name">Name of Programme: (After GEU)</label>
          <input type="text" class="form-control" placeholder="full name" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <input type="submit" value="submit" class="sub">
        </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>