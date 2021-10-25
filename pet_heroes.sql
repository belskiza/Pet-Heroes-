-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 25, 2021 at 10:22 AM
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
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `about_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `living_status` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`about_id`, `user_id`, `age`, `sex`, `occupation`, `living_status`, `description`) VALUES
(9, 3, 21, 'Male', 'Student', 'Renting', 'This is a test description');

-- --------------------------------------------------------

--
-- Table structure for table `adopted_pets`
--

CREATE TABLE `adopted_pets` (
  `adoption_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `adopter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adopted_pets`
--

INSERT INTO `adopted_pets` (`adoption_id`, `pet_id`, `owner_id`, `adopter_id`) VALUES
(5, 15, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `adopter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `pet_id`, `owner_id`, `adopter_id`) VALUES
(4, 15, 3, 6),
(5, 23, 3, 6),
(6, 16, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `contents` varchar(250) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `contents`, `pet_id`) VALUES
(1, 3, 6, 'hi', 0),
(2, 6, 3, 'Test message', 0),
(3, 3, 6, 'How are you?', 0),
(4, 3, 6, 'Good', 0),
(5, 3, 6, 'No', 0),
(6, 3, 6, 'Hi', 15),
(7, 3, 6, 'hi\r\n', 15),
(8, 6, 3, 'hi', 15),
(9, 3, 6, 'Deez', 15),
(10, 3, 6, '', 15),
(11, 3, 6, 'asd', 15),
(12, 3, 6, 'no', 15),
(13, 3, 6, 'asd', 15),
(14, 3, 6, '', 15),
(15, 3, 6, '', 15),
(16, 3, 6, '', 15),
(17, 3, 6, '', 15),
(18, 3, 6, '', 15),
(19, 3, 6, '', 15),
(20, 3, 6, 'asd', 15),
(21, 3, 6, 'Hi', 16);

-- --------------------------------------------------------

--
-- Table structure for table `personality_quiz`
--

CREATE TABLE `personality_quiz` (
  `response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question1` int(11) NOT NULL,
  `question2` int(11) NOT NULL,
  `question3` int(11) NOT NULL,
  `question4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personality_quiz`
--

INSERT INTO `personality_quiz` (`response_id`, `user_id`, `question1`, `question2`, `question3`, `question4`) VALUES
(2, 3, 1, 2, 1, 2);

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
  `lon` varchar(50) NOT NULL,
  `valid_listing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `location`, `user_id`, `breed`, `age`, `picture_destination`, `description`, `pet_type`, `pet_size`, `vaccinated`, `desexed`, `microchip`, `picture_destination2`, `picture_destination3`, `picture_destination4`, `gender`, `colour`, `lat`, `lon`, `valid_listing`) VALUES
(15, 'Tom', 'Tom', '3', 'Tom', '22', '614292ad2f3825.14747559.jpeg', 'Test descriptions', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', '', 0),
(16, 'Snoop', 'Brisbane', '3', 'Labrador', '7', '6142d42eb85ff2.81193403.jpeg', 'This is a test ', 2, 3, 1, 1, 1, '', '', '', 0, 0, '', '', 1),
(18, 'Snoop', 'Brisbane', '5', 'Labrador', '1', '6142e034ad17b9.84222340.png', 'He is a chocolate Lab', 2, 1, 1, 1, 1, '6142e034ad4793.51293728.jpeg', '6142e034ad5141.25405990.jpeg', '6142e034ad59e7.53884552.jpeg', 0, 0, '', '', 1),
(23, 'Pebble', 'Ascot', '3', 'Black Cat', '6', '61524460c04508.35034403.jpeg', 'Pebble is a very friendly cat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate nisl nec eleifend pulvinar. Maecenas tristique lorem velit. Cras vitae dui ac nisl tempus eleifend. Mauris porttitor turpis vel nulla ornare condimentum. In eu risus quam. Cras molestie fringilla urna a scelerisque. Pellentesque faucibus augue non justo luctus, sit amet tincidunt enim volutpat. Quisque rutrum vitae nulla iaculis sagittis. Vivamus id tempus urna. Nunc porta urna consectetur mauris auctor, vel porta mauris tristique. Aenean varius nunc et enim fermentum, ac commodo odio feugiat. Cras viverra elit arcu, at posuere leo congue sit amet. Pellentesque pellentesque magna a dignissim interdum.', 1, 2, 1, 1, 1, '61524460c0c364.48311008.jpeg', '61524460c0e599.25295639.jpeg', '61524460c0f1e6.42236113.jpeg', 1, 2, '', '', 1),
(24, 'Daisy', 'Toowong', '4', 'Siamese', '4', '6154e38fa018c1.34755040.jpeg', 'Test description', 1, 2, 1, 1, 1, '6154e38fa036a6.85850019.jpeg', '6154e38fa04f48.16828861.jpeg', '6154e38fa05f11.29932040.jpeg', 2, 2, '', '', 1),
(25, 'Spot', 'Toowong', '3', 'Dalmatian', '2', '6167b4aba8c8d5.34267740.jpeg', 'This is a test description', 2, 3, 1, 1, 1, '6167b4aba913b6.61998968.jpeg', '6167b4aba93103.73832720.jpeg', '6167b4aba93b11.96857976.jpeg', 1, 1, '-27.49884', '152.9840152', 1),
(26, 'Pet', 'Brisbane', '3', 'Chihuahau', '21', '61767934417660.55683620.jpeg', 'asdadasdasdad', 1, 2, 1, 1, 1, '61767934419728.22067147.jpeg', '6176793441a028.92246458.jpeg', '6176793441a942.55523952.jpeg', 1, 1, '-27.4988052', '152.9839606', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `pic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`pic_id`, `user_id`, `destination`) VALUES
(1, 3, '6153ec6b667414.20526708.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `swipes`
--

CREATE TABLE `swipes` (
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `ticked` int(1) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `swipes`
--

INSERT INTO `swipes` (`match_id`, `user_id`, `pet_id`, `ticked`, `owner_id`) VALUES
(50, 6, 15, 1, 3),
(51, 6, 16, 1, 3),
(52, 6, 18, 1, 5),
(53, 6, 23, 1, 3),
(55, 6, 24, 1, 4);

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
  `acc_type` int(1) NOT NULL COMMENT '0 = adopter, 1 = owner',
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `acc_type`, `phone`) VALUES
(3, 'dberg99', '$2y$10$Ir7VIUOD.ZO.9cHIqFkg6.68av86pbmOn3nvY/iZRSLUkIPzppnai', 'Dustin', 'Bergman', 'dustinbergman82@gmail.com', 1, '0435110423'),
(4, 'TomTreby', 'user1234', 'Tom', 'Trebilcock', 'TommyT@gmail.com', 0, '0'),
(5, 'deeznuts', '$2y$10$mYa3XxEEsiacqJnmu/Jx9OQAKmNi8HZJnSj4Lne2ndajRhvdbsFnK', 'Deez', 'Nuts', 'deeznuts@gmail.com', 0, '0'),
(6, 'admin', '$2y$10$LHLMlojpvADl/sgv7vTB1eDy2zxCSGQbl1nZIAE4qlJ9A6Xd2TaWO', 'admin', 'admin', 'admin@admin.com', 0, '0420420420');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `adopted_pets`
--
ALTER TABLE `adopted_pets`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `personality_quiz`
--
ALTER TABLE `personality_quiz`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `swipes`
--
ALTER TABLE `swipes`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adopted_pets`
--
ALTER TABLE `adopted_pets`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personality_quiz`
--
ALTER TABLE `personality_quiz`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `swipes`
--
ALTER TABLE `swipes`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
