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
//$(document).ready(function(){
function fetch_select4(val)
{
    //$('#country').on('change',function(){
    //    var countryID = $(this).val();
     //   if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData1.php',
                data:'country_id='+val,
              //  data:'country_id='+1,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
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
                url:'ajaxData1.php',
                data:'state_id='+val,
                success:function(html){
                    $('#city').html(html);
                   // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
}
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
  $product = $_POST['product'];
  $unit = $_POST['unit'];
  $natureCAS = $_POST['natureCAS'];
  $timeCAS = $_POST['timeCAS'];
  $typerecovery= $_POST['typerecovery'];
  $REC= $_POST['REC'];
  $timecompletion = $_POST['timecompletion'];
  $GR	 = $_POST['GR'];
  $remark	 = $_POST['remark'];
  $isactive = $_POST['isactive'];
  
//echo "INSERT INTO `recovery`(`unit`, `product`, `natureCAS`, `timeCAS`, `typerecovery`, `REC`, `timecompletion`, `GR`, `remark`, `isactive`) values('$unit','$product','$natureCAS','$timeCAS','$typerecovery','$REC','$timecompletion','$GR','$remark',$isactive')";
 //die("vv");
  $q = mysqli_query($con,"INSERT INTO `recovery`(`unit`, `product`, `natureCAS`, `timeCAS`, `typerecovery`, `REC`, `timecompletion`, `GR`, `remark`, `isactive`) values('$unit','$product','$natureCAS','$timeCAS','$typerecovery','$REC','$timecompletion','$GR','$remark','$isactive')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_recovery.php");</script>';
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

        <div class="panel-title">
        
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
<?php
$query = mysqli_query($con,"SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");

//Count total number of rows
//$rowCount = $query->num_rows;
?>
<select id="country"  onchange="fetch_select4(this.value);">
    <option value="">Select Country</option>
    <?php
    $query = mysqli_query($con,"SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
   if(mysqli_num_rows($query)>0)
                   { 
        while($row=mysqli_fetch_assoc($query)){
           
            ?>
              <option value="<?php echo $row['country_id'] ?>"><?php echo $row['country_name']?></option>
              <?php
           // echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
        }
    }
    else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>

<select id="state" onchange="fetch_select5(this.value);">
    <option value="">Select country first</option>
</select>

<select id="city">
    <option value="">Select state first</option>
</select>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Cat Unit</label></label>
                 <div class="col-sm-10">
                      <div class="col-sm-10">
                     
                

                    <select onchange="fetch_select2(this.value);" class="selectpicker" name="unit" required>
                   <option value=""> Unit</option>
                    <?php
                 
                    $qu=mysqli_query($con,"select * from vehicle where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade =$res1['unit'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>                  
                  </div>
                
                </div>
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Cat</label></label>
                 <div class="col-sm-10">
                     <select id="new_select" name="category"  >
                          <option value="">Cat</option>
 </select>
 
 
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
                    ?>-->
                     
                      </select>                  
                  </div>
                 
                </div>
                
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Vehicle</label></label>
                 <div class="col-sm-10">
                      <div class="col-sm-10">
                     
                

                    <select onchange="fetch_select1(this.value);" class="selectpicker" name="vehicle" required>
                   <option value="">Vehicle</option>
                    <?php
                 
                    $qu=mysqli_query($con,"select * from vehicle where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade1 =$res1['vehicle'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade1?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>                  
                  </div>
                
                </div>
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Batch</label></label>
                 <div class="col-sm-10">
                     <select id="new_select1" name="unitvehicle" >
                          <option value="">Batch</option>
 </select>
               
                 
                
             
   
           <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Nature of CAS </label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "natureCAS" id="batch" >
                  </div>
                </div>
                <br>
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
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
             
                </div>
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">REC Eaharked</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "REC" id="batch" >
                  </div>
                </div>
    <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Expected Time Of Completion</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "timecompletion" id="batch" >
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
                
                 <div class="form-group">
                  <label for="isactive" class="col-sm-2 control-label form-label">IsActive</label>
                  <div class="col-sm-10">
                    <input type="checkbox" class="form-control" name = "isactive" value="1" id="isactive">
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