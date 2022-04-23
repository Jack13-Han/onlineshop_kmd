-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 08:16 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(2, 'Book'),
(3, 'Phone'),
(4, 'Car'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_name` varchar(30) NOT NULL,
  `delivery_phone` varchar(20) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `Send date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_name` varchar(30) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_phone` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `delivery_name`, `delivery_address`, `delivery_phone`, `order_date`, `status`, `send_date`) VALUES
(1, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(2, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(3, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(4, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(5, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(6, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(7, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(8, 7, 'kyawt', '09427798022', '581,Yangon', '2018-06-23', 0, '0000-00-00'),
(24, 7, 'kyawt', '09427798022', '581,Yangon', '2018-07-04', 0, '0000-00-00'),
(25, 7, 'kyawt', '09427798022', '581,Yangon', '2018-07-04', 0, '0000-00-00'),
(26, 7, 'kyawt', '09427798022', '581,Yangon', '2018-07-05', 0, '0000-00-00'),
(27, 7, 'kyawt', '09427798022', '581,Yangon', '2018-07-05', 0, '0000-00-00'),
(28, 7, 'kyawt', '09427798022', '581,Yangon', '2018-07-05', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`order_id`, `product_id`, `product_qty`, `amount`) VALUES
(24, 1, 1, 3000),
(25, 1, 1, 3000),
(26, 1, 1, 3000),
(27, 8, 1, 1268),
(28, 11, 1, 25893);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `price`, `qty`, `photo`) VALUES
(1, 'computer', 1, 3000, 1, 'Photo.jpg'),
(2, 'BSD', 2, 211121, 121, 'Photo2.jpg'),
(3, 'Samsung', 3, 1512, 212, 'Photo3.jpg'),
(4, 'Toyota', 4, 11112, 12, 'Photo3.jpg'),
(6, 'Dell', 6, 700000, 2356, 'Photo1.jpg'),
(7, 'Hp', 7, 45821, 3698, 'Photo1.jpg'),
(8, 'WDT', 8, 1268, 259, 'View1.jpg'),
(9, 'BSA', 9, 1258, 325, 'View2.jpg'),
(10, 'BSD', 10, 9655, 2358, 'View3.jpg'),
(11, 'Samsung', 11, 25893, 1963, 'View4.jpg'),
(12, 'Apple', 12, 538888, 3258, 'View5.jpg'),
(13, 'last', 13, 44, 4, 'Photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(80) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, 'Aye Aye', 'ad57484016654da87125db86f4227ea3', '', '', '', 'admin'),
(2, 'Tun Tun', '343d9040a671c45832ee5381860e2996', '', '', '', 'admin'),
(3, 'Su Su', 'c4efd5020cb49b9d3257ffa0fbccc0ae', '', '', '', 'admin'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 'admin'),
(7, 'kyawt', 'e10adc3949ba59abbe56e057f20f883e', 'kyawt@gmail.com', '09427798022', '581,Yangon', 'user'),
(8, 'Shweyee', '55587a910882016321201e6ebbc9f595', 'shweyee@gmail.com', '09787401234', 'Yangon', 'user'),
(9, 'aaaa', '74b87337454200d4d33f80c4663dc5e5', 'sd@gmail.com', '4565', 'dg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fkcustid` (`customer_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD KEY `fkoid` (`order_id`),
  ADD KEY `fkpid` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkcuid` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fkcustid` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fkoid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fkpid` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
