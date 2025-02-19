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
    <!--<h1 class="title">Manage User</h1>-->
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage User</li>-->
      </ol>

    <!-- Start Page Header Right Div -->
    <!--<div class="right">-->
    <!--  <div class="btn-group" role="group" aria-label="...">-->
    <!--    <a href="index.html" class="btn btn-light">Dashboard</a>-->
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

    <div class="col-lg-8 col-md-6 titles">
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <!-- <h1><a href="add_order.php">Add Order </a>  </h1>  -->
      
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
          Manage User
        </div>
        <div class="panel-body table-responsive">

            <table id="example0k" class="table display">
                <thead>
                    <tr>
                    <th>User id</th>
                        <th>sponsor id</th>
                        <th>Reg. Date</th>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Plan</th>
                        <th>Bank</th>
                        <th>Operation</th> 
                        <th>Report</th>                       
                          <th>Status</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                    <th>User id</th>
                        <th>sponsor id</th>
                        <th>Reg. Date</th>
                         <th>Name</th>
                         <th>Rank</th>
                         <th>Plan</th>
                        <th>Bank</th>
                        <th>Operation</th>
                        <th>Report</th>
                          <th>Status</th>
                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
                  $perpage = 100;
                  if(isset($_GET['page']) & !empty($_GET['page'])){
                    $curpage = $_GET['page'];
                  }else{
                    $curpage = 1;
                  }
                  $start = ($curpage * $perpage) - $perpage;
                  $resultqrycunt=mysqli_query($con,"select * from user ORDER BY id ASC") ;
                   // $query=mysqli_query($con,"select * from user ORDER BY id ASC") ;  
                  $totalres = mysqli_num_rows($resultqrycunt);
                   $endpage = ceil($totalres/$perpage);
                  $startpage = 1;
                  $nextpage = $curpage + 1;
                  $previouspage = $curpage - 1;  
                   $query=mysqli_query($con,"select * from user ORDER BY id ASC LIMIT $start, $perpage") ;                
                    if(mysqli_num_rows($query)>0)
                   { 
                     $currentdate = date('Y-m-d');
                    while($res=mysqli_fetch_assoc($query)){ 
                     // print_r($res['join_date']);
                      if($res['join_date'] != ''){
                         $date=date_create($res['join_date']);
                        $join_date =  date_format($date,"d/m/Y ");
                      }
                     else{
                      $join_date = '--';
                     }
                    $id = $res['id']; 
                    $queryrank=mysqli_query($con,"select * from tree where userid = '$id'") ; 
                    $resrank=mysqli_fetch_assoc($queryrank); 
                    $userid = $res['id'];
                     $plain = $res['plain'];
                      $query_member = "Select * from workstatus where planid='$plain' and userid='$userid' and statusdate ='$currentdate' order by statusdate desc ";
          $res_member = mysqli_query($con, $query_member);
           
        $rm = mysqli_fetch_object($res_member);
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
              
                  $sqls = "SELECT L.*, F.*, T.* FROM ledger as L, flag as F, transaction_type as T where L.user_id = $userid  and F.Flag_type = L.flag and T.transaction_type = L.transaction_type ORDER BY id desc";
            $results = $con->query($sqls);
          $rows = $results->fetch_assoc();

                    ?>
                      <tr>
                       <td><?php echo 'U'.$res['id']?></td>
                       <td><?php echo '#'.$res['sponsorid']?></td>
                       <td><?php echo $join_date?></td>
                       
                          <td><?php echo $res['name']?><br><?php echo $res['email']?><br><?php echo $res['mobileno']?><br><?php echo $res['password']?></td>
                          <td><?php echo $resrank['level']?></td>
                          <td><?php echo $res['plain']?></td>
                          <td><?php echo $res['bank_name']?><br><?php echo $res['account_number']?><br><?php echo $res['ifsc_code']?><br><?php echo $res['bank_branch']?><br><?php echo $res['holder_name']?></td>
                          <td><a href="ledger.php?id=<?php echo $id?>">Ledger</a><br> 
                           <a href="tree.php?id=<?php echo $id?>">Tree</a> <br>
                           <a href="kyc.php?id=<?php echo $id?>">KYC</a> <br>
                           <a href="manage_withdrow.php?id=<?php echo $id ?>">Withdrawl</a> <br>
                           <a href="todatworkstatus.php?id=<?php echo $id?>">Work Status</a> </td>
                          </td>
                          <td>
                          <?php if($totalwork != ''){
                            echo 'Today Work: '.$rmwork->cnt.' / '.$totalwork; 
                            echo '<br>';                           
                          }

                            echo 'wallet Status: '.$rows['balance'];
                          ?>
                           </td>
                          <td>
                          <?php 
                          if($res['isactive'] == 1){
                            echo '<a href="manage_user.php?status=deactivate&id='.$id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                             echo '<a href="manage_user.php?status=activate&id='.$id.'"><i class="fa fa-close"></i></a>';
                          } 
                          ?>
                          <a href="edit_user.php?id=<?php echo $id ?>"><i class="fa fa-edit"></i></a>
                          </td>
                       
                          
                      </tr>
                      
                   <?php } 
                 }
                    else
                    {
                       echo 'No Record Found.';

                    }
                ?>
                   
                </tbody>
            </table>
            <div class="pagi_ul">
                              <ul class="pagination" style="float: right;">
                              <?php if($curpage != $startpage){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">First</span>
                                  </a>
                                </li>
                                <?php } ?>
                                <?php if($curpage >= 2){ ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                                <?php } ?>
                                <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                                <?php if($curpage != $endpage){ ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                                <li class="page-item">
                                  <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Last</span>
                                  </a>
                                </li>
                                <?php } ?>
                              </ul>
                </div>

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
