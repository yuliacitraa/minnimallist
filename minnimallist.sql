-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 03:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minnimallist`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id_buy` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_payment` bigint(20) NOT NULL,
  `date_buy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(15) NOT NULL,
  `address_buy` varchar(100) NOT NULL,
  `voucher` varchar(10) NOT NULL,
  `expedition` varchar(50) NOT NULL,
  `payment_status` varchar(500) NOT NULL,
  `order_status` varchar(500) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `no_card` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id_buy`, `product_id`, `userid`, `amount`, `total_payment`, `date_buy`, `phone`, `address_buy`, `voucher`, `expedition`, `payment_status`, `order_status`, `payment_method`, `no_card`, `pin`) VALUES
(29, 'ES0002', 1, 3, 450000, '2022-01-25 14:02:42', '+62816861173', 'baleendah', 'xdf123', 'sicepat', 'Paid', 'Prepared', 'Debit', 1234567, 1234),
(30, 'KT0003', 5, 1, 645000, '2022-01-25 14:06:05', '1234567890', 'baleendah', 'asd1234', 'anteraja', 'Finished', 'Finished', 'Debit', 1234567, 1234),
(31, 'ES0001', 5, 2, 738000, '2022-01-25 14:05:32', '1234567890', 'baleendah', 'xdf123', 'J&T', 'Canceled', 'Canceled', 'none', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `pr_desc` varchar(500) NOT NULL,
  `product_photo` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `product_name`, `stock`, `price`, `pr_desc`, `product_photo`) VALUES
('BD0002', 'Bedroom', 'Desk', 25, 768000, 'lorem ipsum', 'desk.jpg'),
('BD0003', 'Bedroom', 'DRAWER', 44, 535000, 'aesthetic drawer', 'drawer2.jpg'),
('BD0009', 'Bedroom', 'Kasur', 5, 2090000, 'lorem ipsum', 'bed.jpg'),
('BT0001', 'Bathroom', 'CLASSIC BATHUB', 16, 5985000, 'lorem ipsum', 'bathtubb.jpg'),
('BT0002', 'Bathroom', 'ROUNDED BATHUB', 12, 8350000, 'lorem ipsum', 'rounded-bathub.jpg'),
('BT0003', 'Bathroom', 'ORDINARY BATHUB', 22, 7255000, 'lorem ipsum', 'ordinary-bathub.jpg'),
('ES0001', 'Essentials', 'WALL SHELF', 32, 369000, 'looking good', 'katherine-fleitas-im1Yt6x0UkM-unsplash.jpg'),
('ES0002', 'Essentials', 'FLOWER VASE', 68, 150000, 'aesthetic flower vase', 'zel-ribeiro-lr5SN8qn3KI-unsplash.jpg'),
('ES0003', 'Essentials', 'CHANDELIER', 15, 785000, 'brighter ur room', 'chandelier.jpg'),
('KT0001', 'Kitchen', 'KITCHEN SINK', 10, 567000, 'fancy kitchen sink', 'kitchen-sink.jpg'),
('KT0002', 'Kitchen', 'ORDINARY SINK', 36, 425000, 'look expensive', 'kitchen-sink2.jpg'),
('KT0003', 'Kitchen', 'MINNIMALLIST SINK', 22, 645000, 'expensive look', 'kitchen-sink3.jpg'),
('LV0001', 'Livingroom', 'SINGLE CHAIR', 8, 395000, 'soft ', 'chairr.jpg'),
('LV0003', 'Livingroom', 'GREY SOFA', 4, 12550000, 'Soft fabric and waterproof', 'sofaa.jpg'),
('LV0006', 'Livingroom', 'DRAWER', 16, 668000, 'lorem ipsum', 'drawer-livingroom.jpg'),
('LV002', 'Livingroom', 'coffee table', 10, 478000, 'lorem ipsum', 'coffee-table.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `full_name`, `email`, `username`, `password`, `usertype`, `user_photo`) VALUES
(1, 'Yulia Citra', 'yuliacitra2011@gmail.com', 'yuliacitra', '$2y$10$YL/9EJjhI5UZmPlAy.MPqugfwdAoYAf.m/wkSEQmOj/Q.wDMZW8p2', 'Manager', 'felipe-correia-Z3r7p3DqXeM-unsplash.jpg'),
(2, 'Yulia Citra', 'yuliacitra2011@gmail.com', 'yuliacitra', '$2y$10$XHtLAcC/HdHAe9uZUWMs/Oh5hyzUEtQ2Q3j2kJcowSecIQ2jvy2z2', 'Manager', 'default.png'),
(3, 'citra', 'citra18@gmail.com', 'yuliac', '$2y$10$XRUdwW2m2GbzvciMNoKXAOB/G7o5y5/1ankCiWHSAKxm8RV21gGP2', 'Staff', 'james-mcdonald-3d4sSUChunA-unsplash.jpg'),
(5, 'salma ayu anggraeni', 'ayu@gmail.com', 'ayu18', '$2y$10$I0ENRoMgoKpApIQwIyHcCe10z38dv8uAaWr31lYvhX6WGWbZggyYC', 'Pelanggan', 'shyam-vHVaUUJ7w-A-unsplash.jpg'),
(6, 'citra', 'citra@gmail.com', 'citraaa', '$2y$10$j4DcdFK8EahP73upxiaDLuxwEEW2YAKJcyO1ygKa7WuTYXcZl32qK', 'Pelanggan', 'default.png'),
(7, 'yuliaaa', 'yuliacitra2011@gmail.com', 'yuliacitraaa', '$2y$10$Q/t5USesxXyXgWZsE2te1eIeem5Uu60R..buiUv148DqX9hO8wC6m', 'Staff', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id_buy`),
  ADD KEY `userid` (`userid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id_buy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
