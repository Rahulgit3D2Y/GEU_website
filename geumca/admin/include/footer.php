
    <!-- footer content-->
               <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" data-bs-toggle="modal" data-bs-target="#ShowUserDetail">Copyright &copy; Paritosh Bisht <?php echo date("Y"); ?></div>
                         
                        </div>
                    </div>
                </footer>
            </div>
        </div>
         <!---------------------  View User  Modal ---------------------------->
<div class="modal fade" id="ShowUserDetail" tabindex="-1" aria-labelledby="ShowUserDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="ShowUserDetailLabel">User Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        
      <div class="modal-body">

Name:- Paritosh Bisht 
<br>      
Mail:- <a href="mailto:Paritoshbisht05@gmail.com">Paritoshbisht05@gmail.com</a>
<br>
Mobile:-<a href="tel:7302020015">7302020015</a>
<br>

<div class="icon-bar" align="center">
     Follow Us On
     <br>
 <a  href="https://www.facebook.com/paritoshbisht19/" target="_blank"><i class="fab fa-facebook-square"></i></a>&nbsp;
 <a  href="https://www.instagram.com/paritoshbisht_19/"  target="_blank"><i class="fab fa-instagram"></i></a>&nbsp;
 <a  href="https://twitter.com/ParitoshBisht"  target="_blank"><i class="fab fa-twitter"></i></a>&nbsp;
 <a  href="https://www.linkedin.com/in/paritoshbisht/"  target="_blank"><i class="fab fa-linkedin"></i></a>
 </div> 
        
        
      </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>
<!---------------------  Session  Modal ---------------------------->
<div class="modal fade" id="sessionmodal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="sessionmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="sessionmodalLabel">Session Change </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php
if(isset($sessionchange))
{
    $usercurrentdateyear=$_POST['inputsessionyear']; 
    $usercurrentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$usercurrentdateyear'");
            $usercurrentsessionqueryrow1=mysqli_fetch_array($usercurrentsessionquery);
            $usercurrentsessionyearrecord = $usercurrentsessionqueryrow1['session_year'];


$updateusercurrentsession= "UPDATE `user` SET `current_session`='$usercurrentsessionyearrecord' WHERE `id`='$log'";
    mysqli_query($con,$updateusercurrentsession);
  echo "<script language='javascript'>alert('Session Change Successfully')</script>";
   echo "<script language='javascript'>location = self.location.href</script>";
    //echo "<meta http-equiv=\"refresh\" content=\"0;>";
    //exit();
}

      ?>
      <div class="modal-body">
    
                                  <div class="row mb-3">
                                             
                                              
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" onselect="document.getElementById('$inputsessionyear');">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[0])
{?>
<option value='<?php echo $rowsession[3];?>'<?php if($activesession_record==$rowsession[1])
{
    echo"selected";
} ?>><?php echo $rowsession[1];?></option>
<?php
}
}
?>
      </select>
                                                        <label for="inputsessionyear"> Select Session</label>
                                                    </div>
                                                </div>

                                    <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                 <input class="btn btn-success" type="submit" name="sessionchange" id="sessionchange" value="Change" >
                                                    </div>
  </div>

                                            </div>

                           
                                 </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end Session modal ------------------------------------------>

<!---------------------------------------------- end User modal ------------------------------------------> 
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/datatables-simple-demo-2.js"></script>
        <script src="js/datatables-simple-demo-3.js"></script>
          <script src="js/datatable.exportable.min.js"></script>
            <script src="js/datatable.exportable.js"></script>
           
    

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    
 <script>
$(document).ready(function() {  
$('#datatablesSimpl').DataTable( {
     title: 'Geu-Computer Application',
 "autoWidth": true,
 "pageLength": 50,
 dom: 'Bfrtip',
 buttons: [
 'copyHtml5',
 'excelHtml5',
 'csvHtml5',
 //'pdfHtml5'
]
 } );
} );
</script>
<script>
$(document).ready(function() {  
$('#NewRecordTabl').DataTable( {
     title: 'Geu-Computer Application',
    "autoWidth": true,
    "pageLength": 50,
 dom: 'Bfrtip',
 buttons: [
 'copyHtml5',
 'excelHtml5',
 'csvHtml5',
 //'pdfHtml5'
]
 } );
} );
</script>
 <?php
   if($Birthdaymessagepopupstatus=="Active")
    {
$Dateofbirthday = date("d-m", strtotime($res['dob']));
//echo $BirthdayDate = date("d-m");
//echo $BirthdayDate;
$CurrentDate = date("d-m");
//echo $CurrentDate;
if($Dateofbirthday==$CurrentDate)
{
    ?>


    <script>
       $(document).ready(function(){
            $('#DateOFbirthdaymodalpopup').modal('show');
        }); 
    </script>
    <?php } } ?>
        
        <?php if($documentuplaodsettingpopupstatus=="Active") { 
            if($fileuploaduserqueryresultrsphotovalue=="False") { ?>
      <script>  $(document).ready(function(){   $('#userfileuploadmodalpopup').modal('show');  }); </script> 
      <?php } }?>
 <style type="text/css">
    table, th, td {
  border: .1px solid black;
  border-collapse: collapse;
}
</style>
 <script>
function goBack() {
  window.history.back()
}
</script>
          
    </body>

</html>

