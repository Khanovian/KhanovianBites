<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription']; 
    // $productPicture = $_POST['productPicture'];
    $addProduct = "INSERT INTO `PRODUCTS` (`product_name`,`product_price`,`product_desc`) VALUES ('$productName','$productPrice','$productDescription')";
    $inserted = mysqli_query($con, $addProduct);
    if($inserted){
        echo "<script>alert('Submitted')</script>";
    }
    else{
        echo "Could not submit";
    }    
}
else{
    echo "jahsgdjhad";
}


?>

