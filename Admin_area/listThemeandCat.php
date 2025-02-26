<!-- Editing & deleting parts of categories -->

<?php

# list all Categories available in this project and has option to edit or delete.
if(isset($_GET['viewcat'])){
    $num=1;
?>
    <h3 class="text-center">CATEGORIES</h3>
    <table class="table table-border mt-5 text-center">
        <thead>
            <tr>
                <th>no</th>
                <th>Category</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $qry1 = "select * from categories";
              $result1 = mysqli_query($con, $qry1);
              while($row1 = mysqli_fetch_assoc($result1)){
                $cid = $row1['category_id'];
                $cname = $row1['category_title'];
            ?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $cname; ?></td>
                <td><a href='adminind.php?cedit=<?php echo $cid; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <!--<td><a href='adminind.php?cdelete=<?php echo $cid; ?>' class='text-dark' type="button" data-toggle="modal" data-target="#exampleModal1"><i class='fa-solid fa-trash'></i></a></td>-->
              </tr>
            <?php
              }
            ?>
        </tbody>
    </table>
<?php
} # end of while loop
?>

<!-- Editing & deleting parts of categories end Here -->



<!-- Editing & deleting parts of Theme -->
<?php

# list all Theme available in this project and has option to edit or delete.
if(isset($_GET['viewtheme'])){
$num=1;
?>

<h3 class="text-center">Themes</h3>
    <table class="table table-border mt-5 text-center">
        <thead>
            <tr>
                <th>no</th>
                <th>Theme</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $qry = "select * from theme";
              $result = mysqli_query($con, $qry);
              while($row1 = mysqli_fetch_assoc($result)){
                $tid = $row1['theme_id'];
                $tname = $row1['theme_title'];
            ?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $tname; ?></td>
                <td><a href='adminind.php?tedit=<?php echo $tid; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <!--<td><a href='adminind.php?tdelete=<?php echo $tid; ?>' type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>-->
              </tr>
            <?php
              }
            ?>
        </tbody>
    </table>

<?php
} # end of while loop
?>
