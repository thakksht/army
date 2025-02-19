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
    <h1 class="title">Edit subcategory</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Edit subcategory</li>
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
      <span class="icon color9-bg"><i class="fa fa-subcategory"></i></span>
      <h1>Edit subcategory</h1>
    </div>

    

  </div>
  <!-- End Presentation -->
<?php
$subcategoryid = $_REQUEST['subcategoryid'];
if(isset($_POST['addsubmit']))
{
  $categoryid = $_POST['categoryid'];
  $subcategoryname = $_POST['subcategoryname'];
  $isactive = $_POST['isactive'];
  $sql = "UPDATE subcategory SET categoryid='$categoryid', subcategoryname='$subcategoryname', isactive='$isactive' WHERE subcategoryid = $subcategoryid";
  if ($con->query($sql) === TRUE) {
    echo '<script>alert("Update Successfully.");window.location.assign("manage_subcategory.php");</script>';
  }
  else{
      echo '<script>alert("please Update Again....");window.location.assign("edit_subcategory.php?subcategoryid='.$subcategoryid.'");</script>';
  }
  // $q = mysqli_query($con,"insert into subcategory (`categoryid`,`subcategoryname`,`isactive`) values('$categoryid','$subcategoryname','$isactive')");
  // if($q){
  //   echo '<script>alert("Add Successfully.");window.location.assign("manage_subcategory.php");</script>';
  // }
  // else{
  //     echo '<script>alert("please Add Again....");window.location.assign("add_subcategory.php");</script>';
  // }
}

/*----------get data --------*/

$query=mysqli_query($con,"select * from subcategory where subcategoryid = $subcategoryid ") ;                    
  if(mysqli_num_rows($query)>0)
  { 
  $res=mysqli_fetch_assoc($query);
$categoryid = $res['categoryid'];
$subcategoryname = $res['subcategoryname'];
$isactive = $res['isactive'];

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
          subcategory
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post" class="form-horizontal" >
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" name="categoryid" required>
                    <option value="">Category</option>
                    <?php
                    $query=mysqli_query($con,"select * from category where isactive = 1") ;                    
                    if(mysqli_num_rows($query)>0)
                   { 
                    while($res=mysqli_fetch_assoc($query)){
                      $categoryids =$res['categoryid'];
                      $categoryname =$res['categoryname'];
                      if($categoryid == $categoryids){ ?>
                        <option value="<?php echo $categoryids ?>" selected><?php echo $categoryname ?></option>
                    <?php   }
                      else{ ?>
                        <option value="<?php echo $categoryids ?>"><?php echo $categoryname ?></option>                      
                      
                   <?php }
                 } }
                    ?>
                     
                      </select>                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="subcategoryname" class="col-sm-2 control-label form-label">subcategory name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "subcategoryname" value="<?php echo $subcategoryname ?>" id="subcategoryname" required>
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
 <?php
/*---------- Footer ----------*/
require_once ('footer.php');
?>