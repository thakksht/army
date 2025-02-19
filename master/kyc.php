<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">
<?php
$status = $_REQUEST['status'];
$userid = $_REQUEST['id'];

if($status == 'approved'){

  $query=mysqli_query($con,"select * from user where id= '$userid'") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$mobileno = $res['mobileno'];
$name = $res['name'];
/* ---------- SMS ------------*/
    // Account details
    $apiKey = urlencode('3oSL79jkROI-9Sukr2sgQerhXfKEjYN6WMDurmtSxM');
    
    // Message details
    $numbers = $mobileno;
    $sender = urlencode('GCFINT');
    $message = rawurlencode('Congratulations '.$name.', Your KYC documents have been approved Thank You G Care Fintech');
   
    //$numbers = implode(',', $numbers);
   
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   
            $ch = curl_init();
              curl_setopt_array($ch, array(
              CURLOPT_URL => "http://api.msg91.com/api/v2/sendsms",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{ \"sender\": \"GCFINT\", \"route\": \"4\", \"sms\": [ { \"message\": \"Congratulations $name, Your KYC documents have been approved Thank You G Care Fintech\", \"to\": [ \"$mobileno\"] }] }",
              CURLOPT_HTTPHEADER => array(
                "authkey: 233092AUPEsFSBOVYo5b7d2e9d",
                "content-type: application/json"
              ),
              ));
            $response = curl_exec($ch);
            $err = curl_error($ch);
            
            curl_close($ch);
            
            if ($err) {
              //echo "cURL Error #:" . $err;
            } else {
             // echo $response;
            }
    
    // Process your response here
  $response;
    /* ---------- End SMS --------*/

  }
  //die('hloo');echo 
  $sql = "UPDATE user SET status='Approved' WHERE id = $userid";
   if ($con->query($sql) === TRUE) {
    echo '<script>alert("Update Successfully.");window.location.assign("manage_kycdocs.php");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("kyc.php?id='.$userid.'");</script>';
  }
}
if($status == 'activate'){
  $sql = "UPDATE user SET isactive='1' WHERE id = $userid";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'delete'){
  $sql = "DELETE FROM user WHERE id = $userid";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Manage Kyc Document</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Kyc Document</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.html" class="btn btn-light">Dashboard</a>
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
      <?php

        $queryuser = "Select * from user where id = $userid";
      $resuser = mysqli_query($con, $queryuser) ;
      $user = mysqli_fetch_object($resuser);
      echo '<h2 class="title-head">'.$user->name.'  Kyc Document</h2>';
        ?>
      
    </div>


  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Manage Kyc Document
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                      <th>Image Type</th>
                        <th>Image</th>
                        <th>Downlod</th>
                        <th>View</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                    <th>Image Type</th>
                    <th>Image</th>
                        <th>Downlod</th>
                        <th>View</th>
                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
                  //$user
                   echo '<tr>
                            <th style="vertical-align: middle;" >Adhar Card</th>
                           <td><img style="width: 350px;" src="../kycdocs/'.$user->adharcard.'"></td>
                           <td style="vertical-align: middle;" ><a href="../download.php?fn='.$user->adharcard.'">Download</a></td>
                           <td style="vertical-align: middle;" ><a href="../kycdocs/'.$user->adharcard.'" target="_blank" >view</a></td>
                         </tr>
                         <tr>
                          <th style="vertical-align: middle;" >Pan Card</th>
                            <td><img style="width: 350px;" src="../kycdocs/'.$user->paincard.'"></td>
                            <td style="vertical-align: middle;" ><a href="../download.php?fn='.$user->paincard.'">Download</a></td>
                            <td style="vertical-align: middle;" ><a href="../kycdocs/'.$user->paincard.'" target="_blank" >view</a></td>
                         </tr>';
                  ?>
                   
                </tbody>
            </table>
            <form action ='' method="post">
             
            </form>

        </div>

      </div>
    </div>
    <!-- End Panel -->






  </div>
  <!-- End Row -->






</div>
<?php
if(isset($_POST['addsubmit']))
{
  $reason = $_POST['reason'];

  $query=mysqli_query($con,"select * from user where id= '$userid'") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$mobileno = $res['mobileno'];
$name = $res['name'];
/* ---------- SMS ------------*/
    // Account details
    $apiKey = urlencode('3oSL79jkROI-9Sukr2sgQerhXfKEjYN6WMDurmtSxM');
    
    // Message details
    $numbers = $mobileno;
    $sender = urlencode('GCFINT');
    $message = rawurlencode($name.', Your KYC documents have been Disapproved, kindly upload KYC Docs again Thank You G Care Fintech');
   
    //$numbers = implode(',', $numbers);
   
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   
    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Process your response here
  $response;
    /* ---------- End SMS --------*/
}
//die('hloo');
  $sql = "UPDATE user SET reason='$reason', status='Approval Pending' WHERE id = $userid";
  if ($con->query($sql) === TRUE) {
    echo '<script>alert("Update Successfully.");window.location.assign("manage_kycdocs.php");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("kyc.php?id='.$userid.'");</script>';
  }
}


$query=mysqli_query($con,"select * from user where id = $userid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$reason = $res['reason'];

  }
?>
<div class="container-padding">


  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          KyC Doc 
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div id='kycdocststus'>
         <a style="border: 1px solid #c2c2c2;padding: 5px 11px 6px 11px;background: #f1f1f1;color: gray;margin-right: 15px;" href="kyc.php?status=approved&id=<?php echo $userid ?>">Approved</a>
          <button onclick="notaoproved()">Not Approved</button>
          </div>
            <div class="panel-body" style="display: none" id="notaoproveddiv">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >

                <div class="form-group">
                  <label for="category" class="col-sm-2 control-label form-label">Reason</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "reason" id="reason" required value="<?php echo $reason ?>">
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
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

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
Data Tables
================================================ -->
<script src="js/datatables/datatables.min.js"></script>
<style type="text/css">
  div#kycdocststus {
    text-align: center;
    margin-bottom: 30px;
}
</style>
<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>
<script type="text/javascript">
  function notaoproved(){
//$('.notaoproveddiv').show();
var x = document.getElementById("notaoproveddiv");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
  }
</script>


<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>


 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
