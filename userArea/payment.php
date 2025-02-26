<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub - Payment</title>
    <link rel="stylesheet" href='../css/footershow.css'>
    <?php include('../externals/links.php'); include('../functions/common_functions.php');  include('../externals/connect.php'); ?>
    <style>
        img{
            width: 90%;
            margin: auto;
            display:block;
        }
        .ad-img {
        width: 100%;
        max-width: 600px;
        height: auto;
    }
    .ads{
        display: flex;
        justify-content: space-between;
    }
    </style>
</head>
<body>
    <?php
       $userip = getIPAddress();
       $q = "select * from usertable where userip='$userip'";
       $result = mysqli_query($con, $q);
       $row = mysqli_fetch_assoc($result);
       $user_id = $row['userid'];
    ?>
    <div class="container">
        <a href='../cart.php' class='btn btn-warning'>BACK</a>
        <h1 class="text-center text-success">Payment</h1>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-12">
               <a href="order.php?ui=<?php echo $user_id; ?>"><h2 class="text-center">Confirm</h2></a>
            </div>
        </div>
        <h1 class="text-center md-3">Advertisements</h1>
        <div class='ads'>
            <img src="../Images/ad1.jpg" alt="" class="ad-img">
            <img src="../Images/ad2.jpg" alt="" class="ad-img">
        </div>
    </div>
    <div class="mcontainer">
    <h1 class="text-center">Retro products from your favorite clubs</h1>
    <div class="mlogo-container" id="logoContainer"></div>
</div>
<script>
    const logoContainer = document.getElementById('logoContainer');

    // Define arrays for image paths, names, and class names
    const logos = [
        { src: '../Images/logos/acm.png', name: 'AC Milan' },
        { src: '../Images/logos/csk.png', name: 'Chennai Super Kings' },
        { src: '../Images/logos/al-nassr.png', name: 'Al-Nassr' },
        { src: '../Images/logos/Argentina.png', name: 'Argentina' },
        { src: '../Images/logos/arsnl.png', name: 'Arsenal' },
        { src: '../Images/logos/atk.png', name: 'Atlético de Madrid' },
        { src: '../Images/logos/ats.png', name: 'Atalanta BC' },
        { src: '../Images/logos/bvb.png', name: 'Dortmund' },
        { src: '../Images/logos/ch.png', name: 'Chelsea' },
        { src: '../Images/logos/fcb.png', name: 'Barcelona' },
        { src: '../Images/logos/fcbm.png', name: 'Bayern Munich' },
        { src: '../Images/logos/mi.png', name: 'Mumbai Indians' },
        { src: '../Images/logos/goat.png', name: 'Real Madrid' },
        { src: '../Images/logos/intermiami.png', name: 'Inter Miami' },
        { src: '../Images/logos/manC.png', name: 'Manchester City' },
        
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

</body>
</html>