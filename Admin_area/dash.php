<?php
include('../externals/connect.php'); 

# Total revenue

$query = "SELECT SUM(total_price) AS total FROM pending_order";
$rEs = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($rEs);
$totalSales = $row['total'];

# count of Total Products available

$q = "SELECT COUNT(*) AS Tno FROM product"; 
$res1 = mysqli_query($con, $q);
$row1 = mysqli_fetch_assoc($res1);
$no = $row1['Tno'];

# count of stocks are of out 

$q2 = "SELECT COUNT(*) AS stk FROM product where status = 'False'"; 
$res2 = mysqli_query($con, $q2);
$row2 = mysqli_fetch_assoc($res2);
$stk = $row2['stk'];

# number odf users

$q2 = "SELECT COUNT(*) AS uno FROM usertable"; 
$res2 = mysqli_query($con, $q2);
$row2 = mysqli_fetch_assoc($res2);
$uno = $row2['uno'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            height: 100vh;
        }
        .dashboard {
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            margin-left: 350px;      /* <== UGLY ASF */
        }
        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .card h2 {
            margin: 10px 0;
            font-size: 28px;
            color: #333;
        }
        .card p {
            font-size: 18px;
            color: #777;
        }
        .icon {
            font-size: 50px;
            color: #3498db; /* Blue color for icons */
        }
    </style>
</head>
<body>

<div class="dashboard">
    <div class="card">
        <div class="icon">💰</div>
        <h2><?php echo $totalSales.' ₹'; ?></h2>
        <p>Total Sales</p>
    </div>
    <div class="card">
        <div class="icon">📦</div>
        <h2><?php echo $no; ?></h2>
        <p>Total Products</p>
    </div>
    <div class="card">
        <div class="icon">🚫</div>
        <h2><?php echo $stk; ?></h2>
        <p>Out of Stock Products</p>
    </div>
    <div class="card">
        <div class="icon">👥</div>
        <h2><?php echo $uno; ?></h2>
        <p>Total Users</p>
    </div>
</div>

</body>
</html>
