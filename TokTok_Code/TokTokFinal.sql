-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2022 at 03:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TokTokFinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_ID` int(11) NOT NULL,
  `Address_name` varchar(40) DEFAULT NULL,
  `Address_PhoneNum` varchar(20) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Subdistrict` varchar(30) DEFAULT NULL,
  `District` varchar(20) DEFAULT NULL,
  `Province` varchar(30) DEFAULT NULL,
  `PostCode` int(5) DEFAULT NULL,
  `AUser_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address_ID`, `Address_name`, `Address_PhoneNum`, `Address`, `Subdistrict`, `District`, `Province`, `PostCode`, `AUser_ID`) VALUES
(11, 'Home1', '0996969696', '333/69', 'Meung', 'Meung', 'Pathumthani', 12000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Quntity` int(3) DEFAULT NULL,
  `Token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Product_ID`, `User_ID`, `Quntity`, `Token`) VALUES
(92, 8, 6, 1, 'dbeb6a49e9fe4465945c00e8d4d08354'),
(93, 1, 6, 1, 'dbeb6a49e9fe4465945c00e8d4d08354'),
(94, 12, 6, 1, '99123dbe95248a05c1a9ca841dcebb34'),
(95, 28, 6, 1, '99123dbe95248a05c1a9ca841dcebb34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Category` int(11) DEFAULT NULL,
  `Price` int(7) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Brand` int(11) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Movement` int(11) DEFAULT NULL,
  `Product_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Category`, `Price`, `Name`, `Brand`, `Color`, `Movement`, `Product_img`) VALUES
