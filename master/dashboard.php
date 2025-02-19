<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>
<style>
img.drtff {
    width: 100%;
}
.content {
    padding-left: 0px;
    padding-right: 0px;
    overflow: hidden;
}
.page-header {
    margin: -20px 0px 20px 0px;
    padding: 20px;
}
.sample-flash {
    display: inline-block;
    overflow: hidden;
    width: 100%;
    padding: 20px;
    background: #b8caff;
}
</style>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Automation of Engg. Sp Resources</h1>
      <ol class="breadcrumb">
        <!-- <li class="active">This is a quick overview of some features</li>
    </ol> -->

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="dashboard.php" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">
<?php 
@$sqlQuery = mysqli_query($con,"select * from flash_manage ORDER BY id DESC LIMIT 1");
if(@mysqli_num_rows($sqlQuery)>0)
{ 
  $res1=mysqli_fetch_assoc($sqlQuery);
?>

<div class="sample-flash">
 
<h2><span class="glow"><img src="img/flash-gif.gif"></span> <b><?php date_default_timezone_set("Asia/Kolkata");
      echo "Report As On  " . date("d-m-y") . " at " . date("h:i") . "<br>"; ?></b></h2>
<marquee><h4><span>&nbsp;&nbsp;<?php echo $res1['tk'];?>&nbsp;&nbsp;</span>  (.)ALPHA(.)  <span>&nbsp;&nbsp; <?php echo $res1['tac'];?> &nbsp;&nbsp;</span>  (.)BRAVO(.) <span>&nbsp;&nbsp; <?php echo $res1['eqpt'];?> &nbsp;&nbsp;</span> (.)CHARLIE(.)<span>&nbsp;&nbsp; <?php echo $res1['damage'];?> &nbsp;&nbsp;</span> (.)DELTA(.) <span> &nbsp;&nbsp; <?php echo $res1['gr'];?> &nbsp;&nbsp;</span>(.)<span> &nbsp;&nbsp; <?php echo $res1['rank_trade'];?> &nbsp;&nbsp;</span>(.)ECHO(.) <span> &nbsp;&nbsp; <?php echo $res1['crew_condition'];?> &nbsp;&nbsp; </span> (.)FOXTROT(.) <span> &nbsp;&nbsp; <?php echo $res1['enemy_activity'];?> &nbsp;&nbsp;</span> (.)</h4></marquee>
</div>
<?php } ?>

