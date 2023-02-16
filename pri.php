<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    include "db_conn.php";

    if (
        isset($_POST['op']) && isset($_POST['np'])
        && isset($_POST['c_np'])
    ) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);


        $id = $_SESSION['id'];

        $sql = "SELECT O_ID
                FROM products WHERE 
                O_ID='$id' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {

            $sql_2 = "UPDATE O_ID
        	          SET price='$np'
        	          WHERE O_id='$id'";
            mysqli_query($conn, $sql_2);
            header("Location: change-password.php?success=Your password has been changed successfully");
            exit();

        } 

    }

}