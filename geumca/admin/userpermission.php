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
                                Course
                            </div>
                            <div class="card-body">
                            	<div style="overflow-x:auto;">
                               <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>User Id</th>
                                            <th>Login Id</th>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Email</th>
                                           
                                            <th>User Type</th>
                                           <th>Module Permission</th>
                                            <th>Course Permission</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `user` WHERE `status`=\"ACTIVE\" AND `id` != '1'AND `id` != '9'");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['id'];
$created_user_id=$noticequeryresult['createdby'];
$updated_user_id=$noticequeryresult['updateby'];
                                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['user_id']; ?></td>
                                            <td><?php echo $noticequeryresult['login']; ?></td>
                                            <td><?php echo $noticequeryresult['first_name'] ." ".$noticequeryresult['middle_name']  ." ". $noticequeryresult['last_name']; ?></td>
                                             
                                            <td><?php  if($login_user_type=="superuser") {echo  $noticequeryresult['number']; } else { echo str_pad(substr($noticequeryresult['number'], -3), strlen($noticequeryresult['number']), '*', STR_PAD_LEFT);} ?></td>
                                            <td><?php echo $noticequeryresult['email']; ?></td>
                                            
                                            <td><?php echo $noticequeryresult['type']; ?></td>
                                            <td><a href="permission.php?id=<?php echo $id;?>"><span class='fas fa-users-cog'></span></a></td>
                                             <td><a href="student_permission.php?id=<?php echo $id;?>"><span class='fas fa-users-cog'></span></a></td>
                                             
                                            
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