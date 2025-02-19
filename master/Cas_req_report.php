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
      <h1><a href="add_batch.php">Manage Cat Casuality Requirement </a>  </h1> 
      
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
                       
                        <th>Unit</th>
                       <th>Requirements</th>
                       <th>Casualities</th>
                        
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
                 // echo "select C.categoryname, C.categoryid, T.* from category as C, subcategory as T where T.categoryid = C.categoryid";
                 
          //  "SELECT * From fault,Product,subproduct where fault.product =Product.Product and subproduct.product = Product.Id and Brigade.Id=batch.unit";
                 
                  //  $query=mysqli_query($con,"SELECT * From fault,subproduct,Product ,Brigade where fault.product = subproduct.product and subproduct.product = Product.Id  and fault.unit= Brigade.Id") ;                    
                   
                 //   $query=mysqli_query($con,"SELECT * From batch,Product where batch.product=Product.Id") ; 
               //  $query=mysqli_query($con,"SELECT  * From manage_casualty,manpower_requirement where batch.product=Product.Id AND  batch.product IN(SELECT Product FROM subproduct WHERE subproduct.product=batch.product)");
           //   $qry=mysqli_query($con,"select Unitcat from unitcat");
           //   if(mysqli_num_rows($qry)>0)
           //   {
            //       while($r=mysqli_fetch_assoc($qry))
              //     {
                //     $p=$r['Unitcat'];
               // SELECT Orders.OrderID, Orders.CustomerID,Orders.OrderDate,Customers.CustomerName
//FROM Customers LEFT JOIN Orders ON Customers.CustomerID=Orders.CustomerID

/*SELECT
  student.name, student.student_id,
  event.date, event.event_id, event.type
FROM
  student, event
  LEFT JOIN score ON student.student_id = score.student_id
          AND event.event_id = score.event_id
WHERE
  score.score IS NULL
ORDER BY
  student.student_id, event.event_id;*/
                   //   $query=mysqli_query($con,"SELECT manage_casuality.casuality,manage_casuality.Unitcat,unitcat.Unitcat From manage_casuality,manpower_requirement RIGHT JOIN  unitcat On unitcat.Unitcat=manage_casuality.Unitcat AND manpower_requirement.Unitcat=unitcat.Unitcat");
                     $query=mysqli_query($con,"SELECT 
                      sum(manage_casuality.casuality),
                      manage_casuality.Unitcat, 
                      unitcat.Unitcat as dsa
                      from manage_casuality 
                      LEFT JOIN unitcat ON manage_casuality.Unitcat=unitcat.id
                      group By manage_casuality.Unitcat ");
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                    $Product= $res[0]; 
                    $cas=$res[1];
                    $dsa=$res['dsa'];
                    
                    //  $subproduct =$res['subproduct'];
                  /*  $batchno =$res['batchno'];
                    $Brigade =$res['Brigade'];
                     $batchid = $res['Id'];
                     $unit=$res['unitcat'];*/
                     @$isActive=$res['isActive'];
                     @$date=$res['date'];
                  //   $p=$res['Product'];
                      $sql="select sum(requirement),Unitcat from manpower_requirement where  Unitcat='$cas'";
                    if ($result=mysqli_query($con,$sql))
                   {
                    while ($row=mysqli_fetch_array($result))
                    {
                    ?>
                      <tr>
                           
                       <td><?php echo $dsa?></td>
                        <td><a href="cas.php?id=<?php echo $row[1];?>"><?php echo  $row[0];?></a></td>
                         <!--   <td><?php// echo $row[0]?></td>-->
                         <td><a href="req.php?id=<?php echo $res[1];?>"><?php echo  $Product;?></a></td>
                        <!--  <td><?php //echo $Product ?></td>-->
                          <td><?php// echo $p?></td>
                         
                        
                          <td><?php //echo $batchno  ?></td>
                         
                         
                          
                          
                      </tr>
                      
                   <?php } 
                 }
                  //  }}
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
