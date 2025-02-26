<?php

  if(isset($_GET['editac'])){
    $username = $_SESSION['username'];
    $qry = "select * from usertable where username='$username'";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_assoc($result);
    $id = $row['userid'];
    $uname_ = $row['username'];
    $email_ = $row['email'];
    $address_ = $row['address'];
    $phone_ = $row['phone'];
    
    if(isset($_REQUEST['updateBtn'])){
        $updtid = $id;
        $updtuname = $_POST['updatedname'];
        $updtmail = $_POST['updatemail'];
        $updtaddress = $_POST['updatedaddress'];
        $updtphone = $_POST['updatedphone'];
        $qry1 = "update usertable set username='$updtuname', email='$updtmail',address='$updtaddress',phone='$updtphone' where userid=$updtid";
        $result1 = mysqli_query($con, $qry1);
        if($result1){
            echo "<script>alert('User details updated successfully');</script>";
        }

    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit My Account</title>
</head>
<body>
    <h3>Edit Account</h3>

    <form method="post">
    <div class="form-outline mb-4 row">
        <label for="username" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input id="username" value="<?php echo $uname_; ?>" type="text" class="form-control w-50" name="updatedname" placeholder="Enter username">
        </div>
    </div>
    <div class="form-outline mb-4 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input id="email" value="<?php echo $email_; ?>" type="email" class="form-control w-50" name="updatemail" placeholder="Enter Email">
        </div>
    </div>
    <div class="form-outline mb-4 row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input id="address" value="<?php echo $address_; ?>" type="text" class="form-control w-50" name="updatedaddress" placeholder="Enter Address">
        </div>
    </div>
    <div class="form-outline mb-4 row">
        <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
            <input id="phone" value="<?php echo $phone_; ?>" type="text" class="form-control w-50" name="updatedphone" placeholder="Enter contact no">
        </div>
    </div>
    <input type="submit" class="bg-info py-2 px-3 border-0" value="Update" name="updateBtn">
</form>


</body>
</html>