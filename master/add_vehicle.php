
<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select1(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_dataprod.php',
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
function fetch_select2(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_dataprod_new.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select2").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select3(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_dataprod_new11.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select3").innerHTML=response; 
 }
 });
}

</script>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
 <style>
     .form-sedc .bootstrap-select {
    width: 50% !important;
}
     
 </style>
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Batch</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">vehicle</li>
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
      <h1>vehicle</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
    $category = $_POST['category1'];
    $vehicle = $_POST['vehicle'];
    $unit = $_POST['category'];
    $batch = $_POST['batch'];
    $cat = $_POST['cat1'];
  $date=date("Y/m/d");
  /*$isactive = $_POST['isactive'];*/
 
$q = mysqli_query($con,"insert into vehicle (`category`,`vehicle`,`unit`,`cat`,`batch`,`date`,`isactive`) values('$category','$vehicle','$unit','$cat','$batch','$date','1')");
 
  //$q = mysqli_query($con,"insert into fault (`product`,`batchno`,`unit`,`isactive`) values('$product','$batchno','$unit','$isactive')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_vehicle.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_vehicle.php");</script>';
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

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  
               <div class="form-group form-sedc">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Category</label>
                 <div class="col-sm-10">
                     
                    <select class="selectpicker" name="category1" required   >
                   <option value=""> Choose Category</option>
                    <?php
                 
                    $qu=mysqli_query($con,"select * from category where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade =$res1['category'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>                  
                  </div>
                
                </div>
               <div class="form-group form-sedc">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit Category</label>
                
                <div class="col-sm-10">
                     <select class="selectpicker" name="category"  onchange="fetch_select3(this.value);"  >
                   <option value=""> Choose Category</option>
                    <?php
                 
                    $qu=mysqli_query($con,"select * from unitcat where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['id'];
                      $Brigade =$res1['Unitcat'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>   
                    
                      <!--<select id="new_select2" class="form-control" name="unit" onchange="fetch_select3(this.value);" >
                          <option value=""> Unit</option>
 </select>-->
                              
                  </div></div>
                     <div class="form-group form-sedc">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Category</label>
               
                  <div class="col-sm-10">
                      <select id="new_select3" class="form-control" name="cat1" >
                          <option value=""> Unit</option>
 </select>
                              
                  </div>
                  </div>
                  <!-- <div class="form-group form-sedc">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit Category</label>
                 <div class="col-sm-10">
                     
                  <div id="select_box">
 <select onchange="fetch_select(this.value);"  class="selectpicker" name="unit" required>
  <option>Category</option>
  <?php
  
/*  $select=mysqli_query($con,"select Unitcat from unitcat group by Unitcat");
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option>".$row['Unitcat']."</option>";
  }*/
 
 ?>
 </select>
</div>  
                
                </div>
                </div>-->
                
                
            <!--     <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit</label>
                 <div class="col-sm-10">
                      <select id="new_select" class="form-control" name="cat" >
                          <option value=""> Unit</option>
 </select>
                              
                  </div></div>
                  -->
                
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Add vehicle</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "vehicle" id="vehicle" required>
                  </div>
                </div>
                 
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Add Batch </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "batch" id="batch" required>
                  </div>
                </div>
                 
                
                <!-- <div class="form-group">
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