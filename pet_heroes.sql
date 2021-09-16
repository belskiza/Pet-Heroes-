-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2021 at 06:13 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_heroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `picture_destination` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `pet_type` int(2) NOT NULL,
  `pet_size` int(1) NOT NULL,
  `vaccinated` int(1) NOT NULL,
  `desexed` int(1) NOT NULL,
  `microchip` int(1) NOT NULL,
  `picture_destination2` varchar(150) NOT NULL,
  `picture_destination3` varchar(150) NOT NULL,
  `picture_destination4` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `location`, `user_id`, `breed`, `age`, `picture_destination`, `description`, `pet_type`, `pet_size`, `vaccinated`, `desexed`, `microchip`, `picture_destination2`, `picture_destination3`, `picture_destination4`) VALUES
(4, 'Name', 'Indro', '0', 'Shitzhu', '23', '', '', 0, 0, 0, 0, 0, '', '', ''),
(5, 'Fluf', 'Indro', '0', 'Bulldog', '1', '', '', 0, 0, 0, 0, 0, '', '', ''),
(6, 'Charlie', 'Brisbane', '5', 'Labrador', '11', '', '', 0, 0, 0, 0, 0, '', '', ''),
(15, 'Tom', 'Tom', '3', 'Tom', '22', '614292ad2f3825.14747559.jpeg', 'Test descriptions', 0, 0, 0, 0, 0, '', '', ''),
(16, 'Snoop', 'Brisbane', '3', 'Labrador', '7', '6142d42eb85ff2.81193403.jpeg', 'This is a test ', 2, 3, 1, 1, 1, '', '', ''),
(18, 'Snoop', 'Brisbane', '3', 'Labrador', '1', '6142e034ad17b9.84222340.png', 'He is a chocolate Lab', 2, 1, 1, 1, 1, '6142e034ad4793.51293728.jpeg', '6142e034ad5141.25405990.jpeg', '6142e034ad59e7.53884552.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `acc_type` int(1) NOT NULL COMMENT '0 = adopter, 1 = owner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `acc_type`) VALUES
(3, 'dberg99', '$2y$10$Ir7VIUOD.ZO.9cHIqFkg6.68av86pbmOn3nvY/iZRSLUkIPzppnai', 'Dustin', 'Bergman', 'dustinbergman82@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

CREATE TABLE `personality_traits` (
    `user_id` int(11) NOT NULL,
    `preference_1` varchar(128) NOT NULL,
    `preference_2` varchar(128) NOT NULL,
    `preference_3` varchar(128) NOT NULL,
    `preference_4` varchar(128) NOT NULL,
    `preference_5` varchar(128) NOT NULL
)

ALTER TABLE `accountSetup`
    ADD PRIMARY KEY (`user_id`);


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
