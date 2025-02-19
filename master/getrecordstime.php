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
@$status = $_REQUEST['status'];
$subcategoryid = $_REQUEST['batchid'];

if($status == 'deactivate'){
  $sql = "UPDATE fault SET isactive='0' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE fault SET isactive='1' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'delete'){
  $sql = "DELETE FROM fault WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
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

    <div class="col-lg-8 col-md-6 titles">
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <h1>Recover forecast Report</h1>  
    <h2>
      <a href="time_completion.php">Go back</a>
     </h2>
    <?php 
     @$id=$_POST['unit'];
    $query=mysqli_query($con,"SELECT 
      recovery.unit,
      unitcat.Unitcat 
      from recovery 
      INNER JOIN unitcat ON recovery.unit=unitcat.id 
      where recovery.timecompletion='$id'
      group by recovery.unit") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                  
                    $unit=$res['unit'];
                    $Unitcat=$res['Unitcat'];
                    $query1=mysqli_query($con,"SELECT 
                    recovery.unit,
                    Brigade.Brigade as fff 
                    from recovery 
                    INNER JOIN Brigade ON recovery.Brigade=Brigade.Id 
                    where recovery.unit='$unit'
                    group by recovery.Brigade") ;  
                       if(mysqli_num_rows($query1)>0)
                   { 
                    while($res1=mysqli_fetch_array($query1)){
                      $dd = $res1['fff'];
                    ?>
                     <tr>
                         
                         <td><h2><?php echo $Unitcat.">".$dd; ?></h2></a></td>
                  <?php  }
                   }
                    }
                   }
                   
                    ?>
      <b><?php echo "Report As On  " . date("d-m-y") . "<br>"; ?></b>
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
          Manage Batch
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                         <th>Formations</th>
                        <th>Unit</th>
                      <th>time completion</th>
                      <th>GR</th>
                      <th>Nature CAS</th>
                      <th>Time CAS</th>
                       <th>Vehicle</th>
                       <th>Remark</th>
                       
                      
                       
                        
                    </tr>
                </thead>
             
                <tfoot>
                   <!-- <tr>
                        <th>Product Name</th>
                        <th>Part Name</th>
                        <th>Batch Name</th>
                        <th>Is Active</th>
                        <th>Options</th>
                    </tr>-->
                </tfoot>
             
                <tbody>
                  <?php
                  @$id=$_POST['unit'];
                 
             
                 // echo "select C.categoryname, C.categoryid, T.* from category as C, subcategory as T where T.categoryid = C.categoryid";
                 
          //  "SELECT * From fault,Product,subproduct where fault.product =Product.Product and subproduct.product = Product.Id and Brigade.Id=batch.unit";
                 
                  //  $query=mysqli_query($con,"SELECT * From fault,subproduct,Product ,Brigade where fault.product = subproduct.product and subproduct.product = Product.Id  and fault.unit= Brigade.Id") ;                    
                 //   $query=mysqli_query($con,"SELECT sum(Qty),id, unit,Unitcat,Product,Equipment,date From add_consumption where id='$id' ") ;
                    $query=mysqli_query($con,"SELECT 
                    Brigade.Brigade,
                    unitcat.Unitcat,
                    recovery.timecompletion,
                    recovery.GR,
                    recovery.natureCAS,
                    recovery.timeCAS,
                    vehicle.vehicle,
                    recovery.remark
                      from 
                      recovery
                      INNER JOIN Brigade ON recovery.Brigade=Brigade.Id
                      INNER JOIN unitcat ON recovery.unit=unitcat.id
                      INNER JOIN vehicle ON recovery.vehicle=vehicle.Id
                       where recovery.timecompletion='$id' ") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                  //  $Product= $res[];   
                   /*   $unit =$res['Unit'];
                    $product =$res['Product'];
                    $Equipment =$res['Equipment'];*/
                    $unit=$res['Brigade'];
                    $Qty = $res['Unitcat'];
                     
                     
                    // $date=$res['date'];
                   //  $isActive=$res['isActive'];
                   //  $id=$res['id'];
                   //    $Q1=$res ['sum(Qty)'];
                    ?>
                      <tr>
                         
                         <td><?php echo $unit?></td>
                          
                     
                          <td><?php echo  $Qty; ?></td>
                          <td><?php echo $res['timecompletion'];?></td>
                         <td><?php echo $res['GR']?></td>
                         <td><?php echo $res['natureCAS']?></td>
                         <td><?php echo $res['timeCAS']?></td>
                          <td><?php echo $res['vehicle']?></td>
                          <td><?php echo $res['remark']?></td>
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
