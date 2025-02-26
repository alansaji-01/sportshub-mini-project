<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .order-item {
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            display: flex;
            align-items: center;
        }
        .order-item img {
            max-width: 100px;
            margin-right: 15px;
        }
        .order-details {
            flex: 1;
        }
        .order-details h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .order-details p {
            margin: 5px 0;
            color: #666;
        }
        .order-status {
            text-align: right;
            margin-left: 20px;
        }
        .order-status p {
            margin: 5px 0;
        }
        .status {
            display: flex;
            align-items: center;
        }
        .status i {
            margin-right: 5px;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .green{
            color: green;
        }
        .red{
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <?php 
        include('../externals/links.php'); 
        include('../externals/connect.php'); 
        session_start();
        if(!isset($_GET['cartid'])){
            echo "<h1>No data available</h1>";
            exit();
        }
        $cartid = $_GET['cartid'];
        echo "<h1>Cart Orders for " . htmlspecialchars($_SESSION['username']) . "</h1>";

        $q = "SELECT * FROM orders WHERE cartID='$cartid'";
        $res = mysqli_query($con, $q);
        while($row = mysqli_fetch_array($res)){
            $proid = $row['productId'];
            $q_ = "SELECT * FROM product WHERE product_id=$proid";
            $res_ = mysqli_query($con, $q_);
            $row_ = mysqli_fetch_array($res_);
            $pimg = $row_['product_image1'];
            $ptitle = $row_['product_title'];
            $pdesc = $row_['product_description'];
            $pprice = $row_['price'];
            $oid = $row['order_id'];
            $qty = $row['quantity'];
            $status = $row['order_status'];
            $amtpay = ($pprice*$qty);
            echo "
            <div class='order-item'>
                <img alt='' src='../Admin_area/product_images/$pimg' />
                <div class='order-details'>
                    <h3><a href='./userorderdetails.php?productid=$proid'>$ptitle</a></h3>
                    <p>$pdesc</p>
                    <p>₹$pprice x $qty = $amtpay</p>
                </div>
                <div class='order-status'>";
                if($status == 'Completed'){
                    echo "<i class='green fa-solid fa-check'></i> Ordered";
                }else{
                    echo "<td><a href='./ordersActions.php?delorderid=$oid'><i class='red fa-solid fa-xmark'></i> Cancel</a></td>";
                }
               echo " </div>
            </div>";
        }
    ?>

    <a href="profile.php?myorder" class="back-button">Back</a>
</div>

</body>
</html>



