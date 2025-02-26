<h3 class="text-center">All Orders</h3>
<?php
$qry = "SELECT po.total_price, po.cartId, po.date, po.status, o.username, COUNT(o.productId) as total_products
        FROM pending_order po
        INNER JOIN orders o ON po.cartId = o.cartId
        GROUP BY po.cartId";
$result = mysqli_query($con, $qry);
$count = mysqli_num_rows($result);

if ($count == 0) {
    echo "<h1 class='text-center'>No orders found</h1>";
} else {
    $num = 1;
?>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Amount</th>
            <th>User</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $amt = $row['total_price'];
            $userName = $row['username'];
            $totalProducts = $row['total_products'];
            $date = $row['date'];
            $dateFormatted = date('d M Y, h:i A', strtotime($date));
            $status = $row['status'];
            $caid = $row['cartId'];
        ?>
        <tr>
            <td><?php echo $num++; ?></td>
            <td><?php echo $amt; ?></td>
            <td><?php echo $userName; ?></td>
            <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $caid; ?>">
                    <?php echo $totalProducts; ?>
                </a>
            </td>
            <td><?php echo $dateFormatted; ?></td>
            <td>
                <?php 
                    if ($status == 'Completed') {
                        echo "<span class='badge bg-success'>Completed</span>";
                    } elseif ($status == 'Pending') {
                        echo "<span class='badge bg-warning text-dark'>Pending</span>";
                    }
                ?>
            </td>
        </tr>

        <!-- Modal Structure -->
        <div class="modal fade" id="detailsModal<?php echo $caid; ?>" tabindex="-1" aria-labelledby="detailsModalLabel<?php echo $caid; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel<?php echo $caid; ?>">Order Details (Cart ID: <?php echo $caid; ?>)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $cq = "SELECT p.product_title, p.product_image1 FROM product p inner join orders o on p.product_id = o.productId where cartId = '$caid'";
                        $cqresult = mysqli_query($con, $cq);
                        ?>
                        <?php
                         while ($row = mysqli_fetch_array($cqresult)) {
                           $productTitle = $row['product_title'];
                           $productImage = $row['product_image1'];
                        ?>
                      <div class="product-card" style="display: inline-block; text-align: center; margin: 10px;">
                         <img src="./product_images/<?php echo $productImage; ?>" alt="<?php echo $productTitle; ?>" style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px;">
                         <p style="margin-top: 10px; font-size: 16px; font-weight: bold;"><?php echo $productTitle; ?></p>
                      </div>
                      <?php
                         }
                       ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } 
        ?>
    </tbody>
</table>
<?php
} 
?>
