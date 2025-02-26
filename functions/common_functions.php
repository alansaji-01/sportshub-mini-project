<?php
#include('./externals/connect.php');

# fetching products

function getAllProducts(){
  global $con;
    if(!isset($_GET['cat'])){
        if(!isset($_GET['theme'])){
    $query = "select * from product order by rand()";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $price = $row['price'];
      $category_id=$row['category_id'];
      $theme_id=$row['theme_id'];
      $status = $row['status'];
      echo "<div class='col-md-2 mt-2'>
     <div class='card'>
      <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        
        <h5 class='card-text'>Price: $price INR</h5>";
        #<a href='mhome.php?cart=$product_id' class='btn btn-primary'>add to cart</a>
        #<a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
        if($status == 'False'){
          echo "<p class='text-danger'>currently out of stock</p>
                <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
          ";
        }else{
          echo "
            <a href='mhome.php?cart=$product_id' class='btn btn-primary'>add to cart</a>
            <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
          ";
        }
     echo "</div>
    </div>
            
  </div>";
    }
}
    }
}


# fetching products based on users choice [category wise]

function getUniqueProductsCat(){
    global $con;
    if(isset($_GET['cat'])){
      $cat = $_GET['cat'];
      $query = "select * from product where category_id ='$cat' order by rand()";
      $result = mysqli_query($con, $query);
      $rowcount = mysqli_num_rows($result);
      if($rowcount==0){
        echo "<h1 class='text-center'>No products found, will update soon!</h1>";
        exit(1);
      }
      while($row = mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $price = $row['price'];
        $category_id=$row['category_id'];
        $theme_id=$row['theme_id'];
        $status = $row['status'];
        echo "<div class='col-md-2'>
        <div class='card'>
          <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <h5 class='card-text'>Price: $price INR</h5>";
            if($status == 'False'){
              echo "<p class='text-danger'>currently out of stock</p>
                <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
              ";
            }else{
              echo "
                <a href='mhome.php?cart=$product_id' class='btn btn-primary'>add to cart</a>
                <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
              ";
            }
         echo "</div>
        </div>
    </div>";
    }
  }
}

# fetching products based on users choice [Theme wise]

function getUniqueProductsTheme(){
    global $con;
    if(isset($_GET['theme'])){
      $theme = $_GET['theme'];
      $query = "select * from product where theme_id ='$theme' order by rand()";
      $result = mysqli_query($con, $query);
      $rowcount = mysqli_num_rows($result);
      if($rowcount==0){
        echo "<h1 class='text-center'>No products found, will update soon!</h1>";
        exit(1);
      }
      while($row = mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $price = $row['price'];
        $category_id=$row['category_id'];
        $theme_id=$row['theme_id'];
        $status = $row['status'];
        echo "<div class='col-md-2'>
        <div class='card'>
          <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <h5 class='card-text'>Price: $price INR</h5>";
            if($status == 'False'){
              echo "<p class='text-danger'>currently out of stock</p>
                <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
              ";
            }else{
              echo "
                <a href='mhome.php?cart=$product_id' class='btn btn-primary'>add to cart</a>
                <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
              ";
            }
        echo " </div>
        </div>
    </div>";
    }
  }
}


#function to display categories on the NAV-BAR
function display_categories(){
    global $con;
    $cat = "select * from categories";
    $result = mysqli_query($con, $cat);
    while($row = mysqli_fetch_assoc($result)){
        $cat_name=$row['category_title'];
        $cat_id=$row['category_id'];
        echo "<li><a class='dropdown-item' href='./selectedProducts.php?cat=$cat_id'>$cat_name</a></li>";
    }
}


# function to display themes on the NAV-BAR
function display_theme(){
    global $con;
    $theme = "select * from theme";
    $result = mysqli_query($con, $theme);
    while($row = mysqli_fetch_assoc($result)){
        $theme_name=$row['theme_title'];
        $theme_id=$row['theme_id'];
        echo "<li><a class='dropdown-item' href='./selectedProducts.php?theme=$theme_id'>$theme_name</a></li>";
    }
}

# function to fetch searched product and display on searched_product.php 

