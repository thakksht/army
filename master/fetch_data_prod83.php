<?php

/*----- header ----*/
require_once ('topbar.php');


if(isset($_POST['get_option']))
{
 

 echo $state = $_POST['get_option'];
 $find=mysqli_query($con,"select * from batch where product='$state'");
 while($row=mysqli_fetch_array($find))
 {
    ?>
 <option value="<?php echo $row['batchId']?>"><?php echo $row['batchno']?></option>
<?php }
 exit;
}
?>