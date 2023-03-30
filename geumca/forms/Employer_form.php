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

    <title>Employee_Form</title>
  </head>
  <body >
    <form class="form p-3">
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-envelope"></i>
          <label for="email">Email:  </label>
          <input type="email" class="form-control" id="email" placeholder="xxx@gmail.com" pattern=".+@gmail.com" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-circle-user"></i>
          <label for="name">Name: </label>
          <input type="text" class="form-control" id="name" placeholder="" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-signature"></i>
          <label for="Designation">Designation: </label>
          <input type="text" class="form-control" id="designation" placeholder="" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-calendar-days"></i>
          <label for="date">Date: </label>
          <input type="date" id="start" name="trip-start"  required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-check"></i>
          <label for="">Tick appropriate reply</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-masks-theater"></i>
          <label for="employee_question1"> Performance of our Graduates: </label><br>
          <label for="employee_question11"><input type="radio" name="employee_question1" id="employee_question11" required>Excellent</label><br>
          <label for="employee_question12"><input type="radio" name="employee_question1" id="employee_question12">Good</label><br>
          <label for="employee_question13"><input type="radio" name="employee_question1" id="employee_question13">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-sharp fa-solid fa-glasses"></i>
          <label for="employee_question2"> Inclination to adopt new Technology: </label><br>
          <label for="employee_question21"><input type="radio" name="employee_question2" id="employee_question21" required>Excellent</label><br>
          <label for="employee_question22"><input type="radio" name="employee_question2" id="employee_question22">Good</label><br>
          <label for="employee_question23"><input type="radio" name="employee_question2" id="employee_question23">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-comments"></i>
          <label for="employee_question3"> Communication Skills: </label><br>
          <label for="employee_question31"><input type="radio" name="employee_question3" id="employee_question31" required>Excellent</label><br>
          <label for="employee_question32"><input type="radio" name="employee_question3" id="employee_question32">Good</label><br>
          <label for="employee_question33"><input type="radio" name="employee_question3" id="employee_question33">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-lightbulb"></i>
          <label for="employee_question4"> Independent Thinking & Problem Solving Ability: </label><br>
          <label for="employee_question41"><input type="radio" name="employee_question4" id="employee_question41" required>Excellent</label><br>
          <label for="employee_question42"><input type="radio" name="employee_question4" id="employee_question42">Good</label><br>
          <label for="employee_question43"><input type="radio" name="employee_question4" id="employee_question43">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-people-carry-box"></i>
          <label for="employee_question5"> Leadership qualities: </label><br>
          <label for="employee_question51"><input type="radio" name="employee_question5" id="employee_question51" required>Excellent</label><br>
          <label for="employee_question52"><input type="radio" name="employee_question5" id="employee_question52">Good</label><br>
          <label for="employee_question53"><input type="radio" name="employee_question5" id="employee_question53">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-people-group"></i>
          <label for="employee_question6"> Interpersonal relations and Team work: </label><br>
          <label for="employee_question61"><input type="radio" name="employee_question6" id="employee_question61" required>Excellent</label><br>
          <label for="employee_question62"><input type="radio" name="employee_question6" id="employee_question62">Good</label><br>
          <label for="employee_question63"><input type="radio" name="employee_question6" id="employee_question63">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <label for="employee_question7">	Ethics & Professional qualities: </label><br>
          <label for="employee_question71"><input type="radio" name="employee_question7" id="employee_question71" required>Excellent</label><br>
          <label for="employee_question72"><input type="radio" name="employee_question7" id="employee_question72">Good</label><br>
          <label for="employee_question73"><input type="radio" name="employee_question7" id="employee_question73">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-users"></i>
          <label for="employee_question8"> Involvement in social activities: </label><br>
          <label for="employee_question81"><input type="radio" name="employee_question8" id="employee_question81" required>Excellent</label><br>
          <label for="employee_question82"><input type="radio" name="employee_question8" id="employee_question82">Good</label><br>
          <label for="employee_question83"><input type="radio" name="employee_question8" id="employee_question83">Satisfactory</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-person-dots-from-line"></i>
          <label for="employee_question9">Would you like to recruit more Graduates from GEU in future ? </label><br>
          <label for="employee_question91"><input type="radio" name="employee_question9" id="employee_question91" required>Yes</label><br>
          <label for="employee_question92"><input type="radio" name="employee_question9" id="employee_question92">No</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-heart"></i>
          <label for="employee_question10">Would you refer us to other organizations? </label><br>
          <label for="employee_question101"><input type="radio" name="employee_question10" id="employee_question101" required>Yes</label><br>
          <label for="employee_question102"><input type="radio" name="employee_question10" id="employee_question102">No</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-network-wired"></i>
          <label for="employee_question11">Would you like to associate with our organization in any other way? </label><br>
          <label for="employee_question111"><input type="radio" name="employee_question11" id="employee_question111" required>Yes</label><br>
          <label for="employee_question112"><input type="radio" name="employee_question11" id="employee_question112">No</label><br>
        </div>
      </div>
      <div class="form-group">
        <div class="form-group col-md-12">
          <i class="fa-solid fa-pen-to-square"></i>
          <label for="if">(If Yes, Please specify)</label>
          
        <div class="form-group col-md-12">
          <textarea name="if" id="" cols="50" rows="4" placeholder="Write Here ...."style="width:100%;"></textarea>
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