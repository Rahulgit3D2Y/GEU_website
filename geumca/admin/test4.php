<?php
include("include/header.php");
//require("permission_check.php");
?>
 <style type="text/css">
        
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
<!---------------------  addnotes  Modal ---------------------------->
<div class="modal fade" id="addMenu" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddNotesLabel" aria-hidden="true">
	<?php 
 
extract($_POST);
extract($_GET);
    
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addmenu))
{
    $menustatus="Active";
     $rs=mysqli_query($con,"SELECT * FROM `header` WHERE `header_name`='$menuname'  ");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('header Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    //echo "<script language='javascript'>alert('$menuname')</script>";
    //echo "<script language='javascript'>alert('$menuicon')</script>";
    //echo "<script language='javascript'>alert('$menuorder')</script>";
    //echo "<script language='javascript'>alert('$menustatus')</script>";
    //echo "<script language='javascript'>alert('$log')</script>";
    //echo "<script language='javascript'>alert('$date')</script>";
        mysqli_query($con,"INSERT INTO `header`(`header_name`, `header_url`,`header_order`,`header_display`, `header_status`,`header_pagemore`, `header_createdby`, `header_createdtime`,`header_newpagetraget`) VALUES ('$menuname','$headerurl','$menuorder','$menustatus','$menustatus','No','$log','$date','No')");


echo "<script language='javascript'>alert('$menuname header Added succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddNotesLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <?php
   $menuorder=mysqli_query($con,"SELECT * FROM `header` WHERE `header_pagemore`='No' ORDER BY `header_id` DESC LIMIT 1;");
$menuorderresult=mysqli_fetch_assoc($menuorder);
$menu_order=$menuorderresult['header_order'];
$increase_menu_order=$menu_order+1;
?>
                    
      <div class="modal-body">
              
          <div class="row mb-3">
          <div class="col-md-4">
             <label for="menuname" class="col-form-label">header Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="menuname" name="menuname" required>
          </div>
          <div class="col-md-4">
            
             <label for="headerurl" class="col-form-label">header Url<span style="color: red">*</span> </label>
            <input type="text"  class="form-control" id="headerurl" name="headerurl"  required>
          </div>
         
          <div class="col-md-2">
            
             <label for="menuorder" class="col-form-label">header Order<span style="color: red">*</span> </label>
            <input type="text" value="<?php echo $increase_menu_order;?>" class="form-control" id="menuorder" name="menuorder"  required>
          </div>
           <div class="col-md-2">
            
             <label for="MoreMenuTargetPage" class="col-form-label">Traget Url<span style="color: red">*</span> </label>
             <select class="form-select" id="MoreMenuTargetPage" name="MoreMenuTargetPage"  required>
                 <option disabled >Select </option>
                 <option value="No" selected>Self</option>
                 <option value="Yes" disabled>New Window</option>
             </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addmenu" id="addmenu" value="Add" >
    
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end addnotes modal ------------------------------------------>



<!---------------------  More Content  Modal ---------------------------->
<div class="modal fade" id="AddMoreContentModel" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="AddMoreContentModelLabel" aria-hidden="true">
   <?php 
 
extract($_POST);
extract($_GET);
    
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
    if(isset($addmoremenu))
{
    $menustatus="Active";
     $rs=mysqli_query($con,"SELECT * FROM `header` WHERE `header_name`='$menuname'  ");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('header Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit();
} else
{
    //echo "<script language='javascript'>alert('$moremenuname')</script>";
    //echo "<script language='javascript'>alert('$menuicon')</script>";
    //echo "<script language='javascript'>alert('$moremenuorder')</script>";
    //echo "<script language='javascript'>alert('$menustatus')</script>";
    //echo "<script language='javascript'>alert('$log')</script>";
    //echo "<script language='javascript'>alert('$date')</script>";
        mysqli_query($con,"INSERT INTO `header`(`header_name`, `header_url`,`header_order`,`header_display`, `header_status`,`header_pagemore`, `header_createdby`, `header_createdtime`,`header_newpagetraget`) VALUES ('$moremenuname','$moreheaderurl','$moremenuorder','$menustatus','$menustatus','Yes','$log','$date','$MoreMenuTargetPage')");


echo "<script language='javascript'>alert('$moremenuname header Added succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
   
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="AddMoreContentModelLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <?php
   $menuorder=mysqli_query($con,"SELECT * FROM `header`WHERE `header_pagemore`='Yes' ORDER BY `header_id` DESC LIMIT 1;");
$menuorderresult=mysqli_fetch_assoc($menuorder);
$menu_order=$menuorderresult['header_order'];
$increase_menu_order=$menu_order+1;
?>
                    
      <div class="modal-body">
              
          <div class="row mb-3">
          <div class="col-md-4">
             <label for="moremenuname" class="col-form-label">header Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="moremenuname" name="moremenuname" required>
          </div>
          <div class="col-md-4">
            
             <label for="moreheaderurl" class="col-form-label">header Url<span style="color: red">*</span> </label>
            <input type="text"  class="form-control" id="moreheaderurl" name="moreheaderurl"  required>
          </div>
         
          <div class="col-md-2">
            
             <label for="moremenuorder" class="col-form-label">header Order<span style="color: red">*</span> </label>
            <input type="text" value="<?php echo $increase_menu_order;?>" class="form-control" id="moremenuorder" name="moremenuorder"  required>
          </div>
          <div class="col-md-2">
            
             <label for="MoreMenuTargetPage" class="col-form-label">Traget Url<span style="color: red">*</span> </label>
             <select class="form-select" id="MoreMenuTargetPage" name="MoreMenuTargetPage"  required>
                 <option disabled >Select </option>
                 <option value="No">Self</option>
                 <option value="Yes" selected>New Window</option>
             </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="addmoremenu" id="addmoremenu" value="Add" >
    
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end More Content modal ------------------------------------------>


 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                      <hr>
<div class="tab">
  <button class="tablinks" id="tablinks" onclick="HeaderEventTab(event, 'HeaderPage')">Main Header Content</button>
  <button class="tablinks" id="tablinks" onclick="HeaderEventTab(event, 'MoreHeaderContent')">More Page Content</button>
  
</div>
<div id="HeaderPage" class="tabcontent">
                        <div class="card mb-4">
                            <div class="card-body">
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenu"> <span class="fas fa-plus-circle"></span> Add header Name</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Menu
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Header Name</th>
                                           <th>Header Url</th>
                                            <th>Header Order</th>
                                            <th>Display</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `header` WHERE `header_status`='Active' AND `header_pagemore`='No'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['header_id'];     
$created_user_id=$result['header_createdby'];
$updated_user_id=$result['header_updateby'];
//$modulename=$result['popupname'];


                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];


                                        ?>

                                        <tr>        
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $result['header_name']; ?></td>
                                    <td><?php echo $result['header_url']; ?></td>
                                    <td><?php echo $result['header_order']; ?></td>
                                    <td><?php if($result['header_display']=="Active") 
                                    { ?> <a href="test4.php?header_id=<?php echo $result['header_id'];?>&action=Hide&model=HeaderPage" onclick="return confirm('Do you really want to Hide <?php echo $result['header_name'] ?> Module?');">Hide <?php }
                                     else { ?><a href="test4.php?header_id=<?php echo $result['header_id'];?>&action=Show&model=HeaderPage" onclick="return confirm('Do you really want to Show <?php echo $result['header_name'] ?> Module?');"> Show <?php } ?></td>
                                    <td><?php echo  $user_login_name; ?></td>
                                    <td><?php echo $upadted_user_login_name; ?></td>
                                    <td><a href="menu_update.php?menu_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                    <td><a href="menu_delete.php?menu_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a></td>       
                                            
                                            
                                              
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <!--- Header Content  close -->
                    </div>


                    <!--- MoreHeaderContent--->
<div id="MoreHeaderContent" class="tabcontent">

<div class="card mb-4">
                            <div class="card-body">
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddMoreContentModel"> <span class="fas fa-plus-circle"></span> Add More Page Content</button>
                            </div>
                        </div>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Menu
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="NewRecordTabl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Header Name</th>
                                           <th>Header Url</th>
                                            <th>Header Order</th>
                                            <th>Display</th>
                                            <th>Created By</th>
                                            <th>Update By</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sqlformoreheader=mysqli_query($con,"SELECT * FROM `header` WHERE `header_status`='Active' AND `header_pagemore`='Yes'");
                                        while($sqlformoreheaderresult=mysqli_fetch_assoc($sqlformoreheader))
    {
        $count+=1;
   $id=$sqlformoreheaderresult['header_id'];     
$created_user_id=$sqlformoreheaderresult['header_createdby'];
$updated_user_id=$sqlformoreheaderresult['header_updateby'];
//$modulename=$result['popupname'];


                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];

                                        ?>

                                        <tr>        
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $sqlformoreheaderresult['header_name']; ?></td>
                                    <td><?php echo $sqlformoreheaderresult['header_url'];  ?></td>
                                    <td><?php echo $sqlformoreheaderresult['header_order']; ?></td>
                                    <td><?php if($sqlformoreheaderresult['header_display']=="Active") 
                                    { ?> <a href="test4.php?header_id=<?php echo $sqlformoreheaderresult['header_id'];?>&action=Hide&model=MoreHeaderPage" onclick="return confirm('Do you really want to Hide <?php echo $sqlformoreheaderresult['header_name'] ?> Module?');">Hide <?php }
                                     else { ?><a href="test4.php?header_id=<?php echo $sqlformoreheaderresult['header_id'];?>&action=Show&model=MoreHeaderPage" onclick="return confirm('Do you really want to Show <?php echo $sqlformoreheaderresult['header_name'] ?> Module?');"> Show <?php } ?></td>
                                    <td><?php echo  $user_login_name; ?></td>
                                    <td><?php echo $upadted_user_login_name; ?></td>
                                    <td><a href="menu_update.php?menu_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                    <td><a href="menu_delete.php?menu_id=<?php echo $id;?>"><span class='fas fa-trash'></span></a></td>       
                                            
                                            
                                              
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


<!--- More Page --->
</div>
                    </div>
                </main>





<?php
include("include/footer.php");
?>
<script>
    var tab1=document.getElementsByClassName('tablinks')[0];
    var tab2=document.getElementsByClassName('tablinks')[1];
    tab1.click()
    //tab2.click()
function HeaderEventTab(evt, CertificateEvent) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
   
        //document.getElementsByClassName('tablinks')[1].click()
   
  }
  document.getElementById(CertificateEvent).style.display = "block";
  evt.currentTarget.className += "active";
  //document.getElementsByClassName('tablinks')[1].click()
}

</script>
<?php
if($_GET['action']=='Hide'&&$_GET['model']=='HeaderPage')
{    
   // header("location:test4.php");
 date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['header_id']);    
$query=mysqli_query($con, "UPDATE `header` SET `header_display`='InActive',`header_updatetime`='$date',`header_updateby`='$log' WHERE `header_id`='$pid'");
echo '<script>alert("Module Hide Succesfully")</script>';
  echo "<script>window.location.href='test4.php'</script>";
}
elseif($_GET['action']=='Show'&&$_GET['model']=='HeaderPage')
{    
    //header("location:test4.php");
   date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['header_id']);    
