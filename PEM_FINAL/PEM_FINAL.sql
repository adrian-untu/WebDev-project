-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql303.epizy.com
-- Generation Time: Jun 02, 2022 at 06:38 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31864795_pem_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `audio_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content_comment` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `location`, `user_id`, `date_added`) VALUES
(1, 'upload/Loki_bath.jpeg', 2, '2021-10-16 10:23:05'),
(2, 'upload/Loki_chill.jpeg', 2, '2021-11-23 11:25:45'),
(3, 'upload/Loki_football.jpeg', 2, '2021-09-08 18:35:35'),
(4, 'upload/Loki_out.jpeg', 2, '2021-08-07 19:19:36'),
(5, 'upload/Loki.jpg', 2, '2021-05-03 10:10:10'),
(6, 'upload/Loki.png', 2, '2021-05-08 13:45:55'),
(7, 'upload/Loki2.png', 2, '2021-06-13 15:25:28'),
(8, 'upload/Messy-photo1.jpg', 1, '2015-05-06 19:30:30'),
(9, 'upload/Messy-photo2.jpg', 1, '2016-08-09 12:39:40'),
(10, 'upload/Messy-photo3.jpg', 1, '2014-11-04 21:04:01'),
(11, 'upload/Messy-photo4.jpg', 1, '2019-10-15 18:03:22'),
(12, 'upload/Messy-profile.jpg', 1, '2021-10-09 19:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pet_id` int(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `created` varchar(100) NOT NULL,
  `private` int(4) NOT NULL,
  `family_id` int(100) NOT NULL
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
  `user_id` int(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `family_id` int(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `birthday`, `email`, `password`,  `profile_picture`, `family_id`) VALUES
(1, 'Adrian', 'Untu', 'adrian_untu', '04/21/2001', 'adrianuntu2001@gmail.com', '12345',  'upload/Adrian_profile.jpg', 1),
(2, 'Dragos', 'Badarau', 'dragos_badarau', '08/07/2001', 'dragosb2001@gmail.com', '12345',  'upload/Dragos_profile.jpg', 2),
(3, 'George', 'Clooney', 'george_clooney', '1996-04-12', 'smth@clooney.com', '12345', 'upload/default_profile.jpg', 3),
(4, 'Dana', 'Untu', 'dana_untu', '1975-03-15', 'dana@gmail.com', '12345', 'upload/default_profile.jpg', 1),
(5, 'Ana', 'Prodan', 'ana_prodan', '2001-07-22', 'ana@gmail.com', '12345',  'upload/default_profile.jpg', 2),
(6, 'Barrack', 'Obama', 'barrack_obama', '1976-04-18', 'barrack@gmail.com', '12345',  'upload/default_profile.jpg', 4),
(7, 'Carmen', 'Botosineanu', 'carmen_botosineanu', '2001-04-09', 'carmen@gmail.com', '12345',  'upload/default_profile.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int(100) NOT NULL,
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
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `profile_picture_pet` varchar(100) NOT NULL,
  `family_id` int(100) NOT NULL,
  `food_plan` varchar(1000) NOT NULL,
  `restrictions` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `family`
--

INSERT INTO `pets` (`pet_id`, `name`, `birthday`, `profile_picture_pet`, `family_id`, `food_plan`, `restrictions`) VALUES
(1, 'Messy', '2011-07-12', 'upload/Messy-profile.jpg', 1, 'Three meals a day in wet food', 'No salt, no chocolate, no sugar'),
(2, 'Loki', '2020-10-03', 'upload/Loki.jpg', 2, 'Two meals a day, anything I want', 'No restrictions');

-- --------------------------------------------------------
CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `pet_id` int(100) NOT NULL,
  `entry` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `location`, `user_id`, `date_added`) VALUES
(1, 'upload/Messy-video1.mp4', 1, '2021-06-15 19:00:00'),
(2, 'upload/Messy-video2.mp4', 1, '2017-08-09 18:55:55');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`audio_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `audio_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;