<img class="drtff" src="img/dassbord.jpg">
  <!-- Start Top Stats -->
  <div class="col-md-12">
  <!--<ul class="topstats clearfix">
    <li class="arrow"></li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-users"></i> Users</span>
      <?php
      $user = "Select count(*) as usercount from user";
          $res_membertre = mysqli_query($con, $user);
          $rmuser = mysqli_fetch_object($res_membertre)
      ?>
      <h3><?php echo $rmuser->usercount ?></h3>
      <a href="manage_user.php"><span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> <?php echo $rmuser->usercount ?></b> User Profiles</span></a>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-users"></i> Active Users</span>
      <?php
      $user = "Select count(*) as usercount from user where isactive = 1";
          $res_membertre = mysqli_query($con, $user);
          $rmuser = mysqli_fetch_object($res_membertre)
      ?>
      <h3><?php echo $rmuser->usercount ?></h3>
      <a href="manage_user.php"><span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> <?php echo $rmuser->usercount ?></b> Active User Profiles</span></a>
    </li>

    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-users"></i> InActive Users</span>
      <?php
      $user = "Select count(*) as usercount from user where isactive = 0";
          $res_membertre = mysqli_query($con, $user);
          $rmuser = mysqli_fetch_object($res_membertre)
      ?>
      <h3><?php echo $rmuser->usercount ?></h3>
      <a href="manage_user.php"><span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> <?php echo $rmuser->usercount ?></b> InActive User Profiles</span></a>
    </li>
    </ul>
     <ul class="topstats clearfix"> 
    
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-thumb-tack"></i> E-Pin</span>
      <?php
      $pinlist = "Select count(*) as pin from pin_list";
          $res_pinlist = mysqli_query($con, $pinlist);
          $rmpinlist = mysqli_fetch_object($res_pinlist)
      ?>
      <h3 class="color-up"><?php echo $rmpinlist->pin ; ?></h3>
      <a href="manage_pin.php"> <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $rmpinlist->pin ; ?></b> Total E-Pin</span></a>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-thumb-tack"></i> Open E-Pin</span>
      <?php
      $pinlist = "Select count(*) as pin from pin_list where status ='open'";
          $res_pinlist = mysqli_query($con, $pinlist);
          $rmpinlist = mysqli_fetch_object($res_pinlist)
      ?>
      <h3 class="color-up"><?php echo $rmpinlist->pin ; ?></h3>
     <a href="manage_pin.php"> <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $rmpinlist->pin ; ?></b> Open E-Pin</span></a>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-thumb-tack"></i> Close E-Pin</span>
      <?php
      $pinlist = "Select count(*) as pin from pin_list where status ='close'";
          $res_pinlist = mysqli_query($con, $pinlist);
          $rmpinlist = mysqli_fetch_object($res_pinlist)
      ?>
      <h3 class="color-up"><?php echo $rmpinlist->pin ; ?></h3>
      <a href="manage_pin.php"> <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $rmpinlist->pin ; ?></b> Close E-Pin</span></a>
    </li>
    </ul>
     <ul class="topstats clearfix">
     <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-tree"></i> Tree Income</span>
      <?php
        $query_membertre = "Select * from userincome";
          $res_membertre = mysqli_query($con, $query_membertre);
          $totalincome = 0;
          while($rm = mysqli_fetch_object($res_membertre))
          {
            $totalincome +=  $rm->income;
          }
          $treincome = money_format('%!i',$totalincome);
      ?>
      <h3><?php echo $treincome ?></h3>
      <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> <?php echo $treincome ?></b> Tree Income</span>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-briefcase"></i> Work Income</span>
      <?php
        $workincome = "Select * from workincome";
          $resworkincome = mysqli_query($con, $workincome);
          $totalworkincome = 0;
          $k =0;
          while($rmwork = mysqli_fetch_object($resworkincome))
          {
            $totalworkincome +=  $rmwork->dilyincome;
            $k++;
          }
          $work = money_format('%!i',$totalworkincome);
      ?>
      <h3><?php echo $work ?></h3>
      <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> <?php echo $work ?></b> Total Work Income</span>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-briefcase"></i> Work Finished</span>
      <h3 class="color-up"><?php echo $k ?></h3>
      <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> <?php echo $k ?></b> Work Finished</span>
    </li>
  
  </ul>
  <ul class="topstats clearfix">
      <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-money"></i> Withdrawl</span>
      <?php
        $withdrawl = "Select * from withdrow";
          $reswithdrawl = mysqli_query($con, $withdrawl);
          $totalwithdrawl = 0;
          //$k =0;
          while($rmreswithdrawl = mysqli_fetch_object($reswithdrawl))
          {
            $totalwithdrawl +=  $rmreswithdrawl->discharage_amount;
           // $k++;
          }
          $workdrawl = money_format('%!i',$totalwithdrawl);
      ?>
      <h3 class="color-down"><?php echo $workdrawl ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $workdrawl ?></b> Total Withdrawl</span>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-money"></i>Completed Withdrawl</span>
      <?php
        $withdrawlc = "Select * from withdrow where status = '1'";
          $reswithdrawlc = mysqli_query($con, $withdrawlc);
          $totalwithdrawlc = 0;
          //$k =0;
          while($rmreswithdrawlc = mysqli_fetch_object($reswithdrawlc))
          {
            $totalwithdrawlc +=  $rmreswithdrawlc->discharage_amount;
           // $k++;
          }
          $workdrawlc = money_format('%!i',$totalwithdrawlc);
      ?>
      <h3 class="color-down"><?php echo $workdrawlc ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $workdrawlc ?></b> Completed Withdrawl</span>
    </li>
     <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-money"></i>Pending Withdrawl</span>
      <?php
        $withdrawlp = "Select * from withdrow where status = '0'";
          $reswithdrawlp = mysqli_query($con, $withdrawlp);
          $totalwithdrawlp = 0;
          //$k =0;
          while($rmreswithdrawlp = mysqli_fetch_object($reswithdrawlp))
          {
            $totalwithdrawlp +=  $rmreswithdrawlp->discharage_amount;
           // $k++;
          }
          $workdrawlp = money_format('%!i',$totalwithdrawlp);
      ?>
      <h3 class="color-down"><?php echo $workdrawlp ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $workdrawlp ?></b> Pending Withdrawl</span>
    </li>
  </ul>

    <ul class="topstats clearfix">
      <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-money"></i> Company Purchase</span>
      <?php
        $cm = "Select * from user";
          $rescm = mysqli_query($con, $cm);
          $totalrmcm = 0;
          //$k =0;
          while($rmcm = mysqli_fetch_object($rescm))
          {
            $totalrmcm +=  $rmcm->company_income;
           // $k++;
          }
          $companyincome = money_format('%!i',$totalrmcm);
      ?>
      <h3 class="color-down"><?php echo $companyincome ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i><?php echo $companyincome ?></b> Total Company Purchase</span>
    </li>
    
     <
  </ul>-->
  </div>
  <!-- End Top Stats -->

  <!-- End First Row -->

</div>
<!-- END CONTAINER -->

<?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>

