<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product - SportsHub</title>
</head>
<body class="bg-light">
<?php include('../externals/links.php'); include("../externals/connect.php"); ?>
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-control mb-4 w-50 m-auto">
                <label>Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Keyword</label>
                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <select name="product_categories" id="product_categories" class="product_categories form-control">
                    <option>Select Category</option>
                    <?php
                       $qry = "select * from categories";
                       $res = mysqli_query($con,$qry);
                       while($row = mysqli_fetch_assoc($res)){
                        $cid = $row['category_id'];
                        $cname = $row['category_title'];
                        echo "<option value='$cid'>$cname</option>";
                       }
                    ?>

                </select>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <select name="product_theme" id="product_theme" class="product_theme form-control">
                <option>Select Theme</option>
                    <?php
                       $qry = "select * from theme";
                       $res = mysqli_query($con,$qry);
                       while($row = mysqli_fetch_assoc($res)){
                        $tid = $row['theme_id'];
                        $tname = $row['theme_title'];
                        echo "<option value='$tid'>$tname</option>";
                       }
                    ?>
                </select>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Product Image 1</label>
                <input type="file" name="product_image1" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Product Image 2</label>
                <input type="file" name="product_image2" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Product Image 3</label>
                <input type="file" name="product_image3" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Stock</label>
                <input type="number" name="productstock" class="form-control" placeholder="Enter number of stock" autocomplete="off" required>
            </div>

            <div class="form-control mb-4 w-50 m-auto">
                <label>Price(INR)</label>
                <input type="number" name="product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Insert Product">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <a href="adminind.php" class="btn btn-secondary mb-3 px-3">Back</a>
            </div>

        </form>
    </div>
    <?php
        if(isset($_REQUEST['insert_product'])){
            $product_title = $_REQUEST['product_title'];
            $product_description = $_REQUEST['product_description'];
            $keyword = $_REQUEST['keyword'];
            $product_categories = $_REQUEST['product_categories'];
            $product_theme = $_REQUEST['product_theme'];
            $product_price = $_REQUEST['product_price'];
            $productstock = $_REQUEST['productstock'];
            $status = 'True';
            if($productstock < 7)
               $status = 'False';

            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];

            $tmp_image1 = $_FILES['product_image1']['tmp_name'];
            $tmp_image2 = $_FILES['product_image2']['tmp_name'];
            $tmp_image3 = $_FILES['product_image3']['tmp_name'];

            if($product_title=='' or $product_description=='' or $keyword=='' or $product_categories=='' or $product_theme=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
                echo "<script>alert('Please fill all the fields')</script>";
                exit();
            }else{
                move_uploaded_file($tmp_image1,"./product_images/$product_image1");
                move_uploaded_file($tmp_image2,"./product_images/$product_image2");
                move_uploaded_file($tmp_image3,"./product_images/$product_image3");

                $ins = "insert into product (product_title,product_description,category_id,theme_id,keyword,product_image1,product_image2,product_image3,price,stock,date,status) values ('$product_title','$product_description',$product_categories,$product_theme,'$keyword','$product_image1','$product_image2','$product_image3','$product_price',$productstock,NOW(),'$status')";
                $run = mysqli_query($con,$ins);
                if($run){
                    echo "<script>alert('Product Inserted Successfully')</script>";
                    echo "<script>window.open('adminind.php?viewproducts','_self')</script>";
                }
            }
        }
    ?>


</body>
</html>