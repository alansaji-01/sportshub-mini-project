<h3 class="text-center">All Payments</h3>
<?php
  $qry2 = "select * from users_payment";
  $result2 = mysqli_query($con, $qry2);
  $c = mysqli_num_rows($result2);
  if($c == 0){
    echo "<h1 class='text-center'>No Payments found</h1>";
  }else{
    $num = 1;
?>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>no</th>
            <th>User</th>
            <th>Invoice</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
          while($Row = mysqli_fetch_array($result2)){
            $orderId = $Row['order_id'];
            $amount = $Row['amount'];
            $invoice_no = $Row['invoice_number'];
            $paymentMode = $Row['payment_mode'];
            $date = $Row['date'];
            $qu1 = "SELECT username from orders WHERE order_id = $orderId";
            $ures1 = mysqli_query($con, $qu1);
            $rw = mysqli_fetch_array($ures1);
            $UName = $rw['username'];

          
        ?>
        <tr>
            <td><?php echo $num++; ?></td>
            <td><?php echo $UName; ?></td>
            <td><?php echo $invoice_no; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $paymentMode; ?></td>
            <td><?php echo $date; ?></td>
          

        </tr>
        <?php
           } # closing of While loop
        ?>
    </tbody>
</table>

<?php
          
  } # closing of else
?>
