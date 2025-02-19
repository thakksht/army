<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option1'];
 $find=mysqli_query($con,"select distinct(subproduct),Id from subproduct where product='$state'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['Id'].">".$row['subproduct']."</option>";
 }
 exit;
}
?>