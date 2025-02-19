<?php
ob_start();
include('php-includes/connect.php');
//$categoryid = $_REQUEST['categoryid'];
?>
                  
                   <select class="" name="unit_type[]" id="unit_type" >
                    <?php
                    $query=mysqli_query($con,"select * from measurement where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $measurementid =$res['measurementid'];
                      $name =$res['name'];
                      ?>
                      <option value="<?php echo $measurementid ?>"><?php echo $name ?></option>
                   <?php }
                 }
                    ?>
                     
                      </select>
                      
          