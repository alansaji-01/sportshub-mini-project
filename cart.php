<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Cart Details</title>
    <link rel="stylesheet" href="css/mhome.css">
    <style>
        .cart-img{
    width: 100px;
    height: 100px;
    object-fit:content;
}
    </style>
</head>
<body>
<!-- linked files containing external links, connection script, common functions. cart() is called here. to perform cart operations.
  No matter where it is called, matter when the user click the 'Add to cart' btn -->
    <?php include('externals/links.php'); include('externals/connect.php'); include('functions/common_functions.php'); cart(); session_start();?>
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
              <a class='nav-link active text-light' aria-current='page' href='./userArea/profile.php'>My Account</a>
            </li>
          ";
        }else{
          echo "
            <li class='nav-item'>
              <a class='nav-link active text-light' aria-current='page' href='./userArea/userlogin.php'>Login</a>
            </li>
          ";
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa-solid fa-phone"></i></a>
        </li>
       
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
        <a href='' class='nav-link text-light'>Cart of ". $_SESSION['username']."</a>
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
<div class="bg-light text-dark text-center">
        <h1>Sports Hub</h1>
</div>

<div class="container">
    <div class="row">
    <form method="post" action="">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Pieces</th>
                <th>per Price</th>
                <th>Remove</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            global $con;
            $ip = getIPAddress();
            $total = 0;
            $query = "SELECT * FROM cart_details WHERE ip_address='$ip';";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $pqty = $row['quantity'];
                    
                    $q1 = "SELECT * FROM product WHERE product_id = $product_id";
                    $result1 = mysqli_query($con, $q1);
                    if ($r = mysqli_fetch_array($result1)) {
                        $priceTable = $r['price'];
                        $productTitle = $r['product_title'];
                        $productImage = $r['product_image1'];

                        $total += $priceTable * $pqty;
            ?>
                        <tr>
                            <td><?php echo $productTitle; ?></td>
                            <td><img src="./Admin_area/product_images/<?php echo $productImage; ?>" class="cart-img"></td>
                            <td>
                                <input type="hidden" name="product_id[]" value="<?php echo $product_id; ?>">
                                <input value="<?php echo $pqty; ?>" min="1" max="7" type="number" name="qty[]" class="form-input w-50">
                            </td>
                            <td><?php echo $pqty; ?></td>
                            <td><?php echo $priceTable; ?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                            <td>
                                <input type="submit" value="Update Cart" name="update" class="bg-info px-3 py-2 mx-3 border-0">
                                <input type="submit" value="Remove" name="remove" class="bg-danger px-3 py-2 mx-3 border-0">
                            </td>
                        </tr>
            <?php
                    }
                }
            } else {
                echo "<tr><td colspan='7' class='text-center text-danger'>CART IS EMPTY</td></tr>";
            }
            ?>
        </tbody>
    </table>
</form>

<?php
// Update quantities
if (isset($_POST['update'])) {
    $quantities = $_POST['qty'];
    $product_ids = $_POST['product_id'];

    foreach ($product_ids as $index => $id) {
        $new_qty = (int)$quantities[$index];
        $update_query = "UPDATE cart_details SET quantity=$new_qty WHERE ip_address='$ip' AND product_id=$id";
        mysqli_query($con, $update_query);
    }
    echo "<meta http-equiv='refresh' content='0'>"; // Refresh page to show updated quantities
}

// Remove items
if (isset($_POST['remove'])) {
    if (!empty($_POST['removeitem'])) {
        foreach ($_POST['removeitem'] as $id) {
            $remove_query = "DELETE FROM cart_details WHERE ip_address='$ip' AND product_id=$id";
            mysqli_query($con, $remove_query);
        }
        echo "<meta http-equiv='refresh' content='0'>"; // Refresh page to update cart
    }
}
?>

        <div class="d-flex mb-5">
          <?php
             global $con;
             $ip = getIPAddress();
             $query = "select * from cart_details where ip_address='$ip';";
             $result = mysqli_query($con,$query);
             $res_count = $result->num_rows;
             if($res_count > 0){
          ?>
            <h1 class="px-3">Subtotal:<strong><?php echo $total; ?></strong></h1>
            <a href="mhome.php" class="btn btn-info btn-lg mx-2">Continue Shopping</a>
            <a onclick="confirmOrder()" href="./userArea/checkout.php" class="btn btn-success btn-lg mx-2">Check Out</a>
            <?php }else{
              echo "<a href='mhome.php' class='btn bg-info px-3 py-2 mx-3 border-0'>Continue Shopping</a>";
            } ?>
        </div>
    </div>
</div>
                  

  <?php
    getUniqueProductsCat();  # function to fetch products from the db and display. this function will fetch products based on the selected Category from the nav bar.
    getUniqueProductsTheme(); # function to fetch products from the db and display. this function will fetch products based on the selected Theme from the nav bar.
    #echo getIPAddress();
    echo "
    
    <script>
      function confirmOrder(){
        let check = confirm('Youre redirecting to Payment page, Total price: $total');
        if(!check)
          return false;
      }
    </script>
    
    ";
  ?>
  

</body>
</html>