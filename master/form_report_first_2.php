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
      <h1>Recovery Report  </h1>
     
      <a href="manpower_state.php">Go Back</a>
 <h2>CCC<?php
         $unitcat=$_GET['id'];
                 @$unittt=$_GET['p'];
           echo ">"."$unitcat";      
                  
       ?></h2>
        <b><?php echo "Report As On " . date("d-m-y") . "<br>"; ?></b>
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
                     <th>Date</th>
                       <th>Unit</th>
                        <th>Cat</th>
                         <th>Product</th>
                       <!-- <th>Equipment</th>---->
                        <th>Recovery Vehicle</th>
                       <th>Type Of Recovery</th>
                       <th>Nature Of CAS</th>
                       <th>Time completion</th>
                        <th>remarks</th>
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
                  $id=$_GET['id'];
                 // echo "select C.categoryname, C.categoryid, T.* from category as C, subcategory as T where T.categoryid = C.categoryid";
                 
          //  "SELECT * From fault,Product,subproduct where fault.product =Product.Product and subproduct.product = Product.Id and Brigade.Id=batch.unit";
                 
                  //  $query=mysqli_query($con,"SELECT * From fault,subproduct,Product ,Brigade where fault.product = subproduct.product and subproduct.product = Product.Id  and fault.unit= Brigade.Id") ;                    
                  //  $query=mysqli_query($con,"SELECT sum(Qty),id, unit,Unitcat,Product,Equipment,date From add_consumption where id='$id' ") ;   
                 // $query=mysqli_query($con,"select manpower.*,trade.* from manpower_link INNER JOIN trade ON manpower.trade=trade.trade and manpower.cat_unit='$id'");
              // $query=mysqli_query($con,"select distinct(manpower_link.trade),manpower_link.Unit,trade.trade,manpower_link.cat_unit from manpower_link INNER JOIN trade ON manpower_link.trade=trade.Id and manpower_link.cat_unit='$id' Group By manpower_link.Unit ");
             //    $query=mysqli_query($con,"select recovery.unit,recoverytime.Id,recovery.Brigade,recoverytime.vehicle,Product.Product,recoverytime.timelycompletion from recovery INNER JOIN Product ON recovery.product=Product.Id INNER JOIN recoverytime ON recoverytime.recoveryId=recovery.Id and recoverytime.timelycompletion='pending' AND recoverytime.recoveryId='$id'") ;
              //   $query=mysqli_query($con,"select recovery.Brigade,recoverytime.vehicle from recoverytime INNER JOIN recovery ON recoverytime.recoveryId=recovery.Id INNER JOIN Product ON recovery.product=Product.Id and recoverytime.recoveryId='$id' and recoverytime.timelycompletion='pending") ;
                //  $query=mysqli_query($con,"select recovery.Brigade,recoverytime.vehicle,recoverytime.date,recoverytime.GR,recoverytime.presentlycompletion,recoverytime.hour,recovery.remark,recovery.GR,recovery.product,recovery.Unit,Product.Product,recovery.typerecovery,recovery.natureCAS  from recoverytime INNER JOIN recovery ON recoverytime.recoveryId=recovery.Id LEFT JOIN Product ON recovery.product=Product.Id and recovery.Unit='$id' and recoverytime.timelycompletion='pending' order By recoverytime.hour DESC") ;                    
                $query=mysqli_query($con,"SELECT 
                  Brigade.Brigade,
                  vehicle.vehicle,
                  recoverytime.date,
                  recoverytime.GR,
                  recoverytime.presentlycompletion,
                  recoverytime.hour,
                  recovery.remark,
                  recovery.GR,
                  recovery.product,
                  unitcat.Unitcat,
                  Product.Product,
                  recovery.typerecovery,
                  recovery.natureCAS  
                  from recoverytime                   
                  INNER JOIN recovery ON recoverytime.recoveryId=recovery.Id and recovery.unit='$id'
                  INNER JOIN Brigade ON recovery.Brigade=Brigade.Id
                  INNER JOIN unitcat ON recovery.unit=unitcat.id
                  INNER JOIN vehicle ON recoverytime.vehicle=vehicle.Id
                  LEFT JOIN Product ON recovery.product=Product.Id and recovery.unit='$id' 
                  order By recoverytime.hour DESC") ;                    
                //  select manpower_link.trade,trade.trade from manpower_link INNER JOIN trade ON manpower_link.trade=trade.Id and manpower_link.cat_unit='TTP'
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                     //   $qry=mysqli_query($con,"select count(name) from manpower_link where cat_unit='$res[1]' and Unit=''");
                    $Product= $res[2];
                    $unit=$res[1];
                 
                     $Qty = $res[0];
             //    SELECT Count(*) AS DistinctCountries
//FROM (SELECT DISTINCT Country FROM Customers);
//select count(name),Unit from manpower_link where Unit IN (select distinct(Unit//) from manpower_link where cat_unit='CCRP2' and Unit='Z')
//$sql="select count(name),Unit from manpower_link where Unit IN (select distinct(Unit) from manpower_link where cat_unit='CCRP2' and Unit='Z');";
                    //  $sql="select count(name) from manpower_link where cat_unit='$res[3]' and Unit='$res[1]' Group By Unit";
               //   if ($result=mysqli_query($con,$sql))
                // {
              //  while ($row=mysqli_fetch_row($result))
               //   {
                    ?>
                      <tr>
                           <td><?php echo $res[2] ;?></td>
                  <td><?php echo $res[0]?></td>
                         <td><?php echo $res[9]?></td>
                         <td><?php echo $res[10] ;?> <br>GR:<?php echo $res[3] ;?></td>
                         
                         <td><?php echo $res[1] ;?><br>GR:<?php echo $res[7];?></td>
                         
                          
                          <td><?php echo $res[11]?></td>
                          <td><?php echo $res[12]?></td>
                          <td><?php echo $res[5] ;?></td>
                          <td><?php echo $res[6] ;?></td>
                         
                      </tr>
                      
                   <?php } 
                 }
              //     }}
                  
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
