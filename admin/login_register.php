<?php
require('connect.php');
session_start();

if(isset($_POST['login']))
{
    $query = "SELECT * FROM `register` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result = mysqli_query($con, $query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            
            // Check password
            if($_POST['password'] == $result_fetch['password']) // You should use password_verify here if passwords were hashed
            {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                header("location: home.php");
            }
            else
            {
                echo "
                <script>
                    alert('Incorrect password');
                    window.location.href='index.php';
                </script>";
            }
        }
        else
        {
            echo "
            <script>
                alert('Email/Username Not Registered');
                window.location.href='index.php';
            </script>";
        }
    }
    else
    {
        echo "
        <script>
            alert('Cannot Run Query');
            window.location.href='';
        </script>";       
    }
}
?>
