<?php
 include('../externals/links.php'); 
 include('../functions/common_functions.php');  
 include('../externals/connect.php'); 
 
 if(isset($_REQUEST['ui'])){
    $user_id = $_REQUEST['ui'];
    $zqry = "SELECT * FROM usertable WHERE userid=$user_id";
    $zres = mysqli_query($con,$zqry);
    $row_ = mysqli_fetch_array($zres);
    $usrname = $row_['username'];
 }

 # fetching cart details
 $userIp = getIPAddress();
 # $totalPrice = 0;
 $query = "select * from cart_details where ip_address='$userIp'";
 $res = mysqli_query($con,$query);
 $invoice = mt_rand();
 $status = "pending";
 $count = mysqli_num_rows($res);
 $x = null;
 while($row = mysqli_fetch_assoc($res)){
    $product_id = $row['product_id'];
    $cartId = $row['cartID'];
    $x = $row['cartID'];  # duplicate
    $q1 = "select * from product where product_id = $product_id";
    $res1 = mysqli_query($con,$q1);
    while($rprice = mysqli_fetch_assoc($res1)){
      $totalPrice = 0;
        $product_price = array($rprice['price']);
        $product_val = array_sum($product_price);
        $totalPrice += $product_val;
 $cartQ = "select quantity from cart_details where product_id = $product_id";
$resQ = mysqli_query($con, $cartQ);
$itemFetch = mysqli_fetch_assoc($resQ);
$quantity = $itemFetch['quantity'];
 $subtotal = $totalPrice*$quantity;
    }
    $insertQ = "insert into orders (productId,user_id,username,cartID,amount_due,invoice_number,total_products,quantity,date,order_status) values ($product_id,$user_id,'$usrname','$cartId',$subtotal,$invoice, $count,$quantity,NOW(),'$status')";
    $resInsert = mysqli_query($con,$insertQ);

    
 # Orders pending, if the user purchased the items then the details must be deleted from the cart table. If the user clicked checkout --
 # then also the details must be deleted from the cart table and the details are inserted into the pending_order table. 

    $pqry = "select order_id from orders where productId=$product_id and user_id=$user_id LIMIT 1";
    $resP = mysqli_query($con, $pqry);
   $fth = mysqli_fetch_assoc($resP);
   $oid = $fth['order_id'];
 }

 $carttotal = 0;
 $cartinvoice = mt_rand();
 
 // Correct query to sum up 'amount_due' from the 'orders' table
 $frpriceq = "SELECT amount_due FROM orders WHERE cartID='$cartId'";
 $resfrprice = mysqli_query($con, $frpriceq);
 
 // Calculate the total price for the cart
 while ($frpeicerow = mysqli_fetch_assoc($resfrprice)) {
     $carttotal += $frpeicerow['amount_due'];
 }
 
 // Insert into pending_order with corrected fields and values
 $insertQop = "INSERT INTO pending_order 
     (order_id, user_id, product_id, invoice, total_price, cartID, quantity, date, status) 
     VALUES ($oid, $user_id, $product_id, $cartinvoice, $carttotal, '$cartId', $quantity, NOW(), '$status')";
 $resInsertop = mysqli_query($con, $insertQop);
 
 if($resInsert){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
 }


  # deletion part, if the details are inserted inside both orders and pending_order table the datas inside the cart table will be deleted

  $deleteQ = "delete from cart_details where ip_address='$userIp'";
  $resDelete = mysqli_query($con,$deleteQ);
 ?>