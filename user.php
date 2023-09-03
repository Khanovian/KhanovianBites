<?php
$is_invalid = false;
$error_message = "";
$is_logged_in = false; // Initialize the flag for successful login

$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["login"])) {
        // Login logic
        $sql = sprintf("SELECT * FROM user_register  WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user && password_verify($_POST["password"], $user["password"])) {
            $is_logged_in = true; // Set flag for successful login
            session_start();  
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            
            // Display a simple alert when login is successful
            echo '<script>alert("Login successful!"); window.location.href = "index.php";</script>';
            exit;
        } else {
            $is_invalid = true;
            $error_message = "Invalid email or password";
        }
    } 
}
?>







<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="cssuser/style.css">

	</head>
	<body>
    <style>
	body {
		background-image: url("img/bgimg.jpg")
    
	}

</style>
	<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ... Your other HTML content ... -->
            <div class="col-md-7 col-lg-5">
                <div class="wrap">  
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                        </div>
                        <form action="user.php" method="post">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="email" required>
                                <label class="form-control-placeholder" for="email_username">Email</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="password" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                            </div>
							<?php if ($is_invalid): ?>
    <div class="form-group text-center">
        <p class="text-danger"><?php echo $error_message; ?></p>
    </div>
<?php endif; ?>

<?php if ($is_logged_in): ?>
    <div class="form-group text-center">
        <p class="text-success">Login successful! Welcome back.</p>
    </div>
    <script>
        // Display a JavaScript prompt after successful login
        var user = prompt("Welcome back! What would you like to do?");
        // You can use the 'user' value for further actions
    </script>
<?php endif; ?>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="forget.php">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Not a member? <a href="register.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

