<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select person,Id from manpower where trade='$state'");
   if(mysqli_num_rows($find)>0)
       {
        echo '<option value="">Select Name</option>';
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value=".$row['Id'].">".$row['person']."</option>";
 }
       }
 else
 {
     echo '<option value="">Name not available</option>';
    
 }
 exit;
       }
 

?>