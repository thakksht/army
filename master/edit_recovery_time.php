<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
//session_start();
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->



<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Batch</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit Recovery Time</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="dashboard.php" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color9-bg"><i class="fa fa-subcategory"></i></span>
      <h1>Edit Recovery Time</h1>
    </div>

    

  </div>

  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<?php
$ii = $_GET['Id'];
if(isset($_POST['addsubmit']))
{
    
    $category1 = $_POST['vehicle'];
    $category2 = $_POST['GR'];
    $category3 = $_POST['com'];
    $Brigade2 = $_POST['pen'];
    $batch = $_POST['hour'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"UPDATE `recoverytime` SET `vehicle`='$category1',`GR`='$category2',`presentlycompletion`='$category3',`timelycompletion`='$Brigade2',`hour`='$batch',`date1`='$date' WHERE Id='$ii'");
  //echo "UPDATE `vehicle` SET `category`='$category1',`unit`='$category2',`cat`='$category3',`vehicle`='$Brigade2',`batch`='$batch', WHERE Id='$ii'";die();

   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_recovery_time.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("edit_recovery_time.php");</script>';
  }
}
?>

<div class="container-padding">
<!-- Start Row -->
  <div class="row">
<div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <?php
$unitcat = $_GET['Id'];
//echo $unitcat;
  $q = mysqli_query($con,"SELECT 
                      recoverytime.*,
                      vehicle.vehicle as ggg,
                      vehicle.date 
                      from recoverytime
                      LEFT JOIN vehicle ON recoverytime.vehicle=vehicle.Id                    
   Where recoverytime.Id='$unitcat'");
  
  $res=mysqli_fetch_array($q);                              
            $vehicle = $res['ggg'];
            $vehicle_id = $res['vehicle'];
            $date = $res['date'];
            $GR= $res['GR'];
            $presentlycompletion= $res['presentlycompletion'];
            $timelycompletion= $res['timelycompletion'];
            $hour = $res['hour'];

?>
<div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  
                 
               <div class="form-group">
                  <label class="col-sm-2 control-label form-label"> Recovery Activity vehicle</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" name="vehicle" required>
                   <option value="<?php echo $vehicle_id; ?>"><?php echo $vehicle; ?>|<?php echo $date; ?></option>
                  <?php
                 $query=mysqli_query($con,"SELECT DISTINCT 
                  recovery.product,
                  recovery.Id ,
                  Product.Product,
                  vehicle.vehicle,
                  vehicle.Id as fff,
                  recovery.date  
                  from recovery 
                  INNER JOIN vehicle ON recovery.vehicle=vehicle.Id
                  INNER JOIN Product ON recovery.product=Product.Id and recovery.isactive=1");
                    if(mysqli_num_rows($query)>0)
                   { 
                      
                    while($res=mysqli_fetch_assoc($query)){
                     
                      $Id =$res['Id'];
                      $ff =$res['fff'];
                      $vehicle =$res['vehicle'];
                      $prod=$res['Product'];
                      $p=$res['product'];
                      $dated=$res['date'];
                    
                      ?>
                      <option value="<?php echo $ff; ?>"><?php echo $vehicle."(".$prod.")-|Dated ".$dated?></option>
                   <?php }
                 }
                    ?>
                      </select>                  
                  </div>
                </div>
              <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">GR</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $GR; ?>" name = "GR" id="batch" maxlength="6" >
                  </div>
                </div>
                  <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Presently Commited</label></label>
                  <div class="col-sm-10">
                      
                      <select name="com">
                          <option value="<?php echo $presentlycompletion; ?>"><?php echo $presentlycompletion; ?></option>
                          <option value="commited">commited</option>
                          <option value="not commited">not commited</option>
                      </select>
                   <!-- <input type="text" class="form-control" name ="timelycompletion" id="batch" >-->
                  </div>
                    <!--<input type="text" class="form-control" name = "presentlycompletion" id="batch" >-->
                  
                </div>
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Likely Timely Completion</label></label>
                  <div class="col-sm-10">
                      <select name="pen">
                        <option value="<?php echo $timelycompletion; ?>"><?php echo $timelycompletion; ?></option>
                          <option value="completed">completed</option>
                          <option value="pending">pending</option>
                      </select>
                   <!-- <input type="text" class="form-control" name ="timelycompletion" id="batch" >-->
                  </div>
                </div>
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Hours</label></label>
                  <div class="col-sm-10">
                      <select name="hour">
                          <option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
                          <option value="4">4 Hours</option>
                          <option value="8">8 Hours</option>
                          <option value="12">12 Hours</option>
                          <option value="16">16 Hours</option>
                          <option value="24">24 Hours</option>
                         
                      </select>
                      
                   <!-- <input type="text" class="form-control" name ="hour" id="batch" >-->
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Date</label></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name ="date1" id="batch" >
                  </div>
                </div>-->
               <!--  <div class="form-group">
                  <label for="isactive" class="col-sm-2 control-label form-label">IsActive</label>
                  <div class="col-sm-10">
                    <input type="checkbox" class="form-control" name = "isactive" value="1" id="isactive">
                  </div>
                </div>-->
                <div class="form-group">
                <label for="fdg" class="col-sm-2 control-label form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="addsubmit" class="btn btn-default">Submit</button>
                  </div>
                </div>

              </form> 

            </div>

<?php// }}?>
      </div>
    </div>

  </div>
  
  <!-- End Row -->

</div>
<!-- END CONTAINER -->
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>