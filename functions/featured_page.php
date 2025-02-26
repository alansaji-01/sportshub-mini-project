<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .featured-title {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            position: relative;
            width: calc(33.33% - 20px);
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            overflow: hidden;
            color: white;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: auto;
            display: block;
        }
        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 20px;
        }
        .card-content h3 {
            margin: 0;
            font-size: 20px;
            color: #E8DCEC;
        }
        .card-content p {
            margin: 5px 0;
            font-size: 16px;
            color: #E8DCEC;
        }
        .shop-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: white;
            color: black;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }
        .shop-button:hover {
            background-color: #333;
            color: white;
        }
        

        @media (max-width: 768px) {
            .card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="featured-title">Featured Products</div>
        <div class="cards">
            <div class="card">
                <img alt="Bucket List" src="./Images/featuredimg1.jpg"/>
                <div class="card-content">
                    <p>Latest Collections</p>
                    <h3>Equipments</h3>
                    <a class="shop-button" href="./functions/featured_page_actions.php?action=1">Shop</a>
                </div>
            </div>
            <div class="card">
                <img alt="Collection of Jersey" src="./Images/featuredimg2.jpg"/>
                <div class="card-content">
                    <p>Retro and More</p>
                    <h3>Fans Favorite</h3>
                    <a class="shop-button" href="./functions/featured_page_actions.php?action=2">Shop</a>
                </div>
            </div>
            <div class="card">
                <img alt="Two children playing, one wearing a 'Just Do It' t-shirt" src="./Images/featuredimg3.jpg"/>
                <div class="card-content">
                    <p>Touch with Us</p>
                    <h3>Our Community</h3>
                    <a class="shop-button" href="./functions/featured_page_actions.php?action=3">Visit</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
