-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 23, 2021 at 04:52 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pet_heroes`
--

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
                                                                                                                                                                                                                                                                                                   (5, 'Fluf', 'Indro', '0', 'Bulldog', '1', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', ''),
                                                                                                                                                                                                                                                                                                   (6, 'Charlie', 'Brisbane', '5', 'Labrador', '11', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', ''),
                                                                                                                                                                                                                                                                                                   (15, 'Tom', 'Tom', '3', 'Tom', '22', '614292ad2f3825.14747559.jpeg', 'Test descriptions', 0, 0, 0, 0, 0, '', '', '', 0, 0, '', ''),
                                                                                                                                                                                                                                                                                                   (16, 'Snoop', 'Brisbane', '3', 'Labrador', '7', '6142d42eb85ff2.81193403.jpeg', 'This is a test ', 2, 3, 1, 1, 1, '', '', '', 0, 0, '', ''),
                                                                                                                                                                                                                                                                                                   (18, 'Snoop', 'Brisbane', '3', 'Labrador', '1', '6142e034ad17b9.84222340.png', 'He is a chocolate Lab', 2, 1, 1, 1, 1, '6142e034ad4793.51293728.jpeg', '6142e034ad5141.25405990.jpeg', '6142e034ad59e7.53884552.jpeg', 0, 0, '', ''),
                                                                                                                                                                                                                                                                                                   (19, 'Dusty', 'home', '4', 'bbb', '1', '6142e4ab0db831.89488027.png', 'oskdoskdosdkso', 1, 3, 1, 1, 1, '6142e4ab0e67a9.74752780.png', '6142e4ab0f2356.00031422.png', '6142e4ab0ffa25.23861445.png', 1, 1, '', ''),
                                                                                                                                                                                                                                                                                                   (20, 'Chungus', 'Brisbane', '4', 'Pug', '1', '614c01be585e66.33707021.png', 'swag ', 2, 1, 1, 1, 1, '614c01be5fd5b3.32104720.png', '614c01be5fe3f2.60700012.png', '614c01be5fef38.36279921.png', 1, 2, '', ''),
                                                                                                                                                                                                                                                                                                   (21, 'Chungus2', 'Brisbane', '4', 'Pug', '1', '614c032fe81ce8.47389796.png', 'swag', 2, 2, 1, 2, 1, '614c032fe82de1.52986455.png', '614c032fe837e9.62746904.png', '614c032fe84131.16119876.png', 1, 2, '', ''),
                                                                                                                                                                                                                                                                                                   (22, 'Chungus3', 'Brisbane', '4', 'Pug', '1', '614c0433046f12.78564863.png', 'asdasd', 1, 1, 1, 1, 1, '614c04330ac466.68368524.png', '614c04330ad042.56099851.png', '614c04330adaa7.29079451.png', 1, 2, '', ''),
                                                                                                                                                                                                                                                                                                   (23, 'Chungus3', 'Brisbane', '4', 'Pug', '1', '614c0449a2d471.58149013.png', 'asdasd', 1, 1, 1, 1, 1, '614c0449a2ef09.13368122.png', '614c0449a2fcb8.68131913.png', '614c0449a30656.03996528.png', 1, 2, '', ''),
                                                                                                                                                                                                                                                                                                   (24, 'Chungus4', 'Brisbane', '4', 'Pug', '1', '614c04de615394.49188625.png', 'swag', 2, 1, 1, 1, 1, '614c04de673ab8.98888029.png', '614c04de674a85.10226489.png', '614c04de675675.28572014.png', 2, 2, '', ''),
                                                                                                                                                                                                                                                                                                   (25, 'test', 'Brisvegas', '4', 'Pug', '1', '614c06974faa50.21020755.png', 'swag', 3, 1, 1, 2, 1, '614c0697589e02.06004056.png', '614c069758a6f7.60637105.png', '614c069758ad65.66803987.png', 1, 2, '-27.4959451', '153.011746'),
                                                                                                                                                                                                                                                                                                   (26, 'Chungus', 'Brisbane', '4', 'Pug', '1', '614c06f280c0c1.18002256.png', 'swag', 1, 2, 2, 1, 1, '614c06f289bc06.73449907.png', '614c06f28b0335.71617559.png', '614c06f28b0d10.07828735.png', 1, 2, '-27.496009299999997', '153.0117717'),
                                                                                                                                                                                                                                                                                                   (27, 'Coco', 'Brisbane', '4', 'Pug', '3', '614c07f2e088d7.85115777.png', 'Swag', 1, 2, 2, 2, 2, '614c07f2e6e643.93392728.png', '614c07f2e6f1c5.81965223.png', '614c07f2e6f9b8.59742716.png', 1, 2, '-27.4959433', '153.0117299');

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
-- Indexes for table `personality_quiz`
--
ALTER TABLE `personality_quiz`
    ADD PRIMARY KEY (`user_id`);

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
    MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
