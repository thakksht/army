<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->


  <title>jQuery Show Hide Elements Using Select Box</title>
<style type="text/css">
    .box{
       // color: #fff;
        padding: 20px 20px 0;
        display: none;
        margin-top: 20px;
    }
 .dfrrgg .btn-group.bootstrap-select {
    width: 50% !important;
}
.dfrrgg input#isactive {
    width: 20px;
    border: none;
} 
.form-group.pmcdfr {
    margin-bottom: 0;
    padding-top: 15px;
} 
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } /*else{
                $(".box").hide();
            }*/
        });
    }).change();
});

</script>
<script type="text/javascript">
function fetch_select2(val)
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
function fetch_select3(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod2.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select2").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select4(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod23.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select3").innerHTML=response; 
 }
 });
}

</script>

<script type="text/javascript">
function fetch_select44(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod234.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select34").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select9(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod9.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select9").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select0(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod2.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select3").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select66(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod66.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select66").innerHTML=response; 
 }
 });
}

</script>
<script type="text/javascript">
function fetch_select60(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_prod67.php',
 data: {
  get_option2:val
 },
 success: function (response) {
  document.getElementById("new_select67").innerHTML=response; 
 }
 });
}

</script>

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
      <h1>Fault</h1>
    </div>

    

  </div>

  <!-- End Presentation -->
