<?php
include("include/header.php");
require("permission_check.php");
?>

<div class="modal fade" id="exampledeletecourse" tabindex="-1" aria-labelledby="exampledeletecourseLabel" aria-hidden="true">
  <div class="modal-dialog">  <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">
<?php 
 extract($_POST);
extract($_GET); 
extract($_REQUEST); 
?>
      
        <h5 class="modal-title" id="exampledeletecourseLabel">Course Delete <?php  echo $id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php 
        
    
    if(isset($deletedues))
{
    
        $query="UPDATE `student` SET  `fee_status`=\"Dues\" where `admission_id` ='$deleteduesstudentid'";
    mysqli_query($con,$query);
 $feedeletedquery="UPDATE `fee` SET `course_id`='',`course_fee`='',`course_duration`='',`status`='',`disableby`='$log',`disabletime`='$date'  WHERE `student_id`='$deleteduesstudentid'";
mysqli_query($con,$feedeletedquery);
    echo "<script language='javascript'>alert('dues is deleted');window.location='$Currentwebsiteurl'</script>";
}
?>
      <div class="modal-body">
        <input type="text" name="deleteduesstudentid" id="deleteduesstudentid" value="<?php echo $id;?>">
        <div class="mb-3">
            <label for="DiscountRemark" class="col-form-label">Discount Remark:</label>
            <textarea class="form-control" id="DiscountRemark" name="DiscountRemark"></textarea>
          </div>
      <h4> Do You Want To Delete <?php echo $studentresult['first_name']." ".$studentresult['middle_name']." ".$studentresult['last_name'];  ?></h4>
      </div>
      <div class="modal-footer">
         <?php if($id){ ?>
       <input class="btn btn-success" type="submit" name="deletedues" id="deletedues" value="Yes" >
    <?php } else {?> 
        <input class="btn btn-success" type="submit" name="deletedues" id="deletedues" disabled value="Yes" > 
    <?php } ?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div></form>
  </div>
</div>

            
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
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>College Name</th>
                                            <th>Course Id</th>
                                            <th>Course Name</th>
                                            <th>Course Duration</th>
                                            
                                            <th>Add BY</th>
                                            <th>Update BY</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>S.No</th>
                                          <th>College Name</th>
                                            <th>Course Id</th>
                                            <th>Course Name</th>
                                            <th>Course Duration</th>
                                            
                                            <th>Add BY</th>
                                            <th>Update BY</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        function generateRandomString($length=20)
{
    return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&@#$',ceil($length/strlen($x)))),1,$length);
}
 function generateRandomNumber($length=2)
{
    return substr(str_shuffle(str_repeat($x='0123456789',ceil($length/strlen($x)))),1,$length);
}
$randomnumber=generateRandomNumber();
 $random=generateRandomString();
                                        $count = 0;
                                $sql=mysqli_query($con,"SELECT  *
                                    ,mst_subjectpermission.`c_id`,mst_subjectpermission.`id`,mst_subjectpermission.`subjectpermission` FROM `course_detail` INNER JOIN `mst_subjectpermission` on mst_subjectpermission.`c_id`=course_detail.`course_id2`   WHERE  mst_subjectpermission.`id`='$log' AND mst_subjectpermission.`subjectpermission`=\"True\" AND course_detail.`status`=\"Active\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
$created_user_id=$result['createdby'];
$updated_user_id=$result['updateby'];
$id=$result['course_id'];
$did=$result['department_id'];

                                $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                $row12=mysqli_fetch_array($result123);
                                $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                $row1=mysqli_fetch_array($result12);
                                $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                $department=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`=\"$did\"");
                                $departmentrow1=mysqli_fetch_array($department);
                                $departmentName=$departmentrow1['campus_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                             <td><?php echo $departmentName; ?></td>
                                            <td><?php echo $result['course_id2']; ?></td>
                                            <td><?php echo $result['course_name']; ?></td>
                                            <td><?php echo $result['course_duration']; ?> Year</td>
                                           
                                             <td><?php echo $user_login_name; ?></td>
                                              <td><?php echo $upadted_user_login_name; ?></td>
                                            <td><a href="update_course.php?course_id=<?php echo $id;?>MID=<?php echo $random;?>MODULE=<?php echo $randomnumber;?>"><span class='fas fa-edit'></span></a></td>
                                            <td>
                                                <a href="course_delete.php?course_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a>
                                                 <!--<a href="#" data-bs-toggle="modal" data-bs-target="#exampledeletecourse"><span class='fas fa-trash' ></span></a>-->
                                               <!--<button type="button" class="btn btn-danger deletebtn"> Delete</button>-->
                                               </td>
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