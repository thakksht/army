h<?php
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
    <h1 class="title">Edit linking Type</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit linking Type</li>
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
      <h1>Edit linking Type</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$linkingtypeid = $_REQUEST['linkingtypeid'];
if(isset($_POST['addsubmit']))
{
  $linkingtypename = $_POST['linkingtypename'];
  $isactive = $_POST['isactive'];
  
  $sql = "UPDATE linkingtype SET linkingtypename='$linkingtypename', isactive='$isactive' WHERE linkingtypeid = $linkingtypeid";
  if ($con->query($sql) === TRUE) {
    echo '<script>alert("Update Successfully.");window.location.assign("manage_linkingtype.php");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("edit_linkingtype.php?linkingtypeid='.$linkingtypeid.'");</script>';
  }
}
$query=mysqli_query($con,"select * from linkingtype where linkingtypeid = $linkingtypeid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$linkingtypename = $res['linkingtypename'];

$isactive = $res['isactive'];

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
          linking Type
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

                <div class="form-group">
                  <label for="linkingtypename" class="col-sm-2 control-label form-label">linking Type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "linkingtypename" id="linkingtypename" required value="<?php echo $linkingtypename ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="isactive" class="col-sm-2 control-label form-label">IsActive</label>
                   <div class="col-sm-10">
                  <?php if($isactive == 1){ ?>

                    <input type="checkbox" class="form-control" name = "isactive" value="1" checked id="isactive">
                 <?php  } else{ ?>
                          <input type="checkbox" class="form-control" name = "isactive" value="1" id="isactive">
                 <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                <label for="fdg" class="col-sm-2 control-label form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="addsubmit" class="btn btn-default">Update</button>
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