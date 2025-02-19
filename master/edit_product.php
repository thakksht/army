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
    <h1 class="title">Edit Product</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit Product</li>
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
</style>
  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color9-bg"><i class="fa fa-building"></i></span>
      <h1>Edit product</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$productid = $_REQUEST['productid'];
if(isset($_POST['addsubmit']))
{

   $number = count($_POST['unit']);
   $qs = '';
   for ($i=0, $k=0 ; $i<$number; $i++)
 {
    $show_prices =$_POST['show_price'][$i];
    if($show_prices == '')
    {
      $show_price = 0;
    }
    else{
      $show_price = $show_prices;
    }
    $unit = $_POST['unit'][$i];
    $unit_type = $_POST['unit_type'][$i];
    $sale_price = $_POST['sale_price'][$i];
    $regular_price = $_POST['regular_price'][$i];
    $discount = $_POST['discount'][$i];
    $Id = $_POST['Id'][$i];
    if(!empty($Id)){
     $sqlK = "UPDATE product_price SET show_price='$show_price',unit='$unit',unit_type='$unit_type',sale_price='$sale_price',regular_price='$regular_price',discount='$discount' WHERE Id=$Id";

if ($con->query($sqlK) === TRUE) {
   // echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
}

    }
    else{
 $sql = "INSERT INTO product_price (productid, show_price, unit, unit_type, sale_price, regular_price, discount)
VALUES ('$productid', '$show_price', '$unit', '$unit_type', '$sale_price', '$regular_price', '$discount')";

if ($con->query($sql) === TRUE) {
  $qs = '1';
    //$last_id = $con->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    //echo "Error: " . $sql . "<br>" . $con->error;
}
}  
 }


  $details = array();

  $details['categoryid']          = $_POST['categoryid'];

  $details['brandid']          = $_POST['brandid'];

  $details['productname']        = $_POST['productname'];

  $details['subcategoryid']           = $_POST['subcategoryid'];

  $details['more_info']            = $_POST['more_info'];

  $details['isactive']           = $_POST['isactive'];


  if($_FILES['product_image']['name']) {
    $error=array();
    $imges = '';
      $extension=array("jpeg","jpg","png","gif");
      foreach($_FILES["product_image"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["product_image"]["name"][$key];
               // print_r($file_name);

                $file_tmp=$_FILES["product_image"]["tmp_name"][$key];
                $imgs .= $file_name.'^^';                
                move_uploaded_file($file_tmp, "../uploads/product_image/".$file_name);
                
            }
           $imges = $imgs;
           $galery = rtrim($imges,"^^");
          
            $details['product_image']    = $galery;
          
        }
        //  if($_POST['show_price']) {
        //  $error=array();
        //   $show_price = '';
        // foreach($_POST["show_price"] as $file_nameasp)
        //     {
        //       if($file_nameasp == '')
        //       {

        //         $file_nameas = '0';                
        //       }
        //       else{
        //         $file_nameas = $file_nameasp;
        //       }
        //       $show_price .= $file_nameas.'^^';
        //     }
        //    $show_price = $show_price;
        //    $show_price = rtrim($show_price,"^^");
          
        //     $details['show_price']    = $show_price;
          
        // }

        // if($_POST['unit']) {
        //  $error=array();
        //   $unit = '';
        // foreach($_POST["unit"] as $file_namea)
        //     {
        //         $unit .= $file_namea.'^^';                
        //     }
        //    $unit = $unit;
        //    $unit = rtrim($unit,"^^");
          
        //     $details['unit']    = $unit;
          
        // }
        // if($_POST['sale_price']) {
        //  $error=array();
        //   $sale_price = '';
        // foreach($_POST["sale_price"] as $file_namek)
        //     {
        //         $sale_price .= $file_namek.'^^';                
        //     }
        //    $sale_price = $sale_price;
        //    $sale_price = rtrim($sale_price,"^^");
          
        //     $details['sale_price']    = $sale_price;
          
        // }
        // if($_POST['regular_price']) {
        //  $error=array();
        //   $regular_price = '';
        // foreach($_POST["regular_price"] as $regular_pricek)
        //     {
        //         $regular_price .= $regular_pricek.'^^';                
        //     }
        //    $regular_price = $regular_price;
        //    $regular_price = rtrim($regular_price,"^^");
          
        //     $details['regular_price']    = $regular_price;
          
        // }

        //   if($_POST['discount']) {
        //  $error=array();
        //   $discount = '';
        // foreach($_POST["discount"] as $file_namepa)
        //     {
        //         $discount .= $file_namepa.'^^';                
        //     }
        //    $discount = $discount;
        //    $discount = rtrim($discount,"^^");
          
        //     $details['discount']    = $discount;
          
        // }
        $fields='';
    foreach($details as $key=>$val)
    {
      if (!empty($fields))
        $fields .= ', ';
      $fields .= "$key = '$val'";
    }
   $query = "UPDATE `product` SET $fields WHERE productid = '$productid' ";
   $q = mysqli_query($con,$query);
  // die('hmmm');
   if($q){
    echo '<script>alert("Update Successfully.");window.location.assign("manage_product.php");</script>';
   //	echo '<script>alert("Add Successfully.");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("edit_product.php?productid'.$productid.'");</script>';
  }
}
 //echo "select * from product where productid = $productid "; 
$query=mysqli_query($con,"select * from product where productid = $productid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
  // echo '<pre>';
  // print_r($res);
 $categoryid          = $res['categoryid'];
  $brandid          = $res['brandid'];
  $productname        = $res['productname'];
  $more_info           = $res['more_info'];
  $subcategoryid             = $res['subcategoryid'];
  $isactive           = $res['isactive'];
  $product_image           = $res['product_image'];
  $unit           = $res['unit'];
  $sale_price           = $res['sale_price'];

  $regular_price           = $res['regular_price'];
  $discount           = $res['discount'];
  $show_price           = $res['show_price'];

  }
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">

<form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
  
  <!-- Start Row -->
  <div class="row">

<!-- layout -->

    <div class="col-md-12 col-lg-6">
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
              <div class="form-group">
                  <label for="input2" class="form-label">product Name</label>
                  <input type="text" class="form-control" name="productname" id="input2" value="<?php echo $productname ?>">
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">Product Image</label>
                  <input type="file" class="form-control" name="product_image[]" id="input2" multiple="multiple" >
              </div>
              
              

            </div>

      </div>
    </div>
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">

        <div class="panel-title">
          Category / Brand
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
             <div class="form-group">
             <div class="col-md-12 col-lg-6">
                  <label for="input1" class="form-label">Category</label><br>
                    <select class="selectpicker" name="categoryid" id="categoryid" required onchange="myFunction()">
                    <option value="">Category</option>
                    <?php
                    $query=mysqli_query($con,"select * from category where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $categoryida =$res['categoryid'];
                      $categoryname =$res['categoryname'];
                      if($categoryida == $categoryid){ ?>
                      <option value="<?php echo $categoryida ?>" selected ><?php echo $categoryname ?></option>
                     <?php } else{ ?>
                     <option value="<?php echo $categoryida ?>"><?php echo $categoryname ?></option>
                     <?php }
                      ?>
                   <?php }
                 }
                    ?>
                     
                      </select> 
                </div>
                 <div class="col-md-12 col-lg-6">
                  <label for="input1" class="form-label">Brand</label><br>

                  <select class="selectpicker" name="brandid" required>
                    <option value="">Brand</option>
                    <?php
                  $query=mysqli_query($con,"select * from brand where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                       $brandida =$res['brandid'];
                      $brandname =$res['brandname'];
                      if($brandida == $brandid){ ?>
                        <option value="<?php echo $brandida ?>" selected ><?php echo $brandname ?></option>
                     <?php  } else{ ?>
                      <option value="<?php echo $brandida ?>"><?php echo $brandname ?></option>
                   <?php  }
                      ?>
                      
                   <?php }
                 }
                    ?>
                     
                      </select> 

                </div>
              </div>
                 <div class="form-group" id="tagvalue">
                 <div class="col-md-12 col-lg-12">
                  <label for="input2" class="form-label">Sub Category </label><br>
                       <div class="checkbox checkbox-inline">
                     <select class="selectpicker" name="subcategoryid" id="subcategoryid" >
                       <option value="">Sub Category</option>
                       <?php
                       $query=mysqli_query($con,"select * from subcategory where isactive = 1 and subcategoryid = '$subcategoryid' ") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){ 
                      $subcategoryids = $res['subcategoryid'];
                      $subcategoryname = $res['subcategoryname'];
                      if($subcategoryids == $subcategoryid){ ?>
                        <option value="<?php echo $subcategoryid ?>" selected ><?php echo $subcategoryname ?></option>
                     <?php  } else{
                       ?>
                      
                        <option value="<?php echo $subcategoryid ?>"><?php echo $subcategoryname ?></option>                    
                        
                     <?php }
                   }
                   }

                     ?></select></div></div></div>
          
            
                

            </div>

      </div>
    </div>
  </div>
  <div class="row">
    

     <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">

        <div class="panel-title">
          More Information
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <div class="form-group">
                  <label for="input2" class="form-label">More Information</label>
                  <textarea class="form-control" rows="3" id="summernote" name="more_info" placeholder="Long Description..."><?php echo $more_info ?></textarea>                     
              </div>

            </div>
            <div class="form-group">
                  <label for="input2" class="form-label">IsActive </label><br>
                  <div class="checkbox checkbox-inline">
                   <?php if($isactive == 1){ ?>
                    <input type="checkbox" class="" id="inlineCheckbox12a" name = "isactive" value="1" checked >
                      <?php  } else{ ?>
                      <input type="checkbox" class="" id="inlineCheckbox12a" name = "isactive" value="1" >
                      <?php } ?>
                    <label for="inlineCheckbox12a"> IsActive </label>
                  </div>
                </div>
      </div>
    </div>
     <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">

        <div class="panel-title">
          Prices Unit Discount
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
            
                <div class="form-group" id="dynamic_field_price">
                  <label for="input2" class="form-label">Unit & Price & Sate Price &Discount</label><br>
                  <?php
                  // $unith = explode('^^', $unit);
                  // $sale_priceh = explode('^^', $sale_price);
                  // $regular_priceh = explode('^^', $regular_price);
                  // $discounth = explode('^^', $discount);
                  // $show_priceh = explode('^^', $show_price);
                    $queryunit=mysqli_query($con,"select * from product_price where productid = $productid") ;                    
                   
                    while($resunit=mysqli_fetch_assoc($queryunit)){ 
                  //foreach($unith as $key=> $val){
                  ?>
                  <div class="col-md-12 col-lg-1">
                  <?php
                  if($resunit['show_price'] == 1){ ?>
                  <input type="radio" name="show_price[]" id="radio3" value="1" checked>
                  <?php } else{ ?>
                  <input type="radio" name="show_price[]" id="radio3" value="1">
                 <?php } ?>
                        
                    </div>
                  <div class="col-md-12 col-lg-2">
                  <input type="text" class="form-control" name="unit[]" id="input2" placeholder="Unit " required value="<?php echo $resunit['unit'] ?>" ></div>
                  <div class="col-md-12 col-lg-2">
                  <select class="" name="unit_type[]" required>
                    <?php
                  $queryk=mysqli_query($con,"select * from measurement where isactive = 1") ;                    
                    if(mysqli_num_rows($queryk)>0)
                   { 
                    while($resk=mysqli_fetch_assoc($queryk)){
                       $measurementidh =$resk['measurementid'];
                      $name =$resk['name'];
                      if($measurementidh == $resunit['unit_type']){ ?>
                        <option value="<?php echo $measurementidh ?>" selected ><?php echo $name ?></option>
                     <?php  } else{ ?>
                      <option value="<?php echo $measurementidh ?>"><?php echo $name ?></option>
                   <?php  }
                      ?>
                      
                   <?php }
                 }
                    ?>
                     
                      </select> 

                </div>
                  <div class="col-md-12 col-lg-2">
                  <input type="text" class="form-control sale_price_<?php echo $resunit['Id'] ?>" name="sale_price[]" id="<?php echo $resunit['Id'] ?>" placeholder="S.P" readonly required value="<?php echo $resunit['sale_price'] ?>" ></div>
                  <div class="col-md-12 col-lg-3">
                  <input type="text" class="form-control regular_price regular_price_<?php echo $resunit['Id'] ?>" name="regular_price[]" id="<?php echo $resunit['Id'] ?>" placeholder="R.P " required value="<?php echo $resunit['regular_price'] ?>" ></div>
                  <div class="col-md-12 col-lg-2">
                  
                  <input type="text" class="form-control discount discount_<?php echo $resunit['Id'] ?>" name="discount[]" id="<?php echo $resunit['Id'] ?>" placeholder="discount " value="<?php echo $resunit['discount'] ?>" required style=" float: left;width: 85%;margin-bottom: 15px;"></div>
                  <input type="hidden" name="Id[]" value="<?php echo $resunit['Id'] ?>">
                  <?php } ?>
                  <div class="col-md-12 col-lg-1"><button type="button" name="add" id="add_price" class="btn btn-success" style="margin-bottom: 15px;"> Add </button></div><br>
              </div>
            

            </div>

      </div>
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
<!-- END CONTAINER -->
<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<!-- <script src="js/bootstrap/bootstrap.min.js"></script> -->

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