$query=mysqli_query($con, "UPDATE `header` SET `header_display`='Active',`header_updatetime`='$date',`header_updateby`='$log' WHERE `header_id`='$pid'");
echo '<script>alert("Module Show Succesfully")</script>';
  echo "<script>window.location.href='test4.php'</script>";
}
elseif($_GET['action']=='Hide'&&$_GET['model']=='MoreHeaderPage')
{    
    //header("location:test4.php");
   date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
$pid=intval($_GET['header_id']);    
$query=mysqli_query($con, "UPDATE `header` SET `header_display`='InActive',`header_updatetime`='$date',`header_updateby`='$log' WHERE `header_id`='$pid'");
echo "<script language='javascript'>alert('Module Hide Succesfully');window.location='test4.php'</script>";
}
elseif($_GET['action']=='Show'&&$_GET['model']=='MoreHeaderPage')
{    
    //header("location:test4.php");
   date_default_timezone_set('Asia/Kolkata');      
  $date=date("Y-m-d h:i:sa");
  $pid=intval($_GET['header_id']);     
$query=mysqli_query($con, "UPDATE `header` SET `header_display`='Active',`header_updatetime`='$date',`header_updateby`='$log' WHERE `header_id`='$pid'");
echo '<script>alert("Module Show Succesfully")</script>';
  echo "<script>window.location.href='test4.php'</script>";
}

?>