<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Home</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/trending.css">
    <link rel="stylesheet" href="./css/aboutus.css">
    <link rel="stylesheet" href='./css/footershow.css'>
</head>
<body>
<!-- linked files containing external links, connection script, common functions. cart() is called here. to perform cart operations.
  No matter where it is called, matter when the user click the 'Add to cart' btn -->
    <?php include('externals/links.php'); include('externals/connect.php'); include('functions/common_functions.php'); cart(); session_start(); ?>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <img src="./Images/sportsHubLogo.png" class="logoStyles" style="height: 50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="mhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="display_all_products.php">Products</a>
        </li>
        <?php
        
        if(isset($_SESSION['username'])){
          echo "
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='./userArea/profile.php'><i class='fa-solid fa-user' style='color: #ffffff;'></i></a>
            </li>
          ";
        }else{
          echo "
            <li class='nav-item'>
              <a class='nav-link active text-light' aria-current='page' href='./userArea/registration.php'>Register</a>
            </li>
          ";
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#aboutUs"><i class="fa-solid fa-phone"></i></a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Total <?php cartTotalPrice(); ?></a>
        </li> -->
        <li class="nav-item">
          <!-- cartCount() will simply print the no. of items inside the cart -->
          <a class="nav-link active text-light" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cartCount(); ?></sup> </a>
        </li>
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <?php
              display_categories(); # function to fetch themes from the db and display on the NAV_BAR. The common functions are defined in the /functions/common_functions.php
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Theme
</button>
          <ul class="dropdown-menu dropdown-menu-light">
          <?php
              display_theme(); # function to fetch themes from the db and display on the NAV_BAR. The common functions are defined in the /functions/common_functions.php
            ?>
          </ul>
        </li>
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
        <a href='./userArea/userlogin.php' class='nav-link text-light'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
        <a href='./userArea/profile.php' class='nav-link text-light'>Welcome ". $_SESSION['username']."</a>
        </li>";
          }
        ?>
      </ul>
      <form class="d-flex" role="search" action="searched_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="item-search">
        <input type="submit" class="btn btn-outline-success" value="Search" name="search">
      </form>
      <div>
        <?php
          if(!isset($_SESSION['username'])){
            echo "<a href='./userArea/userlogin.php' class='btn btn-warning m-2'>Login</a>";
          }else{
            echo "<a href='./userArea/logout.php' class='btn btn-danger m-2'>Logout</a>";
          }
        ?>
      </div>
    </div>
  </div>
</nav>
</div>
<div class="video-container">
        <video autoplay muted loop>
            <source src="./Images/theme_sports.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="overlay">
            <h1>SportsHub</h1>
            <p><i>Focus on your Games</i></p>
            <button onclick="location.href='#sportsHub'">Get Started</button>
        </div>
    </div>
<!-- Theme -->
<div class="mt-2 bg-light text-dark text-center">
        <h1>Sports Hub</h1>
</div>

<!-- products -->
<div class="row px-1" id="sportsHub">
            <!-- fetching products -->
  <?php
    #getproducts();  # function to fetch 12 products from the db and display. The common functions are defined in the /functions/common_functions.php
    include('./functions/featured_page.php');
    getUniqueProductsCat();  # function to fetch products from the db and display. this function will fetch products based on the selected Category from the nav bar.
    getUniqueProductsTheme(); # function to fetch products from the db and display. this function will fetch products based on the selected Theme from the nav bar.
    #echo getIPAddress();
    trendingProducts();
    ?>
