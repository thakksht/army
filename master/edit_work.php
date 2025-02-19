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
    <h1 class="title">Edit Work</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit Work</li>
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
      <h1>Edit Work</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$workid = $_REQUEST['workid'];
if(isset($_POST['addsubmit']))
{
 $worktype = $_POST['worktype'];
  $isactive = $_POST['isactive'];
$workdates = $_POST['workdate'];
//$linking1 = $_POST['linking1'];
$linking2 = $_POST['linking2'];
$linking3 = $_POST['linking3'];
$date=date_create($workdates);
$workdate = date_format($date,"Y-m-d");
$linking1 = implode('^^', $_POST['linking1']);
//print_r($_POST);
//die('hloo');
  // $q = mysqli_query($con,"insert into category (`categoryname`,`meta_title`,`meta_description`,`long_description`,`isactive`) values('$categoryname','$meta_title','$meta_description','$long_description','$isactive')");
  // if($q){
  //   echo '<script>alert("Add Successfully.");window.location.assign("manage_category.php");</script>';
  // }
  // else{
  //     echo '<script>alert("please Add Again....");window.location.assign("add_category.php");</script>';
  // }

  $sql = "UPDATE work SET workdate='$workdate', linking1='$linking1', linking2='$linking2', linking3='$linking3', isactive='$isactive' WHERE workid = $workid";
  if ($con->query($sql) === TRUE) {
    echo '<script>alert("Update Successfully.");window.location.assign("manage_work.php");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("edit_work.php?workid='.$workid.'");</script>';
  }
}


$query=mysqli_query($con,"select * from work where workid = $workid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$worktype = $res['worktype'];
$workdates = $res['workdate'];
$linking1 = $res['linking1'];
$linking2 = $res['linking2'];
$linking3 = $res['linking3'];
$isactive = $res['isactive'];
$date=date_create($workdates);
$workdate = date_format($date,"d-m-Y");
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
          Work
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

                <div class="form-group">
                  <label for="workdate" class="col-sm-2 control-label form-label">Work Date</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control datepickers" name = "workdate" id="datepickers" value="<?php echo $workdate ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Linking Type</label>
                  <div class="col-sm-10">
                  
                  <!--  <input type="text" class="form-control " name = "worktype" id="" value="<?php echo $workdate ?>" required> -->
                  <!-- <input type="text" class="form-control " name = "worktype" id="" value="<?php echo $workdate ?>" required> -->
                  
                    <?php
                    $query=mysqli_query($con,"select * from plain where isactive = 1 and plainid =  $worktype") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                       $plainid =$res['plainid'];
                      $plainname =$res['plainname'];
                      $affilat_links =$res['affilat_links']; ?>
                      <input type="text" class="form-control " name = "worktype" id="" value="<?php echo $plainname ?>" readonly required>
                      <?php
                     
                      }
                 }
                    ?>
                  </div>
                </div>
                <div id="tinking_view">
                <?php
               $likdata =  explode('^^', $linking1);
                   $i =1; 
               foreach($likdata as $linking){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Link type <?php echo $i ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "linking1[]" id="linking1"  value="<?php echo $linking ?>" required>
                    </div>
                    </div>
             <?php      $i++; } ?>
               <!--    <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Link type 1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "linking1" id="linking1"  value="<?php echo $linking1 ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Link type 2</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name = "linking2" id="linking2" value="<?php echo $linking2 ?>" >                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Link type 3</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name = "linking3" id="linking3" value="<?php echo $linking3 ?>" >                    
                    </div>
                  </div> -->

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
  $(document).ready(function($) {

    $('#datepickers').datetimepicker({
      timepicker:false,
      minDate: new Date(),
        format: 'd-m-Y'
    });
});
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
