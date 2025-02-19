<?php
session_start();
echo @$_SESSION['GCAREMASTER'];
//include('php-includes/connect.php');

$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "army";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
if(@$_SESSION['GCAREMASTER'] == 1)
{
   echo '<script>window.location.assign("dashboard.php");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="G Care Fintech">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Army</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>
<?php

 if(isset($_POST['submit']))

  {

    $username =$_POST['username'];
    $password =$_POST['password'];
//echo "select * from  users where username='".$username."' and password='".$password."'";
 //die('dfjhgjdf');
    $query=mysqli_query($con,"select * from  users where username='".$username."' and password='".$password."'") ;

    $res=mysqli_fetch_assoc($query);
    
   if(mysqli_num_rows($query)>0)
   {
     $userId =$res['userId'];
       $_SESSION['GCAREMASTER'] = $userId;
        echo '<script>alert("Login Success.");window.location.assign("dashboard.php");</script>';

    }
    else
    {
       echo '<script>alert("Email id or password is worng.");window.location.assign("index.php");</script>';

    }
  }
?>
    <div class="login-form">
      <form accept-charset="UTF-8" role="form" method="post" class="col s12 form-wrapper" >
        <div class="top">
          <img src="img/login.png" alt="icon" class="icon">
          <h1>RRCC</h1>
          <h4>Master Login</h4>
          <?php if(@$_REQUEST['notmatch'] != ''){
          echo 'h4>'.$_REQUEST['notmatch'].'</h4>';
        }
          ?>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i class="fa fa-key"></i>
          </div>
          <!-- <div class="checkbox checkbox-primary">
            <input id="checkbox101" type="checkbox" checked>
            <label for="checkbox101"> Remember Me</label>
          </div> -->
          <button type="submit" name="submit" class="btn btn-default btn-block">LOGIN</button>
          <input type="hidden" name="formSubmitted" value="1">
        </div>
      </form>
     <!--  <div class="footer-links row">
        <div class="col-xs-6"><a href="#"><i class="fa fa-external-link"></i> Register Now</a></div>
        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Forgot password</a></div>
      </div> -->
    </div>

</body>
</html>