    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace with your database credentials
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $no = mysqli_real_escape_string($con, $_POST['no']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
  
    
   


$reg = "INSERT INTO `booking` (`name`,`email`, `date`, `no`,`message`) VALUES ('$name', '$email', '$date','$no','$message')";



// You should hash the password before storing it in the database for security purposes.
$sql = mysqli_query($con, $reg);

header("location:booking.php");


}
?>
