<?php
ob_start();
include('php-includes/connect.php');
$categoryid = $_REQUEST['categoryid'];
?>
                  
                   <?php
                    $query=mysqli_query($con,"select * from subcategory where isactive = 1 and categoryid = '$categoryid' ") ;                    
                    if(mysqli_num_rows($query)>0)
                   { ?>
                 <div class="col-md-12 col-lg-12">
                  <label for="input2" class="form-label">Sub Category </label><br>
                       <div class="checkbox checkbox-inline">
                       <select class="selectpicker" name="subcategoryid" id="subcategoryid" >
                       <option value="">Sub Category</option>
                       <?php
                    while($res=mysqli_fetch_assoc($query)){ 
                      $subcategoryid = $res['subcategoryid'];
                      $subcategoryname = $res['subcategoryname'];

                       ?>
                      
                        <option value="<?php echo $subcategoryid ?>"><?php echo $subcategoryname ?></option>
                    
                        
                     <?php } ?>
                     </select>
                     </div>
                     </div> <?php }?>
          