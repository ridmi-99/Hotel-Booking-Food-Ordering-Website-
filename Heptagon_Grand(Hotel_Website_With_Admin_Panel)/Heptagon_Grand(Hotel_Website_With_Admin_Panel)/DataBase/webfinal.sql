-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 12:56 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `bookedid` int(10) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `roomid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `children` varchar(10) NOT NULL DEFAULT 'no',
  `food` varchar(20) NOT NULL DEFAULT 'include',
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodid` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `dinetime` varchar(20) NOT NULL DEFAULT 'lunch',
  `vege` varchar(20) NOT NULL DEFAULT 'no',
  `specifics` varchar(300) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image1` varchar(3000) NOT NULL,
  `image2` varchar(3000) NOT NULL,
  `image3` varchar(3000) NOT NULL,
  `extras1` varchar(500) NOT NULL,
  `extras2` varchar(500) NOT NULL,
  `extras3` varchar(500) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`foodid`, `name`, `category`, `dinetime`, `vege`, `specifics`, `description`, `image1`, `image2`, `image3`, `extras1`, `extras2`, `extras3`, `price`) VALUES
(5, 'Fried Brown fox', 'spicy', 'dinner', 'Meat', 'Japaneese', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-jer-chung-2116094.jpg', './uploads/foods/pexels-marvin-ozz-2474661.jpg', './uploads/foods/pexels-rajesh-tp-1624487.jpg', 'Personalized Butlers.', 'Batter Fried Prawn, Cuttlefish, White Fish and Vegetables served with Tempura Sauce', 'Complimentary Movie Library', 3000),
(6, 'pigion pie', 'sweat', 'breakfast', 'Vege', 'real honey', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-abhinav-goswami-291528.jpg', './uploads/foods/pexels-cats-coming-674584.jpg', './uploads/foods/pexels-engin-akyurt-1437267.jpg', 'Personalized Butlers.', 'stir-fry chicken and Cajun seasoning in remaining oil', 'Complimentary Movie Library', 25000),
(7, 'double chicken pizza', 'spicy', 'dinner', 'Meat', 'seafood', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-pixabay-315755.jpg', './uploads/foods/pexels-ella-olsson-1640777.jpg', './uploads/foods/pexels-marvin-ozz-2474661.jpg', 'Personalized Butlers.', 'Batter Fried Prawn, Cuttlefish, White Fish and Vegetables served with Tempura Sauce', 'dessert', 3000),
(8, 'nasi guram', 'spicy', 'Lunch', 'Meat', 'Japaneese', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-chan-walrus-941869.jpg', './uploads/foods/pexels-chan-walrus-958545 (1).jpg', './uploads/foods/pexels-rajesh-tp-1624487.jpg', 'Personalized Butlers.', 'A Variety of Pillows. ...', 'Complimentary Movie Library', 12000),
(9, 'pasta', 'noodles', 'breakfast', 'Meat', 'seafood', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-engin-akyurt-1437267.jpg', './uploads/foods/pexels-jer-chung-2116094.jpg', './uploads/foods/pexels-shantanu-pal-2679501.jpg', 'Personalized Butlers.', 'Tea & coffee maker', 'Complimentary Movie Library', 2500),
(10, 'soups', 'extra spicy', 'dinner', 'Meat', 'seafood', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', './uploads/foods/pexels-marvin-ozz-2474661.jpg', './uploads/foods/pexels-shantanu-pal-2679501.jpg', './uploads/foods/pexels-marvin-ozz-2474658.jpg', 'Personalized Butlers.', 'Batter Fried Prawn, Cuttlefish, White Fish and Vegetables served with Tempura Sauce', 'Complimentary Movie Library', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `orderid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT 1,
  `name` varchar(400) NOT NULL,
  `price` int(100) NOT NULL,
  `userid` int(10) NOT NULL,
  `foodid` int(10) NOT NULL,
  `deliveryAddress` int(255) NOT NULL,
  `estimatedTime` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`orderid`, `quantity`, `name`, `price`, `userid`, `foodid`, `deliveryAddress`, `estimatedTime`) VALUES
(4, 0, 'Fried Brown fox', 3000, 1, 5, 0, '00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomid` int(100) NOT NULL,
  `title` varchar(400) NOT NULL,
  `beds` int(10) NOT NULL DEFAULT 1,
  `AC` varchar(20) NOT NULL DEFAULT 'available',
  `nonAC` varchar(20) NOT NULL DEFAULT 'notAvailable',
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `price` int(100) NOT NULL,
  `pets` varchar(50) NOT NULL DEFAULT 'notAllowed',
  `minibar` varchar(20) NOT NULL DEFAULT 'available',
  `wifi` varchar(20) NOT NULL DEFAULT 'available',
  `extras1` varchar(1000) NOT NULL,
  `extras2` varchar(1000) NOT NULL,
  `extras3` varchar(1000) NOT NULL,
  `extras4` varchar(1000) NOT NULL,
  `extras5` varchar(1000) NOT NULL,
  `extras6` varchar(1000) NOT NULL,
  `available` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `title`, `beds`, `AC`, `nonAC`, `image1`, `image2`, `image3`, `description`, `price`, `pets`, `minibar`, `wifi`, `extras1`, `extras2`, `extras3`, `extras4`, `extras5`, `extras6`, `available`) VALUES
