<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    include "db_conn.php";

if (isset($_POST['O_ID']) && isset($_POST['price'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$O_ID = validate($_POST['O_ID']);
	$price = validate($_POST['price']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($O_ID)){
      header("Location: price_updt.php?error=Old Password is required");
	  exit();
    }else if(empty($price)){
      header("Location: price_updt.php?error=New Password is required");
	  exit();
    }else if($price !== $c_np){
      header("Location: price_updt.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	// $O_ID = md5($O_ID);
    	// $price = md5($price);
        $id = $_SESSION['O_ID'];

        $sql = "SELECT O_ID
                FROM product WHERE 
                O_ID='$id' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE O_ID
        	          SET price='$price'
        	          WHERE O_id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: price_updt.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: price_updt.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: price_updt.php");
	exit();
}

}else{
     header("Location: price_updt.php");
     exit();
}