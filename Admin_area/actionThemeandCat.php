<!-- editing of Categories -->
<?php
  if(isset($_GET['cedit'])){
    $id = $_GET['cedit'];
    $sql = "SELECT * FROM categories WHERE category_id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['category_title'];

?>
<div class="container mt-3">
   <h1 class="text-center">Edit Categories</h1>
   <form action="" method="POST" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="ctitle" class="form-label"></label>
        <input type="text" name="ctitle" id="" class="form-control" required value="<?php echo $title; ?>">
    </div>
    <input class="btn btn-success px-3 mb-3" type="submit" value="update" name="cat">
   </form>
</div>
<?php
if(isset($_REQUEST['cat'])){
    $title = $_POST['ctitle'];
    $sql = "UPDATE categories SET category_title = '$title' WHERE category_id = $id";
    $uresult = mysqli_query($con, $sql);
    if($uresult){
        echo "<script>alert('Category Updated')</script>";
        echo "<script>window.open('adminind.php?viewcat','_self')</script>";
    }
}
}
?>

<!-- Deletion of Categories -->
<?php
  if(isset($_GET['cdelete'])){
    $id = $_GET['cdelete'];
    $delc = "delete from categories WHERE category_id = $id";
    $dresult = mysqli_query($con, $delc);
    if($dresult){
        echo "<script>alert('Category Deleted')</script>";
        echo "<script>window.open('adminind.php?viewcat','_self')</script>";
    }
    
  }
?>

<!-- editing of Theme -->
<?php
  if(isset($_GET['tedit'])){
    $id = $_GET['tedit'];
    $sql = "SELECT * FROM theme WHERE theme_id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['theme_title'];

?>
<div class="container mt-3">
   <h1 class="text-center">Edit Theme</h1>
   <form action="" method="POST" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="ttitle" class="form-label"></label>
        <input type="text" name="ttitle" id="" class="form-control" required value="<?php echo $title; ?>">
    </div>
    <input class="btn btn-success px-3 mb-3" type="submit" value="update" name="theme">
   </form>
</div>
<?php
if(isset($_REQUEST['theme'])){
    $ttitle = $_POST['ttitle'];
    $sql = "UPDATE theme SET theme_title = '$ttitle' WHERE theme_id = $id";
    $uresult = mysqli_query($con, $sql);
    if($uresult){
        echo "<script>alert('Category Updated')</script>";
        echo "<script>window.open('adminind.php?viewtheme','_self')</script>";
    }
}
}
?>

<!-- Deletion of Theme -->
<?php
  if(isset($_GET['tdelete'])){
    $id = $_GET['tdelete'];
    $delt = "delete from theme WHERE theme_id = $id";
    $tresult = mysqli_query($con, $delt);
    if($tresult){
        echo "<script>alert('Theme Deleted')</script>";
        echo "<script>window.open('adminind.php?viewtheme','_self')</script>";
    }
  }
?>