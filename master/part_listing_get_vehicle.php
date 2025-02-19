<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');

?>
<style>
  .loading{
    display: none;
  }
</style>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">
<?php
@$statuslll = $_REQUEST['unit'];
//die('dfdfdfdfd');
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
      <h1>Manpower Vehicle Report</h1>  
    
      <a href="manage_vehicle_trade.php">Go back</a>
     
    <?php 
     //$id=$_POST['unit'];
    $query=mysqli_query($con,"SELECT trade from trade where vehicle='$statuslll'") ;                    
                    if(@mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_array($query)){
                  
                    $unit=$res[0];
                    ?>
                     <tr>
                         
                         <td><h2><?php echo $unit?></h2></a></td>
                         </tr>
                  <?php  }
                   }
                   
                    ?>
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
          <?php 
          $vehicle=$_GET['prd'];
          $query=mysqli_query($con,"SELECT vehicle from vehicle where Id='$vehicle'") ;
          if(@mysqli_num_rows($query)>0)                  
                   $res=mysqli_fetch_assoc($query);
                    $vehi=$res['vehicle'];                  
                  echo $vehi;
                  ?>
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                         <th>Unit</th>
                        <th>Batch</th>
                        <th>Name</th>
                        <th>Trade</th>
                        <th>Defi</th>
                     </tr>
                </thead>
             
             
                <tbody>
                  <?php
                  $vehicle=$_GET['prd'];
                  
               
                    $query=mysqli_query($con,"SELECT DISTINCT 
                      Brigade.Brigade,
                      manpower_link.batch,
                      manpower_link.Unit,
                      manpower_link.vehicle,
                      vehicle.batch as vehi,
                      manpower_link.trade as fff,
                      manpower_link.name,
                      manpower.person,
                      trade.trade 
                      from manpower_link 
                      INNER JOIN Brigade ON manpower_link.Unit=Brigade.Id
                      INNER JOIN manpower ON manpower_link.name=manpower.Id
                      INNER JOIN vehicle ON manpower_link.vehicle=vehicle.Id
                      INNER JOIN trade ON manpower_link.trade=trade.Id where manpower_link.vehicle='$vehicle'") ;
                 
                    if(mysqli_num_rows($query)>0)
                   { 
                  
                    while($res=mysqli_fetch_array($query)){
                        
                       @$Id = $res['Id'];
                       $unit = $res['Brigade'];    
                       $namme111 = $res['name'];    
                       $person1 = $res['person'];    
                       $vehicle = $res['vehicle']; 
                       $vehicle1 = $res['vehi']; 
                       
                    
                           if($unit!=''){
                         $q2=mysqli_query($con, "SELECT casuality FROM `manage_casuality` where person ='$namme111' and vehicle='$vehicle'") ;
                         if(mysqli_num_rows($q2)>0)
                   { 
                    $res2=mysqli_fetch_assoc($q2);
           $casuality=$res2['casuality'] ;
                   }else{
                       $casuality = '';
                   }
                           }
                            if($casuality==1)
                            {
                            $tr = 'red';
                           
                           
                           
                       ?>
                      <tr style="color:<?php echo $tr ;?>">
                         
                         <!--  <td><a href=".php?id=<?php echo $res['fff']?>&unit=<?php echo $res['vehicle']?>"><?php echo $res['Unit']?></a></td>  -->
                         <td><?php echo $res['Brigade']?></td>
                          
                          <td><?php echo  $res['vehi']; ?></td>
                          <td><?php echo  $person1; ?></td>
                          <td><?php echo  $res['trade']; ?></td>
                          
                         
                          <td><?php echo  $casuality ?></td>
                       
                   
                  
                          
                          
                      </tr>
                      
                   <?php 
                            }
                            else{
                            ?>
                                 <tr>
                         
                         <!--  <td><a href=".php?id=<?php echo $res['fff']?>&unit=<?php echo $res['vehicle']?>"><?php echo $res['Unit']?></a></td>  -->
                         <td><?php echo $res['Brigade']?></td>
                          
                          <td><?php echo  $res['vehi']; ?></td>
                          <td><?php echo  $person1; ?></td>
                          <td><?php echo  $res['trade']; ?></td>
                          
                         
                          <td><?php echo  $casuality ?></td>
                       
                   
                  
                          
                          
                      </tr>
                      
                       <?php     }
                     
    }
                  
}

                    else
                    {
                       echo 'No Record Found.';

                   
                  }
                ?>
                   
                </tbody>
            </table>

</form>
        </div>

      </div>
    </div>
    <!-- End Panel -->






  </div>
  <!-- End Row -->


</div>
</div>


