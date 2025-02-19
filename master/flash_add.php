<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

<?php
if(isset($_POST['add_flash']) && $_POST['add_flash']=='add_flash'){
  $date = date("d-m-y");
  $tk= $_POST['tk'];
  $tac= $_POST['tac'];
  $eqpt= $_POST['eqpt'];
  $damage= $_POST['damage'];
  $gr= $_POST['gr'];
  $rank_trade= $_POST['rank_trade'];
  $crew_condition= $_POST['crew_condition'];
  $enemy_activity= $_POST['enemy_activity'];

  $sql = "INSERT INTO flash_manage (flash_date, tk, tac, eqpt, damage, gr, rank_trade, crew_condition, enemy_activity) VALUES ('".$date."', '".$tk."', '".$tac."', '".$eqpt."', '".$damage."', '".$gr."', '".$rank_trade."', '".$crew_condition."', '".$enemy_activity."')";

  if ($con->query($sql) === TRUE) {
    $msg_class = 'alert-success';
    $msg = "Record Added Successfully";
  }else{
    $msg_class = 'alert-error';
    $msg = "Error - Record Not Save.";
  }
}

?>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <!--<h1 class="title">Manage Batch</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Batch</li>-->
      </ol>

    <!-- Start Page Header Right Div -->
    <!--<div class="right">-->
    <!--  <div class="btn-group" role="group" aria-label="...">-->
    <!--    <a href="dashboard.php" class="btn btn-light">Dashboard</a>-->
    <!--    <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>-->
    <!--    <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>-->
    <!--    <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>-->
    <!--  </div>-->
    <!--</div>-->
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">




<?php if((isset($msg)) and ($msg != '')){ ?>
        <div class="alert <?php echo $msg_class; ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><?php echo $msg; ?></p>
        </div>
        <?php } ?>
        <div class="box box-info">
        
          <h2 class="text-center">Add Flash</h2 class="text-center"> 

        <!-- form start -->
        <form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="add_flash" value="add_flash">
            <div class="box-body">		
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">TK CAS/CREW CAS</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="tk" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">tac no</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="tac" required>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">eqpt and BA no</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="eqpt" required>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Cas Condition and Damage Due To</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="damage" required>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">GR</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="gr" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Rank/ Trade/ Name</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="rank_trade" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Crew Condition</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="crew_condition" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Enemy Activity</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="enemy_activity" required>
                  </div>
              </div>
		  
		   
              <div class="box-footer" style="text-align: center;padding-bottom: 30px;">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a href="flash_list.php" type="button" class="btn btn-info">Cancel</a>
              </div>
            </div>
        </form>
        </div>




  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">


      </div>
    </div>
    <!-- End Panel -->






  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

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
Data Tables
================================================ -->
<script src="js/datatables/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>



<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>


 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
