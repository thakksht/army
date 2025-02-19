<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->

<script src="../js/bootstrap.min.js"></script>
 <link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
            
        </script>
<script type="text/javascript">
function fetch_select2(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_recovery.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}
</script>
</script>
<script type="text/javascript">
function fetch_select1(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_recovery11.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select1").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select83(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod83.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select83").innerHTML=response; 
 }
 });
}
</script>
<script type="text/javascript">
function fetch_select17(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_recovery17.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select7").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select1(val)
{
  
            $.ajax({
                type:'POST',
                url:'ajax5.php',
                data: {
  get_option:val
 },
            
                success:function(html){
                     document.getElementById("select_1").innerHTML=html; 
                
                }
            }); 
}

function fetch_select4(val)
{
  
            $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'cat_id='+val,
          
                success:function(html){
                     document.getElementById("state").innerHTML=html; 
                  
                }
            }); 
}
function fetch_select7(val)
{
            $.ajax({
                type:'POST',
                url:'ajax7.php',
                data:'cat_id='+val,             
                success:function(html){
                     document.getElementById("state1").innerHTML=html;              
                }
            }); 
}
function fetch_select5(val)
{
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
            $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'v_id='+val,
                success:function(html){
                    $('#city').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
}

</script>

<style>
.drft .bootstrap-select {
    width: 50% !important;
}   
    
</style>
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
      <h1>Recovery Vehicle</h1>
    </div>

    

  </div>

  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">
<?php
$ii = $_GET['Id'];
if(isset($_POST['addsubmit']))
{
    
    $catid = $_POST['catid'];
    $category = $_POST['category'];
    $vehicle1 = $_POST['vehicle1'];
    $prod1 = $_POST['prod1'];
    $natureCAS = $_POST['natureCAS'];
    $timeCAS = $_POST['timeCAS'];
    $typerecovery = $_POST['typerecovery'];
    $timecompletion = $_POST['timecompletion'];
    $GR = $_POST['GR'];
    $remark = $_POST['remark'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"UPDATE `recovery` SET `unit`='$catid',`Brigade`='$category',`vehicle`='$vehicle1',`product`='$prod1',`natureCAS`='$natureCAS',`timeCAS`='$timeCAS',`typerecovery`='$typerecovery',`timecompletion`='$timecompletion',`GR`='$GR',`remark`='$remark' WHERE Id='$ii'");
  //echo "UPDATE `vehicle` SET `category`='$category1',`unit`='$category2',`cat`='$category3',`vehicle`='$Brigade2',`batch`='$batch', WHERE Id='$ii'";die();

   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_recovery_vehicle.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("edit_recovery_vehicle.php");</script>';
  }
}
?> 

  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">

      <?php
