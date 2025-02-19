<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>
<?php
if(isset($_POST['submit']))
{

  $unit = $_POST['unit'];
}
?>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Manage Report</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Report</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="dashboard.php" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
       <!-- <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>-->
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <h1><a href="report_brigade.php">Manage Report </a>  </h1> 
      
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
          Manage Report
        </div>
        
                     <form method="post">
                         <select class="" name="unit" required>
                           <option value=""> Unit</option>
                            <?php
                         
                            $qu=mysqli_query($con,"select * from Brigade where isactive = 1") ;                    
                            if(mysqli_num_rows($qu)>0)
                           { 
                            while($res1=mysqli_fetch_assoc($qu)){
                              $Id =$res1['Id'];
                              $Brigade =$res1['Brigade'];
                              ?>
                               
                              <option value="<?php echo $Id ?>"><?php echo $Brigade?></option>
                           <?php }
                         }
                            ?>
                     
                        </select> 
                      
                       <button type="submit" name="submit" class="btn btn-default">Submit</button>
                
                     </form>
                                     
                
        
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Product </th>
                        <th> Part </th>
                        <TH> Total </TH>
                        <th>S</th>
                      <th>NCM</th>
                        <th>PCM</th>
                       <!-- <th>Active</th>
                        <th>Options</th>-->
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
                  <?php
                  //SELECT * From batch,subproduct,Product where batch.product = subproduct.product and subproduct.product = Product.Id;
                  // SELECT * From batch,subproduct,Product,Brigade where batch.product = subproduct.product and subproduct.product = Product.Id and Brigade.Id=batch.unit
                 
                  // echo "SELECT COUNT(*)FROM `Product` ";
                 //echo $unit;
               // die('sssss');
               if($unit!=''){
                   $q2=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where unit='$unit'") ; 
               }else{
                   $q2=mysqli_query($con, "SELECT COUNT(*)FROM `fault`") ; 
               }
                                    
                    if(mysqli_num_rows($q2)>0)
                   { 
                    $res2=mysqli_fetch_assoc($q2);
                     
               
                $product=$res2['COUNT(*)'] ;
                
                 $q22=mysqli_query($con, "SELECT COUNT(*)FROM `fault`") ;                    
                    if(mysqli_num_rows($q22)>0)
                   { 
                    $res22=mysqli_fetch_assoc($q22);
                     
               
                $subproduct =$res22['COUNT(*)'] ;
                
       if($unit!=''){
                   $query=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='s' and  unit='$unit'") ; 
               }else{
                
                
                  $query=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='s' ") ;  
               }
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                     
               
                $s =$res['COUNT(*)'] ;
                      
                     if($unit!=''){
                   $query1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='NCM' and  unit='$unit'") ; 
               }else{
                $query1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='NCM'") ;    
               }
                    if(mysqli_num_rows($query1)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($query1)){
                     

                $ncm= $res1['COUNT(*)'] ;
                      if($unit!=''){
                   $q1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='PCM' and  unit='$unit'") ; 
               }else{
                       $q1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='PCM'") ;  
               }
                    if(mysqli_num_rows($q1)>0)
                   { 
                    $res11=mysqli_fetch_assoc($q1);
                     
               
               $pcm=$res11['COUNT(*)'] ;
               

                    ?>
                    
                    
                    
                    
                      <tr>
                          <td><?php   echo $product?></td>
                          <td><?php   echo ($product* $subproduct) ;?></td>
                          <td><?php   echo ($product * $subproduct) ?></td>
                          <td><?php   echo $s ?></td>
                          <td><?php   echo  $ncm ;?></td>
                          <td><?php   echo  $pcm ;?></td>
                          <td><?php   //echo   $res11['COUNT(*)'] ;?></td>
                            
                            
 
                         
                      </tr>
                      
                   <?php
                   
        
        
    } }}} } } 
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
<!--<script>-->
<!--$(document).ready(function() {-->
<!--    $('#example0').DataTable();-->
<!--} );-->
<!--</script>-->



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
