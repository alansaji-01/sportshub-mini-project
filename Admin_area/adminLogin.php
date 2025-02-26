<?php include('../externals/links.php'); include('../externals/connect.php'); include('../functions/common_functions.php'); 
    @session_start(); # means if the page is active only then the session will be active
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SportsHub</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Admin Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="admin" type="text" class="form-control" id="username" placeholder="Enter Admin username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="adminpass" type="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <button name="adminlog" type="submit" class="btn btn-custom btn-block">Login</button>
        </form>
    </div>
</body>
</html>

<?php
  if(isset($_REQUEST['adminlog'])){
    $ausername = $_REQUEST['admin'];
    $apassword = $_REQUEST['adminpass'];

    $q = "select * from admin_table where admin_name='$ausername' and password='$apassword'";
    $aresult = mysqli_query($con, $q);
    $rc = mysqli_num_rows($aresult);


    if($rc == 1){
        $row = mysqli_fetch_assoc($aresult);
        $_SESSION['admin'] = $ausername;  # assign the admin name to the sessions so we can access the name from anywhere in this folder
        echo "<script>alert('WELCOME ADMIN')</script>";
        echo "<script>window.open('adminind.php','_self');</script>";
    }else{
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>


<!-- ========>  ADMIN LOGOUT  <======== --> 
