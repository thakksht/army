
<?php
/*----- header ----*/
require_once ('topbar.php');
/*---------- Side bar -----*/


if(!empty($_POST["cat_id"])){
    //Fetch all state data
      $query =mysqli_query($con,"SELECT * FROM Brigade WHERE unitcategory='".$_POST['cat_id']."'");
      
      
      
    //  .$_POST['cat_id'])."'";
   //$query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
  //  $rowCount = $query->num_rows;
      $rowcount=mysqli_num_rows($query);
    //State option list
   // if($rowCount > 0){
    if(mysqli_num_rows($query)>0)
       {
        echo '<option name="catid" >Select cat</option>';
       // while($row = $query->fetch_assoc()){ 
              while($row=mysqli_fetch_assoc($query)){
                  
            echo '<option name="catid" value="'.$row['Brigade'].'">'.$row['Brigade'].'</option>';
        }
    }else{
        echo '<option value="">cat1 not available</option>';
    }
}elseif(!empty($_POST["v_id"])){
    //Fetch all city data
  //  $query1 = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
      $query1 =mysqli_query($con,"SELECT * FROM vehicle WHERE cat ='".$_POST['v_id']."'");
    //Count total number of rows
  //  $rowCount = $query->num_rows;
     $rowcount1=mysqli_num_rows($query1);
    //City option list
   // if($rowCount > 0){
    if(mysqli_num_rows($query1)>0)
       {
        echo '<option value="" >Select vehicle</option>';
         while($row1=mysqli_fetch_assoc($query1)){
    //    while($row = $query->fetch_assoc()){ 
            
            echo '<option value="'.$row1['vehicle'].'">'.$row1['vehicle'].'</option>';
        }
    }else{
        echo '<option value="">Cat not available</option>';
    }
}
elseif(!empty($_POST["vehicle_id"])){
    //Fetch all city data
  //  $query1 = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
      $query1 =mysqli_query($con,"SELECT * FROM recovery WHERE vehicle ='".$_POST['vehicle_id']."'");
    //Count total number of rows
  //  $rowCount = $query->num_rows;
     $rowcount1=mysqli_num_rows($query1);
    //City option list
   // if($rowCount > 0){
    if(mysqli_num_rows($query1)>0)
       {
        echo '<option value="">Select batch</option>';
         while($row1=mysqli_fetch_assoc($query1)){
    //    while($row = $query->fetch_assoc()){ 
            
            echo '<option value="'.$row1['batch'].'">'.$row1['batch'].'</option>';
        }
    }else{
        echo '<option value="">Cat not available</option>';
    }
}
?>
<?php

/*if(!empty($_POST["country_id"])){
    //Fetch all state data
    $query =mysqli_query($con,"SELECT * FROM vehicle WHERE Id = ".$_POST['country_id']);
    
    //Count total number of rows
  //  $rowCount = $query->num_rows;
    $rowcount=mysqli_num_rows($query);
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
         while($row=mysqli_fetch_assoc($query)){
       // while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['Id'].'">'.$row['cat'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
    //Fetch all city data
    $query = $db->query("SELECT * FROM vehicle WHERE Id = ".$_POST['state_id']);
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
         while($row=mysqli_fetch_assoc($query)){
            echo '<option value="'.$row['Id'].'">'.$row['Id'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}*/
?>