(1, 2, 376700, 'Astron-SSH067', 1, 'silver', 3, './img/watch_img/seiko/seiko_astron_ssh067.png'),
(2, 1, 88200, 'Astron-SSH001', 1, 'silver,blue ', 3, './img/watch_img/seiko/seiko_astron_ssh001.png'),
(3, 1, 140700, 'Astron-SSH023', 1, 'black', 3, './img/watch_img/seiko/seiko_astron_ssh023.png'),
(4, 1, 48000, 'Presage-SPB239', 1, 'silver,brown', 2, './img/watch_img/seiko/seiko_presage_spb239.png'),
(5, 2, 27400, 'Presage-SSC757', 1, 'black,silver', 2, './img/watch_img/seiko/seiko_presage_ssc757.png'),
(6, 2, 21700, 'Prospex-SRPH75', 1, 'blue,silver', 2, './img/watch_img/seiko/seiko_prospex_srph75.png'),
(7, 2, 29500, 'Premier-SNP141', 1, 'silver, black', 2, './img/watch_img/seiko/seiko_premier_snp141.png'),
(8, 2, 15300, 'Premier-SUT346', 1, 'gold, silver', 2, './img/watch_img/seiko/seiko_premier_sut346.png'),
(9, 2, 14600, 'Premier-SXB429', 1, 'silver', 2, './img/watch_img/seiko/seiko_premier_sxb429.png'),
(10, 2, 10000, '5 Sports-SPRH27', 1, 'black,silver', 2, './img/watch_img/seiko/seiko_5sport_srph27.png'),
(11, 2, 10500, '5 Sports-SPRG37', 1, 'black', 2, './img/watch_img/seiko/seiko_5sport_srpg37.png'),
(12, 2, 11700, '5 Sports-SPRD53', 1, 'red/blue,silver', 2, './img/watch_img/seiko/seiko_5sport_srpd53.png'),
(13, 2, 12800, '5 Sports-SRPD51', 1, 'blue,silver', 2, './img/watch_img/seiko/seiko_5sport_srpd51.png'),
(14, 2, 100000, 'AIR-KING', 5, 'oystersteel', 2, 'img/watch_img/Rolex/rolex_airking_o.png'),
(15, 2, 165200, 'Cartier-SNH12', 6, 'black,silver', 2, './img/watch_img/Cartier/c1.png'),
(16, 1, 182500, 'Cartier-AFS22', 6, 'silver', 2, './img/watch_img/Cartier/c2.png'),
(17, 2, 175000, 'Cartier-SNT82', 6, 'black', 2, './img/watch_img/Cartier/c3.png'),
(18, 1, 325000, 'Cartier-SPJ16', 6, 'black', 2, './img/watch_img/Cartier/c4.png'),
(19, 2, 421000, 'Cartier-SXA28', 6, 'silver', 2, './img/watch_img/Cartier/c5.png'),
(20, 1, 150000, 'Cartier-SNC16', 6, 'silver', 2, './img/watch_img/Cartier/c6.png'),
(21, 2, 125000, 'Cartier-SYM12', 6, 'silver', 2, './img/watch_img/Cartier/c7.png'),
(22, 1, 65000, 'Audemars-LYS18', 7, 'blue', 2, './img/watch_img/Audemars piguet/a1.png'),
(23, 1, 68999, 'Audemars-LTG18', 7, 'silver', 2, './img/watch_img/Audemars piguet/a2.png'),
(24, 2, 83520, 'Audemars-LTN18', 7, 'blue', 2, './img/watch_img/Audemars piguet/a3.png'),
(25, 1, 74500, 'Audemars-NTG12', 7, 'black', 2, './img/watch_img/Audemars piguet/a4.png'),
(26, 1, 120000, 'Audemars-QRD69', 7, 'black', 2, './img/watch_img/Audemars piguet/a5.png'),
(27, 2, 86000, 'Audemars-PLI15', 7, 'black', 2, './img/watch_img/Audemars piguet/a6.png'),
(28, 1, 79000, 'Audemars-ZTG15', 7, 'black', 2, './img/watch_img/Audemars piguet/a7.png'),
(29, 2, 1250000, 'PATEK-1145AX', 8, 'white orange', 2, './img/watch_img/Patek/a1.png'),
(30, 2, 1030000, 'PATEK-1425AT', 8, 'black,white', 2, './img/watch_img/Patek/a2.png'),
(31, 1, 2500000, 'PATEK-1253AY', 8, 'black', 2, './img/watch_img/Patek/a3.png'),
(32, 2, 3100000, 'PATEK-1685ZT', 8, 'black', 2, './img/watch_img/Patek/a4.png'),
(33, 1, 4000000, 'PATEK-6823ZA', 8, 'blue', 2, './img/watch_img/Patek/a5.png'),
(34, 2, 1200000, 'PATEK-8569TN', 8, 'black,white', 2, './img/watch_img/Patek/a6.png'),
(35, 2, 450000, 'Jaegar-SN1256', 11, 'black', 2, './img/watch_img/Jaegar/a1.png'),
(36, 1, 625000, 'Jaegar-ST1624', 11, 'white', 2, './img/watch_img/Jaegar/a2.png'),
(37, 1, 175000, 'Jaegar-ST3265', 11, 'white', 2, './img/watch_img/Jaegar/a3.png'),
(38, 2, 365000, 'Jaegar-OK4251', 11, 'white', 2, './img/watch_img/Jaegar/a4.png'),
(39, 1, 452000, 'Jaegar-AW1325', 11, 'white', 2, './img/watch_img/Jaegar/a5.png'),
(40, 1, 765000, 'Jaegar-TB1632', 11, 'blue, white', 2, './img/watch_img/Jaegar/a6.png'),
(41, 1, 850000, 'Jaegar-TO1212', 11, 'black', 2, './img/watch_img/Jaegar/a7.png'),
(42, 1, 850000, 'Vacheron-LJ1542', 9, 'black', 2, './img/watch_img/Vacheron/s1.png'),
(43, 1, 75000, 'Vacheron-TL3254', 9, 'blue', 2, './img/watch_img/Vacheron/s5.png'),
(44, 2, 35600, 'Vacheron-VR1325', 9, 'black', 2, './img/watch_img/Vacheron/s3.png'),
(45, 1, 140000, 'TUDON-TY1215', 10, 'black,white', 2, './img/watch_img/TUDON/s1.png'),
(46, 1, 170000, 'TUDON-6535XT', 10, 'blue', 2, './img/watch_img/TUDON/s2.png'),
(47, 1, 190000, 'TUDON-6597AT', 10, 'blue,black', 2, './img/watch_img/TUDON/s3.png'),
(48, 2, 8700, 'MISSION TO THE SUN', 3, 'Yellow/White', 3, 'img/watch_img/Swatch/sw1.jpeg'),
(49, 2, 8700, 'MISSION TO THE MOON', 3, 'Black/Grey', 3, 'img/watch_img/Swatch/sw2.jpeg'),
(50, 2, 9289000, 'SBGD209', 4, 'Silver', 2, 'img/watch_img/GS/gs1.png'),
(51, 2, 821000, '311.98.44.51.51.001', 2, 'Black', 1, 'img/watch_img/omega/omg1.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `Brand_ID` int(11) NOT NULL,
  `Brand` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`Brand_ID`, `Brand`) VALUES
