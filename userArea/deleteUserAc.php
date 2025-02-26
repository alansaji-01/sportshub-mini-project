<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete - SportsHub account</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete your account? This action cannot be undone.");
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Delete Account</h3>
        <form method="post" class="mt-5" onsubmit="return confirmDelete();">
            <div class="form-group mb-4">
                <input type="submit" value="Delete account" name="delete" class="btn btn-danger btn-block w-50 m-auto">
            </div>
            <div class="form-group mb-4">
                <input type="submit" value="Don't Delete account" name="deleteCancel" class="btn btn-secondary btn-block w-50 m-auto">
            </div>
        </form>
    </div>

</body>
</html>

<?php

$userName = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM usertable WHERE username = '$userName'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        session_destroy();
        echo "<script>alert('Account deleted');</script>";
        echo "<script>window.open('../mhome.php','_self');</script>";
    }
}
if (isset($_POST['deleteCancel'])) {
    echo "<script>window.open('profile.php','_self');</script>";
}
?>
