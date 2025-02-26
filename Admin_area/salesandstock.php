<?php 
$query = "SELECT SUM(total_price) AS total FROM pending_order";
$rEs = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($rEs);
$total = $row['total'];
echo "<h3 class='text-center'>Sales: $total ₹</h3>";

$q = "SELECT * FROM product WHERE status = 'False'";
$result = mysqli_query($con, $q);
if(mysqli_num_rows($result) < 1){
    echo "No products available";
    exit();
}

echo "<table class='table'>
        <tr>
            <th>Product Name</th>
            <th>Current Stock</th>
        </tr>";

while($row = mysqli_fetch_array($result)){
    $productName =  $row['product_title'];
    $currentStock = $row['stock'];
    $pid = $row['product_id'];
?>
    <tr>
        <td><a href='adminind.php?stockedit=<?php echo $pid ;?>'><?php echo $productName; ?></a></td>
        <td><?php echo $currentStock; ?></td>
    </tr>
<?php 
}
echo "</table>";
?>

<?php
if(isset($_GET['stockedit'])){
  $pid_ = $_GET['stockedit'];
  echo "<h1 class='text-center'>Edit Stock</h1>";
  $q_ = "SELECT * FROM product WHERE product_id = $pid_";
  $result_ = mysqli_query($con, $q_);
  $row_ = mysqli_fetch_array($result_);
  $productName_ = $row_['product_title'];
  $currentStock_ = $row_['stock'];
  echo "<h3 class='text-center'>Product Name: $productName_</h3>";
  echo "
  <form method='POST'>
    <div class='mb-4 w-50 m-auto'>
      <input class='form-control' type='number' min='1' max='90' name='updatedStock' value='$currentStock_' required>
    </div>
    <div class='mb-4 w-50 m-auto'>
      <button type='submit' class='mt-3 btn btn-success' name='update' value='update'>Update Stock</button>
      <a href='adminind.php?salesandstock' class='mt-3 btn btn-secondary'>Back</a>
    </div>
  </form>
";
if(isset($_POST['update'])){
  $updatedStock = $_POST['updatedStock'];
  $uq = "UPDATE product SET stock = $updatedStock WHERE product_id=$pid_";
  $resultu = mysqli_query($con, $uq);
  if($resultu){
    if($updatedStock > 6)
      updateStock($pid_);
    echo "<script>alert('Stock Updated Successfully')</script>";
    echo "<script>window.location.href='adminind.php?salesandstock'</script>";
  }
}

}
?>

