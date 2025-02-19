<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/
require_once ('sidebar.php');
?>
<style type="text/css">
	.genrt{
		float: right;
    font-size: 14px;
    font-weight: normal;
    text-transform: capitalize;
	}
	span.genrt a {
    padding: 10px;
    border: 1px solid #399bff;
    margin: 0px 5px 0 5px;
}
</style>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">
<?php
$status = $_REQUEST['status'];
$id = $_REQUEST['id'];

if($status == 'deactivate'){
  $sql = "UPDATE user SET isactive='0' WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'activate'){
  $sql = "UPDATE user SET isactive='1' WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
if($status == 'delete'){
  $sql = "DELETE FROM user WHERE id = $id";
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  }
}
 ?>
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Manage Pending Withdrawl User</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manage Pending Withdrawl User</li>
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
      <!-- <span class="icon color10-bg"><i class="fa fa-table"></i></span> -->
      <!-- <h1><a href="add_order.php">Add Order </a>  </h1>  -->
      
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
          Manage Pending Withdrawl User
          <span class="genrt">
          <a href="#" id="generatepdf"> Generate Pdf </a>
          <!-- <a href="#" id="generateprint"> Generate Print </a> -->
          </span>
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                    <td><input type="checkbox" id="checkAll"></td>
                     <th>Date</th>
                    <th>User id</th>                        
                        <th>Amount</th>
                        <th>Admin</th>
                        <th>Net Amount</th>
                          <th>Status</th>
                          <th>Operation</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>                    
                    <th>Date</th>
                    <th>User id</th>                        
                        <th>Amount</th>
                        <th>Admin</th>
                        <th>Net Amount</th>
                          <th>Status</th>
                          <th>Operation</th>
                    </tr>
                </tfoot>
             
                <tbody>
                  <?php
                  if($id !=''){
                     $query=mysqli_query($con,"select * from withdrow where userid= '$id' and status = '0' ORDER BY withdrow_date DESC") ;
                  }
                  else{
                     $query=mysqli_query($con,"select * from withdrow where status = '0' ORDER BY withdrow_date DESC") ;
                  }
                                       
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){ 
                    $withdrowid = $res['withdrowid']; 
                    $dates=date_create($res['withdrow_date']);
                        $withdrow_date =  date_format($dates,"d-M-Y h:i a");                
                    ?>
                      <tr>
                      <td><input type="checkbox" name="check_list[]" class="messageCheckbox" value="<?php echo $withdrowid;?>">
                      <td><?php echo $withdrow_date?></td>
                       <td><?php echo $res['userid']?><br>
                        <a href="ledger.php?id=<?php echo $res['userid']?>" target="_blank" >Ledger</a></td>
                          
                          <td><?php echo $res['amount']?></td>
                          <td><?php echo $res['charage']?></td>
                          <td><?php echo $res['discharage_amount']?></td>
                          
                          <td><?php 
                          if($res['status'] == 0){
                            echo 'Pending';
                          }
                          else{
                             echo 'Completed';
                          } ?>
                          </td>
                          <td>
                          <?php
                          if($id !=''){
                          echo ' <a href="withdrowpayment.php?withdrowid='.$withdrowid.'&id='.$id.'"><i class="fa fa-edit"></i></a>';
                          }
                          else{
                              echo ' <a href="withdrowpayment.php?withdrowid='.$withdrowid.'"><i class="fa fa-edit"></i></a>';
                          }
                        
                           ?>

                          </td>
                       
                          
                      </tr>
                      
                   <?php } 
                 }
                    else
                    {
                       echo 'No Record Found.';

                    }
                ?>
                   
                </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->






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

<script type="text/javascript">
$(document).ready(function(){
	$("#generatepdf").click(function(){
	    var checkedValue = null; 
		var inputElements = document.getElementsByClassName('messageCheckbox');

		var aIds = [];
		for(var i=0; inputElements[i]; ++i){
		      if(inputElements[i].checked){
		           aIds.push(inputElements[i].value);
		      }
		}
		var email = $('#check_listproduct').val();
		var types = aIds.join(',');
		if(types == ''){
		    alert('Please Select Value');
		        return false;
		}
		//alert(types);
		// var formData = {
		//               orderIds: types,
		//               email: email,
		//           };
		//http://gcarefintech.biz/download_withdrawl.php
		           var url = "http://gcarefintech.biz/download_withdrawl.php?userid="+types;  
		           $(location).attr('href',url);

    })

   $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
})
</script>


<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>



<script>
$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});

$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'desc' ]],
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
        if ( currentOrder[0] === 'desc' && currentOrder[1] === 2) {
            table.order( [ 2, 'asc' ] ).draw();
        }
        else {
            table.order( [ 2, 'desc' ] ).draw();
        }
    } );
} );
</script>


 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>