function displaySearchedProducts(){
    global $con;
    if(isset($_GET['search'])){
        $key = $_GET['item-search'];
        $key = strtolower($key);
        $search = "select * from product where keyword like '%$key%' order by rand()";
        $result = mysqli_query($con, $search);
        $rowcount = mysqli_num_rows($result);
        if($rowcount==0){
          echo "<h1 class='text-center mt-3'>No Result..</h1>";
          exit(1);
        }
        while($row = mysqli_fetch_assoc($result)){
           $product_id = $row['product_id'];
           $product_title = $row['product_title'];
           $product_description = $row['product_description'];
           $product_image1 = $row['product_image1'];
           $price = $row['price'];
           $category_id=$row['category_id'];
           $theme_id=$row['theme_id'];
           $status = $row['status'];
           echo "<div class='col-md-2'>
               <div class='card'>
               <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <h5 class='card-text'>Price: $price INR</h5>";
                  if($status == 'False'){
                    echo "<p class='text-danger'>Out of Stock</p>
                    <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
                    ";
                  }else{
                    echo "<a href='mhome.php?cart=$product_id' class='btn btn-primary'>add to cart</a>
                    <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>";
                  }
                echo "</div>
             </div>
         </div>";
    }

    }
}

# function to fetch details according to the view product

function product__details(){

  global $con;
  $pro_id = $_GET['pro_id'];
  $query = "select * from product where product_id=$pro_id;";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $price = $row['price'];
  $category_id = $row['category_id'];
  $theme_id = $row['theme_id'];
  $status = $row['status'];

  echo "<div class='col-md-6 mt-3'>
          <div id='productDetails' class='card product-details' style='width: 100%;'>
          <div class='row g-0'>
              <div class='col-md-12 bg-dark'>
                  <div id='productCarousel' class='carousel slide' data-bs-ride='carousel'>
                      <div class='carousel-inner'>
                          <div class='carousel-item active'>
                              <img src='./Admin_area/product_images/$product_image1' class='d-block w-100'>
                          </div>
                          <div class='carousel-item'>
                              <img src='./Admin_area/product_images/$product_image2' class='d-block w-100'>
                          </div>
                          <div class='carousel-item'>
                              <img src='./Admin_area/product_images/$product_image3' class='d-block w-100'>
                          </div>
                      </div>
                      <button class='carousel-control-prev' type='button' data-bs-target='#productCarousel' data-bs-slide='prev'>
                          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                          <span class='visually-hidden'>Previous</span>
                      </button>
                      <button class='carousel-control-next' type='button' data-bs-target='#productCarousel' data-bs-slide='next'>
                          <span class='carousel-control-next-icon' aria-hidden='true'></span>
                          <span class='visually-hidden'>Next</span>
                      </button>
                  </div>
              </div>
          </div>
      </div>
          </div>
          <div class='col-md-6 mt-5'>
                  <div class='card-body'>
                      <h2 class='card-title' id='ptitle'>$product_title</h2>
                      <p class='card-text'>$product_description</p>
                      <h4 class='card-text'>₹ $price</h4>";
                      
                      if($category_id == 1){
                        echo "
                        <p>Size selected: <span id='size'>L</span></p>
<div class='productcontainer'>
        <select class='size-select' id='sizeSelect'>
            <option value='' disabled selected>Select Size</option>
            <option value='XS'>XS</option>
            <option value='S'>S</option>
            <option value='M'>M</option>
            <option selected value='L'>L</option>
            <option value='XL'>XL</option>
            <option value='XXL'>XXL</option>
        </select>
    </div>

";
                      }
                          if($status == 'False'){
                            echo "<p class='text-danger'>Out of Stock</p>
                             <img height='50px' src='./Images/ostock.gif' />
                            ";
                          }else{
                           echo "<a href='mhome.php?cart=$product_id' class='btn btn-outline-warning me-2'>Add to Cart</a>";
                            echo "<a href='cart.php?cart=$product_id&purchase=1' class='btn btn-outline-info'>Buy</a>";
                          }
                     echo "
                  </div>
              </div>
          </div>";
          
          
  echo "<h2 class='text-center'>Products for you</h2>";
  relatedProducts();
}




