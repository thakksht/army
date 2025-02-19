<?php
session_start();
include('php-includes/connect.php');



if (isset($_GET['term'])){
	$return_arr = array();
$term = $_GET['term'];
	try {
	    $query=mysqli_query($con,"SELECT * FROM customer WHERE username LIKE '%$term%'") ;  
       // echo "SELECT * FROM product WHERE productname LIKE '%$term%' and isactive = 1";                  
        if(mysqli_num_rows($query)>0)
        { 
            while($res=mysqli_fetch_assoc($query)){ 
                //print_r($res);
                $username = $res['cus_id'].'__'.$res['username'];
                $return_arr[] = $username ;
            }
        }
	    

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>