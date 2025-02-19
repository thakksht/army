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
  echo $sql = "UPDATE pin_list SET isactive='0' WHERE workid = $workid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE pin_list SET isactive='1' WHERE workid = $workid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'delete'){

  $sql = "DELETE FROM pin_list WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <!--<h1 class="title">Manage Close Pin</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Close Pin</li>-->
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

    <div class="col-lg-8 col-md-6 titles">
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <h1><a href="add_pin.php">Add Pin </a>  </h1> 
      
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
            <span>Manage Close Pin</span>
          <span style="margin-left: 30px;font-weight: normal;text-transform: capitalize;"><a href="manage_pin.php">Open Pin</a> | <a href="manage_closepin.php">Close Pin</a></span>
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        
                        <th>Pin Number</th>
                        <th>User Id</th>
                        <th>Used User</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Pin Number</th>
                        <th>User Id</th>
                        <th>Used User</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
                    $query=mysqli_query($con,"select * from pin_list where status ='close'") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $id =$res['id']; 
                       $used_user =$res['used_user'];
                       $queryuser=mysqli_query($con,"select * from user where email='$used_user'") ;
                       $resres=mysqli_fetch_assoc($queryuser) ;                      
                    ?>
                      <tr>
                         
                           <td><?php  echo$res['pin'];?>
                             
                           </td>
                           <td><?php  echo$res['userid'];?>
                             
                           </td>
                           <td><?php  echo$res['used_user'] .' '.$resres['id'].'';?>
                             
                           </td>
                           <td><?php  echo$res['status'];?>
                             
                           </td>
                           <td><?php $release_dates = date_create($res['release_date']);
                              echo $release_date = date_format($release_dates, "d-m-Y");
                            ?>
                          </td>
                          <td>
                         <a href="javascript:deletePin('<?php echo $id?>')"><i class="fa fa-close"></i></a>
                        
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
function deletePin(id) {
   var status = confirm("Are you sure you want to delete this Pin");
   if(status) {
     location.href = "manage_pin.php?status=delete&id="+id; 
   } 
} 
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
