<?php 
  include('../externals/links.php'); 
  include('../externals/connect.php'); 
  include('../functions/common_functions.php'); 
  session_start(); 

  if(isset($_GET['orderid'])){
    $orderid = $_GET['orderid'];
  
  
  $qry = "select * from orders where order_id = $orderid";
  $result = mysqli_query($con, $qry);
  $row = mysqli_fetch_assoc($result);
  $invoice = $row['invoice_number'];
  $amount = $row['amount_due'];

  if(isset($_REQUEST['okpay'])){
    $amount_ = $_POST['amount'];
    $invoice_ = $_POST['invoiceno'];
    $paymentMode = $_POST['paymentmode'];

    $insqry = "insert into users_payment (order_id,invoice_number,amount,payment_mode) VALUES ($orderid,$invoice_,$amount_,'$paymentMode')";
    $insresult = mysqli_query($con, $insqry);
    if($insresult){
        echo "<script>alert('Payment Was successfull');</script>";
        echo "<script>window.open('profile.php?myorder','_self')</script>";
        $updtq = "update orders set order_status = 'Completed' where order_id = $orderid";
        $updtres = mysqli_query($con, $updtq);
        $up_dtq = "update pending_order set status = 'Completed' where order_id = $orderid";
        $up_dtres = mysqli_query($con, $up_dtq);
    }
    
}
}


if (isset($_GET['cartID'])) {
    $cartid = $_GET['cartID'];

    // Fetch the pending order
    $qry = "SELECT * FROM pending_order WHERE cartID = '$cartid'";
    $result = mysqli_query($con, $qry);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $invoice = $row['invoice'];
        $amount = $row['total_price'];
        

        if (isset($_REQUEST['okpay'])) {
            // Fetch the order details
            $oqry = "SELECT * FROM orders WHERE cartID = '$cartid'";
            $oresult = mysqli_query($con, $oqry);

            while ($orow = mysqli_fetch_assoc($oresult)) {
                $pid = $orow['productId'];
                $qty = $orow['quantity'];
                $orderid = $orow['order_id'];
                
                // Update the product stock
                $pqry = "UPDATE product SET stock = stock - $qty WHERE product_id = $pid";
                mysqli_query($con, $pqry);
                // Update order status
                $updtq = "UPDATE orders SET order_status = 'Completed' WHERE order_id = $orderid";
                mysqli_query($con, $updtq);
            }

            // Payment details
            $amount_ = $_POST['amount'];
            $invoice_ = $_POST['invoiceno'];
            $paymentMode = $_POST['paymentmode'];

            // Insert payment record
            $insqry = "INSERT INTO users_payment (order_id, invoice_number, amount, payment_mode) VALUES ($orderid, '$invoice_', '$amount_', '$paymentMode')";
            $insresult = mysqli_query($con, $insqry);

            if ($insresult) {
                echo "<script>alert('Payment was successful');</script>";
                echo "<script>window.open('profile.php?myorder','_self');</script>";
                // Update pending order status
                $up_dtq = "UPDATE pending_order SET status = 'Completed' WHERE cartID = '$cartid'";
                mysqli_query($con, $up_dtq);
            }
            checkStock();   # set product status false if stock < 5
        }
    } else {
        echo "<script>alert('No pending order found for this cart ID.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="../css/confirmOrders.css"> 
</head>
<body>
    <a href='profile.php?myorder' class='btn btn-secondary my-5 mx-5'>Back</a>
    <div class="container my-5">
        <h1 class="text-center">Confirm Payment</h1>
        <form method="post">
            <div class="form-outline my-4 text-center">
                <label for="invoiceno">Invoice Number</label>
                <input type="text" class="form-control" name="invoiceno" value=<?php echo $invoice; ?> readonly>
            </div>
            <div class="form-outline my-4 text-center">
                <label for="products">Products</label>
                <select class="form-select" id="products">
                    <?php
                    $oqry = "SELECT o.quantity,o.amount_due, p.product_title, p.price FROM orders o inner join product p on p.product_id = o.productId  WHERE o.cartID = '$cartid'";
                    $oresult = mysqli_query($con, $oqry);
                    $nocol = mysqli_num_rows($oresult);
                    echo "<option disabled selected>Total $nocol products - click here to view</option>";
                    while ($row = mysqli_fetch_assoc($oresult)) {
                        echo "<option disabled title='{$row['price']} for each'>{$row['product_title']} X {$row['quantity']} = {$row['amount_due']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <label for="amount">total Amount</label>
                <input type="text" class="form-control" name="amount" value=<?php echo $amount; ?> readonly>
            </div>
            <div class="form-outline my-4 text-center">
                <label for="paymentmode">Payment Mode</label>
                <select class="form-select" id="paymentmode" name="paymentmode" required>
                    <option disabled selected>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paytm</option>
                    <option>Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="submit" class="btn-custom" name="okpay" value="Confirm Payment">
            </div>
        </form>
    </div>
</body>
</html>