# function to get IP Address, using for cart operations

function getIPAddress() {  
  //whether ip is from the share internet  
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
    $ip = $_SERVER['HTTP_CLIENT_IP'];  
  }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
  }  
  //whether ip is from the remote address  
  else{  
    $ip = $_SERVER['REMOTE_ADDR'];  
  }  
  return $ip;  
}  

function getUniqueValue() {
  global $con;
  // Check if a unique value exists
  $query = "SELECT cartID FROM cart_details LIMIT 1";
  $result = $con->query($query);

  if ($result->num_rows > 0) {
      // If it exists, return it
      return $result->fetch_assoc()['cartID'];
  } else {
      // Generate a new unique value
      $new_unique_value = uniqid(); 
      return $new_unique_value;
  }
}

# cart operations

function cart(){
  if(isset($_GET['cart'])){
    $purchase = false;
    if(isset($_GET['purchase'])){
      $purchase = true;
    }
    global $con;
    $ip = getIPAddress();
    $product_id = $_GET['cart'];
    $query = "select * from cart_details where ip_address='$ip' and product_id=$product_id;";
    $result = mysqli_query($con,$query);
    $rowcount = mysqli_num_rows($result);
        if($rowcount>0){
          echo "<script>alert('This Item has already present inside the cart');</script>";
          echo "<script>window.open('mhome.php','_self')</script>";
        }else{
          $cartid = getUniqueValue();
          $query = "insert into cart_details (product_id,ip_address,quantity,cartID) values ($product_id,'$ip',1,'$cartid')";
          $result = mysqli_query($con,$query);
          if($purchase){
            echo "<script>alert('Youre redirecting to Cart for further process');</script>";
            echo "<script>window.open('cart.php','_self')</script>";
          }else{
            echo "<script>alert('This Item is added to Cart');</script>";
            echo "<script>window.open('mhome.php','_self')</script>";
          }
        }
  }
}





# related products

function relatedProducts(){
  global $con;
  $pro_id = $_GET['pro_id'];
  $query = "select * from product where product_id=$pro_id;";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $price = $row['price'];
  $category_id=$row['category_id'];
  $theme_id=$row['theme_id'];

  $query = "select * from product where category_id=$category_id order by rand() limit 3";
  $result = mysqli_query($con,$query);

  echo "<div class='row d-flex justify-content-center'>";
  while($row = mysqli_fetch_assoc($result)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $price = $row['price'];
    $status = $row['status'];
    echo "
      <div class='col-md-4'>
        <div class='card'>
          <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image 1'> 
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <h5 class='card-text'>Price: $price INR</h5>";

            if($status == 'False'){
              echo "<p class='text-danger'>Out of Stock</p>
              <a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>
              ";
            }else{
             echo "<a href='mhome.php?cart=$product_id' class='btn btn-primary mr-2'>Add to Cart</a>";
              echo "<a href='productDetails.php?pro_id=$product_id' class='btn btn-info'>View Product</a>";
            }
            
         echo " </div>
        </div>
      </div>
    ";
  }
  echo "</div>";
}

# function to display count of cart items

function cartCount(){
    global $con;
    $ip = getIPAddress();
    $query = "select * from cart_details where ip_address='$ip';";
    $result = mysqli_query($con,$query);
    $itemCount = mysqli_num_rows($result);
  echo $itemCount;
}


# function to display the total price of the items inside the cart

function cartTotalPrice(){
  global $con;
  $ip = getIPAddress();
  $query = "select * from cart_details where ip_address='$ip';";
  $result = mysqli_query($con,$query);
  $total = 0;
  while($row = mysqli_fetch_array($result)){
    $product_id = $row['product_id'];
    $q1 = "select * from product where product_id = $product_id";
    $result1 = mysqli_query($con,$q1);
    while($r = mysqli_fetch_array($result1)){
      $product_price = array($r['price']);
      $product_value = array_sum($product_price);
      $total += $product_value;
    }

  }
  echo $total;
}


