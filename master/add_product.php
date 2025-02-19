<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Product</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Product</li>
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
      <h1>Product</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
$cat=$_POST['cat_prod'];
  $Product = $_POST['Product'];
 /* $isactive = $_POST['isactive'];*/
  $date=date("Y/m/d");

//print_r($_POST);
//die('hloo');
  $q = mysqli_query($con,"insert into Product (`Product`,`isactive`,`catprod`,`Date`) values('$Product','1','$cat','$date')");
  
  
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_product.php");</script>';
  }
  else{
     // echo $q;
      echo '<script>alert("please Add Again....");window.location.assign("add_product.php");</script>';
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
          Product
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                        <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Category Product</label>
                  
                  
  
                 
          <div class="col-sm-10">        
 <select name="cat_prod" required>
  <option>Product Category</option>
  <?php
  
  $select=mysqli_query($con,"select * from category_product group by cat_prod");
  while($row=mysqli_fetch_assoc($select))
  {
      ?>
      
  <option value="<?php echo $row['id']?>"><?php echo $row['cat_prod']?></option>";
  <?php
  }
 ?>
 </select>
</div>
</div>
 
 
                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Product</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "Product" id="Product" required>
                  </div>
                </div>
                
                
               
                                
                 <!--<div class="form-group">
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