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
$subcategoryid = $_REQUEST['Id'];

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
    <!--<h1 class="title">Manage Fault</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Fault</li>-->
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
      <h1><a href="add_fault.php">Add Fault </a>  </h1> 
      
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
          Manage Fault
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                         <th>Date</th>
                        <th>Product Name</th>
                       
                        <th>Unit</th>
                        <th>Gr</th>
                        <th>Fault</th>
                        <th>AVT Engaged</th>
                        <th>Kill Type</th>
                        <th>Fault Type</th>
                        <th>Time Required</th>
                        <th>Comment</th>
                       <!-- <th>Is Active</th>-->
                        <th>Options</th>
                    </tr>
                </thead>
             
                <!--<tfoot>-->
                <!--    <tr>-->
                <!--        <th>Product Name</th>-->
                <!--        <th>Batch Name</th>-->
                <!--        <th>Is Active</th>-->
                <!--        <th>Options</th>-->
                <!--    </tr>-->
                <!--</tfoot>-->
             
                <tbody>
                  <?php
                 // echo "select C.categoryname, C.categoryid, T.* from category as C, subcategory as T where T.categoryid = C.categoryid";
                  //  $query=mysqli_query($con," select * from  fault ,Product where fault.product=Product.Id and fault.isactive = 1  ") ;                    
                    $query=mysqli_query($con,"SELECT fault.Id,
                      fault.AVT_engaged,
                      fault.GR,
                      fault.product,
                      fault.comment,
                      fault.typefault,
                      fault.batchno,
                      Brigade.Brigade,
                      fault.fault,
                      fault.killtype,
                      fault.timerequried,
                      fault.date,
                      Product.Product 
                      from  fault 
                      LEFT JOIN Brigade ON fault.unit=Brigade.Id
                      LEFT JOIN Product ON fault.product=Product.Id and fault.isactive = 1  ") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                      $Id =$res[0];  
                      $Product= $res['product'];   
                      $batchno =$res['batchno'];  
                      $unit =$res['Brigade'];  
                      $GR =$res['GR'];  
                      $fault =$res['fault'];  
                      $AVT_engaged =$res['AVT_engaged'];  
                      $killtype =$res['killtype'];  
                      $typefault =$res['typefault'];  
                        $timerequried =$res['timerequried'];  
                        $comment =$res['comment'];  
                        $date=$res['date'];
                     @$isActive=$res['isActive'];
                     
                  //    $sql="select * from Product where  Id='$Product'";
                 //   if ($result=mysqli_query($con,$sql))
                    //  {
                //    while ($row=mysqli_fetch_row($result))
               //    //    {
     
                  //    $sql1="select * from Brigade where  Id='$unit'";
                 //   if ($result1=mysqli_query($con,$sql1))
                    //  {
                  //  while ($row1=mysqli_fetch_assoc($query))
                    //   {
                     
                    ?>
                      <tr>
                         
                          <td><?php echo $date;?></td>
                          
                       <td><?php echo $res['Product'] ?></td>
                         
                           <td><?php echo  $unit; ?></td>
                           <td><?php echo  $res['GR']; ?></td>
                            <td><?php echo $res['fault']?></td>
                            <td><?php echo $res['AVT_engaged']?></td>
                             <td><?php echo $res['killtype']?></td>
                              <td><?php echo $res['typefault']?></td>
                               <td><?php echo $res['timerequried']?></td>
                               <td><?php echo $res['comment']?></td>
                          
                          
                         <!-- <td><?php if($res['isactive'] == 1){
                            echo '<a href="manage_fault.php?status=deactivate&Id='.$Id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                            echo '<a href="manage_fault.php?status=activate&Id='.$Id.'"><i class="fa fa-close"></i></a>';
                          } ?>
                            
                          </td>-->
                          <td><a href="edit_fault.php?Id=<?php echo $Id?>"><i class="fa fa-edit"></i></a>
                          <a href="manage_fault.php?status=delete&Id=<?php echo $Id ?>"><i class="fa fa-close"></i></a>
                          </td>
                          
                          
                      </tr>
                      
                   <?php //} 
              //   }
                 
                 //   }
  // Free result set
  @mysqli_free_result($result);
//}
   }
  // Free result set
  @mysqli_free_result($result1);
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
