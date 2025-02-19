<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select * from vehicle INNER JOIN category ON vehicle.category=category.Id and vehicle.category='$state'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option>".$row['unit']."</option>";
 }
 exit;
}
?>