<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'oceanbites');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user_id"])) {
    // Get the logged-in user's ID from the session
    $user_id = $_SESSION["user_id"];
    
    // Check which form was submitted based on the name attribute of the submit button
    if (isset($_POST["insert-into-cart"])) {
        $item_name = "";
        $item_price = 0;
        
        switch ($_POST["insert-into-cart"]) {
            case "phfp":
                $item_name = "Prawn And Haddock Fish Pie";
                $item_price = 75;
                break;
            case "ss":
                $item_name = "Shrimp Scampi";
                $item_price = 50;
                break;
            case "mspc":
                $item_name = "Mediterranean Seafood With Polenta Cubes";
                $item_price = 120;
                break;
            case "gltgb":
                $item_name = "Grilled Lobster Tails with Garlic Butter";
                $item_price = 115;
                break;
            case "coscr":
                $item_name = "Chipotle Orange Shrimp With Cilantro Rice";
                $item_price = 80;
                break;
            case "sfs":
                $item_name = "Spanish Fish Stew";
                $item_price = 95;
                break;
            case "gfs":
                $item_name = "Grilled Fish Steak";
                $item_price = 100;
                break;
            case "fcns":
                $item_name = "Fish Curry With Nigella Seeds";
                $item_price = 60;
                break;
            default:
                // Invalid form submission
                header("Location: index.php?error=Invalid%20form%20submission");
                exit;
        }

        // Use prepared statement to insert the item into the cart table along with the user ID
        $query = "INSERT INTO additems (id, user_id, name, price) VALUES (NULL, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "iss", $user_id, $item_name, $item_price);
        
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            header("location: cart.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
        
        mysqli_stmt_close($stmt);
    }
}
?>
<!-- Your HTML content and buttons here -->
