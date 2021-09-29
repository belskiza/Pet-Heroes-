-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 29, 2021 at 04:02 AM
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
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `ticked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `user_id`, `pet_id`, `ticked`) VALUES
(29, 3, 4, 1),
(37, 3, 18, 1),
(38, 3, 19, 1),
(39, 3, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personality_quiz`
--

CREATE TABLE `personality_quiz` (
  `user_id` int(11) NOT NULL,
  `question1` int(11) NOT NULL,
  `question2` int(11) NOT NULL,
  `question3` int(11) NOT NULL,
  `question4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `picture_destination4` varchar(150) NOT NULL,
  `gender` int(1) NOT NULL,
  `colour` int(2) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `location`, `user_id`, `breed`, `age`, `picture_destination`, `description`, `pet_type`, `pet_size`, `vaccinated`, `desexed`, `microchip`, `picture_destination2`, `picture_destination3`, `picture_destination4`, `gender`, `colour`, `lat`, `lon`) VALUES
(4, 'Name', 'Indro', '0', 'Shitzhu', '23', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', ''),
(15, 'Tom', 'Tom', '3', 'Tom', '22', '614292ad2f3825.14747559.jpeg', 'Test descriptions', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', ''),
(16, 'Snoop', 'Brisbane', '3', 'Labrador', '7', '6142d42eb85ff2.81193403.jpeg', 'This is a test ', 2, 3, 1, 1, 1, '', '', '', 0, 0, '', ''),
(18, 'Snoop', 'Brisbane', '5', 'Labrador', '1', '6142e034ad17b9.84222340.png', 'He is a chocolate Lab', 2, 1, 1, 1, 1, '6142e034ad4793.51293728.jpeg', '6142e034ad5141.25405990.jpeg', '6142e034ad59e7.53884552.jpeg', 0, 0, '', ''),
(19, 'Dusty', 'home', '4', 'bbb', '1', '6142e4ab0db831.89488027.png', 'oskdoskdosdkso', 1, 3, 1, 1, 1, '6142e4ab0e67a9.74752780.png', '6142e4ab0f2356.00031422.png', '6142e4ab0ffa25.23861445.png', 1, 1, '', ''),
(20, 'Chungus', 'Brisvegas', '3', 'Dog', '1', '614bc64a5dd561.51628260.png', 'sDASDASDA', 1, 2, 1, 1, 1, '614bc64a5e81b6.04124741.png', '614bc64a5e8cb6.33905306.png', '614bc64a5e9586.33434700.png', 1, 1, '', ''),
(21, 'asd', 'asdasd', '3', 'asdad', '11', '61512ce3d67f30.36237869.png', 'asdasd', 1, 1, 1, 2, 1, '61512ce3d68ca7.05152371.jpeg', '61512ce3d695b9.62467866.jpeg', '61512ce3d69e48.97847770.jpeg', 2, 1, '', ''),
(23, 'Pebble', 'Ascot', '4', 'Black Cat', '6', '61524460c04508.35034403.jpeg', 'Pebble is a very friendly cat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate nisl nec eleifend pulvinar. Maecenas tristique lorem velit. Cras vitae dui ac nisl tempus eleifend. Mauris porttitor turpis vel nulla ornare condimentum. In eu risus quam. Cras molestie fringilla urna a scelerisque. Pellentesque faucibus augue non justo luctus, sit amet tincidunt enim volutpat. Quisque rutrum vitae nulla iaculis sagittis. Vivamus id tempus urna. Nunc porta urna consectetur mauris auctor, vel porta mauris tristique. Aenean varius nunc et enim fermentum, ac commodo odio feugiat. Cras viverra elit arcu, at posuere leo congue sit amet. Pellentesque pellentesque magna a dignissim interdum.', 1, 2, 1, 1, 1, '61524460c0c364.48311008.jpeg', '61524460c0e599.25295639.jpeg', '61524460c0f1e6.42236113.jpeg', 1, 2, '', '');

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
(3, 'dberg99', '$2y$10$Ir7VIUOD.ZO.9cHIqFkg6.68av86pbmOn3nvY/iZRSLUkIPzppnai', 'Dustin', 'Bergman', 'dustinbergman82@gmail.com', 1),
(4, 'TomTreby', 'user1234', 'Tom', 'Trebilcock', 'TommyT@gmail.com', 0),
(5, 'deeznuts', '$2y$10$mYa3XxEEsiacqJnmu/Jx9OQAKmNi8HZJnSj4Lne2ndajRhvdbsFnK', 'Deez', 'Nuts', 'deeznuts@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

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
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
