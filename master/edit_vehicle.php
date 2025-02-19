Category<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

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
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Category</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit Category</li>
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
      <span class="icon color9-bg"><i class="fa fa-check-square-o"></i></span>
      <h1>Edit Category</h1>
    </div>

    

  </div>

<?php
$ii = $_GET['Id'];
if(isset($_POST['addsubmit']))
{
    
    $category1 = $_POST['category1'];
    $category2 = $_POST['category2'];
    $category3 = $_POST['category3'];
    $Brigade2 = $_POST['Brigade1'];
    $batch = $_POST['batch'];

$date=date("Y/m/d");
  $q = mysqli_query($con,"UPDATE `vehicle` SET `category`='$category1',`unit`='$category2',`cat`='$category3',`vehicle`='$Brigade2',`batch`='$batch' WHERE Id='$ii'");
  //echo "UPDATE `vehicle` SET `category`='$category1',`unit`='$category2',`cat`='$category3',`vehicle`='$Brigade2',`batch`='$batch', WHERE Id='$ii'";die();

   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_vehicle.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("edit_vehicle.php");</script>';
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
         Category
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
    vehicle.*,
    unitcat.Unitcat,
    category.category,
    vehicle.category as cat_id,
    Brigade.Brigade
    from vehicle 
    LEFT JOIN unitcat ON vehicle.unit=unitcat.id
    LEFT JOIN Brigade ON vehicle.cat=Brigade.Id
    LEFT JOIN category ON vehicle.category=category.Id
   Where vehicle.Id='$unitcat'");
  
  $res=mysqli_fetch_array($q);
$Id = $res['Id'];
$vehicle = $res['vehicle'];
$batch = $res['batch'];
$unit = $res['unit'];
$Unitcat = $res['Unitcat'];
$Brigade = $res['Brigade'];
$cat = $res['cat'];
$category = $res['category'];
$cat_id = $res['cat_id'];

?>
           <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

<div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Category</label>
                  <div class="col-sm-8">
                      
                       <select name="category1" class="form-control" onclick="fetch_select3(this.value);">
                   <option value="<?php echo $cat_id ?>"><?php echo $category ?></option>
                    <?php
                 
                    $qu1=mysqli_query($con,"select * from category where isactive = 1 and category!='$category'") ;                    
                    if(mysqli_num_rows($qu1)>0)
                   { 
                    while($res11=mysqli_fetch_assoc($qu1)){
                      $Id =$res11['Id'];
                      $unitcat =$res11['category'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $unitcat?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>
                  
                  </div>
                </div>


                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Unit Category</label>
                  <div class="col-sm-8">
                      
                       <select name="category2" class="form-control" onclick="fetch_select3(this.value);">
                   <option value="<?php echo $unit ?>"><?php echo $Unitcat ?></option>
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

                 <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Category</label>
                  <div class="col-sm-8">
                      
                       <select id="new_select3" name="category3" class="form-control">
                   <option value="<?php echo $cat ?>"><?php echo $Brigade ?></option>
                    <?php                 
                    $qu1=mysqli_query($con,"select * from Brigade where isactive = 1 and unitcategory='$unit' and Brigade!='$Brigade'") ;                    
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
                  <label for="category" class="col-sm-2 control-label form-label">Add vehicle</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $vehicle ?>" name ="Brigade1" id="Brigade" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Add Batch</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $batch ?>" name ="batch" id="Brigade" required>
                  </div>
                </div>
              
                <div class="form-group">
                <label for="fdg" class="col-sm-2 control-label form-label"></label>
                  <div class="col-sm-8">
                    <button type="submit" name="addsubmit" class="btn btn-default">Submit</button>
                  </div>
                </div>

              </form> 

            </div>

      </div>
    </div>

  </div>
 
</div>
<!-- END CONTAINER -->
<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="js/plugins.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="js/summernote/summernote.min.js"></script>

<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/
  $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>