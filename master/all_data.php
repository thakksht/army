<?php
ob_start();
include('php-includes/connect.php');

$action = $_REQUEST['action'];
$sale_id = $_REQUEST['sale_id'];
$unit = $_REQUEST['unit'];
$sale_price = $_REQUEST['sale_price'];
$regular_price = $_REQUEST['regular_price'];
$discount = $_REQUEST['discount'];
$unit_type = $_REQUEST['unit_type'];
$categoryid = $_REQUEST['categoryid'];
$subcategoryid = $_REQUEST['subcategoryid'];
$productid = $_REQUEST['productid'];

$productitemname = $_REQUEST['productitemname'];
$order_id = $_REQUEST['order_id'];

$slaevalue = $_REQUEST['slaevalue'];
$item_id = $_REQUEST['item_id'];
$quantity = $_REQUEST['quantity'];
$customeraddress = $_REQUEST['customeraddress'];


switch ($action) {
    case 'unit':
        unit($con, $unit, $sale_id); 
        break;
    case 'sale_price':
        sale_price($con, $sale_price, $sale_id); 
        break;
    case 'regular_price':
        regular_price($con, $regular_price, $sale_id, $sale_price); 
        break;
    case 'discount':
        discount($con, $discount, $sale_id, $sale_price); 
        break;
    case 'unit_type':
        unit_type($con, $unit_type, $sale_id); 
        break;
    // case 'subcategory':
    //     subcategory($con, $categoryid); 
    //     break;
    // case 'productdata':
    //     productdata($con, $subcategoryid); 
    //     break;
    // case 'saleprice':
    //     saleprice($con, $productid); 
    //     break;
      case 'productitemname':
        productitemname($con, $productitemname, $order_id); 
        break;
      case 'saleprices':
        saleprices($con, $slaevalue, $item_id, $quantity); 
        break;
      case 'quantitys':
        quantitys($con, $item_id, $quantity); 
        break;
        case 'customeraddress':
        customeraddress($con, $customeraddress, $order_id); 
        break;
        case 'deleteitem':
        deleteitem($con, $item_id); 
        break;
    
}
function unit($con, $unit, $sale_id){
    echo $sqlK = "UPDATE product_price SET unit = '$unit' WHERE Id = '$sale_id' ";
  $q = mysqli_query($con,$sqlK);
  die();
}
function sale_price($con, $sale_price, $sale_id){
    echo $sqlK = "UPDATE product_price SET sale_price = '$sale_price' WHERE Id = '$sale_id' ";
  $q = mysqli_query($con,$sqlK);
  die();
}
function regular_price($con, $regular_price, $sale_id, $sale_price){
    echo $sqlK = "UPDATE product_price SET regular_price = '$regular_price', sale_price = '$sale_price' WHERE Id = '$sale_id' ";
  $q = mysqli_query($con,$sqlK);
  die();
}
function discount($con, $discount, $sale_id, $sale_price){
    echo $sqlK = "UPDATE product_price SET discount = '$discount', sale_price = '$sale_price' WHERE Id = '$sale_id' ";
  $q = mysqli_query($con,$sqlK);
  die();
}
function unit_type($con, $unit_type, $sale_id){
  $sqlK = "UPDATE product_price SET unit_type = '$unit_type' WHERE Id = '$sale_id' ";
  $q = mysqli_query($con,$sqlK);
  die();
}
function productitemname($con, $productitemname, $order_id){
 $ex =  explode('__', $productitemname);
$productid = $ex [0];
 $query=mysqli_query($con,"select * from product where productid = '$productid' ") ;
 $res=mysqli_fetch_assoc($query);
 $querys=mysqli_query($con,"select * from product_price where productid = '$productid' ") ;
 $ress=mysqli_fetch_assoc($querys);

 //echo '<pre>';
 //print_r($res);
 // print_r($ress);
  $unit_type = $ress['unit_type'];
$unit_type=mysqli_query($con,"select * from measurement where measurementid = '$unit_type' ") ;
       $unittype=mysqli_fetch_assoc($unit_type);
       //print_r($unittype);
       $name = $unittype['name'];
       $unit = $ress['unit'].$name;
       $order_price = $ress['sale_price']*1;
    $details = array();
  $details['order_id']          = $order_id;
  $details['categoryid']          = $res['categoryid'];
  $details['productid']          = $res['productid'];
  $details['subcategoryid']           = $res['subcategoryid'];

  $details['unit']          = $unit;
  $details['sale_price']          = $ress['sale_price'];
  $details['regular_price']           = $ress['regular_price'];
  $details['qty']          = '1';
  $details['discount']          = $ress['discount'];
  $details['order_price']           = $order_price;

$fields='';
  foreach($details as $key=>$val)
    {
      if (!empty($fields))
        $fields .= ', ';
      $fields .= "$key = '$val'";
    }
   $queryk = "INSERT INTO `order_items` SET $fields";
   $q = mysqli_query($con,$queryk);
   $last_id = $con->insert_id;
$order_items=mysqli_query($con,"select * from order_items where id = '$last_id' ") ;
       $itemdata=mysqli_fetch_assoc($order_items);
       ?>
   <tr class="item new_row" data-order_item_id="<?php echo $itemdata['id'] ?>" id="orderitem_<?php echo $itemdata['id'] ?>">
    <td class="thumb">
      <div class="wc-order-item-thumbnail"><img width="150" height="150" src="http://iwwphp.info/gt/uploads/product_image/<?php echo $res['product_image'] ?>" ></div> 
    </td>

    <td>
    <a href="http://iwwphp.info/gt/admin/edit_product.php?productid<?php echo $res['productid'] ?>" class="wc-order-item-name"><?php echo $res['productname'] ?></a>
    <div class="wc-order-item-sku"><strong>SKU:</strong> <?php echo $res['sku'] ?></div>
    </td>
    <td>
    <select class="saleprices" name="salieprice" id="salieprice" >
    <?php
    $queryl=mysqli_query($con,"select * from product_price where productid = '$productid' ") ;
    while($resl=mysqli_fetch_assoc($queryl)){ 
      $unitk = $resl['unit'];
      $unit_typek = $resl['unit_type'];
      $sale_pricek = $resl['sale_price'];
       $unit_typek=mysqli_query($con,"select * from measurement where measurementid = '$unit_typek' ") ;
       $unittypek=mysqli_fetch_assoc($unit_typek);
       $namek = $unittypek['name'];
      ?>
      <option id="<?php echo $itemdata['id'] ?>" value="<?php echo $unitk.$namek.'__'.$sale_pricek?>"><?php echo $unitk.$namek.'__ ₹'.$sale_pricek?></option>
    <?php } ?>
    </select>
    </td>
    <td class="item_cost" width="1%" data-sort-value="<?php echo $itemdata['sale_price'] ?>">
    <div class="view">
      <span class="amount sale_price_<?php echo $itemdata['id'] ?>"><span class="currencySymbol">₹</span><?php echo $itemdata['sale_price'] ?></span>    </div>
    </td>   
    <td class="quantity" width="1%">
            <input style="width: 50px !important;" type="number" step="1" min="1" autocomplete="off" name="qty" placeholder="0" value="<?php echo $itemdata['qty'] ?>" data-qty="1" size="4" class="quantity quantity_<?php echo $itemdata['id'] ?>" id="<?php echo $itemdata['id'] ?>">

  </td>
    <td class="order_price_<?php echo $itemdata['id'] ?>" width="1%">
    <?php echo '₹'.$itemdata['order_price'] ?>
      
  </td> 
  <td >
    <i class="fa fa-close" onclick="itemdelete(<?php echo $itemdata['id'] ?>)"></i>
      
  </td> 
   </tr>
   <?php
}
function saleprices($con, $slaevalue, $item_id, $quantity){
 $queryl=mysqli_query($con,"select * from order_items where id = '$item_id' ") ;
  $resl=mysqli_fetch_assoc($queryl);
  //print_r($resl);
  $quantity = $resl['qty'];
 $xc =  explode('__', $slaevalue);
 $unit = $xc[0];
 $sale_price = $xc[1];
 $order_price =$sale_price*$quantity;
  $sqlK = "UPDATE order_items SET unit = '$unit', qty = '$quantity', order_price = '$order_price', sale_price = '$sale_price' WHERE id = '$item_id' ";   
  $q = mysqli_query($con,$sqlK);
  echo $order_price.'^^'.$sale_price;
}
function quantitys($con, $item_id, $quantity){
 //  $xc =  explode('__', $slaevalue);
 // $unit = $xc[0];
 // $sale_price = $xc[1];
   $queryl=mysqli_query($con,"select * from order_items where id = '$item_id' ") ;
  $resl=mysqli_fetch_assoc($queryl);
  $sale_price = $resl['sale_price'];
 $order_price =$sale_price*$quantity;
    $sqlK = "UPDATE order_items SET qty = '$quantity', order_price = '$order_price' WHERE id = '$item_id' ";
  $q = mysqli_query($con,$sqlK);
  echo $order_price.'^^'.$sale_price;
} 

