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
@$subcategoryid = $_REQUEST['Id'];

/*if($status == 'deactivate'){
  $sql = "UPDATE vehicle SET isactive='0' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE vehicle SET isactive='1' WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}*/
if($status == 'delete'){
  $sql = "DELETE FROM vehicle WHERE Id = $subcategoryid";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <!--<h1 class="title">Manage Vehicle</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Vehicle</li>-->
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
      <h1><a href="add_vehicle.php">Add vehicle </a>  </h1> 
      
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
          Manage Vehicle
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>unit Category</th>
                        <th>unit </th>
                        <th>Vehicle Name</th>
                       <th>Vehicle Batch</th>
                       <!-- <th>Is Active</th>-->
                        <th>Options</th>
                    </tr>
                </thead>
             
             
                <tbody>
                  <?php
                 
                    $query=mysqli_query($con," SELECT 
                      vehicle.Id,
                      vehicle.date,
                      vehicle.category,
                      vehicle.vehicle,
                      brigade.Brigade,
                      unitcat.Unitcat,
                      vehicle.batch,
                      category.category 
                      FROM  vehicle 
                      LEFT JOIN brigade ON vehicle.cat=Brigade.Id
                      LEFT JOIN unitcat ON vehicle.unit=unitcat.id
          LEFT JOIN category ON vehicle.category=category.Id and vehicle.isactive = 1");                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                        $Id=$res['Id'];
                        $date=$res['date'];
                       $category= $res['category'];  
                    $vehicle= $res['vehicle']; 
                       $cat= $res['Brigade'];  
                      $unit= $res['Unitcat']; 
                     $batch= $res['batch'];  
                     
            $sql44="select * from category where Id='$category'";
                     $result44=mysqli_query($con,$sql44);
                       if (mysqli_num_rows($result44)>0){
                        $row44=mysqli_fetch_assoc($result44);
                        $categ = $row44['category'];
                      }else{
                         $categ =''; 
                      }
                           
                     
                    ?>
                      <tr>
                           <td><?php   echo $date;  ?></td>
                         
                    <td><?php   echo  $category= $res['category'];  ?></td>
                      
                      <td><?php    echo $cat?></td> 
                      
                       <td><?php  echo $unit ?></td>
                        <td><?php  echo $vehicle= $res['vehicle']; ?></td>
                        <td><?php  echo $batch= $res['batch']; ?></td> 
                     
                        <!--<td><?php echo $categ?></td>
                         <td><?php echo $cat?></td> 
                         <td><?php echo $unit ?></td>
                          <td><?php echo $vehicle?></td>
                          <td><?php echo $batch?></td>-->
                          
                          
                          
                         <!-- <td><?php if($res['isactive'] == 1){
                            echo '<a href="manage_vehicle.php?status=deactivate&Id='.$Id.'"><i class="fa fa-check"></i></a>';
                          }
                          else{
                            echo '<a href="manage_vehicle.php?status=activate&Id='.$Id.'"><i class="fa fa-close"></i></a>';
                          } ?>
                            
                          </td>-->
                          <td><a href="edit_vehicle.php?Id=<?php echo $Id ?>"><i class="fa fa-edit"></i></a>
                          <a style="margin-left: 20px;" href="manage_vehicle.php?status=delete&Id=<?php echo $Id ?>"><i class="fa fa-close"></i></a>
                          </td>
                          
                          
                      </tr>
                      
                   <?php } 
                 }
                 
                 /*   }
  // Free result set
  mysqli_free_result($result);
}
   }
  // Free result set
  mysqli_free_result($result1);
}*/
                
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
