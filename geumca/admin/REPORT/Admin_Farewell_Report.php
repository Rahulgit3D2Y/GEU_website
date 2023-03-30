

<?php
include("../include/header.php");
?>


                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Course</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                            
                                                 
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your Course Id" required="inputFirstName" minlength="3" maxlength="3" max="3" min="3"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="Enter The Number" />
                                                        <label for="inputFirstName">Course ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your Course name" 
                                                        required="inputLastName" />
                                                        <label for="inputLastName">Course Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputCourseType" id="inputCourseType" required="inputCourseType" onchange="inputCourseType()">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
           <option selected="selected" value="Yearly">Yearly</option>
           <!--<option  value="Semester">Semester</option>-->
                                                        </select>
                                                        <label for="inputCourseType">Course Type</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCourseDuration" name="inputCourseDuration" type="text" placeholder="Enter your Course Duration" max="1" min="1" maxlength="1" minlength="1" 
                                                        required="inputCourseDuration" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                        <label for="inputCourseDuration">Course Duration</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                
                                                
                                                
                                            </div>

                                           <!--<div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="issuedate" name="issuedate" type="date" placeholder="Create a password" />
                                                        <label for="inputPassword">Date Of Issue</label>
                                                    </div>
                                                </div>-->
                                              <!--  <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>                                            </div>
                                        </form>
                                    </div>
                                   <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php
          include("../include/footer.php");  
      ?>