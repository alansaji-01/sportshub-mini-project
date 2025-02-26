<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Home</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<!-- linked files containing external links, connection script, common functions. cart() is called here. to perform cart operations.
  No matter where it is called, matter when the user click the 'Add to cart' btn -->
    <?php include('externals/links.php'); include('externals/connect.php'); include('functions/common_functions.php'); cart(); session_start(); ?>
   




    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <img src="./Images/sportsHubLogo.png" class="logoStyles" style="height: 50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="mhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="display_all_products.php">Products</a>
        </li>
        <?php
        
        if(isset($_SESSION['username'])){
          echo "
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='./userArea/profile.php'><i class='fa-solid fa-user' style='color: #ffffff;'></i></a>
            </li>
          ";
        }else{
          echo "
            <li class='nav-item'>
              <a class='nav-link active text-light' aria-current='page' href='./userArea/registration.php'>Register</a>
            </li>
          ";
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa-solid fa-phone"></i></a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Total <?php cartTotalPrice(); ?></a>
        </li> -->
        <li class="nav-item">
          <!-- cartCount() will simply print the no. of items inside the cart -->
          <a class="nav-link active text-light" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cartCount(); ?></sup> </a>
        </li>
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <?php
              display_categories(); # function to fetch themes from the db and display on the NAV_BAR. The common functions are defined in the /functions/common_functions.php
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Theme
</button>
          <ul class="dropdown-menu dropdown-menu-light">
          <?php
              display_theme(); # function to fetch themes from the db and display on the NAV_BAR. The common functions are defined in the /functions/common_functions.php
            ?>
          </ul>
        </li>
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Welcome ". $_SESSION['username']."</a>
        </li>";
          }
        ?>
      </ul>
      <form class="d-flex" role="search" action="searched_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="item-search">
        <input type="submit" class="btn btn-outline-success" value="Search" name="search">
      </form>
      <div>
        <?php
          if(!isset($_SESSION['username'])){
            echo "<a href='./userArea/userlogin.php' class='btn btn-warning m-2'>Login</a>";
          }else{
            echo "<a href='./userArea/logout.php' class='btn btn-danger m-2'>Logout</a>";
          }
        ?>
      </div>
    </div>
  </div>
</nav>
</div>









<!-- Theme -->
<div class="mt-2 bg-light text-dark text-center">
        <h1>Sports Hub</h1>
</div>
 
<div class="row px-1" id="sportsHub">
            <!-- fetching products -->
  <?php
    
    getUniqueProductsCat();  # function to fetch products from the db and display. this function will fetch products based on the selected Category from the nav bar.
    getUniqueProductsTheme(); # function to fetch products from the db and display. this function will fetch products based on the selected Theme from the nav bar.
    #echo getIPAddress();
  ?>
  
  <!--row - ending-->
</div>
<?php include('externals/footer.php'); ?>
</body>
</html>