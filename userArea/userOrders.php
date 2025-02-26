<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
    <?php 
        $username = $_SESSION['username']; 
        $qry0 = "select * from usertable where username='$username'";
        $result0 = mysqli_query($con, $qry0);
        $row0 = mysqli_fetch_assoc($result0);
        $userId = $row0['userid'];
        $qry1 = "select * from pending_order where user_id = $userId order by date desc";
        $res1 = mysqli_query($con,$qry1);
        if(mysqli_num_rows($res1)<1){
            echo "<h1 class='mt-5'>No orders found</h1>";
            exit();
        }
    ?>
    <h1>My Orders</h1>
    <table class="table table-border md-5">
        <thead class="bg-info">
        <tr>
            <th>sl no.</th>
            <th>Amount</th>
            <th>Products in Cart</th>
            <th>Order details</th>
            <th>Date</th>
            <th>Purchase status</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="bg">
            <?php
              $num=1;
              while($row = mysqli_fetch_assoc($res1)){
                $finalPrice = $row['total_price'];
               $orderid = $row['order_id'];
    $proid_ = $row['product_id'];
    $cartId = $row['cartID'];

    $qu_ = "select * from orders where cartID='$cartId';";
    $re_ = mysqli_query($con, $qu_);

               
               $qty = mysqli_num_rows($re_);
               
                $date = $row['date'];
                $date = date('d M Y, h:i A', strtotime($date));
                $status = $row['status'];
                if($status == 'pending'){
                    $status = 'Incomplete';
                }else{
                    $status = 'Completed';
                }
                echo "
                <tr>
                <td>$num</td>
                <td>$finalPrice</td>
                <td>$qty</td>
                <td><a href='./userOrderLists.php?cartid=$cartId'>details</a></td>
                <td>$date</td>
                <td>$status</td>
                ";
                if($status == 'Completed'){
                    echo "<td>Booked</td>";
                }else{
                   # echo "<td><a href='confirmOrders.php?orderid=$orderid'>confirm</a></td>";
                    echo "<td><a href='confirmOrders.php?cartID=$cartId'>confirm</a></td>";
                }
                echo "</tr>";
                $num++;
              }
            
            ?>
        </tbody>
    </table>
</body>
</html>