<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>
<?php
$status = $_REQUEST['status'];
@$subcategoryid = $_REQUEST['Id'];

/*if($status == 'deactivate'){
  $sql = "UPDATE recovery SET isactive='0' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE recovery SET isactive='1' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}*/
if($status == 'delete'){
  $sql = "DELETE FROM recovery WHERE Id = $subcategoryid";
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
    <!--<h1 class="title">Manage Recovery Vehicle</h1>-->
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
      <h1><a href="addrecovery.php">Recovery Vehicle</a>  </h1> 
      
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
                        <th>Unit Name</th>
                         <th>FMM</th>
                        <th>Product Name</th>
                        <th>vehicle</th>
                        <th>Nature of CAS</th>
                        <th>Time of CAS</th>
                        <th>Type of Recovery</th>
                       
                        <th>Expected Time Of Completion</th>
                        <th>GR</th>
                        <th>Remark </th>
                        
                      <!--  <th>Active</th>-->
                        <th>Options</th>
                    </tr>
                </thead>
             
                <!--<tfoot>
                    <tr>
                        <th>Category Name</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Active</th>
                        <th>Options</th>
                    </tr>
                </tfoot>-->
             
                <tbody>
                  <?php //echo "select * from Brigade";
                  
                  
                    $query=mysqli_query($con,"SELECT 
                      recovery.date,
                      unitcat.Unitcat,
                      Brigade.Brigade,
                      vehicle.vehicle,
                      recovery.natureCAS,
                      recovery.timeCAS,
                      recovery.typerecovery,
                      recovery.REC,
                      recovery.timecompletion,
                      recovery.GR,
                      recovery.remark,
                      recovery.Id,
                      Product.Product from recovery 
                      LEFT JOIN Product ON recovery.product=Product.Id
                      LEFT JOIN unitcat ON recovery.Unit=unitcat.id
                      LEFT JOIN Brigade ON recovery.Brigade=Brigade.Id
                      LEFT JOIN vehicle ON recovery.vehicle=vehicle.Id") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                              $Product =$res['Product']; 
                              $unit = $res['Unitcat'];
                              $brigade=$res['Brigade'];
                              $vehicle=$res['vehicle'];
                              $natureCAS = $res['natureCAS'];
                              $timeCAS = $res['timeCAS'];
                              $typerecovery= $res['typerecovery'];
                              $REC= $res['REC'];
                              $timecompletion = $res['timecompletion'];
                              $GR  = $res['GR'];
                              $remark  = $res['remark'];
                              $Id =$res['Id'];
                      
 // $sql="select * from Product where  Id='$Product'";

//if ($result=mysqli_query($con,$sql))
//  {
  // Fetch one and one row
// while ($row=mysqli_fetch_row($result))
 //  {
       
       
     //   echo "select * from vehicle where  Id='$vehicle'";
 //$sq="select * from vehicle where  Id='$vehicle'";

//if ($ret=mysqli_query($con,$sq))
//  {
  // Fetch one and one row
//  while ($ro=mysqli_fetch_row($ret))
   // {
        $sq="select Unitcat from unitcat where id=".$unit;
       //  $sql1="select * from Brigade where  Id='$unit'";

//if ($res1=mysqli_query($con,$sql1))
 // {
  // Fetch one and one row
 // while ($row1=mysqli_fetch_row($res1))
   // {
    
    ?>
                 <tr>
                           <td><?php echo $res['date'];?></td>
                          <td><?php echo $unit;?></td>
                           <td><?php echo $res['Brigade'];?></td>
                           <td><?php echo $Product?></td>
                         
                            <td><?php echo $res['vehicle'];?></td>
                          <td><?php echo $res['natureCAS']?></td>
                          <td><?php echo $res['timeCAS']?></td>
                          <td><?php echo $res['typerecovery']?></td>
                         
                          <td>Hour : <?php echo $res['timecompletion']?></td>
                          <td><?php echo $res['GR']?></td>
                          <td><?php echo $res['remark']?></td>
                          
                           
                         <!-- <td><?php 
                          if($res['isactive'] == 1){
                            echo '<a href="manage_recovery_vehicle.php?status=deactivate&Id='.$Id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                            echo '<a href="manage_recovery_vehicle.php?status=activate&Id='.$Id.'"><i class="fa fa-close"></i></a>';
                          }

                          ?></td>-->
                          <td><a href="edit_recovery_vehicle.php?Id=<?php echo $Id ?>"><i class="fa fa-edit"></i></a>
                           <a style="margin-left: 20px;" href="manage_recovery_vehicle.php?status=delete&Id=<?php echo $Id ?>"><i class="fa fa-close"></i></a></td>
                          
                      </tr>
                      
                   <?php
                   
        
        
    //} 
           //      }
               //    }
  // Free result set
  @mysqli_free_result($result);
//}
// }
  // Free result set
  @mysqli_free_result($ro);
//}
        }
  // Free result set
  @mysqli_free_result($res1);
}            else
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
