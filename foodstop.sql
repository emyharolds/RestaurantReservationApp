-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 06:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstop`
--
CREATE DATABASE IF NOT EXISTS `foodstop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodstop`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_cost` varchar(5) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`menu_id`, `menu_name`, `menu_cost`, `restaurant_id`) VALUES
(1, 'Chicken Tandoori', '10.99', 1),
(2, 'Chicken Sub', '7.95', 6),
(3, 'Chicken Lung Fung', '15.99', 5),
(4, 'Cheese Crab Rangoon', '8.99', 4),
(5, 'Phad Thai', '4.99', 3),
(6, 'Strawberry Banana', '11.59', 2),
(7, 'Chaat Papri', '5.99', 1),
(8, 'Beef Vindaloo', '10.69', 1),
(9, 'Chana Masala', '8.99', 1),
(14, 'Big Steak Omelette', '10.99', 2),
(15, 'Hearty Ham & Cheese Omelette', '9.99', 2),
(16, 'Spinach Mushroom Omelette', '9.99', 2),
(19, 'Mint Beef Salad', '6.99', 3),
(20, 'Chicken Peanut Salad', '7.99', 3),
(21, 'Thai Chicken Noodle Salad', '9.99', 3),
(22, 'Teriyaki Chicken', '8.79', 3),
(23, 'Lo Mein Noodles', '4.99', 4),
(24, 'Fried Rice', '4.69', 4),
(25, 'Shanghai Sprng Rolls', '3.59', 5),
(26, 'Steamed Crystal Dumplings', '5.99', 5),
(27, 'Smoky Southwest Chicken', '5.99', 6),
(28, 'Mega Roast Beef', '7.99', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `reservation_id` int(10) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `reservation_for` int(5) NOT NULL,
  `date_of_reserve` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`reservation_id`, `reservation_date`, `reservation_time`, `reservation_for`, `date_of_reserve`, `user_id`, `restaurant_id`) VALUES
(18, '2017-05-10', '16:00:00', 3, '2017-04-23 08:57:15', 9, 2),
(19, '2017-08-10', '12:00:00', 5, '2017-04-23 09:00:08', 9, 2),
(20, '2017-05-05', '22:00:00', 10, '2017-04-23 22:41:26', 9, 1),
(21, '2017-10-10', '22:20:00', 20, '2017-04-23 22:45:51', 9, 4),
(22, '2017-05-20', '22:00:00', 1, '2017-04-23 22:52:02', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

CREATE TABLE `tbl_restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `restaurant_address` varchar(100) NOT NULL,
  `restaurant_city` varchar(50) NOT NULL,
  `restaurant_zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_city`, `restaurant_zipcode`) VALUES
(1, 'Taj Mahal Authentic Cuisine of India', 'Waldo Mart, 7521 Wornall Rd, Kansas City, MO', 'Kansas City', 64154),
(2, 'iHop', '729 N Charles St, Warrensburg, MO', 'Warrensburg', 64093),
(3, 'Sawasdee Thai Cuisine', '11838 Quivira Rd, Overland Park, KS ', 'Overland Park', 66210),
(4, 'Hong\'s Buffet & Mongolian Grille', '6151 NW Barry Rd, Kansas City, MO', 'Kansas City', 64154),
(5, 'Mainland China', '7914 State Ave, Overland Park, KS', 'Overland Park', 66210),
(6, 'Planet Sub', '535 S Maguire St, Warrensburg, MO', 'Warrensburg', 64093);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `other_names` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `surname`, `other_names`) VALUES
(9, 'emyharolds', 'ce6b139816523eb9e250a2201c4f5afc', 'nna@nna.com', 'OKAFOR', 'HAROLD'),
(10, 'digvijay', '827ccb0eea8a706c4c34a16891f84e7b', 'dig@dig.com', 'DIGVIJAY', 'RAJENDRA DOND');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD CONSTRAINT `tbl_menus_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`restaurant_id`),
  ADD CONSTRAINT `tbl_menus_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`restaurant_id`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`restaurant_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
