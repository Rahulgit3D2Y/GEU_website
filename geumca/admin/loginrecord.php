<?php
include("include/header.php");
?>

  

  

            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <div class="card mb-4">
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Login Record
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                       
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Login Type</th>
                                            <th>Login Id</th>
                                            <th>Login Attempt</th>
                                            <th>Ip address</th>
                                            <th>Session key</th>
                                            <th>login DateTime</th>
                                            <th>logout DateTime</th>
                                            
                                          
                                             
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                         <th>S.No</th>
                                            <th>Login Type</th>
                                            <th>Login Id</th>
                                            <th>Login Attempt</th>
                                            <th>Ip address</th>
                                            <th>Session key</th>
                                            <th>login DateTime</th>
                                            <th>logout DateTime</th>
                                           
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT  * FROM `logindetail`");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;


                                        ?>
                                        <tr>  
                                                 
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['logintype']; ?></td>
                                            <td><?php echo $result['loginid']; ?></td>
                                            <td><?php echo $result['loginattempt']; ?></td>
                                            <td><?php echo $result['ipaddress']; ?></td>
                                            <td><?php echo $result['session_key']; ?></td>
                                            <td><?php echo $result['login_datetime']; ?></td>
                                            <td><?php echo $result['logout_datetime']; ?></td>
                                            
                                       

                                        </tr>


<?php

  }
?> 
      
                                </tbody>
                                </table>

                      </div>
                        </div>
                    </div>
                </main>

   
  <?php
include("include/footer.php");
?>