function customeraddress($con, $customeraddress, $order_id){
  $ex =  explode('__', $customeraddress);
$cus_id = $ex [0];
 $query=mysqli_query($con,"SELECT * FROM customer WHERE cus_id = '$cus_id'") ;  
       // echo "SELECT * FROM product WHERE productname LIKE '%$term%' and isactive = 1";                  
       ?>
          <div class="col-md-12 col-lg-4">
              <div class="panel panel-default">

                <div class="panel-title">
                  Billing Address
                  <ul class="panel-tools">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                    <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
                  </ul>
                </div>

                    <div class="panel-body">
                      <div class="form-group " id="billing_address">
                          <label for="input2" class="form-label">Billing Address</label>
                          <?php if(mysqli_num_rows($query)>0)
                            { 
                              $res=mysqli_fetch_assoc($query);
                              //print_r($res);
                             // echo 'aaaa==='.$billing_address = $res['billing_address'];

                              ?>
                              <input  type="text" class="form-control billing_address" name="billing_address"  value="<?php echo $res['billing_address'] ?>" >
                          
                          <?php  } ?>
                        </div>
                    </div>
                </div>
              </div>
      <?php
      $querys=mysqli_query($con,"SELECT * FROM shipping_address WHERE cus_id = '$cus_id'") ;  ?>                 
       
            <div class="col-md-12 col-lg-4">
              <div class="panel panel-default">

                <div class="panel-title">
                  Shippng Address
                  <ul class="panel-tools">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                    <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
                  </ul>
                </div>

                    <div class="panel-body">
                      <div class="form-group " id="shipping_address">
                          <label for="input2" class="form-label">Shippng Address </label><br>
                       <div class="checkbox checkbox-inline">
                       <select class="selectpicker" name="shipping_address" id="shipping_address" >
                       <option value="">Shippng Address</option>
                       <?php
                     if(mysqli_num_rows($querys)>0)
                    { 
                      while($ress=mysqli_fetch_assoc($querys)){
                       $shipping_address =  $ress['address'];
            ?>

                       ?>
                      
                        <option value="<?php echo $shipping_address ?>"><?php echo $shipping_address ?></option>
                    
                        
                     <?php } } ?>
                     </select>
                     </div>
                          
                        </div>
                    </div>
                </div>
              </div>
         <?php 
}
function deleteitem($con, $item_id){
  $sql = "DELETE FROM order_items WHERE id=$item_id";

if ($con->query($sql) === TRUE) {
    echo "1";
} else {
    echo "Error deleting record: " . $con->error;
}
}
?>