(9, 'Duluxe', 2, 'Available', '0', './uploads/rooms/pexels-pixabay-271624.jpg', './uploads/rooms/pexels-hakim-santoso-3634741.jpg', './uploads/rooms/pexels-julie-aagaard-2467285.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 55000, 'notAllowed', 'available', 'Available', 'Personalized Butlers.', 'A Variety of Pillows. ...', 'Complimentary Movie Library', 'Luxury Bathroom Amenities', 'Room Service for Pets', 'Interconnecting rooms available for select rooms, on request', 'availbale'),
(10, 'Presidential', 4, 'Available', '0', './uploads/rooms/pexels-castorly-stock-3761182.jpg', './uploads/rooms/pexels-cats-coming-707581.jpg', './uploads/rooms/pexels-pixabay-271624.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 45900, 'notAllowed', 'available', 'Available', 'Deep-fried Seasoned Chicken Pieces ', 'Batter Fried Prawn, Cuttlefish, White Fish and Vegetables served with Tempura Sauce', 'Complimentary Movie Library', 'Luxury Bathroom Amenities', 'Room Service for Pets', 'Spacious, brightly lit closets', 'availbale'),
(11, 'HoneyMoon Speacial', 3, 'Available', '0', './uploads/rooms/pexels-engin-akyurt-2725675 (1).jpg', './uploads/rooms/pexels-hakim-santoso-3634741.jpg', './uploads/rooms/pexels-huseyn-kamaladdin-667838.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 78000, 'allowed', 'available', 'Available', 'Personalized Butlers.', 'Batter Fried Prawn, Cuttlefish, White Fish and Vegetables served with Tempura Sauce', 'Complimentary Movie Library', 'Luxury Bathroom Amenities', 'Daily house-keeping, twice a day', 'Room Service for Pets', 'availbale'),
(12, 'Family Special', 1, 'Available', '0', './uploads/rooms/pexels-pixabay-276671.jpg', './uploads/rooms/pexels-pixabay-271897.jpg', './uploads/rooms/pexels-pixabay-460537.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 90000, 'allowed', 'available', 'Available', 'Personalized Butlers.', 'Tea & coffee maker', 'Deep Fried Chicken Wings with Sweet & Sour Sauce and Black Pepper', 'Luxury Bathroom Amenities', 'Room Service for Pets', 'Interconnecting rooms available for select rooms, on request', 'availbale'),
(13, 'Single', 2, 'Available', '0', './uploads/rooms/pexels-medhat-ayad-439227.jpg', './uploads/rooms/pexels-julie-aagaard-2467285.jpg', './uploads/rooms/pexels-elina-sazonova-1838554.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 55000, 'notAllowed', 'available', 'Available', 'Deep-fried Seasoned Chicken Pieces ', 'Tea & coffee maker', 'Complimentary Movie Library', 'Luxury Bathroom Amenities', 'Daily house-keeping, twice a day', 'Interconnecting rooms available for select rooms, on request', 'availbale'),
(14, 'Royal', 3, 'Available', '0', './uploads/rooms/pexels-elina-sazonova-1838554.jpg', './uploads/rooms/pexels-medhat-ayad-439227.jpg', './uploads/rooms/pexels-pixabay-271897.jpg', 'The quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.the quick brown fox jump over the lazy doggies head.The quick brown fox jump over the lazy doggies head.the quick brown fox  jump over the lazy doggies head.', 25000, 'notAllowed', 'available', 'Available', 'Personalized Butlers.', 'A Variety of Pillows. ...', 'Deep Fried Chicken Wings with Sweet & Sour Sauce and Black Pepper', 'Luxury Bathroom Amenities', 'Daily house-keeping, twice a day', 'Interconnecting rooms available for select rooms, on request', 'availbale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `role`) VALUES
(1, 'Randima', 'chasith19@gmail.com', '0987654321', 'admin'),
(2, 'Anuka', 'anuka@gmail.com', '1234567890', 'user'),
(3, 'admin', 'admin@gmail.com', '1234567890', 'user'),
(4, 'sithum', 'sithum@gmail.com', '1234567890', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`bookedid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `bookedid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
