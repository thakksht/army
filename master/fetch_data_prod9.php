<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option1'];
 $find=mysqli_query($con,"SELECT DISTINCT 
 	batch.prodcategory,
 	category_product.cat_prod
 	 from batch 
 	 LEFT JOIN category_product ON batch.prodcategory=category_product.id
 	 where batch.unit='$state'");
 while($row=mysqli_fetch_array($find))
 {
 	?>
 	
  <option value="<?php echo $row['prodcategory']; ?>"><?php echo $row['cat_prod']; ?></option>;
 <?php
 }
 exit;
}
?>
