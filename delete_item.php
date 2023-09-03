<?php
$con = mysqli_connect("localhost:3307", "root", "", "oceanbites");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $itemId = $_POST['id'];

    // Perform the delete query here based on the provided item ID
    $deleteQuery = "DELETE FROM `additems` WHERE `id` = $itemId";
    $result = mysqli_query($con, $deleteQuery);

    if ($result) {
        echo "<script>alert('DATA DELETED SUCCESSFULLY')</script>";
    } else {
        echo "Failed to delete item.";
    }
    include 'cart.php';
}
?>
