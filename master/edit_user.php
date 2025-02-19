<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Edit User</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit User</li>
      </ol>

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

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color9-bg"><i class="fa fa-check-square-o"></i></span>
      <h1>Edit User</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$id = $_REQUEST['id'];
if(isset($_POST['addsubmit']))

{
//   $datek=date_create($_POST['dob']);
// $dob = date_format($datek,"Y-m-d");
   $details = array();
$plain = $_POST['plain'];
$level = $_POST['level'];

  $details['name']          = $_POST['name'];
  $details['fathername']          = $_POST['fathername'];
  $details['dob']        = $_POST['dob'];
  $details['address']           = $_POST['address'];
  $details['email']            = $_POST['email'];
  $details['mobileno']            = $_POST['mobileno'];
  $details['password']          = $_POST['password'];
  $details['bank_name']          = $_POST['bank_name'];
  $details['account_number']        = $_POST['account_number'];
  $details['ifsc_code']           = $_POST['ifsc_code'];
  $details['bank_branch']            = $_POST['bank_branch'];
  $details['holder_name']            = $_POST['holder_name'];
  $details['isactive']           = $_POST['isactive'];

    $fields='';
    foreach($details as $key=>$val)
    {
      if (!empty($fields))
        $fields .= ', ';
      $fields .= "$key = '$val'";
    }
   $query = "UPDATE `user` SET $fields WHERE id = '$id' ";
   $q = mysqli_query($con,$query);
     $originalm;
   $levelname;
      $ql = mysqli_query($con,"select * from level where plan = '$plain'");
            while($originalk =mysqli_fetch_array($ql)){
              $originalm .= $originalk['person'].',';
              $levelname .= $originalk['levelname'].',';
            }
            //print_r($originalm);
      $originalm = rtrim($originalm, ',');
      $levelname = rtrim($levelname, ',');
      $original = explode(',', $originalm);
      $levelnames = explode(',', $levelname);
      $total = array();
      $runningSum = 0;

      foreach ($original as $number) {
          $runningSum += $number;
          $total[] = $runningSum+1;
          $totalk[] = $runningSum+1;
      }
foreach($total as $key=> $person){
  //echo $person;
  if($levelnames[$key] == $level)
  {
    $person;
    $levelnames[$key];
    if($level == 1){
      $person = 0;
    }
    else{
      $person = $person;
    }
    //echo "insert into tree(`userid`,`count`,`level`) values('$last_userid','$person','$level')<br>";
  // $query = mysqli_query($con,"insert into tree(`userid`,`count`,`level`) values('$last_userid','$person','$level')");
    $qk=mysqli_query($con,"SELECT * FROM tree WHERE userid='$id'");
     $resk=mysqli_fetch_assoc($qk);
    $prevlevel = $resk['level'];
    if( $level > $prevlevel)
    {
       $query = mysqli_query($con,"update tree set `count`='$person',`level`='$level'  where userid='$id'");
       $logdate = date('Y-m-d');
       $queryk = mysqli_query($con,"insert into ranklog(`userid`,`rank`,`logdate`) values('$id','$level','$logdate')");
    }
  
    }
  }
  // die('hmmm');
   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_user.php");</script>';
   // echo '<script>alert("Add Successfully.");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("edit_user.php?productid'.$id.'");</script>';
  }
}


