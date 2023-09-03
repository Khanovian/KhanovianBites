<?php
$is_invalid = false;
$error_message = "";

$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["login"])) {
        // Login logic
        $sql = sprintf("SELECT * FROM user_register  WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user && password_verify($_POST["password"], $user["password"])) {
            session_start();  
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];

            // Redirect to the appropriate location after successful login
            header("Location: index.php"); // Make sure this is the correct path
            exit;
        } else {
            $is_invalid = true;
            $error_message = "Invalid email or password";
        }
    } 
}
?>

