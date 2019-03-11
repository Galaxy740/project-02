-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 март 2019 в 15:28
-- Версия на сървъра: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Структура на таблица `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Airbus A300');

-- --------------------------------------------------------

--
-- Структура на таблица `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL,
  `destination_point` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `destination`
--

INSERT INTO `destination` (`destination_id`, `destination_point`) VALUES
(1, 'Sofia'),
(2, 'Sofia');

-- --------------------------------------------------------

--
-- Структура на таблица `flight`
--

CREATE TABLE `flight` (
  `flights_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `planes_id` int(11) NOT NULL,
  `prurchases_seats` int(32) NOT NULL,
  `date_departure` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `flight`
--

INSERT INTO `flight` (`flights_id`, `destination_id`, `planes_id`, `prurchases_seats`, `date_departure`, `user_id`, `flight_code`) VALUES
(1, 1, 1, 200, '2019-03-13 00:00:00', 0, 'abc'),
(2, 1, 1, 122, '2019-03-12 00:00:00', 0, ''),
(3, 1, 1, 122, '2019-03-12 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Структура на таблица `plane`
--

CREATE TABLE `plane` (
  `planes_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `seats` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `plane`
--

INSERT INTO `plane` (`planes_id`, `brand_id`, `seats`) VALUES
(1, 1, 300);

-- --------------------------------------------------------

--
-- Структура на таблица `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `e-mail` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` varchar(8) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `e-mail`, `phone`, `password`, `date_added`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin@abv.bg', '', '1234', '2019-03-10 16:50:47', 'admin'),
(5, 'user', '', '', '', '123', '2019-03-10 16:53:37', 'user');

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
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flights_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `planes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
