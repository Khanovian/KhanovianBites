<?php
// Database credentials
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "oceanbites";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Prepare a DELETE statement with a parameter
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id); // "i" indicates an integer

    if ($stmt->execute()) {
        echo "Product deleted successfully.";
        
    } else {
        echo "Error deleting product.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
