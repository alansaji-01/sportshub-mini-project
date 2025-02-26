<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center">Insert Category</h2>
     <form method="post" class="mb-2">
     <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon-1"> <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category">
     </div>
     <div class="input-group mb-2 w-10">
     <input type="submit" class="border-0 p-2 my-3 bg-info" name="insert_cat" value="Insert Category">
     </div>
     </form>
     <?php 
       include("../externals/connect.php");
       if(isset($_POST['insert_cat'])){
        $cat_title = $_POST['cat_title'];
        $query = "select * from categories where category_title='$cat_title'";
        $result = mysqli_query($con,$query);
        $number = mysqli_num_rows($result);
        if($number > 0){
            echo "<script>alert('Category already exists')</script>";
        }else{
            $query = "INSERT INTO categories(category_title) VALUES('$cat_title')";
            $result = mysqli_query($con,$query);
            if($result){
               echo "<script>alert('Category Inserted Successfully')</script>";
            }
        }
    }
     ?>
</body>
</html>