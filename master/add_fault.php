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
if(isset($_POST['addsubmit']))
{
    $cat_prod=$_POST['cat_prod'];
    $category=$_POST['cat'];
    $product=$_POST['prod'];
  //$product = $_POST['product'];
  $part = $_POST['equipment'];
  $batchno = $_POST['batchno'];
  $unit = $_POST['unit1'];
  //$product=$_POST['unit2'];
  $fault = $_POST['fault'];
  $AVT_engaged = $_POST['AVT_engaged'];
  $killtype = $_POST['killtype'];
  $typefault = $_POST['typefault'];
  $timerequried	 = $_POST['timerequried'];
  $comment  = $_POST['comment'];
 /* $isactive = $_POST['isactive'];*/
  $GR=$_POST['GR'];
 // $equip=$_POST['equipment'];
  $date=date("Y/m/d");
 //echo "insert into fault (`product`,`batchno`,`unit`,`fault`,`killtype`,`typefault`,`timerequried`,`isactive`) values('$product','$batchno','$unit','$fault','$killtype','$typefault','$timerequried','$isactive')";
     //die("gagaga");
      //echo " SELECT * FROM  fault  WHERE product='$product' and batchno='$batchno' and unit='$unit' ";
     
       //die("vbcb"); 
       //echo " SELECT * FROM  fault  WHERE product='$product' and batchno='$batchno' and unit='$unit' and part='$part'  ";
      $Q1=mysqli_query($con," SELECT * FROM  fault  WHERE product='$product' and batchno='$batchno' and unit='$unit' and part='$part'  ");
      
      if(mysqli_num_rows($Q1)>0){
         // echo " SELECT * FROM  fault  WHERE product='$product' and batchno='$batchno' and unit='$unit' ";
          
    // echo   "UPDATE fault SET fault = '$fault', killtype= '$killtype' ,typefault= '$typefault', timerequried= '$timerequried',isactive='1' WHERE product='$product' and batchno='$batchno' and unit='$unit'";
//die("ddd");
     $qq=mysqli_query($con, "UPDATE fault SET fault = '$fault', killtype= '$killtype' ,typefault= '$typefault', timerequried= '$timerequried',isactive='1' WHERE product='$product' and batchno='$batchno' and unit='$unit'");
   echo '<script>alert("Add Successfully.");window.location.assign("manage_fault.php");</script>';
      }
       else {
            //echo "insert into fault (`product`,`batchno`,`part`,`unitcat1`,`catprod`,`unit`,`fault`,`killtype`,`typefault`,`timerequried`,`isactive`) values('$product','$batchno','$part','xfvdf','$cat_prod','$unit','$fault','$killtype','$typefault','$timerequried','$isactive')";
            // die("dfd");
  $q = mysqli_query($con,"insert into fault (`product`,`batchno`,`part`,`unitcat`,`catprod`,`unit`,`fault`,`AVT_engaged`,`killtype`,`typefault`,`timerequried`,`comment`,`isactive`,`date`,`GR`) values('$cat_prod','$batchno','$part','$category','$product','$unit','$fault','$AVT_engaged','$killtype','$typefault','$timerequried','$comment','1','$date','$GR')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_fault.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_fault.php");</script>';
  }
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
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal horixntl_forms">
                     <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Formations</label>
                 <div class="col-sm-10">
                     
                  <div id="select_box">
 <select onchange="fetch_select2(this.value);"  class="selectpicker" name="cat" required>
  <option>Category</option>
  <?php
  

  $select=mysqli_query($con,"select Unitcat,id from unitcat group by Unitcat");
  while($row=mysqli_fetch_assoc($select))
  {
   echo "<option value=".$row['id'].">".$row['Unitcat']."</option>";
  }
 ?>
 </select>
 
</div></div>  
</div>
                  
                
                <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Unit</label>
                 <div class="col-sm-10">
                     <select class="form-control" id="new_select" name="unit1"  onclick="fetch_select9(this.value);">
                          <option value=""> Unit</option>
 </select>
                                  
                  </div>
                
                </div>
                
                  <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Category Product</label>
                 <div class="col-sm-10">
                     <select class="form-control" id="new_select9" name="" onclick="fetch_select44(this.value);" >
                          <option value=""> Category Product</option>
 </select>
                                  
                  </div>
                
                </div>
                
                
               
                
                <!-- <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Category Product</label>
                 <div class="col-sm-10">
                     
                    <select class="selectpicker" name="prod" onchange="fetch_select44(this.value);"  >
                   <option value="">Category Product1</option>
                    <?php
               
                    $qu1=mysqli_query($con,"select * from category_product where isactive = 1") ;                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['Id'];
                      $batchno =$res11['cat_prod'];
                      ?>
                       
                      <option value="<?php echo $batchno ?>"><?php echo $batchno?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>                  
                  </div>
                
                </div> -->
              
                   <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="new_select34"  onclick="fetch_select66(this.value); fetch_select60(this.value);" name="cat_prod">
                          <option value=""> Product</option>
 </select>
                       
                 
</div>    
</div>

                   <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label">Batch</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="new_select66" name="batchno">
                          <option value=""> batch</option>
 </select>
                       
                 
</div>    
</div>
<div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Equipment</label>
                 <div class="col-sm-10">
                     
                    <select name="equipment" id="new_select67" >
                   <option value=""> Equipment</option>
                   
                     
                      </select>                  
                  </div>
                
                </div>
<div class="form-group dfrrgg">
<label for="subcategoryname" class="col-sm-2 control-label form-label">GR</label>
<div class="col-sm-10">
         <input type="text" name="GR">    
   </div>              
 </div>               
               
                
             
 <div class="form-group dfrrgg">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Fault </label>
                 <div class="col-sm-10">
                     <select class="selectpicker" name="fault" >
          <option value=''>Choose Fault</option>
            <option value="NMC">NMC</option>
            <option value="PMC">PMC</option>
            
        </select>
         </div>
    <div class="NMC box">
        
        <div class="form-group pmcdfr">
                       <label for="subcategoryname" class="col-sm-2 control-label form-label"> Kill </label>
                 <div class="col-sm-10">
                     <select class="selectpicker" name="killtype" >
        
            <option value=''>Choose Kill</option>
            <option> M kill</option>
            <option>K kill</option>
            <option>F kill</option>
            
        </select></div>
        </div>
        </div>
    <div class="PMC box">
           <div class="form-group pmcdfr">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label"> Type of Fault</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "typefault" id="batch" >
                  </div>
                </div>
                 <div class="form-group pmcdfr">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Time Requried</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "timerequried" id="batch" >
                  </div>
                </div>
         </div>
     </div>

      <div class="form-group dfrrgg">
<label for="AVT_engaged" class="col-sm-2 control-label form-label">AVT Engaged</label>
<div class="col-sm-10">
         <input type="text" name="AVT_engaged">    
   </div>              
 </div>  

            <div class="form-group dfrrgg">
<label for="comment" class="col-sm-2 control-label form-label">Comment</label>
<div class="col-sm-10">
         <textarea type="text" name="comment" style="height: 100px;width: 500px;">    
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
  
  <!-- End Row -->

</div>
<!-- END CONTAINER -->
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>