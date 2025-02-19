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
    <h1 class="title">Edit Spare Consumption</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit Spare Consumption</li>
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

  <?php
$ii = $_GET['Id'];
if(isset($_POST['addsubmit']))
{
  $Unitcategory = $_POST['unit'];  
  $Brigade2 = $_POST['cat'];
  $product = $_POST['unit1'];
  $Brigade = $_POST['equipment'];
  $quantity = $_POST['quantity'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"UPDATE `add_consumption` SET `Unitcat`='$Unitcategory', `Unit`='$Brigade2',`Product`='$product',`Equipment`='$Brigade',`Qty`='$quantity', `date`='$date' WHERE Id='$ii'");
//echo "UPDATE brigade SET unitcategory='$Unitcategory' and Brigade='$Brigade2' WHERE Id='$ii'";die();
   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_spare_consumption.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("edit_spare_consumption.php");</script>';
  }
}
?> 


  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color9-bg"><i class="fa fa-subcategory"></i></span>
      <h1>Edit Spare Consumption</h1>
    </div>

    

  </div>
  <!-- End Presentation -->


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
$unitcat = $_GET['Id'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"SELECT 
                      add_consumption.id,
                      unitcat.Unitcat as sss,
                      brigade.Brigade,
                      Product.Product,
                      add_consumption.Unit as Unit_id,
                      subproduct.subproduct,
                      add_consumption.Equipment as Equipment_id,
                      add_consumption.Unitcat as Unitcat_id,
                      add_consumption.Qty,
                      add_consumption.Product as Product_id,
                      add_consumption.date
                      FROM add_consumption 
                      LEFT JOIN Product ON add_consumption.Product=Product.Id 
                      LEFT JOIN unitcat ON add_consumption.Unitcat=unitcat.id
                      LEFT JOIN brigade ON add_consumption.Unit=brigade.Id
                      LEFT JOIN subproduct ON add_consumption.Equipment=subproduct.Id
  Where add_consumption.Id='$unitcat'");
  
  $res=mysqli_fetch_array($q);
                  $Product= $res['sss'];   
                  $Unitcat_id= $res['Unitcat_id'];   
                    $unit =$res['Brigade'];
                    $Unit_id =$res['Unit_id'];
                    $product =$res['Product'];
                    $Product_id =$res['Product_id'];
                    $Equipment =$res['subproduct'];
                    $Equipment_id =$res['Equipment_id'];
                    $Qty = $res['Qty'];
                    $date=$res['date'];
?>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  
                  
                   <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Unit Category</label></label>
                 <div class="col-sm-10">
                    
                     
               
 <select onclick="fetch_select(this.value);"  class="selectpicker1" name="unit" required>
  <option value="<?php echo $Unitcat_id; ?>"><?php echo $Product; ?></option>
  <?php
  
  $select=mysqli_query($con,"select Unitcat,id from unitcat Where Unitcat!='$Product' group by Unitcat");
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['id'].">".$row['Unitcat']."</option>";
  }
 
 ?>
 </select>

 

                         
                  </div>
                
                </div>
                 <div class="form-group">
                       <label for="subcategoryname11" class="col-sm-2 control-label form-label">Unit</label>
                 <div class="col-sm-10">
                      <select id="new_select"  class="selectpicker1" name="cat" onclick="fetch_select_Unit(this.value);">
                          <option value="<?php echo $Unit_id; ?>"> <?php echo $unit; ?></option>
                           <?php
  
  $select=mysqli_query($con,"select Brigade,Id from brigade Where unitcategory='$Unitcat_id' and Brigade!='$unit'");
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['Id'].">".$row['Brigade']."</option>";
  }
 
 ?> 
 </select>
                            
                  </div>
                
                </div>
             
                  
                  <div class="form-group">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product</label>
                        <div class="col-sm-10">
                   <select id="new_select112"  class="selectpicker1" name="unit1"  onclick="fetch_select_product(this.value);" >
                          <option value="<?php echo $Product_id; ?>"> <?php echo $product; ?></option>
                           <?php
  
  $select=mysqli_query($con,"select distinct(batch.product),Product.Product,Product.Id from batch INNER JOIN Product ON batch.product=Product.Id and batch.unit='$Unit_id' and Product.Product!='$product'");  
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['Id'].">".$row['Product']."</option>";
  }
 
 ?>
 </select>
                
 </select>

 
	  
</div>
</div>
 <div class="form-group">
<label for="subcategoryname" class="col-sm-2 control-label form-label">Equipment</label>
 <div class="col-sm-10">
          <select id="new_select123" class="selectpicker1" name="equipment" >
          <option value="<?php echo $Equipment_id; ?>"> <?php echo $Equipment; ?></option>
          <?php
  
  $select=mysqli_query($con,"select distinct subproduct,Id from subproduct where product='$Product_id' and subproduct!='$Equipment'");  
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['Id'].">".$row['subproduct']."</option>";
  }
 
 ?>
 </select>      
 </div>
 </div>
        
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $Qty; ?>" name = "quantity" id="quantity" required>
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