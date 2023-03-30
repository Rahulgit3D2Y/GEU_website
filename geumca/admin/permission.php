<?php
include("include/header.php");
require("permission_check.php");
?>
<?php 

$id=$_GET['id'];
$updatedatatstudentquery=mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$id'  AND `status` = \"Active\"AND `id`!='1'");
$result=mysqli_fetch_assoc($updatedatatstudentquery) OR die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='userpermission.php'</script>");
$loginnamecheck=$result['login'];
?>

<?php  
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
if(isset($_POST['save']))
{
    $deleteqry="DELETE FROM `modulepermission` WHERE `moduleuser_id`='$id'";
   $delteres=mysqli_query($con,$deleteqry);
   
   foreach ($_POST['subjectpermission'] as $key => $value)
    {
      # code...
      $subjectpermission=$_POST['subjectpermission'][$key];
      $s_id=$_POST['s_id'][$key];
      $c_id=$_POST['c_id'][$key];
   
   
mysqli_query($con,"INSERT INTO `modulepermission`(`modulemenu_id`,`modulesubmenu_id`,`moduleuser_id`,`modulepermission`,`createdby`,`createdtime`) values ('$s_id','$c_id','$id','$subjectpermission','$log','$date')",$cn) or die(mysqli_error());

   }
   echo "<script language='javascript'>alert('Permission Add Sucessfully');window.location='permission.php?id=$id'</script>";
   

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
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Menu</th>
                                            <th>SubMenu Name</th>
                                            <th>Permission  <input type="checkbox" id="select-all"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                   
                                $count = 0;
                                $sql=mysqli_query($con,"SELECT * FROM `submenu` INNER JOIN `menu` ON  submenu.`menu_id`= menu.`menu_id`  WHERE submenu.`status`=\"Active\" AND menu.`status`=\"Active\" ORDER BY `submenu`.`menu_id` ASC,`submenu`.`submenu_order` ASC ");
                                        while($result=mysqli_fetch_assoc($sql))  { ?>
   <input type="hidden" id="s_id[]" name="s_id[]" value="<?php echo $menuid= $result['menu_id'];?>">                 
 <input type="hidden" id="c_id[]" name="c_id[]" value="<?php echo $submenuid= $result['submenu_id'];?>">   
                                        <tr> 
           
                                            <td><?php $count+=1; echo $count; ?></td>

                                            <td><?php echo $result['menu_name']; ?></td>
                                            <td><?php echo $result['submenu_name']; ?></td>
                                           <td>
                                            <input type="hidden" id="s_id[]" name="s_id[]" value="<?php echo $menuid= $result['menu_id'];?>"> 
                                            <input type="hidden" id="c_id[]" name="c_id[]" value="<?php echo $submenuid= $result['submenu_id'];?>"> 
                                            <?php

$subjectpermission=mysqli_query($con,"SELECT `modulepermission` FROM `modulepermission` WHERE `modulesubmenu_id`='$submenuid' AND `moduleuser_id`='$id'");
$perresult=mysqli_fetch_assoc($subjectpermission);
$subjectpermission=$perresult['modulepermission']
                                            ?>
                                            <select class="form-select" name="subjectpermission[]" >
  <?php
        if ($subjectpermission=="Yes")
        {
        ?><option value="<?php echo $perresult['modulepermission'];?>"><?php echo $perresult['modulepermission'];?></option>
        <option value="No">No</option>

<?php
        } 
        elseif ($subjectpermission=="No")
         {?>
            <option value="<?php echo $perresult['modulepermission'];?>"><?php echo $perresult['modulepermission'];?></option>
          <option value="Yes">Yes</option>
       <?php 
      
   }
    else
    {
        ?>
        <option value="No">No</option>
        <option value="Yes">Yes</option>
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
                    </div>
                     <div class="mt-4 mb-0" align="center">
                        <input class="btn btn-primary" type="submit" name="save" value="Permission Grant" ></td>                          </div>
                </main>
            </form>
<script type="text/javascript">
            document.getElementById('select-all').onclick = function() {
    var checkboxes = document.getElementsByName('subjectpermission');
    for (var checkbox of checkboxes)
     {
        checkbox.checked = this.checked;
    }
}
        </script>
<?php
          include("include/footer.php");  
      ?>