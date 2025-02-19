<?php
session_start();
if(isset($_SESSION['userId'])){
}
else{
	echo '<script>alert("Access denied");window.location.assign("index.php");</script>';
}
?>