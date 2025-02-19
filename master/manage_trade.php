<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">
/*<?php
@$status = $_REQUEST['status'];
@$subcategoryid = $_REQUEST['Id'];

/*if($status == 'deactivate'){
  $sql = "UPDATE trade SET isactive='0' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE trade SET isactive='1' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}*/
if($status == 'delete'){
  $sql = "DELETE FROM trade WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>*/
  <!-- Start Page Header -->
  <div class="page-header">
    <!--<h1 class="title">Manage Trade</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Trade</li>-->
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
      <h1><a href="add_trade.php">Add Trade </a>  </h1> 
      
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
          Manage Trade
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                    
                        <th>Trade</th>
                     
                   <!--     <th>Is Active</th>-->
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
                    $query=mysqli_query($con," select * from  trade  where isactive = 1  ") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                         @$unit = $res['unit'];
                        $Id = $res['Id'];
                        
                 //  $query2=mysqli_query($con,"select * from Brigade where Id='$unit'");               
                 //   if(mysqli_num_rows($query2)>0)
                 //  { 
                 //   $res2=mysqli_fetch_assoc($query2);
                   @$bb =  $res2['Brigade'];
                 //  }else{
                       $bb = '';
                 //  }    
                     ?>
                      <tr>
                        
                          <td><?php echo $res['trade']?></td>
                         
                           
                          
                          
                         <!-- <td><?php if($res['isactive'] == 1){
                            echo '<a href="manage_trade.php?status=deactivate&Id='.$Id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                            echo '<a href="manage_trade.php?status=activate&Id='.$Id.'"><i class="fa fa-close"></i></a>';
                          } ?>
                            
                          </td>-->
                          <td><a href="edit_trade.php?Id=<?php echo $Id ?>"><i class="fa fa-edit"></i></a>
                          <a style="margin-left: 20px;" href="manage_trade.php?status=delete&Id=<?php echo $Id ?>"><i class="fa fa-close"></i></a>
                          </td>
                          
                          
                      </tr>
                      
                   <?php 
                 }
                   }
                    else
                    {
                     //  echo 'No Record Found.';

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
