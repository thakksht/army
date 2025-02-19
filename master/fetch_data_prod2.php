<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option1'];
 $find=mysqli_query($con,"select Product,Id from Product where catprod='$state'");
 while($row=mysqli_fetch_array($find))
 {
     ?>
  <option value="<?php echo $row['Id']?>"><?php echo $row['Product']?></option>
  <?php
 }
 exit;
}
?>