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
    <h1 class="title">Pin</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Pin</li>
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
      <h1>Pin</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
if(isset($_POST['addsubmit']))
{
  $pingenrate = $_POST['pingenrate'];
$release_date = date('Y-m-d');
$userid = $_POST['userid'];

$i=1;
while($i<=$pingenrate ){
$generated_pin = rand(100000,999999);
  $q = mysqli_query($con,"insert into pin_list (`userid`,`pin`,`release_date`) values('$userid','$generated_pin','$release_date')");
  $i++;
}
  if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_pin.php");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_pin.php");</script>';
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
          E Pin Genrate
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                  <label class="col-sm-2 control-label form-label">User</label><br>
                  <select class="userid" name="userid"  required >
                    <option value="">User Id</option>
                    <?php
                    $query=mysqli_query($con,"select * from user where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $userid =$res['id'];
                      ?>
                      <option value="<?php echo $userid ?>"><?php echo $userid ?></option>
                   <?php }
                 }
                    ?>
                     
                      </select> 
             
                <div class="form-group">
                  <label for="workdate" class="col-sm-2 control-label form-label">Number Of Pin Genrate</label><br>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "pingenrate"  required>
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
<link rel="stylesheet" type="text/css" href="datepicker/jquery.datetimepicker.css"/> 
<script src="datepicker/jquery.datetimepicker.full.js"></script>
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
