<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - User Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <!-- Include common elements -->
    <?php include('../externals/links.php'); include('../externals/connect.php'); include('../functions/common_functions.php'); session_start(); ?>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../mhome.php"><img height="50px" src="../Images/sportsHubLogo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../mhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../display_all_products.php">Products</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Contact</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cartCount(); ?></sup></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../searched_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="item-search">
                        <input type="submit" class="btn btn-outline-success" value="Search" name="search">
                    </form>
                    <div>
                        <?php
                            if (!isset($_SESSION['username'])) {
                                echo "<a href='./userArea/userlogin.php' class='btn btn-warning m-2'>Login</a>";
                            } else {
                                echo "<a href='logout.php' class='btn btn-danger m-2'>Logout</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h2>User Dashboard</h2><br>
        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <div class="dashboard-sidebar col-md-2">
            <ul>
                <li><a href="profile.php">Pending Orders</a></li>
                <li><a href="profile.php?editac">Account Settings</a></li>
                <li><a href="profile.php?myorder">My Orders</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="profile.php?deleteac">Delete Account</a></li>
            </ul>
        </div>
        <div class="dashboard-main col-md-10 text-center">
            <?php getUserOders();
              if(isset($_GET['editac'])){
                include('editaccount.php');
              }
              if(isset($_GET['myorder'])){
                include('userOrders.php');
              }
              if(isset($_GET['deleteac'])){
                include('deleteUserAc.php');
              }
            ?>
        </div>
    </div>

</body>
</html>