(1, 'Seiko'),
(2, 'Omega'),
(3, 'Swatch'),
(4, 'Grand Seiko'),
(5, 'Rolex'),
(6, 'Cartier'),
(7, 'Audemars piguet'),
(8, 'Patek Philippe'),
(9, 'Vacheron Constantin'),
(10, 'TUDOR'),
(11, 'Jaeger LeCoultre');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Category_ID` int(11) NOT NULL,
  `Category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Category_ID`, `Category`) VALUES
(1, 'Dive Watches'),
(2, 'Dress Watches'),
(3, 'GMT Watches');

-- --------------------------------------------------------

--
-- Table structure for table `product_movement`
--

CREATE TABLE `product_movement` (
  `Movement_ID` int(11) NOT NULL,
  `Movement` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_movement`
--

INSERT INTO `product_movement` (`Movement_ID`, `Movement`) VALUES
(1, 'mechanical'),
(2, 'automatic'),
(3, 'quartz');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `shipping_address` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `shipping_method` int(11) DEFAULT NULL,
  `order_total` int(20) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `Cart_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`id`, `user_id`, `orderdate`, `shipping_address`, `payment_method`, `shipping_method`, `order_total`, `warranty`, `Cart_token`) VALUES
(37, 6, '2022-11-24', 0, 1, 1, 392000, 2, 'dbeb6a49e9fe4465945c00e8d4d08354'),
(38, 6, '2022-11-24', 11, 1, 1, 90700, 2, '99123dbe95248a05c1a9ca841dcebb34');

-- --------------------------------------------------------

--
-- Table structure for table `site_user`
--

CREATE TABLE `site_user` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `remember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_user`
--

INSERT INTO `site_user` (`User_ID`, `First_Name`, `Last_Name`, `User_Name`, `Email`, `Password`, `remember`) VALUES
(6, 'Hello', 'World', 'HelloWorld', 'world1234@gmail.com', '54321', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `FK_UserID` (`AUser_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CartUID` (`User_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `FK_ProductBrand` (`Brand`),
  ADD KEY `FK_ProductMovement` (`Movement`),
  ADD KEY `FK_ProductCategory` (`Category`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`Brand_ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `product_movement`
--
ALTER TABLE `product_movement`
  ADD PRIMARY KEY (`Movement_ID`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Cart_token` (`Cart_token`);

--
-- Indexes for table `site_user`
--
ALTER TABLE `site_user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `remember` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_movement`
--
ALTER TABLE `product_movement`
  MODIFY `Movement_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `site_user`
--
ALTER TABLE `site_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`AUser_ID`) REFERENCES `site_user` (`User_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_CartPID` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `FK_CartUID` FOREIGN KEY (`User_ID`) REFERENCES `site_user` (`User_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_ProductBrand` FOREIGN KEY (`Brand`) REFERENCES `product_brand` (`Brand_ID`),
  ADD CONSTRAINT `FK_ProductCategory` FOREIGN KEY (`Category`) REFERENCES `product_category` (`Category_ID`),
  ADD CONSTRAINT `FK_ProductMovement` FOREIGN KEY (`Movement`) REFERENCES `product_movement` (`Movement_ID`);

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `shop_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site_user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
