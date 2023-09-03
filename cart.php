<?php
session_start();

include 'connection.php';
    
require_once __DIR__ . "/database.php";
// Assuming you have stored the user's id in the session
$user_id = $_SESSION["user_id"] ?? null; // Use null coalescing operator to handle the case of no user_id
// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // User is logged in, fetch user data
    $sql = "SELECT * FROM user_register WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    
    if ($result) {
        $user = $result->fetch_assoc();
    } else {
        die("Error fetching user data: " . $mysqli->error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ocean Bites - Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>/* styles.css */

/* Reset default button styles */
button {
  padding: 0;
  background-color: transparent;
  border: none;
  cursor: pointer;
}

/* Styling for the delete button */
.delete-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ff0000; /* Red background color */
  color: #fff; /* Text color: white */
  border-radius: 4px;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Hover effect */
.delete-button:hover {
  background-color: #cc0000; /* Darker red on hover */
}
</style>
</head>

<body>
  

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            
        <?php
        include 'nav.php';
        ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                                            </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->




        <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Change Status</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if ($user_id) {
        $con = mysqli_connect("localhost", "root", "", "oceanbites");

        if (!$con) {
            echo "Connection Error: " . mysqli_connect_error();
            exit;
        }

        $fetch = "SELECT * FROM `additems` WHERE user_id = '$user_id'";
        $sql = mysqli_query($con, $fetch);

        if (!$sql) {
            echo "Query Error: " . mysqli_error($con);
            exit;
        }

        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
                echo "
                    <tr>
                        <td>" . $name . "</td>
                        <td>" . $price . "</td>
                        <td>
                            <form method='post' action='delete_item.php'>
                                <input type='hidden' name='id' value='" . $id . "'>
                                <button type='submit' class='delete-button'>Delete</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No items found in the cart.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Please log in to view your cart.</td></tr>";
    }
    ?>
</tbody>
    </table>











        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="about.html">About Us</a>
                        <a class="btn btn-link" href="contact.html">Contact Us</a>
                        <a class="btn btn-link" href="index.html">Reservation</a>
                        <a class="btn btn-link" href="contact.html">Privacy Policy</a>
                        <a class="btn btn-link" href="contact.html">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Clifton Karachi</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>03022025258</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Ocean Bites</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">Aptech</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-info btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>