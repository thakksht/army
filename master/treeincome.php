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
$id = $_REQUEST['id'];

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
    <h1 class="title">Manage Tree Income</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Tree Income</li>
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
    <?php
    $query_memberl = "Select U.*, T.lastuserid, T.userid,T.income,T.incomedate from user as U, userincome as T where T.userid = $id and U.id = T.lastuserid";
          $res_memberl = mysqli_query($con, $query_memberl);
          $totalincomel = 0;
          while($rml = mysqli_fetch_object($res_memberl))
          {
                //binarytree($rm->id, $con, $level);
                //echo $rm->name;
            $totalincomel += $rml->income;
          }
    ?>
   <h1 style="text-align: center;">Total Income:  <?php echo money_format('%!i',$totalincomel) ?></h1> 
      
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
          Manage Tree Income
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                     <th>Date</th>
                    <th>User id</th>                       
                        <th>Name</th>
                        <th>Income</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                    <th>Date</th>
                    <th>User id</th>                       
                        <th>Name</th>
                        <th>Income</th>

                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
          $query_member = "Select U.*, T.lastuserid, T.userid,T.income,T.incomedate from user as U, userincome as T where T.userid = $id and U.id = T.lastuserid";
          $res_member = mysqli_query($con, $query_member);
          $totalincome = 0;
          while($rm = mysqli_fetch_object($res_member))
          {
                //binarytree($rm->id, $con, $level);
                //echo $rm->name;
            $totalincome += $rm->income;
            $date = date_create($rm->incomedate);
            $incomedate =  date_format($date,"d-m-Y ");
                echo '<tr>
                <td >'.$incomedate.'</td>
                  <td>'.$rm->id.'</td>
                  <td>'.$rm->name.'</td>
                  <td>'.money_format('%!i', $rm->income).'</td>
                  
                  
                </tr>';
          }   
          //echo '<tr><td>Total Income</td><td>--</td><td>--</td><td>'.money_format('%!i',$totalincome).'</td><tr>';
//      }
// }
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
