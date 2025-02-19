<?php
	$db_host = "localhost";
	$db_user = "dajzrjyb_army";
	$db_pass = "dajzrjyb_army";
	$db_name = "dajzrjyb_army";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
?>