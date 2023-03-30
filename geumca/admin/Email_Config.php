<?php
include("include/header.php");
require("permission_check.php");
?>


<?php

$SendmailQuery=mysqli_query($con,"SELECT * FROM `email_config` WHERE `id`='1'");
$SendmailQueryresult=mysqli_fetch_assoc($SendmailQuery)or die();
extract($_POST);
extract($_GET);
$date=date("d-m-Y h:i:sa");
?>

<?php 
if(isset($AddEmailSetting))
{
	$EmailSettingAddquery="UPDATE `email_config` SET `email_type`='$InputEmailEngine',`smtp_username`='$InputSMTPUsername',`smtp_password`='$InputSMTPPassword',`smtp_server`='$InputSMTPServer',`smtp_port`='$InputSMTPPort',`ssl_tls`='$InputSMTPSecurity',`email_status`='Active',`email_createdby`='$log',`email_createddatetime`='$date' WHERE `id` = '1'";
	mysqli_query($con,$EmailSettingAddquery);
	echo "<script language='javascript'>alert('Email Setting Added Successfully');window.location='$Currentwebsiteurl'</script>";
}


if(isset($UpadteEmailSetting))
{
	$EmailSettingUpdatequery="UPDATE `email_config` SET `email_type`='$InputEmailEngine',`smtp_username`='$InputSMTPUsername',`smtp_password`='$InputSMTPPassword',`smtp_server`='$InputSMTPServer',`smtp_port`='$InputSMTPPort',`ssl_tls`='$InputSMTPSecurity',`email_status`='Active',`email_updateby`='$log',`email_updatedatetime`='$date' WHERE `id` = '1'";
	mysqli_query($con,$EmailSettingUpdatequery);
	echo "<script language='javascript'>alert('Email Setting Updated Successfully');window.location='$Currentwebsiteurl'</script>";
}

?>
                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Email Setting</h3></div>
                                    <div class="card-body">
                                      
                                         <form action="" method="POST">
                                         	<?php if($SendmailQueryresult['email_type']=="SendMail") 
                                         	{ ?>
                                            <div class="row mb-3">
                                             
                                                 <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="InputEmailEngine" id="InputEmailEngine"  required="InputEmailEngine">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<option value="SMTP" selected>SMTP</option>
      </select>
                                                        <label for="InputEmailEngine">Email Engine</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPUsername" name="InputSMTPUsername" type="text" placeholder="Enter your SMTP Username" required="InputSMTPUsername"  />
                                                        <label for="InputSMTPUsername">SMTP Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPPassword" name="InputSMTPPassword" type="password" placeholder="Enter your SMTP Password" 
                                                        required="InputSMTPPassword" />
                                                        <label for="InputSMTPPassword">SMTP Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPServer" name="InputSMTPServer" type="text" placeholder="Enter your SMTP Server" 
                                                        required="InputSMTPServer" />
                                                        <label for="InputSMTPServer">SMTP Server</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                       <input class="form-control" id="InputSMTPPort" name="InputSMTPPort" type="text" placeholder="Enter your SMTP Port"  minlength="3" maxlength="3" max="3" min="3"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                                                        required="InputSMTPPort" />
                                                        <label for="InputSMTPPort">SMTP Port</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      <select class="form-select" name="InputSMTPSecurity" id="InputSMTPSecurity"  required="InputSMTPSecurity">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<option value="tls" selected>tls</option>
      </select>
                                                        <label for="InputSMTPSecurity">SMTP Security</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="AddEmailSetting" id="AddEmailSetting" Value="Save"/>                                             </div>
                                   
                                    </div>
                                <?php }  else {?>
<div class="row mb-3">
                                             
                                                 <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="InputEmailEngine" id="InputEmailEngine"  required="InputEmailEngine">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<option value="SMTP" selected>SMTP</option>
      </select>
                                                        <label for="InputEmailEngine">Email Engine</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPUsername" name="InputSMTPUsername" type="text" placeholder="Enter your SMTP Username" required="InputSMTPUsername" value="<?php echo $SendmailQueryresult['smtp_username'];?>"  />
                                                        <label for="InputSMTPUsername">SMTP Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                     <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPPassword" name="InputSMTPPassword" type="password" placeholder="Enter your SMTP Password" value="<?php echo $SendmailQueryresult['smtp_password'];?>" 
                                                        required="InputSMTPPassword" />
                                                        <label for="InputSMTPPassword">SMTP Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputSMTPServer" name="InputSMTPServer" type="text" placeholder="Enter your SMTP Server" value="<?php echo $SendmailQueryresult['smtp_server'];?>"
                                                        required="InputSMTPServer" />
                                                        <label for="InputSMTPServer">SMTP Server</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                       <input class="form-control" id="InputSMTPPort" name="InputSMTPPort" type="text" placeholder="Enter your SMTP Port" value="<?php echo $SendmailQueryresult['smtp_port'];?>"
                                                        required="InputSMTPPort"  minlength="3" maxlength="3" max="3" min="3"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                        <label for="InputSMTPPort">SMTP Port</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      <select class="form-select" name="InputSMTPSecurity" id="InputSMTPSecurity"  required="InputSMTPSecurity">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<option value="tls" selected>tls</option>
      </select>
                                                        <label for="InputSMTPSecurity">SMTP Security</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="UpadteEmailSetting" id="UpadteEmailSetting" Value="Update"/>                                             </div>
                                   
                                    </div>


                                <?php }?>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


<?php
include("include/footer.php");
?>