<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
  date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "InActive";
$year=date("Y");

$sessionextract=mysqli_query($con,"SELECT * FROM `session`ORDER BY `id` DESC LIMIT 1;");
$sessionextractresult=mysqli_fetch_assoc($sessionextract) OR die("");
$current_year_record=$sessionextractresult['f_date'];
$last_year_record=$sessionextractresult['l_date'];
  if(isset($submit))
{
	$postfullyear=$_POST['inputDateFrom'];
    $postfullonlyyear=date("Y", strtotime($postfullyear));
    $fyear=date("y", strtotime($postfullyear));
    $postlastyear=$_POST['inputDateTo'];
    $postlastfullonlyyear=date("Y", strtotime($postlastyear));
    $lyear=date("y", strtotime($postlastyear));
$session_yearrecord=$postfullonlyyear."-".$postlastfullonlyyear;
	    $rnotice=mysqli_query($con,"SELECT * FROM `session` WHERE `fyear`='$fyear' AND `lyear` = '$lyear'");
if (mysqli_num_rows($rnotice)>0)
{
    echo "<script language='javascript'>alert('session is already Registered');window.location='session.php'</script>";
exit();
} 
        mysqli_query($con,"INSERT INTO `session`(`session_year`,`full_year`,`fyear`, `last_year`, `lyear`,`f_date`,`l_date`, `status`, `createdby`, `createdtime`) VALUES ('$session_yearrecord','$postfullonlyyear','$fyear','$postlastfullonlyyear','$lyear','$postfullyear','$postlastyear','$status','$log','$date')") or die(mysqli_error("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='session.php'</script>"));
echo "<script language='javascript'>alert('$session_yearrecord session Added Successfully')</script>"; 
    echo "<script>window.location='session.php'</script>";
}


  ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Session</h3></div>
                                    <div class="card-body">
                                        <?php

//$Current_year = date('Y');
$last_year_record_1= date('Y-m-d',strtotime('+1 Year',strtotime($last_year_record)));
//echo $current_year_record;
//echo $last_year_record;
  ?>
                                         <form action="" method="POST"  onSubmit="return check();" enctype="multipart/form-data" >
                                            <div class="row mb-3">
                                             
                                                
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateFrom" name="inputDateFrom" type="date" value="<?php echo $last_year_record;?>" 
                                                        required="inputDateFrom" />
                                                        <label for="inputDateFrom">Year From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputDateTo" name="inputDateTo" type="date"  value="<?php echo $last_year_record_1;?>" 
                                                        required="inputDateTo" />
                                                        <label for="inputDateTo">Date To</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            
                                          

                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
    
                            </div>
                           
                        </div>
                        <br>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Session Record
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Session</th>
                                           <th>From</th>
                                           <th>Till</th>
                                           
                                           <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Session</th>
                                           <th>From</th>
                                           <th>Till</th>
                                           
                                           <th>Active</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `session`   ORDER BY `session`.`session_year` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['id'];

                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['session_year']; ?></td>
                                            <td><?php echo $noticequeryresult['full_year']; ?></td>
                                            <td><?php echo $noticequeryresult['last_year']; ?></td>
                                            
                                            
                                            <td><?php if($noticequeryresult['status']=="Active") { ?>
                                                 This Session Is Active
                                                <?php } else {?>
                                                    <a href="?activesession=<?php echo $id;?>" ><i class="fas fa-plus-circle"></i></a>
                                                    <?php } ?></td>
                                          
                                        </tr>
                                        <?php
if((isset($_GET['activesession'])) && $_GET['activesession']=="$id")
   {

    
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
   $inactivequery="UPDATE `session` SET `status`='InActive'";
   mysqli_query($con,$inactivequery);
    $query="UPDATE `session` SET `status`='Active',`updateby`='$log',`updatetime`='$date' WHERE `id` ='$id'";   
mysqli_query($con,$query);
  echo "<script language='javascript'>alert('Session Active');window.location='session.php'</script>";
  }
?>
                                       
                                        <?php
                                    }
                                        ?>

                                       
                                    </tbody>
                                </table>
                            </div>
    
                                </div>
                    
                </main>
 <?php
include("include/footer.php");
    ?>