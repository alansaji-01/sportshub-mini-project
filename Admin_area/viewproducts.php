<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Our Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>Sales</th>
                <th>Stock left</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
        </thead>
        <tbody>
    <?php
    $qry = "select * from product;";
    $result = mysqli_query($con, $qry);
    $num = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row['product_id'];
        $pname = $row['product_title'];
        $pimg = $row['product_image1'];
        $price = $row['price'];
        $status = $row['status'];
        $stock = $row['stock'];
    ?>
        <tr class='text-center'>
            <td><?php echo $num; ?></td>
            <td><?php echo $pname; ?></td>
            <td><img class='productImg' src='./product_images/<?php echo $pimg; ?>' /></td>
            <td><?php echo $price; ?></td>
            <td>
                <h3>
                    <?php
                    $qry1 = "select * from orders where productId=$pid";
                    $result1 = mysqli_query($con, $qry1);
                    $count = mysqli_num_rows($result1);
                    echo $count;
                    ?>
                </h3>
            </td>
            <td><?php echo $stock; ?></td>
            <td>
                <?php
                if ($status == 'True') {
                    echo "<i class='text-success fa-regular fa-circle-check'></i>";
                } else {
                    echo "<i class='text-warning fa-regular fa-circle-question'></i>";
                }
                ?>
            </td>
            <td><a href='adminind.php?edit=<?php echo $pid; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td>
                <a href='#deleteModal<?php echo $pid; ?>' class='text-dark' data-toggle='modal'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>

        <!-- Unique Modal for Each Product -->
        <div class='modal fade' id='deleteModal<?php echo $pid; ?>' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel<?php echo $pid; ?>' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Are you sure you want to delete this Product?
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>NO</button>
                        <a class='btn btn-primary text-light text-decoration-none' href='adminind.php?delete=<?php echo $pid; ?>'>I am Sure</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $num++;
    }
    ?>
</tbody>
    </table>
</body>
</html>
