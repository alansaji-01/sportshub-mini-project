<?php 
include('../externals/links.php'); 
include('../externals/connect.php'); 
session_start();

if (isset($_GET['delorderid'])) {
    $oid = $_GET['delorderid'];

    # Fetch the cartID of the order to be deleted
    $q0 = "SELECT cartID FROM orders WHERE order_id = $oid";
    $res0 = mysqli_query($con, $q0);
    
    # Check if the order exists
    if ($row0 = mysqli_fetch_assoc($res0)) {
        $cid = $row0['cartID'];

        # Delete the order
        $q = "DELETE FROM orders WHERE order_id = $oid";
        $res = mysqli_query($con, $q);

        if ($res) {
            # Check if any orders with the same cartID exist
            $q1 = "SELECT * FROM orders WHERE cartID = '$cid'";
            $res1 = mysqli_query($con, $q1);

            # If no orders with this cartID exist, delete from pending_order
            if (mysqli_num_rows($res1) < 1) {
                $pq = "DELETE FROM pending_order WHERE cartID = '$cid'";
                mysqli_query($con, $pq);
            }

            $testq = "SELECT amount_due from orders where cartID = '$cid'";
            $testres = mysqli_query($con, $testq);
            $totalamt = 0;
            while ($row = mysqli_fetch_assoc($testres)){
                $totalamt += $row['amount_due'];
            }
            $qu2 = "UPDATE pending_order SET total_price = '$totalamt' WHERE cartID = '$cid'";
            $resu2 = mysqli_query($con, $qu2);

            

            echo "<script>alert('Order deleted successfully');</script>";
            echo "<script>window.open('profile.php?myorder', '_self');</script>";
        } else {
            echo "<script>alert('Failed to delete the order');</script>";
        }
    } else {
        echo "<script>alert('Order not found');</script>";
    }
}
?>
