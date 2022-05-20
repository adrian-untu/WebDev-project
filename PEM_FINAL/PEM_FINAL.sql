-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 02:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PEM_FINAL`
--

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

--
-- Dumping data for table `comments`
--

-- no insert now

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
(1,'upload/Loki_bath.jpeg',2,'2021-10-16 10:23:05'),
(2,'upload/Loki_chill.jpeg',2,'2021-11-23 11:25:45'),
(3,'upload/Loki_football.jpeg',2,'2021-09-08 18:35:35'),
(4,'upload/Loki_out.jpeg',2,'2021-08-07 19:19:36'),
(5,'upload/Loki.jpg',2,'2021-05-03 10:10:10'),
(6,'upload/Loki.png',2,'2021-05-08 13:45:55'),
(7,'upload/Loki2.png',2,'2021-06-13 15:25:28'),
(8,'upload/Messy-photo1.jpg',1,'2015-05-06 19:30:30'),
(9,'upload/Messy-photo2.jpg',1,'2016-08-09 12:39:40'),
(10,'upload/Messy-photo3.jpg',1,'2014-11-04 21:04:01'),
(11,'upload/Messy-photo4.jpg',1,'2019-10-15 18:03:22'),
(12,'upload/Messy-profile.jpg',1,'2021-10-09 19:00:12');

-- --------------------------------------------------------

--
-- Table structure for table 'videos'
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'videos'
--

INSERT INTO `videos` (`video_id`, `location`, `user_id`, `date_added`) VALUES
(1,'upload/Messy-video1.mp4',1,'2021-06-15 19:00:00'),
(2, 'upload/Messy-video2.mp4',1,'2017-08-09 18:55:55');


-- --------------------------------------------------------

--
-- Table structure for table 'audios'
--

CREATE TABLE `audios` (
  `audio_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'audios'
--

-- no insert now


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--


CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `created` varchar(100) NOT NULL,
  `private` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post`, `content`, `created`, `private`) VALUES
(1, 2, 'upload/Loki_bath.jpeg', 'Taking a bath','2021-10-16 10:23:05', 0),
(2, 2, 'upload/Loki_chill.jpeg', 'Cilling','2021-11-23 11:25:45', 1),
(3, 2, 'upload/Loki_football.jpeg', 'Sometimes I am a soccer fan','2021-09-08 18:35:35', 0),
(4, 2, 'upload/Loki_out.jpeg', 'Out for fun','2021-08-07 19:19:36', 0),
(5, 1, 'upload/Messy-photo1.jpg', 'Woke up like this','2015-05-06 19:30:30', 1),
(6, 1, 'upload/Messy-photo2.jpg', 'Goddammit','2016-08-09 12:39:40', 0),
(7, 1, 'upload/Messy-photo3.jpg', 'Ok, I like this haircut','2014-11-04 21:04:01', 1),
(8, 1, 'upload/Messy-photo4.jpg', 'New phone who dis','2019-10-15 18:03:22', 0),
(9, 1, 'upload/Messy-video1.mp4', 'Sleepy','2021-06-15 19:00:00', 0),
(10, 1, 'upload/Messy-video2.mp4', 'She is home!','2017-08-09 18:55:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `username2` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `username2`, `birthday`, `gender`, `number`, `email`, `email2`, `password`, `password2`, `profile_picture`) VALUES
(1,'Adrian','Untu','adrian_untu','adrian_untu','21/04/2001','Male','+40721372911','adrianuntu2001@gmail.com','adrianuntu2001@gmail.com','12345','12345','upload/Adrian_profile.jpg'),
(2,'Dragos','Badarau','dragos_badarau','dragos_badarau','07/08/2001', 'Male','+40757411323','dragosb2001@gmail.com','dragosb2001@gmail.com','1234','1234','upload/Dragos_profile.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`audio_id`);

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
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `audio_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
