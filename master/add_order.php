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
    <h1 class="title">Order</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Order</li>
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
<style type="text/css">
  select#subcategoryid {
    width: 100%;
}
#tagvalue .checkbox.checkbox-inline {
    padding: 0;
    width: 100%;
}
#product .checkbox.checkbox-inline {
    padding: 0;
    width: 100%;
}
/*#saleprice .checkbox.checkbox-inline {
    padding: 0;
    width: 100%;
}*/
  select#productid {
    width: 100%;
}
/*  select#salieprice {
    width: 100%;
}*/
.order_items td {
    padding-left: 30px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-top: 10px;
}
tr.item.new_row {
    border: 1px solid gray;
}
</style>
  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <?php
  if(empty($_POST['order_id'])){  
  $details['date']          = date('Y-m-d h:i:s a');
   foreach($details as $key=>$val)
    {
      if (!empty($fields))
        $fields .= ', ';
      $fields .= "$key = '$val'";
    }
   $query = "INSERT INTO `orders` SET $fields";
   $q = mysqli_query($con,$query);
   $order_id = $con->insert_id;
 }
  ?>
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color9-bg"><i class="fa fa-building"></i></span>
      <h1>Order</h1>
      <h2>Order #<?php echo $order_id ?> details</h2>
      
    </div>

    

  </div>
  <!-- End Presentation -->
<?php


if(isset($_POST['addsubmit']))
{
  // $categoryid = $_POST['categoryid'];
  // $tagname = $_POST['tagname'];
  // $isactive = $_POST['isactive'];
  // $q = mysqli_query($con,"insert into tag (`categoryid`,`tagname`,`isactive`) values('$categoryid','$tagname','$isactive')");
  $customeraddress = $_POST['customeraddress'];
  $ex = explode('__', $customeraddress);
  $customer_id = $ex['1'];
  $billing_address = $_POST['billing_address'];
  $shipping_address = $_POST['shipping_address'];
  $order_id = $_POST['order_id'];
  $queryl=mysqli_query($con,"select * from order_items where order_id = '$order_id' ") ;
  $reg_sum = 0;
  $sal_sum = 0;
  while($resl=mysqli_fetch_assoc($queryl)){
    $regular_price = $resl['regular_price']*$resl['qty'];
    $sale_price = $resl['order_price'];
    $reg_sum +=$regular_price;
    $sal_sum +=$sale_price;
  }
  $discount = $reg_sum-$sal_sum;
  $details = array();

  $details['customer_id']          = $customer_id;

  $details['subtotal']          = $reg_sum;

  $details['total']        = $sal_sum;

  $details['total_discount']           = $discount;

  $details['billing_address']            = $billing_address;

  $details['order_active']           = '1';
  $details['shipping_address']           = $shipping_address;
//echo '<pre>';
//print_r($details);
//die('hloo');
       
        $fields='';
    foreach($details as $key=>$val)
    {
      if (!empty($fields))
        $fields .= ', ';
      $fields .= "$key = '$val'";
    }
     $query = "UPDATE `orders` SET $fields WHERE id = '$order_id' ";
  // $query = "INSERT INTO `product` SET $fields";
   $q = mysqli_query($con,$query);
   //$last_id = $con->insert_id;
   //$number = count($_POST['unit']);
  // $qs = '';

 //die('hloo');
   if($q){
    echo '<script>alert("Add Successfully.");window.location.assign("manage_order.php");</script>';
   //	echo '<script>alert("Add Successfully.");</script>';
  }
  else{
      echo '<script>alert("please Add Again....");window.location.assign("add_order.php");</script>';
  }
}
  
//}
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">

<form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
  
  <!-- Start Row -->
    <div class="row">

<!-- layout -->
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">

        <div class="panel-title">
          order Items
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body" id="prductitem">
              <table cellpadding="0" cellspacing="0" class="order_items">
                <thead>
                <tr>
                <th class="item">Item</th>
                <th class="item"></th>
                <th class="item"></th>
                <th class="item_cost">Cost</th>
                <th class="quantity">Qty</th>
                <th class="line_cost">Total</th>
                <th class="wc-order-edit-line-item" width="1%">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="order_line_items">
                </tbody>
              </table>
           <!--    <div class="form-group " id="product">
                  <label for="input2" class="form-label">product Name</label>
                  <input type="text" class="form-control product" name="productname" id="input2">
                </div> -->
                
      </div>
    </div>
    </div>
  </div>
  <div class="row">

<!-- layout -->
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Basic Form
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <div class="form-group " id="product">
                  <label for="input2" class="form-label">product Name</label>
                  <input type="text" class="form-control product" name="productname" id="productitemname">
                  <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id ?>">
                </div>
                <a href="javascript:" id="submititem"> Add Item</a>
                
      </div>
    </div>
    </div>
  </div>
   <div class="row">

