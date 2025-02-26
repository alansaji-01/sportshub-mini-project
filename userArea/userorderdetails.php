<?php
if(!isset($_GET['productid'])){
    echo "<h1>Restricted<h1>";
    exit();
}
  include('../externals/links.php'); 
  include('../externals/connect.php');
  session_start();
  $pid = $_GET['productid'];
  $q = "SELECT * FROM product WHERE product_id = $pid";
  $result = mysqli_query($con, $q);
  $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
           font-family: Arial, sans-serif;
        }
       .carousel-inner img {
           max-height: 600px;
           object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Order Details</h1>
        <a href="javascript:history.back()" class="btn btn-secondary mb-3">Back</a>

        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../Admin_area/product_images/<?php echo $row['product_image1']; ?>" class="d-block w-100" alt="Product Image 1">
                </div>
                <div class="carousel-item">
                    <img src="../Admin_area/product_images/<?php echo $row['product_image2']; ?>" class="d-block w-100" alt="Product Image 2">
                </div>
                <div class="carousel-item">
                    <img src="../Admin_area/product_images/<?php echo $row['product_image3']; ?>" class="d-block w-100" alt="Product Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h3 class="mt-4" id="product-title">
          <a href="../productDetails.php?pro_id=<?php echo $pid; ?>">
            <?php echo $row["product_title"]; ?>
         </a>
        </h3>

        <p id="product-description"><?php echo $row["product_description"]; ?></p>
        <p id="product-price" class="fw-bold"><?php echo $row["price"]; ?></p>
    </div>
</body>
</html>
