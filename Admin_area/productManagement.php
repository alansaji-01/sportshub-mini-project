<a class='btn btn-warning' href='adminind.php'>BACK</a>
<?php
# globally storing the product id into a variable for further operations
# using 2 separte varaiables cuz' 2 diffrent operations are carried in a single file 


# Check if the 'edit' query parameter is set
if (isset($_GET['edit'])) {
    $pide = $_GET['edit'];
    # fetching products details from the product table and displaying, the admin can edit the details [purpose]
    $query = "SELECT * FROM product WHERE product_id = $pide";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    # assigning details to variables

    $pname = $row['product_title'];
    $pdesc = $row['product_description'];
    $keywords = $row['keyword'];
    $category_id = $row['category_id'];
    $theme_id = $row['theme_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $productStock = $row['stock'];
    $price = $row['price'];

    # Selecting Category and Theme Titles
    $q1 = "select * from categories where category_id=$category_id";
    $q2 = "select * from theme where theme_id=$theme_id";
    $result1 = mysqli_query($con, $q1);
    $result2 = mysqli_query($con, $q2);
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);

    $categoryName = $row1['category_title'];
    $themeName = $row2['theme_title'];

?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productName" class="form-label">Product Name</label>
            <input value='<?php echo $pname; ?>' type="text" id="productName" name="pname" class="form-control" required>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productDescription" class="form-label">Product Description</label>
            <input value='<?php echo $pdesc; ?>' type="text" id="productDescription" name="pdesc" class="form-control" required>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="keywords" class="form-label">Keywords</label>
            <input value='<?php echo $keywords; ?>' type="text" id="keywords" name="keywords" class="form-control" required>
        </div>
        
        <!-- Product Category Dropdown -->
        <div class="form-control mb-4 w-50 m-auto">
            <label for="productCategories" class="form-label">Product Category</label>
            <select id="productCategories" name="product_categories" class="form-control">
                <option value="<?php echo $category_id; ?>"><?php echo $categoryName; ?></option>
                <?php
                // Fetch categories from the database
                $query = "SELECT * FROM categories";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $categoryId = $row['category_id'];
                    $categoryTitle = $row['category_title'];
                    echo "<option value='$categoryId'>$categoryTitle</option>";
                }
                ?>
            </select>
        </div>
        
        <!-- Product Theme Dropdown -->
        <div class="form-control mb-4 w-50 m-auto">
            <label for="productTheme" class="form-label">Product Theme</label>
            <select id="productTheme" name="product_theme" class="form-control">
                <option value="<?php echo $theme_id; ?>"><?php echo $themeName; ?></option>
                <?php
                // Fetch themes from the database
                $query = "SELECT * FROM theme";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $themeId = $row['theme_id'];
                    $themeTitle = $row['theme_title'];
                    echo "<option value='$themeId'>$themeTitle</option>";
                }
                ?>
            </select>
        </div>
        
        <!-- Product Image Fields -->

        <div class="form-control mb-4 w-50 m-auto">
            <label class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" name="pimage1" class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image1; ?>" alt="Product Image 1" class="productImg">
            </div>
        </div>
        <div class="form-control mb-4 w-50 m-auto">
            <label class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" name="pimage2" class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image2; ?>" alt="Product Image 2" class="productImg">
            </div>
        </div>
        <div class="form-control mb-4 w-50 m-auto">
            <label class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" name="pimage3" class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image3; ?>" alt="Product Image 3" class="productImg">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="stk" class="form-label">Stock</label>
            <input value='<?php echo $productStock; ?>' type="number" id="stk" name="upStock" class="form-control" required>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="price" class="form-label">Price</label>
            <input value='<?php echo $price; ?>' type="number" id="price" name="upPrice" class="form-control" required>
        </div>
        
        <div class="text-center">
            <input type="submit" value="Update" name="update" class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>

<?php

   if(isset($_REQUEST['update'])){
     $upname = $_REQUEST['pname'];
     $updescription = $_REQUEST['pdesc'];
     $ukeywords = $_REQUEST['keywords'];
     $uproduct_categories = $_REQUEST['product_categories'];
     $uproduct_theme = $_REQUEST['product_theme'];
     $status = 'True';
     $upStock = $_REQUEST['upStock'];
     if($upStock < 5){
        $status = 'False';
     }
     $upPrice = $_REQUEST['upPrice'];

     $upimage1 = $_FILES['pimage1']['name'];
     $upimage2 = $_FILES['pimage2']['name'];
     $upimage3 = $_FILES['pimage3']['name'];

     $Tupimage1 = $_FILES['pimage1']['tmp_name'];
     $Tupimage2 = $_FILES['pimage2']['tmp_name'];
     $Tupimage3 = $_FILES['pimage3']['tmp_name'];

     move_uploaded_file($Tupimage1,"./product_images/$upimage1");
     move_uploaded_file($Tupimage2,"./product_images/$upimage2");
     move_uploaded_file($Tupimage3,"./product_images/$upimage3");

     $updtQry = "update product set product_title='$upname',product_description='$updescription',category_id=$uproduct_categories,theme_id=$uproduct_theme,	keyword='$ukeywords',product_image1='$upimage1',product_image2='$upimage2',product_image3='$upimage3',price='$upPrice',stock=$upStock,date=NOW(),status='$status' where product_id=$pide";
     $updtres = mysqli_query($con,$updtQry);
     if($updtres){
        echo "<script>alert('Product Updated Successfully');</script>";
        echo "<script>window.open('adminind.php?viewproducts','_self');</script>";
     }

   }
}

?>

<?php


# Check if the 'delete' query parameter is set
if (isset($_GET['delete'])) {
    $delPID = $_GET['delete'];

    $delqry = "delete from product where product_id=$delPID";
    $delres = mysqli_query($con, $delqry);
    if ($delres) {
        echo "<script>alert('Product Deleted Successfully');</script>";
        echo "<script>window.open('adminind.php?viewproducts', '_self');</script>";
    } else {
        echo "<script>alert('Error deleting product');</script>";
    }
}
?>


