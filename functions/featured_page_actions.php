<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('../externals/links.php'); include('../externals/connect.php'); include('common_functions.php'); session_start(); ?>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <img src="../Images/sportsHubLogo.png" class="logoStyles" style="height: 50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../mhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../display_all_products.php">Products</a>
        </li>
        <?php
        
        if(isset($_SESSION['username'])){
          echo "
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='../userArea/profile.php'><i class='fa-solid fa-user' style='color: #ffffff;'></i></a>
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
        
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Total <?php cartTotalPrice(); ?></a>
        </li> -->
        <li class="nav-item">
          <!-- cartCount() will simply print the no. of items inside the cart -->
          <a class="nav-link active text-light" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cartCount(); ?></sup> </a>
        </li>
        
        
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
        <a href='../userArea/userlogin.php' class='nav-link text-light'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
        <a href='../userArea/profile.php' class='nav-link text-light'>Welcome ". $_SESSION['username']."</a>
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
<div class="container-fluid">
  <?php
    $action = $_GET['action'];
    if($action == 1){
      global $con;
      $query = "SELECT * FROM product WHERE category_id=2 OR theme_id=3 ORDER BY RAND()";
      $result = mysqli_query($con, $query);
      
      // Start the row
      echo "<div class='row'>";
      
      while ($row = mysqli_fetch_assoc($result)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $price = $row['price'];
          $category_id = $row['category_id'];
          $theme_id = $row['theme_id'];
          $status=$row['status'];
      
          // Create a card for each product
          echo "<div class='col-md-2 mt-2'>
                  <div class='card'>
                    <img src='../Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <h5 class='card-text'>Price: $price INR</h5>";
                      if($status == 'True')
                        echo "<a href='../mhome.php?cart=$product_id' class='btn btn-primary'>Add to Cart</a>";
                      else
                        echo "<p class='text-danger'>Out of stock</p>";
                     echo " <a href='../productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
                    </div>
                  </div>
                </div>";
      }
      echo "</div>";
    }

    if($action == 2){
      global $con;
      $query = "SELECT * FROM product WHERE category_id=1 ORDER BY RAND()";
      $result = mysqli_query($con, $query);
      
      // Start the row
      echo "<div class='row'>";
      
      while ($row = mysqli_fetch_assoc($result)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $price = $row['price'];
          $category_id = $row['category_id'];
          $theme_id = $row['theme_id'];
          $status=$row['status'];
      
          // Create a card for each product
          echo "<div class='col-md-2 mt-2'>
                  <div class='card'>
                    <img src='../Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <h5 class='card-text'>Price: $price INR</h5>";
                      if($status == 'True')
                        echo "<a href='../mhome.php?cart=$product_id' class='btn btn-primary'>Add to Cart</a>";
                      else
                        echo "<p class='text-danger'>Out of stock</p>";
                     echo " <a href='../productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
                    </div>
                  </div>
                </div>";
      }
      echo "</div>";
    }

    if($action == 3){
      include('faq.html');
    }
  ?>
  </div>
</body>
</html>