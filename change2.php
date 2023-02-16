<?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "tests";

  $product_id = $_POST['product_id'];
$price = $_POST['PRICE'];
$product_name = $_POST['PRODUCT_NAME'];
$type = $_POST['TYPE'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO product (product_id ,PRODUCT_NAME,PRICE, TYPE)
VALUES ('$product_id', '$product_name', '$price','$type')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>