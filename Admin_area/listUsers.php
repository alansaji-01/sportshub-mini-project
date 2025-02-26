<h3 class="text-center">Our Users</h3>
<?php
  $qry3 = "select * from usertable";
  $result3 = mysqli_query($con, $qry3);
  $c = mysqli_num_rows($result3);
  if($c == 0){
    echo "<h1 class='text-center'>No Users found</h1>";
  }else{
    $num = 1;
?>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th>no</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
          while($Row0 = mysqli_fetch_array($result3)){
            $userIp = $Row0['userip'];
            $uid = $Row0['userid'];
            $email = $Row0['email'];
            $username = $Row0['username'];
            $address = $Row0['address'];
            $phone = $Row0['phone'];
          
        ?>
        <tr>
            <td><?php echo $num++; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $phone; ?></td>
           <!-- <td><a href='adminind.php?udelete=<?php echo $uid; ?>' type="button" class="text-dark" data-toggle="modal" data-target="#exampleUModal5"><i class='fa-solid fa-trash'></i></a></td> -->

        </tr>
        <?php
           } # closing of While loop
        ?>
    </tbody>
</table>

<?php
          
  } # closing of else
?>
<div class='modal fade' id='exampleUModal5' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel5' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-body'>
        Are you sure you want to delete this Payment detail?
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>NO</button>
        <button type='button' class='btn btn-primary'><a class='text-light text-decoration-none' href='adminind.php?udelete=<?php echo $uid; ?>'>I am Sure</a></button>
      </div>
    </div>
  </div>
</div>

<!-- Deletion of Order details -->
<?php
  if(isset($_GET['udelete'])){
    $id = $_GET['udelete'];
    $delt = "delete from usertable WHERE userid = $id";
    $tresult = mysqli_query($con, $delt);
    if($tresult){
        echo "<script>alert('User info Deleted')</script>";
        echo "<script>window.open('adminind.php?listusers','_self')</script>";
    }
  }
?>