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
      <h2>CCC<?php
        $unitcat=$_GET['unitcat'];
                  @$unittt=$_GET['unittt'];
                   $newproduct=$_GET['prd'];
           echo  ">"."$unitcat".">"."$newproduct";       
                  
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
         Product listing
        </div>
        
                     <!--<form method="post">
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
                
                     </form>-->
                                     
                
        
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        
                        
                    <th>Part</th>
                      <th>Product</th>
                    <th>Batch No</th>
                     <TH> Cat Product </TH>
                        <TH> Fault </TH>
                       <th>Time Required</th>
                      <th>Type Fault</th>
                       <th>Killtype</th>
                       <!-- <th>PMC</th>-->
                    </tr>
                </thead>
             <tbody>
                  <?php
                $unitcat=$_GET['unitcat'];
                
              //    $unittt=$_GET['unittt'];
              //    $fault=$_GET['fault'];
                 // echo $fault;
                //  $product=$_GET['product'];
                   //echo "SELECT * FROM `fault` where  unitcat = '$unitcat' and unit='$unit' ";
              /* if($unit!=''){
                   $q2=mysqli_query($con, "SELECT * FROM `fault` where unit='$unit' ") ; 
               }else{
                   */
                    
                  // $q2=mysqli_query($con, "SELECT * FROM `fault` where  unitcat = '$unitcat' and unit='$unittt' and product='$product'") ;
              // }
          //  $q2=mysqli_query($con, "SELECT * FROM `fault` INNER JOIN Product ON fault.product=Product.Id where  product = '$unitcat' and unit='$unittt' and fault='$fault'") ;
          $q2=mysqli_query($con,"SELECT 
          fault.part,
          fault.typefault,
          fault.batchno,
          fault.fault,
          fault.killtype,
          category_product.cat_prod,
          Product.Product,
          fault.timerequried         
           from fault 
           INNER JOIN Product ON fault.product=Product.Id and fault.product='$unitcat'
           INNER JOIN category_product ON Product.catprod=category_product.Id ");
                    if(mysqli_num_rows($q2)>0)
                   { 
                    while($res2=mysqli_fetch_assoc($q2))
                    {
                     
               //$product=$res2['product']; 
               $part= $res2['part']; 
                $typefault=$res2['typefault'];
                $batchno=$res2['batchno'];
                 $ssqq= $res2['fault'];
                 $killtype=$res2['killtype'];
                 $catprod=$res2['cat_prod'];
                 $product=$res2['Product'];
                 $timereq=$res2['timerequried'];
        ?>         
                  <tr>
                          
                         <!-- <td><?php // echo ($totalproduct* $subproduct);?></td>-->
<!--                          <td><?php   //echo $T= ($totalproduct * $subproduct) ?></td>-->
                        <!--  <td>-->
                          <?php   
                         // $s=$pcm+$ncm;
                          
                        //  echo ($T- $s);
                          ?><!--</td>-->
                           <td><?php   echo  $part ;?></td>
                           <td><?php echo $product?></td>
                           <td><?php echo $batchno;?></td>
                            <td><?php echo $catprod;?></td>
                          
                            <td><?php   echo  $ssqq ;?></td>
                              <td><?php echo $timereq?></td>
                          <td><?php echo $typefault?></td>
                          <td><?php echo $killtype?></td>
                        
                        
                          <td><?php   //echo   $res11['COUNT(*)'] ;?></td>
                            
                            
 
                         
                      </tr>
            <?php
              /*   $qqq=mysqli_query($con, "SELECT * FROM `Product` where  Id='$product'") ;
               
                                    
                    if(mysqli_num_rows($qqq)>0)
                   { 
                    while($rrr=mysqli_fetch_assoc($qqq))
                    {*/
                        
               /*        $newproduct= $rrr['Product'];
                         
                 $q22=mysqli_query($con, "SELECT COUNT(*)FROM `fault`  where unitcat = '$unitcat' and unit='$unittt' ") ;                    
                    if(mysqli_num_rows($q22)>0)
                   { 
                    $res22=mysqli_fetch_assoc($q22);
                     
               
               $subproduct =$res22['COUNT(*)'] ;
                
       if($unit!=''){
                   $query=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='s' and  unit='$unit'") ; 
               }else{
              
                
                  $query=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='s' and unitcat = '$unitcat' and unit='$unittt' ") ;  
               }
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                     
               
                $s =$res['COUNT(*)'] ;
                      
                     if($unit!=''){
                   $query1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='NMC' and  unit='$unit'") ; 
               }else{
                  
                $query1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='NMC' and  unitcat = '$unitcat' and unit='$unittt'") ;    
               }
                    if(mysqli_num_rows($query1)>0)
                   { 
                    while($res1=mysqli_fetch_assoc($query1)){
                     

                $ncm= $res1['COUNT(*)'] ;
                      if($unit!=''){
                   $q1=mysqli_query($con, "SELECT COUNT(*) FROM `fault` where fault='PMC' and  unit='$unit'") ; 
               }else{
                    
                       $q1=mysqli_query($con, "SELECT COUNT(*)FROM `fault` where fault='PMC' and  unitcat = '$unitcat' and unit='$unittt'") ;  
               }
                    if(mysqli_num_rows($q1)>0)
                   { 
                    $res11=mysqli_fetch_assoc($q1);
                     
               
               $pcm=$res11['COUNT(*)'] ;
               
               
               
                 
                       $q1=mysqli_query($con, "SELECT COUNT(product) FROM `fault` where  unitcat = '$unitcat' and unit='$unittt'") ;  
               
                    if(mysqli_num_rows($q1)>0)
                   { 
                    $res11=mysqli_fetch_assoc($q1);
                     
               
               $totalproduct=$res11['COUNT(product)'] ;
               
                $sql="select * from Product where  Id='$product'";
                    $result=mysqli_query($con,$sql);
                    
                      if(mysqli_num_rows($result)>0){
                          
                       while($rowss=mysqli_fetch_assoc($result))
                       {
                       $pp = $rowss['Product'];
                      
                    $sql="select * from Brigade where  Id='$ssqq'";
                    $result=mysqli_query($con,$sql);
                    
                      if(mysqli_num_rows($result)>0){
                          
                       $rowss=mysqli_fetch_assoc($result);
                       
                       $pqq = $rowss['Brigade'];
                      }else{
                        $pqq ='';  
                      }
                    ?>
                    
                    
                    
                    
                      <tr>
                          
                         <!-- <td><?php  echo ($totalproduct* $subproduct);?></td>-->
                          <td><?php   echo $T= ($totalproduct * $subproduct) ?></td>
                          <td>
                          <?php   
                          $s=$pcm+$ncm;
                          
                          echo ($T- $s);
                          ?></td>
                          <td><?php   echo  $ncm ;?></td>
                          <td><?php   echo  $pcm ;?></td>
                          <td><?php   //echo   $res11['COUNT(*)'] ;?></td>
                            
                            
 
                         
                      </tr>
                      
                   <?php
                   }
                  //     }}
                   
                       }
                      }
                   }
    } }}} } } */
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
