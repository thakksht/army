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
function fetch_select12(val)
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
function fetch_select1(val)
{
  
            $.ajax({
                type:'POST',
                url:'ajax6.php',
                data: {
  get_option:val
 },
             
                success:function(html){
                     document.getElementById("select_1").innerHTML=html; 
                              }
            }); 
}
//$(document).ready(function(){
function fetch_select4(val)
{
             $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'cat_id='+val,
              //  data:'country_id='+1,
                success:function(html){
                     document.getElementById("state").innerHTML=html;               
                }
            }); 
}
function fetch_select5(val)
{
               $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'v_id='+val,
                success:function(html){
                    $('#city').html(html);                
                }
            }); 
}
function fetch_select6(val)
{  
            $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'vehicle_id='+val,
                success:function(html){
                    $('#batch').html(html);               
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
        <li class="active">Edit Manpower Grouping</li>
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
      <h1>Edit Manpower Grouping</h1>
    </div>

    

  </div>

  <!-- End Presentation -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">

<?php
$ii = $_GET['Id'];
//echo $ii;
if(isset($_POST['addsubmit']))
{
    
    $category1 = $_POST['catid'];
    $category2 = $_POST['category'];
    $category3 = $_POST['vehicle1'];
    $Brigade2 = $_POST['batch'];
    $batch = $_POST['trade'];
    $batch11 = $_POST['name'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"UPDATE `manpower_link` SET `cat_unit`='$category1',`Unit`='$category2',`vehicle`='$category3',`batch`='$Brigade2',`trade`='$batch',`name`='$batch11',`date`='$date' WHERE Id='$ii'");
  //echo "UPDATE `manpower_link` SET `cat_unit`='$category1',`Unit`='$category2',`vehicle`='$category3',`batch`='$Brigade2',`trade`='$batch',`name`='$batch11',`date`='$date' WHERE Id='$ii'";die();

   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_manpower_link.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("edit_man_power_link.php");</script>';
  }
}
?> 
  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
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
$unitcat = $_GET['Id'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"SELECT trade.Id,
                manpower_link.id,
                manpower_link.trade,
                manpower_link.cat_unit as cat_unit_id,
                unitcat.Unitcat,
                Brigade.Brigade,
                manpower_link.Unit as Unit_id,
                vehicle.vehicle,
                manpower_link.vehicle as vehicle_id,
                vehicle.batch,
                manpower.person,
                manpower_link.name as name_id,
                manpower_link.date,
                trade.trade,
                manpower_link.trade as trade_id
                From manpower_link 
                LEFT JOIN trade ON trade.Id=manpower_link.trade
                LEFT JOIN unitcat ON manpower_link.cat_unit=unitcat.id
                LEFT JOIN Brigade ON manpower_link.Unit=Brigade.Id
                LEFT JOIN vehicle ON manpower_link.vehicle=vehicle.Id
                LEFT JOIN manpower ON manpower_link.name=manpower.Id
   Where manpower_link.Id='$unitcat'");
  
  $res=mysqli_fetch_array($q);
                    $Cat_unit= $res['Unitcat'];   
                    $cat_unit_id= $res['cat_unit_id'];   
                    $unit=$res['Brigade'];
                    $Unit_id=$res['Unit_id'];
                    $vehicle=$res['vehicle'];
                    $vehicle_id=$res['vehicle_id'];
                    $batch=$res['batch'];
                    $trade=$res['trade'];
                    $trade_id=$res['trade_id'];
                    $name=$res['person'];
                    $name_id=$res['name_id'];
                     $date=$res['date'];
                     @$p=$res['Product'];

?>
 <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Category</label>
 <div class="col-sm-10">
<select id="country"  class="form-control" onchange="fetch_select4(this.value);" name="catid">
    <option value="<?php echo $cat_unit_id; ?>"><?php echo $Cat_unit; ?></option>
    <?php
    $query = mysqli_query($con,"SELECT 
      distinct(unitcategory),unitcat.Unitcat
      FROM Brigade 
      INNER JOIN unitcat ON Brigade.unitcategory=unitcat.Id Where unitcategory!='$cat_unit_id'");
   if(mysqli_num_rows($query)>0)
                   { 
        while($row=mysqli_fetch_assoc($query)){
           
            ?>
              <option name="catid" value="<?php echo $row['unitcategory'] ?>"><?php echo $row['Unitcat']?></option>
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

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Cat</label>
 <div class="col-sm-10">
<select id="state" class="form-control" onchange="fetch_select5(this.value);" name="category" >
    <option value="<?php echo $Unit_id; ?>"><?php echo $unit; ?></option>
     <?php                 
                    $qu1=mysqli_query($con,"select * from Brigade where isactive = 1 and unitcategory='$cat_unit_id' and Brigade!='$unit'") ;                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['Id'];
                      $unitcat =$res11['Brigade'];
                      ?>                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>     
</select>
</div>
</div>

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">vehicle</label>
 <div class="col-sm-10">
<select id="city" class="form-control" onchange="fetch_select6(this.value);" name="vehicle1">
     <option value="<?php echo $vehicle_id ?>"><?php echo $vehicle ?></option>
     <?php
      $query1 =mysqli_query($con,"SELECT * FROM vehicle WHERE cat ='$Unit_id' and vehicle!='$vehicle'");
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
<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">batch</label>
 <div class="col-sm-10">
<select id="batch" class="form-control" name="batch">
    <option value="<?php echo $vehicle_id ?>"><?php echo $batch; ?></option>
    <?php
      $query1 =mysqli_query($con,"SELECT * FROM vehicle WHERE cat ='$Unit_id' and batch !='$batch'");
    $rowcount1=mysqli_num_rows($query1);
   if(mysqli_num_rows($query1)>0)
       {
         while($row1=mysqli_fetch_assoc($query1)){
        echo '<option value="'.$row1['Id'].'">'.$row1['batch'].'</option>';
        }
    }
     ?>
</select>
</div>
</div>
             
                  <div class="form-group drft">
                  <label for="category" class="col-sm-2 control-label form-label">Trade</label>
                  <div class="col-sm-10">
                       <select onchange="fetch_select1(this.value);" class="selectpicker" name="trade" required>
                   <option value="<?php echo $trade_id ?>"><?php echo $trade; ?></option>
                    <?php
             $qu=mysqli_query($con," SELECT * from trade where trade!='$trade'");
                    //$qu=mysqli_query($con,"select batch.product from batch INNER JOIN Product ON batch.product=Product.Id") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade1 =$res1['trade'];
                      
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade1?></option>
                   <?php }
                 }
                 else
                 {
                  
                       
        echo '<option value="">Trade not available</option>';
    } 
                 
                    ?>
                     
                      </select>
                    
                  </div>
                </div>
                
                <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">name</label>
 <div class="col-sm-10">
                <select id="select_1" class="form-control" name="name" >
    <option value="<?php echo $name_id ?>"><?php echo $name; ?></option>
    <?php
    $find=mysqli_query($con,"select person,Id from manpower where trade='$trade_id' and person!='$name'");
   if(mysqli_num_rows($find)>0)
       {       
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['Id'].">".$row['person']."</option>";
 }
       }
    ?>
</select>
</div>
</div>
           
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