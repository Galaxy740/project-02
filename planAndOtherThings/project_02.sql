-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 02:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Airbus A300'),
(2, 'Airbus A318'),
(3, 'Airbus A330neo');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL,
  `destination_point` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destination_id`, `destination_point`) VALUES
(1, 'Sofia'),
(2, 'Sofia'),
(3, 'Budapest'),
(4, 'Amsterdam');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flights_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `planes_id` int(11) NOT NULL,
  `purchased_seats` int(8) DEFAULT NULL,
  `available_seats` int(11) NOT NULL,
  `date_departure` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flights_id`, `destination_id`, `planes_id`, `purchased_seats`, `available_seats`, `date_departure`, `user_id`, `flight_code`) VALUES
(1, 4, 1, NULL, 300, '2019-03-23 11:20:00', 6, '78439100651'),
(3, 1, 3, NULL, 120, '2019-03-15 06:59:59', 1, '02964571083');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `planes_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `seats` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`planes_id`, `brand_id`, `seats`) VALUES
(1, 1, 300),
(2, 3, 120),
(3, 2, 240);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` varchar(8) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `date_added`, `user_type`) VALUES
(1, 'admin11', 'admin', 'admin', 'admin@abv.bg', '', '1234', '2019-03-13 15:13:47', 'admin'),
(5, 'user43', 'user', '', '', '', '123', '2019-03-13 15:13:43', 'user'),
(6, 'galaxy7406', 'tsvetan', 'gergov', 'tsvetan@myself.com', '+359878935778', '123456789', '2019-03-20 08:14:25', 'user'),
(7, 'hotDog456', 'hot ', 'dog', '', '+359878935778', 'mypasswordishere', '2019-03-22 00:52:40', 'user'),
(8, '655454', 'tsvetan', 'gergov', 'tsvetan@myself.com', '5546545', 'dshakjhsdjka', '2019-03-22 00:56:24', 'user'),
(9, 'sidalisjd6', 'sdasdm ', 'asdamsd', 'lsdmalmd@abv.bg', '6546565', 'askdlnalks', '2019-03-22 00:57:52', 'user'),
(10, 'dskfhs;dfsd', '54', 'dskam', 'ksdnk@abv.bg', '54656465616', 'usdaigdsiaysg', '2019-03-22 00:59:49', 'user'),
(11, '123456789', 'ad', 'da', 'ed@an.nb', '316553544', '123456789', '2019-03-22 01:31:30', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flights_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `planes_id` (`planes_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `available_seats` (`available_seats`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`planes_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flights_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `planes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `destination_id` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`destination_id`),
  ADD CONSTRAINT `planes_id` FOREIGN KEY (`planes_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