function removeCartItem() {
  global $con;

  if (isset($_REQUEST['remove'])) {
      // Check if any items are selected to remove
      if (isset($_REQUEST['removeitem']) && !empty($_REQUEST['removeitem'])) {
          foreach ($_REQUEST['removeitem'] as $removeId) {
              $removeId = intval($removeId); // Sanitize input
              $q = "DELETE FROM cart_details WHERE product_id = $removeId";
              $result = mysqli_query($con, $q);
          }
          // Redirect after removal
          echo "<script>window.open('cart.php', '_self')</script>";
      } else {
          if (!isset($GLOBALS['remove_error_displayed'])) {
              $GLOBALS['remove_error_displayed'] = true; 
              echo "<h1 class='text-danger'>Please check the box to remove an item.</h1>";
          }
      }
  }
}



# function to fetch user's order details

function getUserOders(){
  global $con;
  $ip = getIPAddress();
  $username = $_SESSION['username'];
  $q = "select * from usertable where username='$username'";
  $res = mysqli_query($con,$q);
  while($row = mysqli_fetch_array($res)){
    $userid = $row['userid'];
    if(!isset($_GET['editac'])){
      if(!isset($_GET['myorder'])){
        if(!isset($_GET['deleteac'])){
          $q0 = "select * from pending_order where user_id = $userid and status = 'pending'";
          $res0 = mysqli_query($con,$q0);
          $rc = mysqli_num_rows($res0);
          if($rc > 0){
            echo "<h3 class='text-center mt-5 mb-2'>You have <span class='text-danger'>$rc</span> pending orders</h3>
             <p class='text-center'><a class='text-dark' href='profile.php?myorder'>Details</a></p>
            ";
          }else{
            echo "<h3 class='text-center mt-5 mb-2 text-success'>You have no pending orders</h3>
             <p class='text-center'><a class='text-dark' href='../mhome.php'>Explore SportsHub</a></p>
            ";
          }
        }
      }
    }
  }
}

#  whether display or not

function checkStock() {
  global $con;
  
  // Select only the necessary columns
  $q = "SELECT product_id, stock FROM product";
  $res = mysqli_query($con, $q);
  
  if (!$res) {
      echo "Error fetching products: " . mysqli_error($con);
      return;
  }

  $idsToUpdate = [];
  
  while ($row = mysqli_fetch_assoc($res)) {
      if ($row['stock'] < 5) {
          $idsToUpdate[] = $row['product_id']; // Collect product IDs
      }
  }

  if (!empty($idsToUpdate)) {
      // Prepare the update query
      $idsString = implode(',', $idsToUpdate);
      $uq = "UPDATE product SET status = 'False' WHERE product_id IN ($idsString)";
      $ur = mysqli_query($con, $uq);
      
      if (!$ur) {
          echo "Error updating product status: " . mysqli_error($con);
      }
  }
}

function updateStock($id){
  global $con;
  $q = "UPDATE product SET status='True' WHERE product_id = $id";
  $res = mysqli_query($con, $q);
  
}

function trendingProducts(){
  global $con;
  echo "
  <div class='sph-container mt-3'>
    <h1 class='text-center'>Trending Products</h1>
    <div class='sph-carousel-wrapper'>
        <button class='sph-navigate-button sph-navigate-left' onclick='moveCarousel(1)'>
            <i class='fas fa-chevron-left'></i>
        </button>
        <div class='sph-carousel'>
  
  ";
  $q = "SELECT * FROM PRODUCT order by rand() LIMIT 10";
  $res = mysqli_query($con, $q);
  while ($row = mysqli_fetch_assoc($res)) {
    $productid = $row['product_id'];
    $productname = $row['product_title'];
    $productimg = $row['product_image1'];

    echo "
    <a href='productDetails.php?pro_id=$productid'>
      <div class='sph-carousel-item'>
          <img src='./Admin_area/product_images/$productimg' alt='$productname'/>
          <p>$productname</p>
      </div>
      </a>
    ";
}
echo "
<div class='sph-carousel-item'>
          <p>Click LEFT button</p>
      </div>
 </div>
        <button class='sph-navigate-button sph-navigate-right' onclick='moveCarousel(0)'>
            <i class='fas fa-chevron-right'></i>
        </button>
    </div>
</div>

";
}


?>