<?php
$id=$_GET['Id'];
echo $id;
if(isset($_POST['addsubmit']))
{
   $unitcat=$_POST['unitcat'];
   $unit=$_POST['unit'];
   $catprod=$_POST['catprod'];  
  $Product = $_POST['Product'];  
  $batchno = $_POST['batchno'];
  $part = $_POST['equipment'];
  $GR = $_POST['GR'];
  $fault = $_POST['fault'];
  $killtype = $_POST['killtype'];
  $typefault = $_POST['typefault'];
  $timerequried	 = $_POST['timerequried'];
  $AVT_engaged = $_POST['AVT_engaged'];
  $comment = $_POST['comment'];
 // $equip=$_POST['equipment'];
  $date=date("Y/m/d");
  if($fault=='PMC'){
$qq=mysqli_query($con, "UPDATE fault SET unitcat = '$unitcat',unit = '$unit',catprod = '$catprod',Product = '$Product',batchno = '$batchno',part = '$part',GR = '$GR',killtype = '',AVT_engaged = '$AVT_engaged',fault = '$fault',comment = '$comment',typefault='$typefault',timerequried='$timerequried' WHERE id='$id'");
if ($qq) {
  echo '<script>alert("Update Successfully....");window.location.assign("manage_fault.php");</script>';
}
}

elseif ($fault=='NMC'){
  $qq=mysqli_query($con, "UPDATE fault SET unitcat = '$unitcat',unit = '$unit',catprod = '$catprod',Product = '$Product',batchno = '$batchno',part = '$part',GR = '$GR',killtype = '$killtype',AVT_engaged = '$AVT_engaged',fault = '$fault',comment = '$comment',typefault='',timerequried='' WHERE id='$id'");

if ($qq) {
  echo '<script>alert("Update Successfully....");window.location.assign("manage_fault.php");</script>';
}
}

else {
  echo '<script>alert("Please Add Again....");window.location.assign("edit_fault.php");</script>';
}
/*if($fault=='s')
{
     $qq=mysqli_query($con, "UPDATE fault SET fault = '$fault' , killtype='',timerequried='' WHERE id='$id'");
}
else if($fault=='PMC')
{
    
$qq=mysqli_query($con, "UPDATE fault SET fault = '$fault',typefault='$typefault',timerequried='$timerequried' WHERE id='$id'");
   echo '<script>alert("Add Successfully.");window.location.assign("manage_fault.php");</script>';
}
else if($fault=='NMC')
{
    $qq=mysqli_query($con, "UPDATE fault SET fault = '$fault',killtype='$killtype' WHERE id='$id'");
}
    
  if($qq){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_fault.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_fault.php");</script>';
  }
*/
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
$id=$_GET['Id'];
$qry="SELECT
 fault.killtype,
 fault.fault,
 unitcat.Unitcat,
 fault.unitcat,
 fault.batchno,
 batch.batchno as batchbatch,
 fault.part,
 fault.catprod,
 category_product.cat_prod,
 fault.unit,
 Brigade.Brigade,
 fault.fault,
 fault.comment,
 fault.killtype,
 fault.timerequried, 
 fault.date,
 fault.GR,
 fault.AVT_engaged,
 subproduct.subproduct,
 fault.product,
 fault.typefault,
 fault.timerequried,
 fault.killtype,
 Product.Product
 from  fault 
 LEFT JOIN subproduct ON fault.part=subproduct.Id
 LEFT JOIN batch ON fault.batchno=batch.batchId
 LEFT JOIN unitcat ON fault.unitcat=unitcat.id
 LEFT JOIN category_product ON fault.catprod=category_product.id
 LEFT JOIN Brigade ON fault.unit=Brigade.Id
 LEFT JOIN Product ON fault.product=Product.Id 
 where fault.Id='$id'";
/*$qry="select * from fault where Id='$id' and isactive=1";*/
$q=mysqli_query($con,$qry);
 if(mysqli_num_rows($q)>0){
while($res=mysqli_fetch_array($q))
{
  $killtype=$res['killtype'];
  $fault=$res['fault'];
  $unitcat=$res['Unitcat'];  
  $unitcat_id=$res['unitcat'];  
  $unit=$res['Brigade'];  
  $unit_id=$res['unit'];
  $catprod=$res['catprod'];
  $catprod_name=$res['cat_prod'];
  $Product= $res['Product'];
  $product= $res['product'];
  $batchno=$res['batchno'];
  $comment=$res['comment'];
  $batchbatch=$res['batchbatch'];
  $part=$res['part'];
  $subproduct=$res['subproduct'];
  $GR=$res['GR'];
  $AVT_engaged=$res['AVT_engaged'];
  $typefault=$res['typefault'];
  $timerequried=$res['timerequried'];
  $killtype=$res['killtype'];

?>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal horixntl_forms">
                     <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Formations</label>
                        <div class="col-sm-10">
                 <select name="unitcat" class="form-control" onclick="fetch_select2(this.value);"  >
                   <option value="<?php echo $unitcat_id ?>"><?php echo $unitcat ?></option>
                    <?php
                 
                    $qu1=mysqli_query($con,"select * from unitcat where isactive = 1 and Unitcat!='$unitcat'") ;                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['id'];
                      $unitcat =$res11['Unitcat'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>
                    </div>
</div>
                  
                
                <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Unit</label>
                 <div class="col-sm-10">
                 <select id="new_select" name="unit" class="form-control"  onclick="fetch_select9(this.value);">
                   <option value="<?php echo $unit_id ?>"><?php echo $unit ?></option>
                    <?php
                 
                    $qu1=mysqli_query($con,"select * from Brigade where Brigade!= '$unit' and unitcategory='$unitcat_id'") ;                    
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
               
                
              <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Category Product</label>
                 <div class="col-sm-10">
                     <select class="form-control" id="new_select9" name="catprod" onclick="fetch_select44(this.value);" >
                    <option value="<?php echo $catprod ?>"><?php echo $catprod_name ?></option> 
                    <?php                 
                    $qu1=mysqli_query($con,"select * from category_product where cat_prod!= '$catprod_name'");                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['id'];
                      $unitcat =$res11['cat_prod'];
                      ?>                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>     
 </select>
                                  
                  </div>
                
                </div>
                
                     
                   <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="new_select34"  onclick="fetch_select66(this.value); fetch_select60(this.value);" name="Product">
                          <option value="<?php echo $product ?>"><?php echo $Product ?></option>


 <?php
                 
                    $qu1=mysqli_query($con,"select * from Product where Product!= '$Product' and catprod='$catprod'") ;                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['Id'];
                      $unitcat =$res11['Product'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>


                    </select>
                                         
                                   
                    </div>    
                    </div>

                   <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Batch</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="new_select66" name="batchno">
                        <option value="<?php echo $batchno ?>"><?php echo $batchbatch ?></option>
 </select>
                       
                 
</div>    
</div>
<div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Equipment</label>
                 <div class="col-sm-10">
                     
                    <select name="equipment" id="new_select67" >
                   <option value="<?php echo $part ?>"><?php echo $subproduct ?></option>
                   
                     
                      </select>                  
                  </div>
                
                </div>
<div class="form-group dfrrgg">
<label for="subcategoryname" class="col-sm-2 control-label form-label">GR</label>
<div class="col-sm-10">
         <input type="text" name="GR" value="<?php echo $GR ?>">    
   </div>              
 </div>               
               
                
             
 <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Fault </label>
                 <div class="col-sm-10">
                     <select class="selectpicker" name="fault" >
          <option value="<?php echo $fault ?>"><?php echo $fault ?></option>
             <?php                 
                $qu1=mysqli_query($con,"select distinct fault from fault where fault!= '$fault'") ;                    
                  if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){                     
                      $unitcat =$res11['fault'];
                      ?>                       
          <option value="<?php echo $unitcat ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>
            
        </select>
         </div>
    <div class="NMC box">
        
        <div class="form-group pmcdfr">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Kill </label>
                 <div class="col-sm-10">
                     <select class="selectpicker" name="killtype" >
        
            <option value="<?php echo $killtype ?>"><?php echo $killtype ?></option>
            <option value="M kill">M kill</option>
            <option value="K kill">K kill</option>
            <option value="F kill">F kill</option>
            
        </select></div>
        </div>
        </div>
    <div class="PMC box">
           <div class="form-group pmcdfr">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label"> Type of Fault</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $typefault ?>" name = "typefault" id="batch" >
                  </div>
                </div>
                 <div class="form-group pmcdfr">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Time Requried</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $timerequried ?>" name = "timerequried" id="batch" >
                  </div>
                </div>
         </div>
     </div>

      <div class="form-group dfrrgg">
<label for="AVT_engaged" class="col-sm-2 control-label form-label">AVT Engaged</label>
<div class="col-sm-10">
         <input type="text" name="AVT_engaged" value="<?php echo $AVT_engaged ?>">    
   </div>              
 </div>  
       

        <div class="form-group dfrrgg">
<label for="comment" class="col-sm-2 control-label form-label">Comment</label>
<div class="col-sm-10">
         <textarea type="text" name="comment" style="height: 100px;width: 500px;"><?php echo $comment ?>    
          </textarea>
   </div>              
 </div>  

          <!-- <div class="form-group dfrrgg">
                  <label for="isactive" class="col-sm-2 control-label form-label">IsActive</label>
                  <div class="col-sm-10">
                    <input type="checkbox" class="form-control" name="isactive" value="1" id="isactive">
                  </div>
                </div>-->
                <div class="form-group dfrrgg01">
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
  <?php
}
}
?>
  
  
  <!-- End Row -->

</div>
<!-- END CONTAINER -->
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>