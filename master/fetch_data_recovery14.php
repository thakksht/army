<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 $state = $_POST['get_option'];
 $find=mysqli_query($con,"select manpower_link.trade,trade.trade,trade.Id from manpower_link INNER JOIN trade ON manpower_link.trade=trade.Id where manpower_link.batch='$state'");
 //echo "select manpower_link.trade,trade.trade,trade.Id from manpower_link INNER JOIN trade ON manpower_link.trade=trade.Id where manpower_link.batch='$state'";
 while($row=mysqli_fetch_array($find))
 {
   ?>
 <option value="<?php echo $row['Id']?>"><?php echo $row['trade']?></option>
<?php
 }
 exit;
}
?>