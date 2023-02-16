
<!-- PHP code to establish connection with the localserver -->
<?php


// $product_id = $_POST['product_id'];
// $price = $_POST['PRICE'];

// // Username is root
// $user = 'root';
// $password = '';

// // Database name is geeksforgeeks
// $database = 'tests';

// Server is localhost with
// port number 3306
// $servername='localhost';
// $mysqli = new mysqli($servername, $user,
// 				$password, $database);

// // Checking for connections
// if ($mysqli->connect_error) {
// 	die('Connect Error (' .
// 	$mysqli->connect_errno . ') '.
// 	$mysqli->connect_error);
// }

// // SQL query to select data from database
// $sql = " update products set price=$price where product_id=$product_id ";
// $result = $mysqli->query($sql);
// $mysqli->close();
// echo"hi";






	// $conn = new mysqli('localhost','root','','tests');
	// if($conn->connect_error){
	// 	echo "$conn->connect_error";
	// 	die("Connection Failed : ". $conn->connect_error);
	// } 
	// else {
	// 	$stmt = $conn->prepare("update product set PRICE=$price where product_id=$product_id");
	// 	// $stmt->bind_param("ss", ,);
	// 	// $execval = $stmt->execute();
	// 	// echo " Registration successfully... ";
	// 	// $stmt->close();
	// 	// $conn->close();
	// }

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tests";

    $product_id = $_POST['product_id'];
$price = $_POST['PRICE'];
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "UPDATE product SET price='$price' WHERE product_id='$product_id' ";
    
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    ?>
