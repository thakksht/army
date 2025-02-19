<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
    

 $state = $_POST['get_option1'];
 //SELECT DISTINCT(Product.Product), Product.Id From subproduct,Product where subproduct.product = Product.Id"
 //$find=mysqli_query($con,"select distinct(subproduct) from subproduct where product=45");
 //$find=mysqli_query($con,"select distinct(batch.product),Product.Product,Product.Id from batch INNER JOIN Product ON batch.product=Product.Id and batch.unit='$state'");
 //$find=mysqli_query($con,"select distinct(batch.product),Product.Product,Product.Id from batch INNER JOIN Product ON batch.product=Product.Id and batch.unit='$state'");
 $find=mysqli_query($con,"select distinct subproduct,Id from subproduct where product='$state'");
 while($row=mysqli_fetch_array($find))
 {
     ?>
 <option value="<?php echo $row['Id']?>"><?php echo $row['subproduct']?></option>
  <?php
 }
 exit;
}
?>