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

if($status == 'deactivate'){
  $sql = "UPDATE user SET isactive='0' WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE user SET isactive='1' WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'delete'){
  $sql = "DELETE FROM user WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Manage Ledger</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Ledger</li>
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

    <div class="col-lg-8 col-md-6 titles">
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <a href="treeincome.php?id=<?php echo $id?>">Tree Income </a> | <a href="workincome.php?id=<?php echo $id?>">Work Income </a>
      
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
          Manage Ledger
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                    <th>Date</th>                       
                      <th>Ref No.</th> 
                      <th>Trn. Type</th>                      
                      <th>Op Bal.</th>
                      <th>Flag</th>
                      <th>%</th>
                      <th>Amt.</th>
                       <th>Bal.</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                    <th>Date</th>                       
                      <th>Ref No.</th> 
                      <th>Trn. Type</th>                      
                      <th>Op Bal.</th>
                      <th>Flag</th>
                      <th>%</th>
                      <th>Amt.</th>
                       <th>Bal.</th>
                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
                
                    $sqls = "SELECT L.*, F.*, T.* FROM ledger as L, flag as F, transaction_type as T where L.user_id = $id  and F.Flag_type = L.flag and T.transaction_type = L.transaction_type ORDER BY id ASC";
            $results = $con->query($sqls);
           while($rows = $results->fetch_assoc()) {

                        $dates = $rows['ledger_date'];
                        $prestage = $rows['prestage'];
                        $transferno = $rows['transferno'];
                        $transaction_type = $rows['transaction_name'];
                        $flag = $rows['Flag_name'];
                        $open_balance = $rows['open_balance'];
                         $amount = $rows['amount'];
                        $balance = $rows['balance'];
                        $extra_amount = $rows['extra_amount'];
                        $date=date_create($dates);
                        $date =  date_format($date,"d-M-Y");

                        setlocale(LC_MONETARY, 'en_IN');
                        $amount = money_format('%!i', $amount);
                        $balance = money_format('%!i', $balance);
                         if($open_balance == ''){
                          $open_balance = money_format('%!i', '0');
                        }
                        else{
                           $open_balance = money_format('%!i', $open_balance);
                        }

                       ?>

                        <tr> 
                            <td><?php echo $date ?></td>                             
                            <td><?php echo $transferno ?></td> 
                            <td><?php echo $transaction_type ?></td> 
                            <td><?php echo $open_balance ?></td>
                            <td><?php echo $flag ?></td>
                            <td><?php echo $prestage ?></td>
                            <td><span class="blue-txt"><i class="fa fa-inr"></i> <?php echo $amount ?></span></td>
                            <td><?php echo $balance ?></td>
                            
                        </tr> 
                        <?php
                         } 
                    // else
                    // {
                    //    echo 'No Record Found.';

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
                        '<tr class="group"><td colspan="5">'+group+'</th></tr>'
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