$unitcat = $_GET['Id'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"SELECT 
                      recovery.date,
                      unitcat.Unitcat,
                      recovery.Unit as Unitcat_id,
                      Brigade.Brigade,
                      recovery.Brigade as brigade_id,
                      vehicle.vehicle,
                      recovery.vehicle as vehicle_id,
                      recovery.natureCAS,
                      recovery.timeCAS,
                      recovery.typerecovery,
                      recovery.REC,
                      recovery.timecompletion,
                      recovery.GR,
                      recovery.remark,                                          
                      recovery.product as product_id,
                      Product.Product from recovery 
                      LEFT JOIN Product ON recovery.product=Product.Id
                      LEFT JOIN unitcat ON recovery.Unit=unitcat.id
                      LEFT JOIN Brigade ON recovery.Brigade=Brigade.Id
                      LEFT JOIN vehicle ON recovery.vehicle=vehicle.Id
   Where recovery.Id='$unitcat'");
  
  $res=mysqli_fetch_array($q);
                      $Product =$res['Product']; 
                      $product_id =$res['product_id']; 
                      $unit = $res['Unitcat'];
                      $Unitcat_id = $res['Unitcat_id'];
                      $brigade=$res['Brigade'];
                      $brigade_id=$res['brigade_id'];
                      $vehicle=$res['vehicle'];
                      $vehicle_id=$res['vehicle_id'];
                      $natureCAS = $res['natureCAS'];
                      $timeCAS = $res['timeCAS'];
                      $typerecovery= $res['typerecovery'];
                      $REC= $res['REC'];
                      $timecompletion = $res['timecompletion'];
                      $GR  = $res['GR'];
                      $remark  = $res['remark'];
                   ?>
      <div class="panel panel-default">
<form accept-charset="UTF-8" role="form" method="post" class="form-horizontal horixntl_forms">
        <div class="panel-title">
        
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
<?php
//$query = mysqli_query($con,"SELECT * FROM vehicle WHERE status = 1 ORDER BY country_name ASC");

//Count total number of rows
//$rowCount = $query->num_rows;
?>
 <div class="form-group">
     <h1>Choose vehicle</h1>
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Formations</label>
 <div class="col-sm-10">
<select id="country"  class="form-control" onchange="fetch_select4(this.value);" name="catid">
    <option value="<?php echo $Unitcat_id; ?>"><?php echo $unit ?></option>    
    <?php
    $query = mysqli_query($con,"SELECT distinct(unit),Unitcat FROM vehicle INNER JOIN unitcat ON vehicle.unit=unitcat.id and Unitcat!='$unit'");
   if(mysqli_num_rows($query)>0)
                   { 
        while($row=mysqli_fetch_assoc($query)){
           
            ?>
              <option value="<?php echo $row['unit'] ?>"><?php echo $row['Unitcat']?></option>
              <?php
           // echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
        }
    }
    else{
        echo '<option value="">Cat not available</option>';
    }
    ?>
</select>
</div>
</div>
<?php
?>
<input type="hidden" name="rid" >

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit</label>
 <div class="col-sm-10">
<select id="state" class="form-control" onchange="fetch_select5(this.value); fetch_select17(this.value);" name="category" >
    <option value="<?php echo $brigade_id; ?>"><?php echo $brigade ?></option>
    <?php 
    $query =mysqli_query($con,"SELECT * FROM Brigade WHERE unitcategory='$Unitcat_id' and Brigade!='$brigade'");
    echo "SELECT * FROM Brigade WHERE unitcategory='$unit'";
    
      $rowcount=mysqli_num_rows($query);   
    if(mysqli_num_rows($query)>0)
       {            
              while($row=mysqli_fetch_assoc($query)){                  
            echo '<option value="'.$row['Id'].'">'.$row['Brigade'].'</option>';
        }
    }
    ?>
</select>
</div>
</div>

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">vehicle</label>
 <div class="col-sm-10">
<select id="city" class="form-control" onchange="fetch_select6(this.value);" name="vehicle1">
    <option value="<?php echo $vehicle_id; ?>"><?php echo $vehicle ?></option>
    <?php
    $query1 =mysqli_query($con,"SELECT * FROM vehicle WHERE cat ='$brigade_id' and vehicle!=$vehicle");   
     $rowcount1=mysqli_num_rows($query1);    
    if(mysqli_num_rows($query1)>0)
       {       
         while($row1=mysqli_fetch_assoc($query1)){
           echo '<option value="'.$row1['Id'].'">'.$row1['vehicle'].'</option>';
        }
    }
    ?>
</select>
</div>
</div>

        
<?php
?>
<input type="hidden" name="rid" >


    
                <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">product</label>
 <div class="col-sm-10">
                <select id="new_select7" onchange="fetch_select83(this.value);" class="form-control" name="prod1" >
    <option value="<?php echo $product_id; ?>"><?php echo $Product ?></option>
    <?php
   $find=mysqli_query($con,"select distinct(batch.product),Product.Product,Product.Id from batch INNER JOIN Product ON batch.product=Product.Id and batch.unit='$brigade_id' and Product.Product!='$Product'");
 while($row=mysqli_fetch_array($find))
 {
     ?>
   <option value="<?php echo $row[2]  ?>"><?php echo $row['Product']?></option>
  <?php
 }
    ?>
</select>
</div>
</div>

           <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Nature of CAS </label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $natureCAS ?>" name = "natureCAS">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Time of CAS</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $timeCAS ?>" name = "timeCAS">
                  </div>
                </div>
         <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label"  >Type of Recovery </label></label>
                  <div class="col-sm-10" id='datetimepicker1'>
                    <input type="text" class="form-control" value="<?php echo $typerecovery ?>" name = "typerecovery">
                    <!-- <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span> -->
                  </div>
             
                </div>
            <!--    <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">REC Eaharked</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "REC" id="batch" >
                  </div>
                </div>-->
    <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Expected Time Of Completion</label></label>
                  <div class="col-sm-10">
                      <select name="timecompletion">
                          <option value="<?php echo $timecompletion;?>"><?php echo $timecompletion;?> Hours</option>
                          <option value="4">4 Hours</option>
                          <option value="8">8 Hours</option>
                          <option value="12">12 Hours</option>
                          <option value="16">16 Hours</option>
                           <option value="20">20 Hours</option>
                            <option value="24">24 Hours</option>
                            
                      </select>
                   <!-- <input type="text" class="form-control" name = "timecompletion" id="batch" >-->
                  </div>
                </div>

                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">GR</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $GR;?>" name = "GR" id="batch" maxlength="6" >
                  </div>
                </div>
                  <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Remark</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $remark;?>" name = "remark" id="batch" >
                  </div>
                </div>
                
             <!--    <div class="form-group">
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