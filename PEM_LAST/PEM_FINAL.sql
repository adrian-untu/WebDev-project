-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql.public.petsmartmanager.com
-- Generation Time: Jun 20, 2022 at 03:46 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content_comment` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_id`, `name`) VALUES
(1, 'Untu'),
(2, 'Badarau'),
(3, 'Ionescu'),
(4, 'Popescu');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend1` int NOT NULL,
  `friend2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend1`, `friend2`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `pet_id` int NOT NULL,
  `entry` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`pet_id`, `entry`, `created`, `date`) VALUES
(1, 'First time to vet for vaccine', '1415127841', '2014-06-22'),
(1, 'Anti rabies vaccine', '1415177841', '2014-07-02'),
(1, 'Routine control', '1416127841', '2014-08-26'),
(1, 'Broken ribs', '1615127841', '2021-03-15'),
(2, 'First time to vet', '1628353176', '2021-10-19'),
(2, 'First vaccine', '1628393176', '2022-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `profile_picture_pet` varchar(100) NOT NULL,
  `family_id` int NOT NULL,
  `restrictions` varchar(1000) NOT NULL,
  `monday` varchar(1000) NOT NULL,
  `tuesday` varchar(1000) NOT NULL,
  `wednesday` varchar(1000) NOT NULL,
  `thursday` varchar(1000) NOT NULL,
  `friday` varchar(1000) NOT NULL,
  `saturday` varchar(1000) NOT NULL,
  `sunday` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `name`, `birthday`, `profile_picture_pet`, `family_id`, `restrictions`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, 'Messy', '2011-07-12', 'upload/Messy-profile.jpg', 1, 'No salt, no chocolate, no sugar', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want'),
(2, 'Loki', '2020-10-03', 'upload/Loki.jpg', 2, 'No restrictions', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want', 'Two meals a day, anything I want');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `pet_id` int NOT NULL,
  `post` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `created` varchar(100) NOT NULL,
  `private` int NOT NULL,
  `family_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `pet_id`, `post`, `content`, `created`, `private`, `family_id`) VALUES
(1, 2, 2, 'upload/Loki_bath.jpeg', 'Taking a bath', '1634368985', 0, 2),
(2, 2, 2, 'upload/Loki_chill.jpeg', 'Chilling', '1637659545', 1, 2),
(3, 2, 2, 'upload/Loki_football.jpeg', 'Sometimes I am a soccer fan', '1631115335', 0, 2),
(4, 2, 2, 'upload/Loki_out.jpeg', 'Out for fun', '1628353176', 0, 2),
(5, 1, 1, 'upload/Messy-photo1.jpg', 'Woke up like this', '1430929830', 1, 1),
(6, 1, 1, 'upload/Messy-photo2.jpg', 'Goddammit', '1430929830', 0, 1),
(7, 1, 1, 'upload/Messy-photo3.jpg', 'Ok, I like this haircut', '1415127841', 1, 1),
(8, 1, 1, 'upload/Messy-photo4.jpg', 'New phone who dis', '1571151802', 0, 1),
(9, 1, 1, 'upload/Messy-video1.mp4', 'Sleepy', '1623772800', 0, 1),
(10, 1, 1, 'upload/Messy-video2.mp4', 'She is home!', '1502294155', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `family_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `birthday`, `email`, `password`, `profile_picture`, `family_id`) VALUES
(1, 'Adrian', 'Untu', 'adrian_untu', '04/21/2001', 'adrianuntu2001@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/Adrian_profile.jpg', 1),
(2, 'Dragos', 'Badarau', 'dragos_badarau', '08/07/2001', 'dragosb2001@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/Dragos_profile.jpg', 2),
(3, 'George', 'Clooney', 'george_clooney', '1996-04-12', 'smth@clooney.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/default_profile.jpg', 3),
(4, 'Dana', 'Untu', 'dana_untu', '1975-03-15', 'dana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/default_profile.jpg', 1),
(5, 'Ana', 'Prodan', 'ana_prodan', '2001-07-22', 'ana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/default_profile.jpg', 2),
(6, 'Barrack', 'Obama', 'barrack_obama', '1976-04-18', 'barrack@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/default_profile.jpg', 4),
(7, 'Carmen', 'Botosineanu', 'carmen_botosineanu', '2001-04-09', 'carmen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/default_profile.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