<!-- layout -->
    <div class="col-md-12 col-lg-4">
      <div class="panel panel-default">

        <div class="panel-title">
          Customer
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <div class="form-group " id="customeraddress">
                  <label for="input2" class="form-label">Customer Name</label>
                  <input type="text" class="form-control customeraddress" name="customeraddress" id="customeraddress">
                </div>
                <a href="javascript:" id="customeritem"> Add Customer</a href="#">
                
                
      </div>
    </div>
    </div>
    <div class="addresdata" id="addresdata">
    </div>
  </div>

  <!-- End Row -->
 <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">

       

            <div class="panel-body">
            
              <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" name="addsubmit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              
              

            </div>

      </div>
    </div>

  

  </div>
</form>

<?php
// function InsertRecord($table,$fieldsArr)
//   {
//     global $sqlObj;
    
//     $fields='';
//     foreach($fieldsArr as $key=>$val)
//     {
//       if (!empty($fields))
//         $fields .= ', ';
//       $fields .= "$key = '$val'";
//     }
//     $query = "INSERT INTO $table SET $fields";
    
//     return $sqlObj->query($query);
//   }

?>
  <!-- End Row -->
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/plugins.js"></script>

<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="js/summernote/summernote.min.js"></script>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 

    <style type="text/css">
      .latlong{
        float: right;
    position: absolute;
    right: 25px;
    margin-top: -40px;
      }
    </style>
<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/
  $(document).ready(function() {
  $('#summernote').summernote();
});

</script>
<script type="text/javascript">
  $(function() {
  
  //autocomplete
  $(".product").autocomplete({
    source: "search.php",
    minLength: 1
  }); 
   $(".customeraddress").autocomplete({
    source: "searchcustomer.php",
    minLength: 1
  });
});

  
  $("#submititem").click(function(){
   var productitemname = $('#productitemname').val();
    var order_id = $('#order_id').val();
   if(productitemname == ''){
    return false;
   }
   // alert(order_id+'---'+productitemname);
    var formData = {
              productitemname: productitemname,
              order_id: order_id,
              action: 'productitemname',
          };
          $.ajax({
    type: "GET", 
    url: "all_data.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
          $("#order_line_items").append(data);
    }
  });
});

$("#customeritem").click(function(){
  //alert('hloo');
   var customeraddress = $('.customeraddress').val();
    var order_id = $('#order_id').val();
    // alert(order_id+'---'+customeraddress);
   if(customeraddress == ''){
    return false;
   }
   
    var formData = {
              customeraddress: customeraddress,
              order_id: order_id,
              action: 'customeraddress',
          };
          $.ajax({
    type: "GET", 
    url: "all_data.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
          $("#addresdata").html(data);
    }
  });
});
 function itemdelete(item_id) {
  var formData = {
              item_id: item_id,
              action: 'deleteitem',
          };
  $.ajax({
    type: "GET", 
    url: "all_data.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
          if(data == '1')
          {
            var itemid = '#orderitem_'+item_id;
            $(itemid).html('');
          }
    }
  });
  }
</script>
<script type="text/javascript">



//function (value) {
    $(document).on('change', '.saleprices', function(e){
  //jQuery(".saleprices").on('change', function () {
    var value = $(this).val();
   var sale_id = $(this).children(":selected").attr("id");
   var quantitys = ".quantity"+sale_id;
   
  var quantity=  $(quantitys).val();
   // var categoryid = document.getElementById("categoryid").value;
   // alert(categoryid);
   // alert(quantity+'---'+sale_id+'----'+value)
           var formData = {
              slaevalue: value,
              item_id: sale_id,
              quantity:quantity,
              action: 'saleprices',
          };
  $.ajax({
    type: "GET", 
    url: "all_data.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
          arrHtml = data.split('^^');
         var sale_priceclass = '.sale_price_'+sale_id;
         var order_priceclass = '.order_price_'+sale_id;
         $(sale_priceclass).html('<span class="currencySymbol">₹</span>'+arrHtml[1]);
         $(order_priceclass).html(arrHtml[0]);
    }
  });
  });
     $(document).on('keyup mouseup', '.quantity', function (e) {
   // $(document).on('keyup', '.quantity', function(e){
//$(".quantity").keyup(function(){

     //document.getElementById("net").value=c;  
    var quantity = $(this).val();
    var sale_id = $(this).attr('id');
    //alert(quantity+'---'+sale_id)
         var formData = {
              quantity: quantity,
              item_id: sale_id,
              action:'quantitys',
          };
  $.ajax({
    type: "GET", 
    url: "all_data.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
         arrHtml = data.split('^^');
         var sale_priceclass = '.sale_price_'+sale_id;
         var order_priceclass = '.order_price_'+sale_id;
         $(sale_priceclass).html('<span class="currencySymbol">₹</span>'+arrHtml[1]);
         $(order_priceclass).html(arrHtml[0]);
         // $("#tagvalue").html(data);
    }
  });
});
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>