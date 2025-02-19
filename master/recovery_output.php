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
    <!--<h1 class="title">Manage Recovery Time</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Recovery Output</li>-->
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
      <h1>Recovery Report </h1> 
          <h2>All CCC</h2>
          <b><?php date_default_timezone_set("Asia/Kolkata");
      echo "Report As On  " . date("d-m-y") . " at " . date("h:i") . "<br>"; ?></b>
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
                        <th>Unit Name</th>
                       <th>Count</th>
                        <!--<th>Brigade</th>
                        <th>Product</th>
                          <th>Vehicle</th>-->
                           
                          
                        <!--<th>Active</th>-->
                        <!--<th>Options</th>-->
                    </tr>
                </thead>
             
             
             
                <tbody>
                  <?php //echo "select * from Brigade";
                  
                 //  $query=mysqli_query($con,"select recovery.unit,recovery.Brigade,recoverytime.vehicle,Product.Product,recoverytime.timelycompletion from recovery INNER JOIN Product ON recovery.product=Product.Id INNER JOIN recoverytime ON recoverytime.recoveryId=recovery.Id and recoverytime.timelycompletion='pending'") ;                    
                 
                   // $query=mysqli_query($con,"select *  from recoverytime INNER JOIN Product ON recoverytime.recoveryId=Product.Id and  recoverytime.timelycompletion='pending'") ;                    
                 //    $query=mysqli_query($con,"select  count(*),recovery.unit,recoverytime.recoveryId,recovery.Brigade,recoverytime.vehicle,Product.Product,recoverytime.timelycompletion from recovery INNER JOIN Product ON recovery.product=Product.Id INNER JOIN recoverytime ON recoverytime.recoveryId=recovery.Id and recoverytime.timelycompletion='pending' group by recovery.unit") ;
                    // $query=mysqli_query($con,"select count(*),recovery.unit,recovery.Brigade from recovery INNER JOIN recoverytime ON recoverytime.recoveryId=recovery.Id and recoverytime.timelycompletion='pending' group by recovery.unit");
                    $query=mysqli_query($con,"SELECT                    
                     recovery.unit,
                     recovery.Brigade,
                     unitcat.Unitcat
                      from recovery 
                      LEFT JOIN recoverytime ON recoverytime.recoveryId=recovery.Id 
                      LEFT JOIN unitcat ON recovery.unit=unitcat.id
                      group by recovery.unit");
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                      
 //$unit = $res[0];
 
 // $hour = $res[1];
  $isactive = @$res['isactive'];
   //echo "SELECT sum(hour)FROM `recoverytime` where unit='$unit'";
  // $q22=mysqli_query($con, "SELECT sum(hour)FROM `recoverytime` where unit='$unit' and timelycompletion='pending'") ;                    
          //          if(mysqli_num_rows($q22)>0)
          //         { 
                  //  $res22=mysqli_fetch_assoc($q22);
                     
               
          // $res22['sum(hour)'] ;
    
// $sql1="select * from Brigade where  Id='$unit'";
//if ($res1=mysqli_query($con,$sql1))
//  {
  // Fetch one and one row
 // while ($row1=mysqli_fetch_row($res1))
 //   {
        
 ?>
                 <tr>
                      <!-- <td><a href="form_report_f.php?id=<?php echo $unit?>"><?php echo $unit?></a></td>-->
                     
                      <td><a href="form_report_first_2.php?id=<?php echo $res['unit']?>"><?php echo $res['Unitcat']?></a></td>
                          
                   
                         
                          <td><?php echo $res[0]?></td>
                           
                         
                           <!-- <td><?php echo $res['timelycompletion'];?></td> -->
                         
                          
                      </tr>
                      
                   <?php
                   
        
        
//    } 
                
//}
 //}
  // Free result set
  @mysqli_free_result($res1);
}
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
