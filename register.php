<?php
require('connection.php');

if(isset($_POST['register']))
{
    $user_exist_query = "SELECT * FROM `user_register` WHERE `username`='" . $_POST['username'] . "' OR `email`='" . $_POST['email'] . "'";
    $result = mysqli_query($con, $user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['username'] == $_POST['username'])
            {
                echo "
                <script>
                    alert('$result_fetch[username] - username already taken');
                    window.location.href='login.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                    alert('$result_fetch[email] - Email Address already registered');
                    window.location.href='login.php';
                </script>";
            }
        }
        else
        {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "INSERT INTO `user_register`(`username`, `email`, `password`) VALUES ('$_POST[username]','$_POST[email]','$password')";
            if(mysqli_query($con, $query))
            {
                echo "
                <script>
                    alert('Registration successful');
                    window.location.href='user.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                    alert('Cannot Run Query');
                    window.location.href='user.php';
                </script>";
            }
        }
    }
    else
    {
        echo "
        <script>
            alert('Cannot Run Query');
            window.location.href='user.php';
        </script>";
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
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Register</h3>
                            </div>
                        </div>
                        <form action="register.php" method="POST">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="username" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="email" required>
                                <label class="form-control-placeholder" for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="password" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">Sign up</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="forget.html">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Already a member? <a href="user.php">Login</a></p>
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
