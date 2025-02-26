<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Login</title>
    <?php include('../externals/links.php'); include('../externals/connect.php'); include('../functions/common_functions.php'); 
    @session_start(); # means if the page is active only then the session will be active
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href='../css/login.css'>
</head>
<body>
<div class="container">
        <h1 class="title">Welcome back to SportsHub</h1>
        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-input" placeholder="Enter Username" autocomplete="off" required name="username">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-input" placeholder="Enter Password" autocomplete="off" required name="password">
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn" name="login" value="Login">
                    <p class="register-link">Don't have an account? <a href="registration.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>Products</h3>
                <ul>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Outlet Sale</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Special Offers</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Store Finder</a></li>
                    <li><a href="#">Club</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Company Info</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="../Admin_area/adminLogin.php">Admin</a></li>
                    <li><a href="#">Entity Details</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a> | <a href="#">Cookies</a><br>
            ©2024 SportsHub India Marketing Pvt. Ltd.
        </div>
    </footer>
</body>
</html>

<?php
  if(isset($_REQUEST['login'])){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $userip = getIPAddress();

    // fetching username to check passwords are matching if the user is exists
    $q = "select * from usertable where username='$username'";
    $result = mysqli_query($con, $q);
    $rc = mysqli_num_rows($result);

    // fetching cart, if the user has added items in the cart he will redirect to the checkout page, else to home page

    $q1 = "select * from cart_details where ip_address = '$userip'";
    $result1 = mysqli_query($con, $q1);
    $crc = mysqli_num_rows($result1);



    if($rc > 0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){
            $_SESSION['username'] = $username;
            if($rc == 1 and $crc == 0){  # if the user is exist and there is no product in the cart 
                $_SESSION['username'] = $username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('profile.php','_self');</script>";
            }else{ # if the user is exist and there is product/products in the cart 
                echo "<script>alert('Login Successfully')</script>";
                $_SESSION['username'] = $username;
                echo "<script>window.open('payment.php','_self');</script>";
            }
        }else{
            echo "<script>alert('Invalid username or password')</script>";
        }

    }else{
        echo "<script>alert('Invalid username or password')</script>";
    }
  }
?>