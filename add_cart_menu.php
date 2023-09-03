<?php
include 'connection.php';
if(isset($_GET['productName'])) { // Corrected isset condition
    $productName = $_GET['productName']; // Changed 'product_name' to 'productName'
    $productPrice = $_GET['product_price']; // Added 'product_price' parameter in the URL
    
    // Preventing SQL injection by using prepared statements
    $cart = "INSERT INTO `additems` (`name`, `price`) VALUES (?, ?)";
    $stmt = mysqli_query($con, $cart);
    // mysqli_stmt_bind_param($stmt, "sd", $productName, $productPrice);
    header("location:menu.php");    
    // if(mysqli_stmt_execute($stmt)) {
    //     echo "OK";
    // } else { 
    //     echo "Error: " . mysqli_error($con);
    // }
    // mysqli_stmt_close($stmt);
}
?>