$query=mysqli_query($con,"select * from user where id = $id ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$name = $res['name'];
$fathername = $res['fathername'];
$dob = $res['dob'];
//$date=date_create($res['dob']);
//$dob = date_format($date,"d-m-Y");
$address = $res['address'];

$email = $res['email'];
$mobileno = $res['mobileno'];

$password = $res['password'];
$bank_name = $res['bank_name'];
$account_number = $res['account_number'];
$ifsc_code = $res['ifsc_code'];
$bank_branch = $res['bank_branch'];
$holder_name = $res['holder_name'];
$plain = $res['plain'];
$isactive = $res['isactive'];
$rank = $res['rank'];
//$join_date = $res['join_date'];
$dates=date_create($res['join_date']);
$join_date =  date_format($dates,"d-m-Y");

  }
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">
 <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">

        <div class="panel-title">
          User Information
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
             

                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "name" id="name" required value="<?php echo $name ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Father/Husband *</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name = "fathername" id="fathername" required value="<?php echo $fathername ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">DOB</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control datepickers" id="datepickers" name = "dob" id="dob"  required value="<?php echo $dob ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Full Address</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name = "address" id="address" required value="<?php echo $address ?>">                     
                  </div>
                </div>
                   <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Email</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name = "email" id="email" required value="<?php echo $email ?>">                     
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Mobile Number</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name = "mobileno" id="mobileno"  maxlength="10" required value="<?php echo $mobileno ?>">                     
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Password</label>
                  <div class="col-sm-10">
                   <input type="password" class="form-control" name = "password" id="password" required value="<?php echo $password ?>">  
                   <input type="hidden" class="form-control" name = "plain" id="plain" value="<?php echo $plain ?>">                    
                  </div>
                </div> 
               
            </div>

      </div>
    </div>

    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">

        <div class="panel-title">
          Bank Information
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">

                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Bank Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "bank_name" id="bank_name" required value="<?php echo $bank_name ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Account Number</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name = "account_number" id="account_number" required value="<?php echo $account_number ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">IFSC Code</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name = "ifsc_code" id="ifsc_code" required value="<?php echo $ifsc_code ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Bank Branch</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name = "bank_branch" id="bank_branch" required value="<?php echo $bank_branch ?>">                     
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Holder Name</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name = "holder_name" id="holder_name" required value="<?php echo $holder_name ?>">                     
                  </div>
                </div>              
                 <div class="form-group">
                  <label for="isactive" class="col-sm-2 control-label form-label">IsActive</label>
                  
                  <div class="col-sm-10">
                  <?php if($isactive == 1){ ?>

                    <input type="checkbox" class="form-control" name = "isactive" value="1" checked id="isactive">
                 <?php  } else{ ?>
                          <input type="checkbox" class="form-control" name = "isactive" value="1" id="isactive">
                 <?php } ?>
                  </div>
                </div>

       

            </div>

      </div>
    </div>
  </div>
     <div class="row">
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-title">
          Change Rank
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
       

            <div class="panel-body">
            
               <div class="form-group">
                  <label class="col-sm-2 control-label form-label"> Change Rank</label>
                  <div class="col-sm-10">
                    <?php
                      $plain = $res['plain'];
                      $qk=mysqli_query($con,"SELECT * FROM tree WHERE userid='$id'");
                      $resk=mysqli_fetch_assoc($qk);

                      $level = $resk['level'];
                      $sponsorid = $res['sponsorid'];
                      
                      $qks=mysqli_query($con,"SELECT * FROM tree WHERE userid='$sponsorid'");
                      $resks=mysqli_fetch_assoc($qks);

                      $lastlevel = $resks['level'];
                     // echo "select * from level where levelname < '$level' and plan = '$plain'";
                      $queryk = mysqli_query($con,"select * from level where (levelname > '$level' and levelname <'$lastlevel') and plan = '$plain'"); 
                           
                                               
                            if(mysqli_num_rows($queryk)>0)
                          { 
                            echo'  
                            <select class="level" name="level" id="level" required " style="width: 100%;">';
                            echo '<option value="'.$level.'">Select Rank</option>';
                            while($resm=mysqli_fetch_assoc($queryk)){
                              $levelname =$resm['levelname'];
                            
                              echo '<option value="'.$levelname.'">'.$levelname.'</option>';
                       }
                       echo '<select>' ;
                        }
                         
                         ?>
                   </div>
                </div>
              
              

            </div>

      </div>
    </div>
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-title">
          Rank Log
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
       

            <div class="panel-body">
            
               <div class="form-group">
               <table id="example0" class="table display dataTable" role="grid" aria-describedby="example0_info">
                 <tr>
                  <th>Log</th>
                  <th>Date</th>
                  <th>Rank</th>
                 </tr>
                 <tbody>
                   <tr>
                     <td>Sinup</td>
                     <td><?php echo $join_date ?></td>
                     <td><?php echo $rank ?></td>
                   </tr>
                   <?php 
                   $queryrank=mysqli_query($con,"select * from ranklog where userid = $id ") ;                    
                    if(mysqli_num_rows($queryrank)>0)
                    { 
                    while($resrank=mysqli_fetch_assoc($queryrank)){
                      $date=date_create($resrank['logdate']);
                      $logdate = date_format($date,"d-m-Y");
                     echo '<tr>
                     <td>Update</td>
                     <td>'.$logdate.'</td>
                     <td>'.$resrank['rank'].'</td>
                   </tr>'; 
                    }
                  }
                   ?>
                 </tbody>
               </table>
                  
                </div>
              
              

            </div>

      </div>
    </div>
  

  </div>
   <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">

       

            <div class="panel-body">
            
              <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" name="addsubmit" class="btn btn-default">Update</button>
                  </div>
                </div>
              
              

            </div>

      </div>
    </div>

  

  </div>
  </form>
  <!-- End Row -->

</div>
<!-- END CONTAINER -->
<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="js/plugins.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="js/summernote/summernote.min.js"></script>
<link rel="stylesheet" type="text/css" href="datepicker/jquery.datetimepicker.css"/> 
<script src="datepicker/jquery.datetimepicker.full.js"></script>
<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/
  $(document).ready(function() {
  $('#summernote').summernote();
});
  $(document).ready(function($) {

    $('#datepickers').datetimepicker({
      timepicker:false,
      maxDate: new Date(),
        format: 'd-m-Y'
    });
});
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
