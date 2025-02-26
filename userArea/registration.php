<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/registration.css">
    <?php include('../functions/common_functions.php'); include('../externals/connect.php'); include('../externals/links.php'); ?>
    <?php
   if(isset($_REQUEST['register'])){
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);  # password hashing 
    $conpassword = $_REQUEST['conpassword'];
    $address = $_REQUEST['address'];
    $contact = $_REQUEST['contact'];
    $userip = getIPAddress();

    # if the username is unique, if it is not then the user cant use the username
    
    $q1 = "select * from usertable where username='$username' or email='$email'";
    $result1 = mysqli_query($con, $q1);
    if($result1->num_rows>0){
        echo "<script>alert('$username or $email already exists');</script>";
    }else if($password != $conpassword){
        # if the password and confirm password are same then the user can use the password and confirm password
        echo "<script>alert('Password and Confirm Password are not same');</script>";
    }else{
        $q2 = "insert into usertable (username,email,password,userip,address,phone) values('$username','$email','$hashpassword','$userip','$address','$contact');";
        $result2 = mysqli_query($con, $q2);
        if($result2){
            header('location:userlogin.php');
        }

    }
    // selecting cart items and notify the user that he has products in his cart
    /* some mistakes
    $q3 = "select * from cart_details where ip_address = '$userip'";
    $result3 = mysqli_query($con, $q3);
    $rc = mysqli_num_rows($result3);
    if($rc>0){
        $_SESSION['username'] = $username;
        echo "<script>alert('You have products in your cart');</script>";
        echo "<script>window.open('checkout.php','_self');</script>";
    }else{
        echo "<script>window.open('../mhome.php','_self');</script>";
    }
    
   */
   }
?>
</head>
<body>
    <div class="container">
        <h1 class='text-center my-3'>Journey with SportsHub</h1>
            <!--  <div class="row d-flex align-items-center justify-content-center">   -->
            <div class="form-container">
                <form method="post">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username"  placeholder="Enter Username" autocomplete="off" required name="username">  <!-- class="form-control mb-4"  -->
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email"  placeholder="Enter E-mail" autocomplete="off" required name="email">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password"  placeholder="Enter Password" autocomplete="off" required name="password">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="conpassword" class="form-label">Password</label>
                        <input type="password" id="conpassword"  placeholder="Confirm Password" autocomplete="off" required name="conpassword">
                    </div>
                    <!-- Address -->
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address"  placeholder="Enter Address" autocomplete="off" required name="address">
                    </div>
                    <!-- Contact -->
                    <div class="form-group">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" id="contact"  placeholder="Enter Phone.no" autocomplete="off" required name="contact">
                    </div>
                    <div >
                        <input type="submit" class="btn btn-outline-primary" name="register" value="Register">    <!-- class="btn btn-info py-2 px-3"    ,btn btn-outline-primary,mt-4 pt-2 -->
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="userlogin.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</body>
</html>
