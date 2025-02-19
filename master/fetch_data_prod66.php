<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option1'];
 $find=mysqli_query($con,"select batchno,batchId from batch where product='$state'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['batchId'].">".$row['batchno']."</option>";
 }
 exit;
}
?>