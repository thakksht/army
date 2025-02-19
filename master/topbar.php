<?php
session_start();
//$_SESSION['ADMINID'];
//include('php-includes/check-login.php');
//include('php-includes/connect.php');
$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "army";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
if($_SESSION['GCAREMASTER'] != 1)
{
   echo '<script>window.location.assign("index.php");</script>';
}
$adminid = $_SESSION['GCAREMASTER'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>RRCC</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <!--<link href="css/bootstrap.css" rel="stylesheet">-->
<!--   <link href="css/font-awesome.min.css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
<style type="text/css">
  input#isactive {
    width: 4%;
    border: none;
}
</style>

  </head>
  <body>

<?php 
ob_start();
?>
  <!-- Start Page Loading -->
  <!-- <div class="loading"><img src="img/loading.gif" alt="loading-img"></div> -->
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="dashboard.php" class="logo">RRCC</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
   

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php ?>