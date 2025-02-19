<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select product from batch where unit='$state'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option>".$row['product']."</option>";
 }
 exit;
}
?>