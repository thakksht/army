<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>
<style>
.fals-addsec input.form-control {
    width: 100%;
}
.fals-addsec .col-sm-12 {
    padding-left: 0;
}
</style>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Add Flash</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Add Flash</li>
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
      <h1>Add Flash</h1>
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
          Add Flash
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal fals-addsec" enctype="multipart/form-data">
				
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Date</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="tkcas" required>
                  </div>
                </div>
 
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Unit</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="bravo" required>
                  </div>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Product Category</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="charli" required>
                  </div>
                </div>
				<div class="clearfix"></div>
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Flash Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="delta" required>
                  </div>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Is Active</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="echs" required>
                  </div>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="category" class="control-label form-label">Options</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name = "password" id="foxtrot" required>
                  </div>
                </div>
 
                <div class="form-group col-sm-4">
                <label for="fdg" class="control-label form-label"></label>
                  <div class="col-sm-12">
                    <button type="submit" name="addsubmit" class="btn btn-default flshinput">Submit</button>
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
<link rel="stylesheet" type="text/css" href="datepicker/jquery.datetimepicker.css"/> 
<script src="datepicker/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
   $(document).ready(function($) {

    $('#datepickers').datetimepicker({
      timepicker:false,
      //minDate: new Date(),
        format: 'd-m-Y'
    });
});

</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
