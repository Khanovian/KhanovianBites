<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // Include your database connection code here
    require_once __DIR__ . "/database.php";
    if (!isset($_SESSION["user_id"])) {
      // Display a JavaScript prompt
      echo '<script>alert("Please log in first to access this page."); window.location.href = "signup.php";</script>';
      exit; // Stop further execution of the page
  }
  

    // Fetch user data from the database based on the session user_id
    $sql = "SELECT * FROM login WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    
    if ($result) {
        $user = $result->fetch_assoc();
    } else {
        die("Error fetching user data: " . $mysqli->error);
    }
}

include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user_id"])) {
  // Get the logged-in user's ID from the session
  $user_id = $_SESSION["user_id"];
  
  // Sanitize and validate form data
  $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $date = mysqli_real_escape_string($con, $_POST['date']);
  $departure = mysqli_real_escape_string($con, $_POST['departure']);
  $transport = mysqli_real_escape_string($con, $_POST['transport']);
  $adult = mysqli_real_escape_string($con, $_POST['adult']);
  $child = mysqli_real_escape_string($con, $_POST['child']);
 
 
  $reg = "INSERT INTO `register` (`user_id`, `fullname`, `city`, `date`, `departure`, `transport`, `adult`, `child`) VALUES ('$user_id', '$fullname', '$city', '$date', '$departure', '$transport', '$adult', '$child')";
   // You should hash the password before storing it in the database for security purposes.
   $sql = mysqli_query($con, $reg);

  header("location:bookings.php");
  exit();
}
?>