<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-NHJVIB1M0rZR58Wpc8Dwljxuk5j0tb4&libraries=places&callback=initService"
    async defer></script>
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
 $(document).ready(function() {      

      var k = 6;
      $("#add_price").click(function(){
        k++;
              $.ajax({
    type: "GET", 
    url: "getmeasurement.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: '', // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
  $("#dynamic_field_price").append('<div style="clear: both;" id="inputk_price'+k+'"><div class="col-md-12 col-lg-1"><input type="radio" name="show_price[]" id="radio3" value="1"></div><div class="col-md-12 col-lg-2"><input type="text" class="form-control" name="unit[]" id="input2" placeholder="Unit " required ></div><div class="col-md-12 col-lg-2">'+data+'</div><div class="col-md-12 col-lg-2"><input type="text" class="form-control sale_price_'+k+'" name="sale_price[]" id="'+k+'" readonly placeholder="S.P 1 " required ></div><div class="col-md-12 col-lg-2"><input type="text" class="form-control regular_price regular_price_'+k+'" name="regular_price[]" id="'+k+'" placeholder="R.P " required ></div><div class="col-md-12 col-lg-2"><input type="text" class="form-control discount discount_'+k+'" name="discount[]" id="'+k+'" placeholder="discount " required style=" float: left;margin-bottom: 15px;"></div><div class="col-md-12 col-lg-1"><button name="remove" id="'+k+'" class="btn btn-danger btn_remove_price" style="margin-bottom: 15px;"> X </button></div></div>');
   }
  });
      });


      $(document).on('click', '.btn_remove_price', function(){
        var button_id = $(this).attr("id");
        $('#inputk_price'+button_id+'').remove();
      });
});

