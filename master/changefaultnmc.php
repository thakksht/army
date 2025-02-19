<?php
$qty=$_GET['qty'];
$prod=$_GET['prod'];
$unit=$_GET['unit'];
$unitcat=$_GET['unitcat'];
echo $unit;
echo $unitcat;
echo $prod;
?>
<form method="post" action="changenmc.php">
change NMC<input type="number" value="<?php echo $qty?>" max="<?php echo $qty?>" min="0" name="no1">
<input type="hidden" value="<?php echo $prod?>" name="pr">
<input type="hidden" value="<?php echo $unit?>" name="unit1">
<input type="hidden" value="<?php echo $unitcat?>" name="unitcat">
<input type="submit" value="update">
</form>