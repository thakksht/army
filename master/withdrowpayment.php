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
    <h1 class="title">Withdrawl Payment</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Withdrawl Payment</li>
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
      <h1>Withdrawl Payment</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$withdrowid = $_REQUEST['withdrowid'];
$id = $_REQUEST['id'];
if(isset($_POST['addsubmit']))
{
  $transaction_number = $_POST['transaction_number'];
  date_default_timezone_set('Asia/Kolkata');
  $compleate_date = date('Y-m-d h:i a');
  $status = '1';
$query=mysqli_query($con,"select W.discharage_amount, U.* from withdrow as W, user as U where W.withdrowid = $withdrowid and U.id= W.userid");                    
  if(mysqli_num_rows($query)>0)
  { 
//   $res=mysqli_fetch_assoc($query);
// $discharage_amount = $res['discharage_amount'];
// $mobileno = $res['mobileno'];
/* ---------- SMS ------------*/
    // Account details
  //  $apiKey = urlencode('3oSL79jkROI-9Sukr2sgQerhXfKEjYN6WMDurmtSxM');
    
    // Message details
    // $numbers = $mobileno;
    // $sender = urlencode('GCFINT');
    // $message = rawurlencode('Your Payout amount Rs '.$discharage_amount.'has been released, please review your Registered Bank Account. Thank You G Care Fintech');
   
    //$numbers = implode(',', $numbers);
   
    // Prepare data for POST request
//     $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   
//   $ch = curl_init();
//   curl_setopt_array($ch, array(
//   CURLOPT_URL => "http://api.msg91.com/api/v2/sendsms",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "{ \"sender\": \"GCFINT\", \"route\": \"4\", \"sms\": [ { \"message\": \"Your Payout amount Rs $discharage_amount has been released, please review your Registered Bank Account. Thank You G Care Fintech\", \"to\": [ \"$mobileno\"] }] }",
//   CURLOPT_HTTPHEADER => array(
//     "authkey: 233092AUPEsFSBOVYo5b7d2e9d",
//     "content-type: application/json"
//   ),
//   ));
// $response = curl_exec($ch);
// $err = curl_error($ch);

// curl_close($ch);

//if ($err) {
  //echo "cURL Error #:" . $err;
//} else {
 // echo $response;
//}
    
    // Process your response here
 // $response;
    /* ---------- End SMS --------*/

  }
//die();
  $sql = "UPDATE withdrow SET transaction_number='$transaction_number', compleate_date='$compleate_date', status='$status' WHERE withdrowid = $withdrowid";
  if ($con->query($sql) === TRUE) {
    if($id != ''){
      echo '<script>alert("Update Successfully.");window.location.assign("manage_withdrow.php?id='.$id.'");</script>';
    }
    else{
      echo '<script>alert("Update Successfully.");window.location.assign("manage_withdrow.php");</script>';
    }
  }
  else{
    if($id != ''){

      echo '<script>alert("please Update Again....");window.location.assign("withdrowpayment.php?withdrowid='.$withdrowid.'&id='.$id.'");</script>';
    }
    else{
       echo '<script>alert("please Update Again....");window.location.assign("withdrowpayment.php?withdrowid='.$withdrowid.'");</script>';
    }
  }
}


$query=mysqli_query($con,"select * from withdrow where withdrowid = $withdrowid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$transaction_number = $res['transaction_number'];

  }
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Withdrawl Payment
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Transaction Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "transaction_number" id="category" required value="<?php echo $transaction_number ?>">
                  </div>
                </div>
                
                <div class="form-group">
                <label for="fdg" class="col-sm-2 control-label form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="addsubmit" class="btn btn-default">Update</button>
                  </div>
                </div>

              </form> 

            </div>

      </div>
    </div>

  </div>
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

<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/
  $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
