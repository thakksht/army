
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
    <h1 class="title">Trade</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Trade</li>
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
      <h1>Trade</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
     $category = $_POST['trade'];
  //  $unit = $_POST['unit'];
   
  /*$isactive = $_POST['isactive'];*/
 //echo "insert into batch (`vehicle`,`unit`,`isactive`) values('$vehicle','$unit',$isactive')";
    
     //die("gagaga");
$q = mysqli_query($con,"insert into trade (`trade`,`isactive`) values('$category','1')");
 
  //$q = mysqli_query($con,"insert into fault (`product`,`batchno`,`unit`,`isactive`) values('$product','$batchno','$unit','$isactive')");
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_trade.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_trade.php");</script>';
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
                     <!--  <label for="subcategoryname" class="col-sm-2 control-label form-label"> Unit</label></label>-->
                <!-- <div class="col-sm-10">
                     
                    <select class="selectpicker" name="unit" required>
                   <option value=""> Unit</option>
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
                     
                      </select>                  
                  </div>-->
                
                </div>
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">Add Trade</label></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "trade" id="vehicle" required>
                  </div>
                </div>
                 
                
               <!--  <div class="form-group">
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