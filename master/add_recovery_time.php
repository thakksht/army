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
        <li class="active">Fault</li>
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
      <h1>Recovery Time </h1>
    </div>

    

  </div>

  <!-- End Presentation -->
<?php
//session_start();
 
if(isset($_POST['addsubmit']))
{
 
  $unit = $_POST['vehicle'];
//  $vehicle = $_POST['vehicle'];
  $GR= $_POST['GR'];
  $presentlycompletion= $_POST['com'];
  $timelycompletion= $_POST['pen'];
  $hour = $_POST['hour'];
/*  $isactive = $_POST['isactive'];*/
  $date=date("Y/m/d");
  //$d=mt_rand();
  $data =$_POST['vehicle'];    
$whatIWant = substr($data, strpos($data, "_") + 1);    
//echo $whatIWant;
$mystring = $_POST['vehicle'];
$first = strtok($mystring, '_');

 // $d=$_SESSION['product11'];
  @$date1=date("Y/m/d");
//echo "INSERT INTO `recoverytime`(`unit`, `vehicle`, `GR`, `presentlycompletion`, `timelycompletion`, `hour`, `isactive`)values('$unit','$vehicle','$GR','$presentlycompletion','$timelycompletion','$hour','$isactive')";
// die("ffff");

//$oid = $_SERVER['REMOTE_ADDR'].mktime();
//  $count= mysqli_insert_id($con); 

$q = mysqli_query($con,"INSERT INTO `recoverytime`(`vehicle`,`recoveryId`, `date`, `GR`, `presentlycompletion`, `timelycompletion`, `hour`, `date1`, `isactive`) values('$first','$whatIWant','$date','$GR','$presentlycompletion','$timelycompletion','$hour','$date1','1')");
  if($q){
   
        
    echo '<script>alert("Add Successfully.");window.location.assign("manage_recovery_time.php");</script>';
   
  }
  else{
    
      echo '<script>alert("please Add Again....");window.location.assign("add_recovery_time.php");</script>';
  }
 
 // 
}

?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
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
<div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  
                    <?php
                 //    $qur=mysqli_query($con,"select * from recovery") ;                    
                 //   if(mysqli_num_rows($qur)>0)
                ///   { 
               //     while($rr=mysqli_fetch_assoc($qur)){
               //       echo  $unit =$rr['unit'];
                      
                      ?>
                 <!-- <div class="form-group">-->
                      <!-- <label for="subcategoryname" class="col-sm-2 control-label form-label"> Unit</label></label>-->
                <!-- <div class="col-sm-10">
                    <select class="selectpicker" name="unit" required>
                   <option value=""> Unit</option>-->
                   
                      
                    <?php 
                    /* echo "select * from Brigade where unit='$unit'";
                    $qu=mysqli_query($con,"select * from Brigade where unit='$unit'") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade =$res1['Brigade'];*/
                      ?>
                      <!-- <option value="<?php //echo $Id ?>"><?php// echo $Brigade?></option>-->
                   <?php //}
               //  }*/
                    ?>
                   <!--   </select>                  
                  </div>
                </div>-->
               <div class="form-group">
                  <label class="col-sm-2 control-label form-label"> Recovery Activity vehicle</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" name="vehicle" required>
                   <option value="">Select</option>
                    <?php
                    // $_SESSION['product11']="fgdg";
                 // $query=mysqli_query($con,"select distinct(vehicle), from vehicle where isactive = 1") ;
                 $query=mysqli_query($con,"SELECT 
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
                    <input type="text" class="form-control" name = "GR" id="batch" maxlength="6" >
                  </div>
                </div>
                  <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Presently Commited</label></label>
                  <div class="col-sm-10">
                      
                      <select name="com">
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