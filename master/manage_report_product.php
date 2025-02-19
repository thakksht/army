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
    <!--<h1 class="title">Manage Report</h1>-->
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <!--<li><a href="#">Tables</a></li>-->
        <!--<li class="active">Manage Report</li>-->
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
      <h1><a href="">Battle Worthiness State Report-Product </a>  </h1> 
      
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
        <!--<div class="panel-title">-->
        <!--  Manage Report-->
        <!--</div>-->
        
                    <!-- <form method="post">
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
                                    --> 
                
        
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Category </th>
                       
                        <TH> Total </TH>
                         <TH> S </TH>
                       <TH>PMC</TH>
                       <TH>NMC</TH>
                       <!-- <th>Active</th>
                        <th>Options</th>-->
                    </tr>
                </thead>
                <tbody>
                  <?php
                  
          $qu=mysqli_query($con,"select fault.product,Product.Product,fault.unit from fault INNER JOIN Product ON fault.product=Product.Id group by fault.product") ;
          //$qu=mysqli_query($con,"select distinct(fault.product) from fault");
                            if(mysqli_num_rows($qu)>0)
                           { 
                            while($res1=mysqli_fetch_assoc($qu)){
                            //  $Id =$res1['Id'];
                            $unit=$res1['unit'];
                            $unit1=$res1['product'];
                  $unitcat= $res1['Product'];
                  
               if($unit!=''){
                   $q2=mysqli_query($con, "SELECT COUNT(*) FROM `batch` where product='$unit1'") ; 
               }else{
                    //echo "SELECT COUNT(*)FROM `fault` where unitcat ='$unitcat' ";
                   $q2=mysqli_query($con, "SELECT COUNT(*)FROM `batch` where product ='$unitcat' ") ; 
               }
                                    
                    if(mysqli_num_rows($q2)>0)
                   { 
                    $res2=mysqli_fetch_assoc($q2);
                     
             
              
             $product=$res2['COUNT(*)'] ;
                
               //  $q22=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where unitcat ='$unitcat'  ") ;                    
                  //  if(mysqli_num_rows($q22)>0)
                 //  { 
               //     $res22=mysqli_fetch_assoc($q22);
                     
               
             //   $subproduct =$res22['COUNT(*)'] ;
                
       if($unit!=''){
                   $query=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='s' and  product='$unit1'") ; 
               }else{
                
               
                     }
                $s =@$res['COUNT(*)'] ;
                      
                     if(@$unit!=''){
                   $query1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='NMC' and  product='$unit1'") ; 
               }else{
                $query1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='NMC' and  product ='$unitcat' ") ;    
               }
                    if(mysqli_num_rows($query1)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($query1)){
                     

                $ncm= $res1['COUNT(*)'] ;
                      if($unit!=''){
                   $q1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='PMC' and  product='$unit1'") ; 
               }else{
                       $q1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='PMC' and product ='$unitcat' ") ;  
               }
                    if(mysqli_num_rows($q1)>0)
                   { 
                    $res11=mysqli_fetch_assoc($q1);
                     
               
               $pcm=$res11['COUNT(*)'] ;
               
               
               
                
                            
                          

                    ?>
                    
                    
                    
                    
                      <tr>
                          <td><?php  echo $unitcat ?></td>
                          <td><a href="part_listing1.php?unitcat=<?php echo $unit1 ?>&prd=<?php echo $unitcat ?>"><?php   echo $product?></a></td>
                          <td><?php echo $product-($pcm+$ncm);?></td>
                          <td><a href="part_listing2.php?unitcat=<?php echo $unit1?>&fault=PMC"><?php echo $pcm;?></a></td>
                          <td><a href="part_listing2.php?unitcat=<?php echo $unit1?>&fault=NMC"><?php echo $ncm;?></a></td>
                       <!--   <td><?php //  echo ($product* $subproduct) ;?></td>-->
                        <!--  <td><?php //  echo $T= ($product * $subproduct) ?></td>-->
                          <!--<td>
                          <?php   
                          /*$s=$pcm+$ncm;
                          
                          echo ($T- $s);*/
                          ?></td>-->
                        
                            
                            
 
                         
                      </tr>
                      
                   <?php
                   
        
        
    } }}} } } 
                // }
                 
                 
                 
                   
                   
                    else
                    {
                       echo 'No Record Found.';

                    }
                ?>

                <tr>
                         <td>Total</td>
                      <?php
                        $result=mysqli_query($con,"SELECT count(*) as total from batch");
                        $data=mysqli_fetch_assoc($result);               

                      ?>
                    <td><?php echo $data['total']; ?></td>
                     <?php
                    $result=mysqli_query($con,"SELECT count(*) as total from batch");
                    $total=mysqli_fetch_assoc($result);
                    $result=mysqli_query($con,"SELECT count(*) as total from fault WHERE fault='PMC'");
                    $total2=mysqli_fetch_assoc($result);
                    $result=mysqli_query($con,"SELECT count(*) as total from fault WHERE fault='NMC'");
                    $total3=mysqli_fetch_assoc($result); 
                    

                    ?>
                    <td><?php echo $total['total'] - ($total2['total'] + $total3['total']); ?></td>
                     <?php
                        $result=mysqli_query($con,"SELECT count(*) as total from fault WHERE fault='PMC'");
                        $data=mysqli_fetch_assoc($result);               

                      ?>             
                    <td><?php echo $data['total']; ?></td>
                    <?php
                        $result=mysqli_query($con,"SELECT count(*) as total from fault WHERE fault='NMC'");
                        $data=mysqli_fetch_assoc($result);               

                      ?>             
                    <td><?php echo $data['total']; ?></td>                 
                          
                      </tr>
                   
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
