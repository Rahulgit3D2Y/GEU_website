<?php include("include/subheader.php"); 
require 'admin/phpmailer/PHPMailerAutoload.php';
?>
<title>Contact US - DCA | GEU </title>
      <!-- Title -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h1 class="text-center fw-bold display-4 mb-5">Contact</h1>
            </div>    
        </div>
      </div>
  </section>

<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
$currentdateonly=date("Y-m-d");
$timeonly=date("h:i:sa");
extract($_REQUEST);
if(isset($Sendmsg))
{
    $EmailQuerySql=mysqli_query($con,"SELECT * FROM `email_config` WHERE `id`='1'");
$EmailQuerySqlResult=mysqli_fetch_assoc($EmailQuerySql)or die();
    $mail = new PHPMailer;

mysqli_query($con,"INSERT INTO `contactus`(`contactus_session`,`contactus_name`, `contactus_email`,`contactus_subject`,`contactus_number`, `contactus_message`, `contactus_status`, `contactus_createddatetime`) VALUES ('$activesession_record_add','$name','$email','$subject','$Number','$message','Active','$date')") or die(mysqli_error());
    $_SESSION['COID']=mysqli_insert_id($con);

$mail->isSMTP();  

$mail->Host = $EmailQuerySqlResult['smtp_server'];   // Specify main and backup SMTP servers
$mail->SMTPSecure = $EmailQuerySqlResult['ssl_tls'];              // Enable TLS encryption, `ssl` also accepted
$mail->Port = $EmailQuerySqlResult['smtp_port'];  
$mailusergmail=$EmailQuerySqlResult['smtp_username'];
$mailusergmailpassword=$EmailQuerySqlResult['smtp_password'];


$mailusername="no-reply GEUMCA";
$mail->SMTPAuth = true;   
$mail->isHTML(true);                             // Enable SMTP authentication
$mail->Username = "$mailusergmail";                 // SMTP username
$mail->Password = "$mailusergmailpassword";                           // SMTP password
                                 // TCP port to connect to
$mail->setFrom("$mailusergmail", "$mailusername");
$mail->addReplyTo("$mailusergmail", "$mailusername");



$mail->addAddress("$email", "$name");     // Add a recipient

$mail->Subject = "$subject";
$mail->Body    = "$message";

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if(!$mail->send())
 {
   $errormsg=$mail->ErrorInfo;
   $mailfailquery="UPDATE `contactus` SET `contactus_mailstatus`='Failed',`contactus_maildate`='$currentdateonly',`contactus_mailtime`='$timeonly',`contactus_mailsenddatetime`='$date',`contactus_mailreason`='$errormsg' WHERE `contactus_id`='".$_SESSION['COID']."' ";
   mysqli_query($con,$mailfailquery);
}
 else
 {
    $mailquery="UPDATE `contactus` SET `contactus_mailstatus`='Success',`contactus_maildate`='$currentdateonly',`contactus_mailtime`='$timeonly',`contactus_mailsenddatetime`='$date',`contactus_mailreason`='' WHERE `contactus_id`='".$_SESSION['COID']."'";
   mysqli_query($con,$mailquery);
}
   
     echo "<script language='javascript'>alert('Message Send SuccessFully');window.location='contact.php'</script>";
}

?>

    
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
          <form method="POST" action="contact.php" name="Contact-us">
          <input type="text" name="name" placeholder="Enter your name" required>
          <input type="email" name="email" placeholder="Enter email address"  required>
          <input type="number" name="Number" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required>
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