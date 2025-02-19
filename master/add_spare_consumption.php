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
 url: 'fetch_dataprod1.php',
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
function fetch_select_Unit(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_unit.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select112").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select_product(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_product.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select123").innerHTML=response; 
 }
 });
}

</script>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Add Spare Consumption</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Add Spare Consumption</li>
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
      <h1>Add Spare Consumption</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
    $unit=$_POST["unit"];
    $cat=$_POST["cat"];
    $prod=$_POST["unit1"];
   $part = $_POST['equipment'];
  //  $part = $_POST['part'];
  // $catprod=$_POST['catprod'];
  $qty = $_POST['quantity'];
//  $unit = $_POST['unit'];
//  $fault = 'S';
//  $killtype = $_POST['killtype'];
//  $typefault = $_POST['typefault'];
//  $timerequried	 = $_POST['timerequried'];
// $unitcat	 = $_POST['unitcat'];
 $date=date("Y/m/d");
/*  $isactive = $_POST['isactive'];*/
  
 // echo "insert into batch (`product`,`batchno`,`unit`,`isactive`,) values('$product','$batchno','$unit',$isactive')";
    
     //die("gagaga");
 $qry1="insert into add_consumption (`Unitcat`,`unit`,`Product`,`Equipment`,`Qty`,`isactive`,`date`) values('$unit','$cat','$prod','$part','$qty','1','$date')";
  $q=mysqli_query($con,$qry1);
   //  if($qry)
   //  {
//$q = mysqli_query($con,"insert into fault (`product`,`part`,`batchno`,`unitcat`,`unit`,`date`,`fault`,`killtype`,`typefault`,`timerequried`,`catprod`,`isactive`) values('$prod','$part','$batchno','$unit','$unit','$date','$fault','$killtype','$typefault','$timerequried','$catprod','$isactive')");
   //  }
  //$q = mysqli_query($con,"insert into fault (`product`,`batchno`,`unit`,`isactive`) values('$product','$batchno','$unit','$isactive')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_spare_consumption.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_spare_consumption.php");</script>';
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
                  
                  
                   <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit Category</label></label>
                 <div class="col-sm-10">
                    
                     
                  <div id="select_box">
 <select onchange="fetch_select(this.value);"  class="selectpicker" name="unit" required>
  <option>Category</option>
  <?php
  
  $select=mysqli_query($con,"select Unitcat,id from unitcat group by Unitcat");
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['id'].">".$row['Unitcat']."</option>";
  }
 
 ?>
 </select>

 
	  
</div>  
                   <!-- <select class="selectpicker" name="unitcat" required>
                   <option value="">Unit Category</option>
                    <?php
                 
                 /*   $qu=mysqli_query($con,"select * from Brigade where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $unitcategory =$res1['unitcategory'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcategory?></option>
                   <?php }
                 }*/
                    ?>
                     
                      </select>     -->             
                  </div>
                
                </div>
                 <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit</label></label>
                 <div class="col-sm-10">
                      <select id="new_select" name="cat" onchange="fetch_select_Unit(this.value);">
                          <option value=""> Unit</option>
 </select>
                   <!-- <select class="selectpicker" name="unit" required>
                   <option value="">Unit</option>
                    <?php
                 
                  /*  $qu=mysqli_query($con,"select * from Brigade where isactive = 1") ;                    
                    if(mysqli_num_rows($qu)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($qu)){
                      $Id =$res1['Id'];
                      $Brigade =$res1['Brigade'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Brigade?></option>
                   <?php }
                 }*/
                    ?>
                     
                      </select>    -->              
                  </div>
                
                </div>
               <!--  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product Category</label></label>
                  <div>
                      <select name="catprod">
                          <option>Product</option>
  <?php
  
/*
  $select3=mysqli_query($con,"SELECT * from category_product");
   while($row2=mysqli_fetch_assoc($select3))
   {
      ?>
  <option value="<?php echo $row2['cat_prod'];?>"><?php echo $row2['cat_prod']?></option>";
  <?php
  }*/
 ?>
 </select>
                  </div>-->
                  
                  
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product</label></label>
                        <div class="col-sm-10">
                   <select id="new_select112" name="unit1"  onchange="fetch_select_product(this.value);" >
                          <option value=""> Product</option>
 </select>
                 <!--  <!
                  <div id="select_box">
 <select onchange="fetch_select_Unit(this.value);"  class="selectpicker" name="unit1" required  id="new_select11">
  <option>Product</option>-->
  <?php
  

 /* $select1=mysqli_query($con,"SELECT DISTINCT(Product.Product), Product.Id From subproduct,Product where subproduct.product = Product.Id");
  while($row1=mysqli_fetch_assoc($select1))
  {
      ?>
  <option value="<?php echo $row1['Id'];?>"><?php echo $row1['Product']?></option>";
  <?php
  }*/
 ?>
 </select>

 
	  
</div>
</div>
 <div class="form-group">
<label for="subcategoryname" class="col-sm-2 control-label form-label">Equipment</label>
 <div class="col-sm-10">
          <select id="new_select123" name="equipment" >
                          <option value=""> Equipment</option>
 </select>      
 </div>
 </div>
                  
           <!-- <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="new_select2" name="unit2" onchange="fetch_select4(this.value);">
                          <option value=""> Unit</option>
 </select>
                       
                 
</div>    
</div>

<div class="form-group dfrrgg">
<label for="subcategoryname" class="col-sm-2 control-label form-label">Equipment</label>
<div class="col-sm-10">
          <select id="new_select3" class="form-control" name="part" >
                          <option value=""> Equipment</option>
 </select>         
   </div>              
 </div>             -->          
               <!-- <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                     
                    <select class="selectpicker" name="product" required>
                   <option value="">Add Product</option>
                    <?php
                 
                  //  $query=mysqli_query($con,"select * from Product where isactive = 1") ;                    
                   /* if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $Id =$res['Id'];
                      $Product =$res['Product'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Product?></option>
                   <?php }
                 }*/
                    ?>-->
                     
                 <!--  </select>                  
                  </div>   
                 
                </div>-->
                
                
             <!--   <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Equipment</label></label>
                 <div class="col-sm-10">-->
                     
                    <!--<select class="selectpicker" name="part" required>
                   <option value=""> Equipment</option>-->
                    <?php
                 
                  /*  $qur=mysqli_query($con,"select * from subproduct") ;                    
                    if(mysqli_num_rows($qur)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qur)){
                      $Id =$res11['Id'];
                      $subproduct=$res11['subproduct'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $subproduct;	?></option>
                   <?php }
                 }*/
                    ?>
                     
                 <!--     </select>                  
                  </div>
                
                </div>-->
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Quantity</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="" name = "quantity" id="quantity" required>
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