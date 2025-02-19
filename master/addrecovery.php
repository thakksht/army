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
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
     	//var c = $(this).val();
            $.ajax({
                type:'POST',
                url:'ajax5.php',
                data: {
  get_option:val
 },
              //  data:'country_id='+1,
                success:function(html){
                     document.getElementById("select_1").innerHTML=html; 
                 //   $('#state').html(html);
                 //   $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
}
//$(document).ready(function(){
function fetch_select4(val)
{
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
     	//var c = $(this).val();
            $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'cat_id='+val,
              //  data:'country_id='+1,
                success:function(html){
                     document.getElementById("state").innerHTML=html; 
                 //   $('#state').html(html);
                 //   $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
}
function fetch_select7(val)
{
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
     	//var c = $(this).val();
            $.ajax({
                type:'POST',
                url:'ajax7.php',
                data:'cat_id='+val,
              //  data:'country_id='+1,
                success:function(html){
                     document.getElementById("state1").innerHTML=html; 
                 //   $('#state').html(html);
                 //   $('#city').html('<option value="">Select state first</option>'); 
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
/*function fetch_select6(val)
{
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
            $.ajax({
                type:'POST',
                url:'ajax3.php',
                data:'vehicle_id='+val,
                success:function(html){
                    $('#batch').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
}*/
      //  }else{
     //       $('#state').html('<option value="">Select country first</option>');
     //       $('#city').html('<option value="">Select state first</option>'); 
     //   }
  /*  });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }*/
 //   });
//});
</script>
<!--<script type="text/javascript">
//$(document).ready(function(){
   
   
    $('#country').on('change',function(){
        alert("hfgh");
        var countryID = 11;
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'country_id='+countryID,
                success:function(html){
                    alert("gdf");
                    die("gfh");
                    $('#state').html(html);
                    $('#city').html('<option value="">Select unit first</option>'); 
                }
                error: function(error){

     echo "dfgfd";

   }
            }); 
       }else{
            $('#state').html('<option value="">Select Unit1 first</option>');
            $('#city').html('<option value="">Select Cat1 first</option>'); 
        }
    });
  //  }
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
//});
</script>-->
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
<?php
if(isset($_POST['addsubmit']))
{
  $product = $_POST['prod1'];
  $unit = $_POST['catid'];
  $category=$_POST['category'];
  $vehicle=$_POST['vehicle1'];
  $natureCAS = $_POST['natureCAS'];
  $timeCAS = $_POST['timeCAS'];
  $typerecovery= $_POST['typerecovery'];
  @$REC= $_POST['REC'];
  $timecompletion = $_POST['timecompletion'];
  $GR	 = $_POST['GR'];
  $remark	 = $_POST['remark'];
/*  $isactive = $_POST['isactive'];*/
  $date=date("Y/m/d");
//echo "INSERT INTO `recovery`(`unit`, `product`, `natureCAS`, `timeCAS`, `typerecovery`, `REC`, `timecompletion`, `GR`, `remark`, `isactive`) values('$unit','$product','$natureCAS','$timeCAS','$typerecovery','$REC','$timecompletion','$GR','$remark',$isactive')";
 //die("vv");
 //print_r($unit);
//echo "INSERT INTO `recovery`(`unit`, `vehicle`,`product`, `natureCAS`, `timeCAS`, `typerecovery`, `REC`, `timecompletion`, `GR`, `remark`, `isactive`) values('$unit','$vehicle','$product','$natureCAS','$timeCAS','$typerecovery','$REC','$timecompletion','$GR','$remark','$isactive')";
 //die("fgfd");
  $q = mysqli_query($con,"INSERT INTO `recovery`(`unit`,`Brigade` , `date`,`vehicle`,`product`, `natureCAS`, `timeCAS`, `typerecovery`, `REC`, `timecompletion`, `GR`, `remark`, `isactive`) values('$unit','$category','$date','$vehicle','$product','$natureCAS','$timeCAS','$typerecovery','$REC','$timecompletion','$GR','$remark','1')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_recovery_vehicle.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_recovery_vehicle.php");</script>';
  }
}

?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  
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
//$query = mysqli_query($con,"SELECT * FROM vehicle WHERE status = 1 ORDER BY country_name ASC");

//Count total number of rows
//$rowCount = $query->num_rows;
?>
 <div class="form-group">
     <h1>Choose vehicle</h1>
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Formations</label>
 <div class="col-sm-10">
<select id="country"  class="form-control" onchange="fetch_select4(this.value);" name="catid">
    <option>Select Formations</option>
    <?php
    $query = mysqli_query($con,"SELECT id,Unitcat FROM Unitcat");
   if(mysqli_num_rows($query)>0)
                   { 
        while($row=mysqli_fetch_assoc($query)){
           
            ?>
              <option name="catid" value="<?php echo $row['id'] ?>"><?php echo $row['Unitcat']?></option>
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
    <option value="">Select Formations first</option>
</select>
</div>
</div>

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">vehicle</label>
 <div class="col-sm-10">
<select id="city" class="form-control" onchange="fetch_select6(this.value);" name="vehicle1">
    <option value="">Select vehicle first</option>
</select>
</div>
</div>

        
<?php
?>
<input type="hidden" name="rid" >


    
                <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">product</label>
 <div class="col-sm-10">
                <select id="new_select7" onclick="fetch_select83(this.value);" class="form-control" name="prod1" >
    <option value="">Select cat first</option>
</select>
</div>
</div>

<div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">batch</label>
 <div class="col-sm-10">
<select id="new_select83" class="form-control" name="unitvehicle">
    <option value="">Select batch first</option>
</select>
</div>
</div>

<!-- <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">batch</label>
 <div class="col-sm-10">
<select id="batch" class="form-control" name="unitvehicle">
    <option value="">Select batch first</option>
</select>
</div>
</div> -->
                <!--  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Cat</label></label>
                 <div class="col-sm-10">
                  <!--   <select id="new_select" name="category"  >-->
                        <!--  <option value="">Cat</option>
 </select>-->

 
               <!--<div class="form-group">
                  <label class="col-sm-2 control-label form-label">  Product</label>
                  <div class="col-sm-10">
                     
                    <select class="selectpicker" name="product" required>
                   <option value="">Add Product</option>
                  <!--  <?php
                 
                   /* $query=mysqli_query($con,"select * from Product where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $Id =$res['Id'];
                      $Product =$res['Product'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Product?></option>
                   <?php }
                 }*/
                    ?>
                     
                      </select>                  
                  </div>
                 
                </div>
                
                  <div class="form-group">
                      
                 <div class="col-sm-10">
                      <div class="col-sm-10">
                     
                

                 <!--   <select onchange="fetch_select1(this.value);" class="selectpicker" name="vehicle" required>-->
                                    
                 
                  
               
                 <!-- <div class="form-group drft">
                  <label for="category" class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                       <select onchange="fetch_select1(this.value);" class="selectpicker" name="prod" id="prod" required>
                   <option value="">Product</option>
                    <?php
             /*$qu=mysqli_query($con," SELECT distinct(batch.product), Product.Id,Product.Product
FROM batch
INNER JOIN Product ON batch.product = Product.Id");
                    //$qu=mysqli_query($con,"select batch.product from batch INNER JOIN Product ON batch.product=Product.Id") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade1 =$res1['Product'];*/
                      
                      ?>
                       
                      <option value="<?php// echo $Id ?>"><?php echo $Brigade1?></option>
                   <?php //}
                // }
                    ?>
                     
                      </select>
                    
                  </div>
                </div>-->
                
             <!--   <div class="form-group">
 <label for="subcategoryname" class="col-sm-2 control-label form-label">Batch</label>
 <div class="col-sm-10">
                <select id="select_1" class="form-control" name="Batch" >
    <option value="">Select product first</option>
</select>
</div>
</div>-->
           <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Nature of CAS </label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "natureCAS" id="batch" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Time of CAS</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "timeCAS" id="batch" >
                  </div>
                </div>
         <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label"  >Type of Recovery </label></label>
                  <div class="col-sm-10" id='datetimepicker1'>
                    <input type="text" class="form-control" name = "typerecovery" id="batch" >
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
                      <select name="timecompletion" id="batch">
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
                    <input type="text" class="form-control" name = "GR" id="batch" maxlength="6" >
                  </div>
                </div>
                  <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Remark</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "remark" id="batch" >
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