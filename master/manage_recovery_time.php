<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
session_start();
 
unset( $_SESSION['p']);
?>
<?php
@$status = $_REQUEST['status'];
@$subcategoryid = $_REQUEST['Id'];

/*if($status == 'deactivate'){
  $sql = "UPDATE recoverytime SET isactive='0' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE recoverytime SET isactive='1' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}*/
if($status == 'delete'){
  $sql = "DELETE FROM recoverytime WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <!--<h1 class="title">Manage Recovery Time</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Recovery Vehicle</li>-->
      </ol>

    <!-- Start Page Header Right Div -->
    <!--<div class="right">-->
    <!--  <div class="btn-group" role="group" aria-label="...">-->
    <!--    <a href="dashboard.php" class="btn btn-light">Dashboard</a>-->
    <!--    <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>-->
       <!-- <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>-->
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
      <h1><a href="add_recovery_time.php">Recovery Time</a>  </h1> 
      
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
          
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Vehicle</th>
                        <th>GR</th>
                        <th>Presently Completion	</th>
                        <th>Timely Completion</th>
                        <th>Hour</th>
                       <!-- <th>Active</th>-->
                        <th>Options</th>
                    </tr>
                </thead>
             
             
             
                <tbody>
                  <?php //echo "select * from Brigade";
                  
                  
                    $query=mysqli_query($con,"SELECT 
                      recoverytime.*,
                      vehicle.vehicle as ggg
                      from recoverytime
                      LEFT JOIN vehicle ON recoverytime.vehicle=vehicle.ID") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $Id = $res['Id'];
                      $date=$res['date'];                     
                      $vehicle = $res['ggg'];
                      $GR= $res['GR'];
                      $presentlycompletion= $res['presentlycompletion'];
                      $timelycompletion= $res['timelycompletion'];
                      $hour = $res['hour'];
                     // $isactive = $res['isactive'];
  //echo "select * from vehicle where  Id='$vehicle'";
// $sq="select * from vehicle where  Id='$vehicle'";

//if ($ret=mysqli_query($con,$sq))
//  {
  // Fetch one and one row
//  while ($ro=mysqli_fetch_row($ret))
 //   {
    
// $sql1="select * from Brigade where  Id='$unit'";
//if ($res1=mysqli_query($con,$sql1))
//  {
  // Fetch one and one row
//  while ($row1=mysqli_fetch_row($res1))
 //   {
 ?>
                 <tr>
                      <td><?php echo $res['date'];?></td>
                          
                          <td><?php echo $vehicle;?></td>
                         
                          <td><?php echo $res['GR']?></td>
                          <td><?php echo $res['presentlycompletion']?></td>
                          <td><?php echo $res['timelycompletion']?></td>
                          
                          <td><?php echo $res['hour']?></td>
                          
                          
                           
                         <!-- <td><?php 
                          if($res['isactive'] == 1){
                            echo '<a href="manage_recovery_time.php?status=deactivate&Id='.$Id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                            echo '<a href="manage_recovery_time.php?status=activate&Id='.$Id.'"><i class="fa fa-close"></i></a>';
                          }

                          ?></td>-->
                          <td><a href="edit_recovery_time.php?Id=<?php echo $Id ?>"><i class="fa fa-edit"></i></a>
                           <a style="margin-left: 20px;" href="manage_recovery_time.php?status=delete&Id=<?php echo $Id ?>"><i class="fa fa-close"></i></a></td>
                          
                      </tr>
                      
                   <?php
                   
        
        
    } 
           //      }
           //         }
  // Free result set
  @mysqli_free_result($result);
//}
// }
  // Free result set
  @mysqli_free_result($ro);
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
