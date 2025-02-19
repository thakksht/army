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
    <h1 class="title">Equipment</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Equipment </li>
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
      <h1> Add Part</h1></h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
  $product = $_POST['product'];
  $subProduct = $_POST['subProduct'];
  $type = 's';
  $catpart=$_POST['subPart'];
/*  $isactive = $_POST['isactive'];*/
   $date=date("Y/m/d");
//echo "insert into batch (`product`,`subProduct`, `type`,`isactive`,`catno`) values('$product',$subProduct','$type',$isactive','$catpart')";
 echo "select * from subproduct where subproduct='$subProduct' and catno='$catpart'";
 
  $qry="select * from subproduct where subproduct='$subProduct' and catno='$catpart'";
    $result=mysqli_query($con,$qry);
$rowcount=mysqli_num_rows($result); 
if($rowcount==0)
    {
         echo "insert into subproduct (`product`,`subProduct`,`type`,`isactive`,`catno`,`date`) values('$product','$subProduct','s','1','$catpart','$date')";
        //  die("ccc");
  $q = mysqli_query($con,"insert into subproduct (`product`,`subProduct`,`type`,`isactive`,`catno`,`date`) values('$product','$subProduct','s','1','$catpart','$date')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_subproduct.php");</script>';
  }
    }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_subproduct.php");</script>';
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
                  <label class="col-sm-2 control-label form-label"> Add Product</label>
                  <div class="col-sm-10">
                     
                    <select class="selectpicker" name="product" required>
                   <option value="">Add Product</option>
                    <?php
                 
                    $query=mysqli_query($con,"select * from Product where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $Id =$res['Id'];
                      $Product =$res['Product'];
                      ?>
                       
                      <option value="<?php echo $Id ?>"><?php echo $Product?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Add Equipment</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "subProduct" id="subProduct" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Add Cat No</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "subPart" id="subPart" required>
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