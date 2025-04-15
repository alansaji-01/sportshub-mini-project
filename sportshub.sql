-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 04:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_name`, `password`) VALUES
(1, 'alansaji', '********');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(225) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT 1,
  `cartID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Jersey'),
(2, 'Football Accessories'),
(3, 'Cricket Accessories '),
(9, 'BasketBall Accessories ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cartID` varchar(255) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `productId`, `user_id`, `username`, `cartID`, `amount_due`, `invoice_number`, `total_products`, `quantity`, `date`, `order_status`) VALUES
(1, 2, 1, 'maradona', '671e54feaef80', 10500, 1725876224, 3, 7, '2024-10-27 14:58:45', 'Completed'),
(2, 12, 1, 'maradona', '671e54feaef80', 2440, 1725876224, 3, 4, '2024-10-27 14:58:45', 'Completed'),
(3, 14, 1, 'maradona', '671e54feaef80', 3330, 1725876224, 3, 5, '2024-10-27 14:58:45', 'Completed'),
(4, 3, 1, 'maradona', '671e553be59cb', 24500, 1930371401, 1, 7, '2024-10-27 14:59:29', 'Completed'),
(5, 24, 1, 'maradona', '6724ab82664a1', 48993, 2130993929, 2, 7, '2024-11-01 10:34:19', 'Completed'),
(6, 34, 1, 'maradona', '6724ab82664a1', 1996, 2130993929, 2, 4, '2024-11-01 10:34:19', 'Completed'),
(7, 7, 1, 'maradona', '6724aedc83575', 700, 1112349935, 1, 1, '2024-11-01 10:35:40', 'Completed'),
(8, 5, 1, 'maradona', '6725f9027c5fe', 700, 1814355424, 1, 1, '2024-11-02 10:04:55', 'Completed'),
(9, 14, 1, 'maradona', '675b16f6b6a3f', 1332, 1483017548, 2, 2, '2024-12-12 17:02:44', 'Completed'),
(10, 23, 1, 'maradona', '675b16f6b6a3f', 4999, 1483017548, 2, 1, '2024-12-12 17:02:44', 'Completed'),
(21, 2, 1, 'maradona', '67710e9384310', 1500, 417176598, 4, 1, '2024-12-29 08:58:01', 'Completed'),
(23, 30, 1, 'maradona', '67710e9384310', 19596, 417176598, 4, 4, '2024-12-29 08:58:01', 'Completed'),
(28, 35, 1, 'maradona', '67780748ab636', 2500, 1818471513, 1, 1, '2025-01-03 16:04:26', 'Completed'),
(30, 10, 1, 'maradona', '6778db3d417a9', 640, 924692585, 4, 1, '2025-01-04 06:57:20', 'Completed'),
(31, 12, 1, 'maradona', '6778db3d417a9', 610, 924692585, 4, 1, '2025-01-04 06:57:20', 'Completed'),
(32, 29, 1, 'maradona', '6778db3d417a9', 4599, 924692585, 4, 1, '2025-01-04 06:57:20', 'Completed'),
(35, 24, 1, 'maradona', '67793bb36c9c9', 6999, 1362527555, 3, 1, '2025-01-04 14:41:51', 'Completed'),
(36, 29, 1, 'maradona', '67793bb36c9c9', 13797, 1362527555, 3, 3, '2025-01-04 14:41:51', 'Completed'),
(37, 34, 1, 'maradona', '67793bb36c9c9', 1996, 1362527555, 3, 4, '2025-01-04 14:41:51', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `pending_order_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `cartID` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`pending_order_id`, `order_id`, `user_id`, `product_id`, `invoice`, `total_price`, `cartID`, `quantity`, `date`, `status`) VALUES
(6, 10, 1, 23, '1998998554', 6331, '675b16f6b6a3f', 1, '2024-12-12 17:02:44', 'Completed'),
(11, 23, 1, 30, '250933794', 21096, '67710e9384310', 4, '2024-12-29 08:58:01', 'Completed'),
(14, 32, 1, 29, '1070021010', 5849, '6778db3d417a9', 1, '2025-01-04 06:57:20', 'Completed'),
(17, 6, 1, 34, '600571327', 22792, '67793bb36c9c9', 4, '2025-01-04 14:41:51', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `product_image1` varchar(150) NOT NULL,
  `product_image2` varchar(150) NOT NULL,
  `product_image3` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `category_id`, `theme_id`, `keyword`, `product_image1`, `product_image2`, `product_image3`, `price`, `stock`, `date`, `status`) VALUES
(1, 'FC Barcelona 2k15-16 Messi - SportsHub', 'The FC Barcelona 2015-16 Messi jersey captures the essence of the legendary player during a standout season. Featuring vibrant team colors and Messi-s iconic number 10, it symbolizes excellence in football and the clubs rich heritage', 1, 1, 'messi barcelona fcb jersey nike ', 'fcb-2015-16_1.jpg', 'fcb_2015-16_1.jpg', 'fcb_2015-16.jpg', '10', 23, '2024-10-31 06:38:54', 'True'),
(2, 'Adidas Brazuca - SportsHub', 'The Adidas Brazuca is the official match ball of the 2014 FIFA World Cup, known for its unique design and advanced technology, providing optimal performance and stability on the field.', 2, 2, 'football soccer ball', 'fb1.png', 'fb2.png', 'fb3.jpg', '1500', 24, '2024-12-29 08:58:01', 'True'),
(3, 'EURO 24 COMPETITION BALL - SportsHub', 'The EURO 24 Competition Ball features a dynamic design and cutting-edge technology, ensuring precision and control for top-level performance during the tournament. Perfect for players aiming for excellence on the pitch.', 2, 2, 'euro soccer football ball', 'afb1.jpg', 'afb2.jpg', 'afb3.jpg', '3500', 43, '2024-10-31 06:40:57', 'True'),
(4, '2009 FCB Messi Kit - SportsHub', 'The 2009 FC Barcelona Messi kit, featuring the iconic number 10, celebrates Messi-s pivotal role in the team-s historic treble-winning season, showcasing vibrant colors and a classic design that fans cherish', 1, 1, 'fcb barcelona messi 2009', 'fcb_2009-10_lm10_C.jpg', 'fcb_2009-10_lm10.jpg', 'fcb_2009-10_messi.jpg', '50', 20, '2024-10-31 07:24:57', 'True'),
(5, 'Messi number 10 retro jersey - SportsHub', 'Premium Quality Nike Jersey ', 1, 1, 'fcb messi ucl barcelona', 'fcb_ucl_lm10_2.jpg', 'fcb_ucl_lm10_1.jpg', 'fcb_ucl_lm10.jpg', '700', 49, '2025-01-05 14:25:13', 'True'),
(6, 'WC Messi no 10 Jersey - SportsHub', 'Discover the iconic design of Messi-s jersey from the 2022 World Cup, symbolizing his legacy and Argentinas triumph on the global stage. Celebrate the blend of style and history that made it a fan favorite.', 1, 5, 'world cup messi adidas leo messi', 'WC_lm10_1.jpg', 'WC_lm10_2.jpg', 'GOAT.jpg', '700', 50, '2025-01-05 14:30:01', 'True'),
(7, 'Neymar Jersey nike - SportsHub', 'Premium quality nike jersey FCB season 2k13 2k14', 1, 1, 'fcb neymar njr10 njr nike barcelona', 'njr_13__14.jpg', 'njr-13-14.jpg', '13-14-njr.jpg', '700', 42, '2025-01-05 14:25:37', 'True'),
(8, 'Neymar Jr jersey nike 2k15-16 - SportsHub', 'premium quality nike jersey fcb season 2k15 2k16', 1, 1, 'fcb neymar njr njr10 nike ', 'njr_15-16_1.jpg', 'njr-15-16.jpg', 'njr_fcb_15-16.jpg', '650', 50, '2025-01-05 14:26:11', 'True'),
(10, 'Ronaldinho Gaúcho jersey FCB - SportsHub', 'Premium quality nike retro jersey of Ronnie 2007-08', 1, 1, 'ronaldinho 10 fcb barcelona nike', 'r10-0708.jpg', 'ron10-07-08.jpg', 'Ronaldinho-07-08.jpg', '640', 49, '2025-01-05 14:26:33', 'True'),
(12, 'R. Lewandowski FCB Jersey Nike Spotify - SportsHub', 'Premium quality nike jersey 2k23 2k24', 1, 1, 'nike jersey fcb barcelona lewandowski 9', 'r9-23-24.jpg', 'r9-23-24_.jpg', '23-24-r9.jpg', '610', 44, '2025-01-05 14:27:10', 'True'),
(13, 'Paolo Maldini Jersey AC Milan - SportsHub', 'Retro premium Quality jersey ACM 97-98', 1, 4, 'maldini 3 jersey ac milan acm', '_m3-97-98.jpg', 'm3-97-98.jpg', 'm3_97.jpg', '600', 30, '2025-01-05 14:27:36', 'True'),
(14, 'P. Maldini retro jersey Adidas - SportsHub', 'Retro Jersey UCL winners 2006-2007', 1, 4, 'maldini adidas jersey acm ac milan', '06-07_m3.jpg', '06-07-m3.jpg', 'm3-06-07.jpg', '666', 43, '2025-01-05 14:28:06', 'True'),
(15, 'Zlatan Ibrahimović AC Milan - SportsHub', 'Puma retro jersey ACM 2k20 2k21', 1, 4, 'acm ac milan jersey zlatan ibrahimovic puma', '20_21.jpeg', 'zl_20-21.jpg', '20-21_zl.jpg', '677', 50, '2025-01-05 14:28:26', 'True'),
(16, 'C. Ronaldo Adidas Real Madrid Jersey - SportsHub', 'premium quality adidas CR7 jersey RMA', 1, 3, 'real madrid rma cr7 ronaldo jersey adidas', 'cr7-16-17.jpg', '16-17-cr7.jpg', 'cr7_purple.jpg', '600', 42, '2025-01-05 14:28:49', 'True'),
(21, 'Carles Puyol FCB Nike Jersey - SportsHub', 'Discover the iconic FCB jersey worn by Carles Puyol, a symbol of leadership and passion on the pitch. Celebrate the legacy of this Barcelona legend with every stitch and detail', 1, 1, 'carles puyol 5 p5 jersey fcb barcelona barca spain captain', 'p1.jpg', 'p2.jpg', 'p3.jpg', '300', 5, '2024-10-31 07:27:24', 'False'),
(22, 'Decathlon T500 Cricket Bat - SportsHub', 'The Decathlon T500 Cricket Bat is designed for aspiring players, offering a balanced blend of power and precision with its lightweight construction and high-quality willow. Perfect for enhancing your game on the field', 3, 16, 'cricketbat bat ss decathlon t500 cricket', 'bat.jpg', 'bat2.jpg', 'bat3.jpg', '1000', 17, '2024-10-30 13:08:26', 'True'),
(23, 'Ultra 5 match FG-AG puma boot - SportsHub', 'The Puma Ultra 5 Match FG/AG boots are engineered for speed and agility, featuring a lightweight design and superior traction for both firm and artificial ground surfaces. Ideal for players looking to elevate their game with every step', 2, 2, 'boots puma football ', 'b2.jpg', 'b1.jpg', 'b3.jpg', '4999', 5, '2025-01-05 14:31:17', 'True'),
(24, 'SS Cricket kit - SportsHub', 'The SS Cricket Set includes essential gear for budding cricketers, featuring a durable bat, lightweight stumps, and a soft ball, perfect for practicing skills and enjoying the game in the backyard or at the park', 3, 16, 'cricket kit bat ball helmet pads ss', 'sky_kit_1.jpg', 'helmet.jpg', 'pads.jpg', '6999', 12, '2025-01-04 14:41:51', 'True'),
(25, 'Basket Ball Net - SportsHub', 'The basketball net is designed for durability and optimal performance, made from weather-resistant materials to withstand the elements. Its the perfect addition to any hoop, providing a satisfying swish with every shot!', 9, 15, 'basketball ball basket net ', 'basket.jpg', 'basket1.jpg', 'basket2.jpg', '599', 6, '2024-10-31 07:27:24', 'False'),
(26, 'Puma AC Milan Training Kit - SportsHub', 'The Puma AC Milan Training Kit combines style and performance, featuring moisture-wicking fabric and a sleek design. Perfect for fans and players alike, it showcases your support for the legendary club while enhancing your training experience', 1, 2, 'jersey training kit acm acmilan maldini efootball', 'tk1.jpg', 'tk3.jpg', 'tk2.jpg', '4999', 5, '2024-10-31 07:27:24', 'False'),
(27, 'SS Premium Bat - SportsHub', 'The SS Bat is a versatile, high-performance sports bat designed for optimal power and precision, perfect for players of all skill levels looking to elevate their game', 3, 16, 'cricket bat ss ipl', 'ss2.jpg', 'ss1.jpg', 'ss_premium_bat_1.jpg', '2999', 6, '2024-10-31 07:27:24', 'False'),
(28, 'Konex Basket Ball - SportsHub', 'Konex basketballs are designed for superior grip and durability, making them ideal for both indoor and outdoor play. Perfect for players seeking performance and reliability on the court', 9, 15, 'basketball basket bs american', 'basketball.jpg', 'basketball1.jpg', 'basketball2.jpg', '2799', 20, '2024-10-31 06:17:00', 'True'),
(29, 'Puma Hoops Basketball - SportsHub', 'Puma Hoops Basketballs combine innovative design with high-quality materials, offering exceptional grip and control for players at every level. Elevate your game with a ball built for performance and style', 9, 15, 'basketball puma ameican usa net ', 'PUMA-Hoops-Basketball.jpg', 'PUMA-Hoops-Basketball1.jpg', 'PUMA-Hoops-Basketball2.jpg', '4599', 8, '2025-01-05 06:03:22', 'True'),
(30, 'Puma Fast Boot - SportsHub', 'The Puma Fast Boot features a lightweight design and advanced technology for speed and agility on the field, providing players with optimal comfort and support for peak performance. Perfect for athletes looking to elevate their game', 2, 2, 'football boots puma violet neymar ', 'b12.jpg', 'b13.jpg', 'b11.jpg', '4899', 26, '2024-12-29 08:58:01', 'True'),
(31, 'Puma Cage Football - SportsHub', 'The Puma Cage Football is engineered for precision and durability, making it ideal for small-sided games and training sessions. Its responsive touch and vibrant design enhance performance and visibility on the pitch', 2, 2, 'football soccer puma ', 'PUMA-CAGE-Football.jpg', 'PUMA-CAGE-Football1.jpg', 'PUMA-CAGE-Football2.jpg', '2799', 30, '2024-10-31 06:24:48', 'True'),
(32, 'Puma Quarter Socks of 6 sets - SportsHub', 'The Puma Quarter Socks set includes six pairs designed for comfort and performance, featuring moisture-wicking fabric and a snug fit. Perfect for athletes and everyday wear, these socks provide support and breathability for any activity', 2, 2, 'puma bootsocks football gloves ', 'Unisex-Quarter-Plain-Socks-Pack-of-6.jpg', 'Unisex-Quarter-Plain-Socks-Pack-of-62.jpg', 'Unisex-Quarter-Plain-Socks-Pack-of-63.jpg', '3499', 6, '2024-10-31 07:27:24', 'False'),
(33, 'Bamboo Boot Socks Black - SportsHub', 'Bamboo Boot Socks in black offer exceptional comfort and moisture-wicking properties, making them perfect for outdoor activities. With their soft texture and eco-friendly material, these socks provide warmth and breathability for all-day wear', 2, 2, 'bootsocks football bamboo puma nike', 'bootsocks.jpg', 'bootsocks2.jpg', 'bootsocks1.jpg', '279', 27, '2024-10-31 06:34:21', 'True'),
(34, 'Boot Socks with Gripper by Bamboos - SportsHub', 'Boot Socks with Gripper by Bamboos feature a soft, breathable bamboo blend and non-slip grips, ensuring a secure fit inside your boots. Ideal for outdoor activities, these socks provide comfort, warmth, and stability for all-day adventures', 2, 2, 'bootsocks football bamboos socks', 'bootsocks11.jpg', 'bootsocks12.jpg', 'bootsocks13.jpg', '499', 37, '2025-01-04 14:41:51', 'True'),
(40, 'RMA Ronaldo Adidas Jersey - SportsHub', 'Relive the iconic Calma moment with Ronaldo legendary jersey, symbolizing confidence and unrivaled greatness', 1, 3, 'cr7 ronaldo jersey adidas rma real madrid', 'cr7RMA2.jpg', 'cr7RMA1.jpg', 'cr7RMA3.png', '2800', 10, '2025-01-05 14:21:46', 'True'),
(41, 'RMA Ronaldo away Jersey - SportsHub', 'Celebrate Ronaldo unforgettable bicycle kick against Juventus with this iconic jersey, a testament to sheer brilliance', 1, 3, 'rma jersey cr7 ronaldo real madrid adidas', 'cr7RMA23.jpg', 'cr7RMA22.jpg', 'cr7RMA21.png', '2500', 5, '2025-01-05 14:23:59', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_title`) VALUES
(1, 'FC Barcelona'),
(2, 'Football accessories '),
(3, 'Real Madrid'),
(4, 'AC Milan'),
(5, 'Argentina '),
(6, 'Kerala Blasters FC'),
(7, 'Portugal'),
(15, 'BasketBall'),
(16, 'Cricket');

-- --------------------------------------------------------

--
-- Table structure for table `users_payment`
--

CREATE TABLE `users_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_payment`
--

INSERT INTO `users_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(15, 3, 943051167, 2070, 'Netbanking', '2024-10-27 14:39:10'),
(16, 4, 1157498225, 11768, 'Netbanking', '2024-10-27 14:43:04'),
(17, 5, 1036612900, 10500, 'Paytm', '2024-10-27 14:55:33'),
(18, 5, 1036612900, 10500, 'Paytm', '2024-10-27 14:56:06'),
(19, 3, 1049600916, 16270, 'Cash On Delivery', '2024-10-27 14:58:45'),
(20, 4, 104555124, 24500, 'Paytm', '2024-10-27 14:59:29'),
(21, 6, 235343734, 50989, 'Netbanking', '2024-11-01 10:34:19'),
(22, 7, 836470558, 700, 'Paytm', '2024-11-01 10:35:40'),
(23, 8, 1349636498, 700, 'Netbanking', '2024-11-02 10:04:55'),
(24, 10, 1998998554, 6331, 'Paytm', '2024-12-12 17:02:44'),
(25, 23, 250933794, 21096, 'Paytm', '2024-12-29 08:58:01'),
(26, 28, 12668409, 2500, 'Paytm', '2025-01-03 16:04:26'),
(27, 32, 1070021010, 5849, 'Netbanking', '2025-01-04 06:57:20'),
(28, 37, 600571327, 22792, 'Paytm', '2025-01-04 14:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(220) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userip` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userid`, `username`, `email`, `password`, `userip`, `address`, `phone`) VALUES
(1, 'maradona', 'myemail@yahoo.com', '$2y$10$RlekmiJdIEkS9mb1.m.wDev8M8maFwBNmQ41i4dDGHBle6/6zbxiG', '::1', 'Argentina', '9874563986');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`pending_order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users_payment`
--
ALTER TABLE `users_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `pending_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_payment`
--
ALTER TABLE `users_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
