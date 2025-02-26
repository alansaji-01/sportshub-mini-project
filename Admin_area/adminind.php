<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/adminind.css">
</head>
<style>
    body{
    overflow-x: hidden;
}
.productImg{
    width: 100px;
    object-fit: contain;
}

</style>
<body>
    <?php
    # if the admin is not logged execution will redirect to Admin login page. 
      session_start(); 
      if (!isset($_SESSION['admin'])) {
        header('Location: adminLogin.php');
        exit(); 
    }
       include('../externals/links.php'); 
       include('../functions/common_functions.php'); 
       include('../externals/connect.php'); 
     ?>


    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../Images/sportsHubLogo.png" class="logo">
                <h3 class='text-white'>SportsHub - Admin</h3>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
          if(!isset($_SESSION['admin'])){
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Welcome ". $_SESSION['admin']."</a>
        </li>";
          }
        ?>
                    <ul>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h1 class="text-center p2">Manage Details</h1>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary  p-3">
                <div class="button text-center">
                    <button><a href="insert_product.php" class="text-center bg-info nav-link p-1 my-1">Insert Product</a></button>
                    <button><a href="adminind.php?viewproducts" class="text-center bg-info nav-link p-1 my-1">View Product</a></button>
                    <button><a href="adminind.php?salesandstock" class="text-center bg-info nav-link p-1 my-1">Sales & stock</a></button>
                    <button><a href="adminind.php?insert_categories" class="text-center bg-info nav-link p-1 my-1">Insert Category</a></button>
                    <button><a href="adminind.php?viewcat" class="text-center bg-info nav-link p-1 my-1">View Category</a></button>
                    <button><a href="adminind.php?insert_theme" class="text-center bg-info nav-link p-1 my-1">Insert Theme</a></button>
                    <button><a href="adminind.php?viewtheme" class="text-center bg-info nav-link p-1 my-1">View Theme</a></button>
                    <button><a href="adminind.php?listorders" class="text-center bg-info nav-link p-1 my-1">All Orders</a></button>
                    <button><a href="adminind.php?listpayments" class="text-center bg-info nav-link p-1 my-1">All Payments</a></button>
                    <button><a href="adminind.php?listusers" class="text-center bg-info nav-link p-1 my-1">List Users</a></button>
                    <button><a href="adminlogout.php" class="text-center bg-danger nav-link p-1 my-1">LOG - OUT</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php
               if(isset($_GET['insert_categories'])){
                include('insert_categories.php');
               }
               if(isset($_GET['insert_theme'])){
                include('insert_theme.php');
               }
               if(isset($_GET['viewproducts'])){
                include('viewproducts.php');
               }
               if(isset($_GET['salesandstock'])){
                include('salesandstock.php');
               }
               if(isset($_GET['edit'])){
                include('productManagement.php');
               }
               if(isset($_GET['delete'])){
                include('productManagement.php');
               }
               if(isset($_GET['viewcat'])){
                include('listThemeandCat.php');
               }
               if(isset($_GET['viewtheme'])){
                include('listThemeandCat.php');
               }
               if(isset($_GET['cedit'])){
                include('actionThemeandCat.php');
               }
               if(isset($_GET['cdelete'])){
                include('actionThemeandCat.php');
               }
               if(isset($_GET['tedit'])){
                include('actionThemeandCat.php');
               }
               if(isset($_GET['tdelete'])){
                include('actionThemeandCat.php');
               }
               if(isset($_GET['listorders'])){
                include('listOrders.php');
               }
               if(isset($_GET['listpayments'])){
                include('listPayments.php');
               }
               if(isset($_GET['listusers'])){
                include('listUsers.php');
               }
               if(isset($_GET['orderdel'])){
                include('listOrders.php');
               }
               if(isset($_GET['udelete'])){
                include('listUsers.php');
               }
               if(isset($_GET['stockedit'])){
                include('salesandstock.php');
               }
            ?>
        </div>
        <div id="add">
            <?php
               addToAdmin();
            ?>
        </div>
    </div>
</body>
</html>

<?php
function addToAdmin(){
    if(!(isset($_GET['stockedit']) || isset($_GET['salesandstock']) || isset($_GET['viewproducts']) || isset($_GET['insert_categories']) || isset($_GET['insert_theme']) || isset($_GET['viewcat']) || isset($_GET['viewtheme']) || isset($_GET['listorders']) || isset($_GET['listpayments']) || isset($_GET['listusers']) || isset($_GET['edit'])))
    include('./dash.php');
}
?>