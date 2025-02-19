<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">
<?php
$status = $_REQUEST['status'];
$userid = $_REQUEST['id'];

// if($status == 'deactivate'){
//   $sql = "UPDATE user SET isactive='0' WHERE id = $id";
//   if ($con->query($sql) === TRUE) {
//       echo "Record updated successfully";
//   }
// }
// if($status == 'activate'){
//   $sql = "UPDATE user SET isactive='1' WHERE id = $id";
//   if ($con->query($sql) === TRUE) {
//       echo "Record updated successfully";
//   }
// }
// if($status == 'delete'){
//   $sql = "DELETE FROM user WHERE id = $id";
//   if ($con->query($sql) === TRUE) {
//       echo "Record deleted successfully";
//   }
// }
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Manage Today Work</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Today Work</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.html" class="btn btn-light">Dashboard</a>
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

    <div class="col-lg-12 col-md-12 titles">
   
      
    </div>


  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Manage Today Work
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                      <th >S.No</th>
                      <th>Date</th>
                      <th>Complete</th>
                      <th>Pending</th>
                      <th>Total</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                      <th >S.No</th>
                      <th>Date</th>
                      <th>Complete</th>
                      <th>Pending</th>
                      <th>Total</th>
                    </tr>
                </tfoot>
             
                <tbody>
                 <?php
        $currentdate = date('Y-m-d');
          $query = "Select * from user where id ='$userid'";
          $res_user = mysqli_query($con, $query);
          $rmq = mysqli_fetch_object($res_user);
          $plain = $rmq->plain;
          //echo $query_member = "Select W.*, WS.totalwork from work as W, workstatus as WS where W.worktype='$plain' and W.isactive='1' and WS.workid = W.workid and WS.userid='$userid' order by W.workdate desc ";
           $query_member = "Select * from workstatus where planid='$plain' and userid='$userid' order by statusdate desc ";
          $res_member = mysqli_query($con, $query_member);
          if(!empty($res_member)){
            $j=1;
        while($rm = mysqli_fetch_object($res_member)){
            $date = date_create($rm->statusdate);
            $workid = $rm->workid;
            $incomedate =  date_format($date,"d-m-Y ");
            $totalwork = $rm->totalwork;
            // $lingdata = explode('^^', $rm->linking1);
            // $i=0;
            // foreach ($lingdata as $key => $linking) {
            //  $i++;
            // }
            $workincome = "Select count(*) as cnt from workincome as W, workstatus as WS where W.userid ='$userid' and W.currentdate='$rm->statusdate' and W.workid = '$workid' and WS.workid = W.workid and W.userid= WS.userid";
                $res_workincome = mysqli_query($con, $workincome);
                $rmwork = mysqli_fetch_object($res_workincome); 
              
              echo '<tr>
                <td >'.$j.'</td>
                  <td>'.$incomedate.'</td>';
                  ?>

                <td><?php echo $rmwork->cnt; ?></td>
                <td><?php echo $totalwork-$rmwork->cnt; ?></td>
                <td> <?php echo $totalwork ?> </td>
                  
                <?php   
                  
                echo '</tr>';
          
          $j++;
        }
      }
        ?>
        
          <?php
    
?>
                   
                </tbody>
            </table>


        </div>

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
