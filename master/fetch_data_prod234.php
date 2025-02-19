<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option1'];
 $find=mysqli_query($con,"select DISTINCT batch.product,Product.Product from Product INNER JOIN batch ON Product.Id=batch.product where catprod='$state'");
 while($row=mysqli_fetch_array($find)) {
 	

    ?>
    
 <option value="<?php echo $row['product']?>"><?php echo $row['Product']?></option>
<?php 

}
 exit;
}
?>