$(document).on('keyup', '.regular_price', function(){
    var regular_price = $(this).val();
    var sale_id = $(this).attr('id');
     var discount = ".discount_"+sale_id;
    var seg = ".sale_price_"+sale_id;
    //sale_price_16
    //alert(regular_price);
     var a=Number(regular_price);  
  var b=Number($(discount).val());
    var c=a-(Number(a)*Number(b)/100);
   $(seg).val(c);
    });
$(document).on('keyup', '.discount', function(){

     //document.getElementById("net").value=c;  
    var discount = $(this).val();
    var sale_id = $(this).attr('id');
    var reg = ".regular_price_"+sale_id;
    var seg = ".sale_price_"+sale_id;
    //sale_price_16
     var a=Number($(reg).val());  
  var b=Number(discount);
    var c=a-(Number(a)*Number(b)/100);
   $(seg).val(c);
    });



 function myFunction() {
    var categoryid = document.getElementById("categoryid").value;
   // alert(categoryid);
    
           var formData = {
              categoryid: categoryid,
          };
  $.ajax({
    type: "GET", 
    url: "tagvalue.php", // Url to which the request is send
               // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    // contentType: false,       // The content type used when sending data to the server.
    // cache: false,             // To unable request pages to be cached
    // processData:false,        // To send DOMDocument or non processed data file it is set to false

      success: function(data)   // A function to be called if request succeeds
      {
          $("#tagvalue").html(data);
    }
  });
}
</script>
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>