<h1 class="text-center mt-3">About Us</h1>
<div id='aboutUs' class="about-container">
    <div class="section left-section">
        <img src="./Images/ci3.jpg" alt="SportsHub Image 1">
        <div class="partner-text">
            <h3>What do we mean by this Project</h3>
            <p>Our project, "SportsHub," is a dynamic sports eCommerce website designed to demonstrate our proficiency in PHP and MySQLi. The platform serves as a comprehensive online store for sports enthusiasts, offering a wide range of equipment, apparel, and accessories. By leveraging PHP for server-side scripting and MySQLi for database management, we’ve built a seamless user experience that includes easy product browsing, secure checkout processes, and efficient inventory management. SportsHub not only showcases our technical abilities in web development but also highlights our focus on building functional, scalable, and user-friendly platforms that meet the needs of both customers and administrators.</p>
        </div>
    </div>
    <div class="section right-section">
        <img src="./Images/ci1.jpg" alt="SportsHub Image 2">
        <div class="partner-text">
            <h3>Built by</h3>
            <p>The development of "SportsHub" was carried out by a dedicated team of developers: Alan Saji, responsible for backend development and system architecture, can be reached at <a href="mailto:alan.saji@email.com">alan.saji@email.com</a>; Shan Shany, who contributed to the frontend design and user experience, can be contacted at <a href="mailto:shan.shany@email.com">shan.shany@email.com</a>; and Lijo Joseph, who focused on database integration and performance optimization, is available at <a href="mailto:lijo.joseph@email.com">lijo.joseph@email.com</a>. Together, we combined our expertise to create a robust and user-friendly eCommerce platform.</p>
        </div>
    </div>
</div>









  <!--row - ending-->
</div>

<div class="mcontainer">
    <h1 class="text-center">Retro products from your favorite clubs</h1>
    <div class="mlogo-container" id="logoContainer"></div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js'></script>

<script>
  const carousel = document.querySelector('.sph-carousel');
    const items = document.querySelectorAll('.sph-carousel-item');
    const totalItems = items.length;
    let currentIndex = 0;

    function moveCarousel(direction) {
        const itemWidth = items[0].offsetWidth + 16;

        if (direction === 1) {
            if (currentIndex > 0) {
                currentIndex--;
            }
        } else if (direction === 0) {
            if (currentIndex < totalItems - 4) { // Change based on visible items (4 here)
                currentIndex++;
            }
        }

        const offset = -currentIndex * itemWidth;
        carousel.style.transform = `translateX(${offset}px)`;
    }
</script>

<script>
    const logoContainer = document.getElementById('logoContainer');

    // Define arrays for image paths, names, and class names
    const logos = [
        { src: './Images/logos/acm.png', name: 'AC Milan' },
        { src: './Images/logos/csk.png', name: 'Chennai Super Kings' },
        { src: './Images/logos/al-nassr.png', name: 'Al-Nassr' },
        { src: './Images/logos/Argentina.png', name: 'Argentina' },
        { src: './Images/logos/arsnl.png', name: 'Arsenal' },
        { src: './Images/logos/atk.png', name: 'Atlético de Madrid' },
        { src: './Images/logos/ats.png', name: 'Atalanta BC' },
        { src: './Images/logos/bvb.png', name: 'Dortmund' },
        { src: './Images/logos/ch.png', name: 'Chelsea' },
        { src: './Images/logos/fcb.png', name: 'Barcelona' },
        { src: './Images/logos/fcbm.png', name: 'Bayern Munich' },
        { src: './Images/logos/mi.png', name: 'Mumbai Indians' },
        { src: './Images/logos/goat.png', name: 'Real Madrid' },
        { src: './Images/logos/intermiami.png', name: 'Inter Miami' },
        { src: './Images/logos/manC.png', name: 'Manchester City' },
        
    ];

    // Function to create logo elements
    function createLogos() {
        logos.forEach(logo => {
            const logoItem = document.createElement('div');
            logoItem.className = 'mlogo-item '; 

            const img = document.createElement('img');
            img.alt = `${logo.name} logo`;
            img.src = logo.src; // Set the image source
            img.className = 'mlogo-image'; // Add a common class for styling, if needed
            img.height = 60;
            img.width = 60;

            const span = document.createElement('span');
            span.textContent = logo.name; // Set the text content

            logoItem.appendChild(img);
            logoItem.appendChild(span);
            logoContainer.appendChild(logoItem);
        });
    }

    // Call the function to create logos
    createLogos();

    function moveLogos() {
        const firstItem = logoContainer.firstElementChild;
        logoContainer.appendChild(firstItem);
    }

    setInterval(moveLogos, 1000);

</script>


<?php include('externals/footer.php'); ?>
</body>
</html>