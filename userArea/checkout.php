<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Home</title>
    <link rel="stylesheet" href="css/mhome.css">
</head>
<body>
<!-- linked files containing external links, connection script, common functions. cart() is called here. to perform cart operations.
  No matter where it is called, matter when the user click the 'Add to cart' btn -->
    <?php include('../externals/links.php'); include('../externals/connect.php'); session_start();  ?>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img height="50px" src="../Images/sportsHubLogo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../mhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../display_all_products.php">Products</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Contact</a>
                        </li>
                        
                        
                    </ul>
                    
                    <div>
                        <?php
                            if (!isset($_SESSION['username'])) {
                                echo "<a href='./userArea/userlogin.php' class='btn btn-warning m-2'>Login</a>";
                            } else {
                                echo "<a href='logout.php' class='btn btn-danger m-2'>Logout</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>


<!-- Theme -->
<div class="bg-light text-dark text-center">
        <h1>Sports Hub</h1>
</div>
<!-- products -->
<div class="row px-1">
  <?php
    if(!isset($_SESSION['username'])){
        include('userlogin.php');
    }else{
        include('payment.php');
    }
  ?>
  
  <!--row - ending-->
</div>

</body>
</html>