<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option1']))
{
 

 $state = $_POST['get_option'];
  $state1 = $_POST['get_option1'];  
 $find=mysqli_query($con,"select manpower.id,manpower.person from manpower_link INNER JOIN manpower ON manpower_link.name=manpower.Id where manpower_link.trade='$state' and manpower_link.vehicle='$state1'");
 echo "select manpower.id,manpower.person from manpower_link INNER JOIN manpower ON manpower_link.name=manpower.person where manpower_link.trade='$state' and manpower_link.vehicle='$state1'";
 while($row=mysqli_fetch_array($find))
 {
   ?>
 <option value="<?php echo $row['id']?>"><?php echo $row['person']?></option>
<?php
 }
 exit;
}
?>