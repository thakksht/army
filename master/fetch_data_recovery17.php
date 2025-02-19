<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select distinct(batch.product),Product.Product,Product.Id from batch INNER JOIN Product ON batch.product=Product.Id and batch.unit='$state'");
 while($row=mysqli_fetch_array($find))
 {
     ?>
   <option value="<?php echo $row[2]  ?>"><?php echo $row['Product']?></option>
  <?php
 }
 exit;
}
?>