<?php
include("include/header.php");
require("permission_check.php");
?>
<?php 

$id=$_GET['id'];
$updatedatatstudentquery=mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$id'  AND `status` = \"Active\" AND `id`!='1'");
$result=mysqli_fetch_assoc($updatedatatstudentquery) OR die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='userpermission.php'</script>");
$loginnamecheck=$result['login'];
?>

<?php  
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
if(isset($_POST['save']))
{
    $deleteqry="DELETE FROM `mst_subjectpermission` WHERE `id`='$id'";
   $delteres=mysqli_query($con,$deleteqry);
   
   foreach ($_POST['subjectpermission'] as $key => $value)
    {
      # code...
      $subjectpermission=$_POST['subjectpermission'][$key];
      $c_id=$_POST['c_id'][$key];
   
   
mysqli_query($con,"INSERT INTO `mst_subjectpermission`(`c_id`,`id`,`subjectpermission`,`addby`,`created`) values ('$c_id','$id','$subjectpermission','$log','$date')",$cn) or die(mysqli_error());

   }
   echo "<script language='javascript'>alert('Permission Add Sucessfully');window.location='student_permission.php?id=$id'</script>";
   

}


?>
                     
              <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                          <div class="card-body">
                                <?php// echo $id;?> 
                                <input type="checkbox" checked disabled>
                                <b>Name:-</b><?php echo $result['first_name'] ." ".$result['middle_name']  ." ". $result['last_name']; ?><b> User Type:-</b><?php echo $result['type'];?> <b>Login ID:-</b><?php echo $result['login'];   ?>
                            </div> 
                        </div>
<form name="FROM" method="POST" action="" onSubmit="return check();">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Permission 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Course Id</th>
                                            <th>Course Name</th>
                                            <th>Permission</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>S.No</th>
                                            <th>Course Id</th>
                                            <th>Course Name</th>
                                            <th>Permission</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                   
                                $count = 0;
                                $sql=mysqli_query($con,"SELECT * FROM `course_detail`  WHERE `status`=\"Active\" ");
                                        while($result=mysqli_fetch_assoc($sql))  { ?>
                    
 <input type="hidden" id="c_id[]" name="c_id[]" value="<?php echo $courseid2= $result['course_id2'];?>">   
                                        <tr> 
           
                                            <td><?php $count+=1; echo $count; ?></td>

                                            <td><?php echo $result['course_id2']; ?></td>
                                            <td><?php echo $result['course_name']; ?></td>
                                           <td>
                                            <input type="hidden" id="c_id[]" name="c_id[]" value="<?php echo $courseid2= $result['course_id2'];?>"> 
                                            <?php

$subjectpermission=mysqli_query($con,"SELECT `subjectpermission` FROM `mst_subjectpermission` WHERE `c_id`='$courseid2' AND `id`='$id'");
$perresult=mysqli_fetch_assoc($subjectpermission);
$subjectpermission=$perresult['subjectpermission']
                                            ?>
                                            <select class="form-select" name="subjectpermission[]" >
  <?php
        if ($subjectpermission=="True")
        {
        ?><option value="<?php echo $perresult['subjectpermission'];?>"><?php echo $perresult['subjectpermission'];?></option>
        <option value="False">False</option>

<?php
        } 
        elseif ($subjectpermission=="False")
         {?>
            <option value="<?php echo $perresult['subjectpermission'];?>"><?php echo $perresult['subjectpermission'];?></option>
          <option value="True">True</option>
       <?php 
      
   }
    else
    {
        ?>
        <option value="False">False</option>
        <option value="True">True</option>
    <?php
     }
      ?>
       
    </select></td>
                                                                                </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                            </div>

                             
                        </div>
                    </div>
                     <div class="mt-4 mb-0" align="center">
                        <input class="btn btn-primary" type="submit" name="save" value="Permission Grant" ></td>                          </div>
                </main>
            </form>

<?php
          include("include/footer.php");  
      ?>