<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select brigade,Id from Brigade where unitcategory='$state'");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['Id'].">".$row['brigade']."</option>";
 }
 exit;
}
?>