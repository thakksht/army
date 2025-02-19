<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option2']))
{
 

 $state1 = $_POST['get_option2'];
 $find=mysqli_query($con,"select subproduct,Id from subproduct where product='$state1'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['Id'].">".$row['subproduct']."</option>";
 }
 exit;
}
?>