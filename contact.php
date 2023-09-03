<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace with your database credentials
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $massage = mysqli_real_escape_string($con, $_POST['massage']);
 
  
    
   


$reg = "INSERT INTO `contact` (`name`,`email`, `subject`,`massage`) VALUES ('$name', '$email','$subject','$massage')";



// You should hash the password before storing it in the database for security purposes.
$sql = mysqli_query($con, $reg);

header("location:contact1.php");


}
?>