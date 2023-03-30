<?php

include("include/header.php");
require("permission_check.php");
?>

            
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Contact Page Detail
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            
                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
                                       $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `contactus` WHERE  `contactus_session`='$activesession_record'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;



                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['contactus_createddatetime']));  ?></td>
                                            
                                             <td><?php echo $result['contactus_name']; ?></td>
                                             <td><?php echo $result['contactus_email']; ?></td>
                                            <td><?php echo $result['contactus_number']; ?></td>
                                            <td><?php echo wordwrap($result['contactus_subject'],20,"<br>\n"); ?></td>
                                            <td><?php echo wordwrap($result['contactus_message'],50,"<br>\n"); ?></td>
                                            
                                           
                                            
                                           
                                             
                                            
                                           
                                        

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                        ?>

                                       
                                       
                                       
                                       
                                    
                                       
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
  </div>

                </main>

 <?php
include("include/footer.php");
    ?>