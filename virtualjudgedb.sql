-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 02:01 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtualjudgedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment_text` varchar(500) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `uid`, `project_id`, `comment_text`, `time`) VALUES
(14, 4, 3, 'nice project ... carry on :)', '2018-01-15 18:16:30'),
(15, 4, 4, 'brilliant !!!!', '2018-01-15 18:17:11'),
(16, 5, 4, 'Nice one ... :)', '2018-01-15 18:19:57'),
(17, 2, 3, 'Thanks for comment :)', '2018-01-15 18:20:43'),
(18, 6, 4, 'Thanks you all :)', '2018-01-15 18:21:31'),
(19, 4, 3, 'wlc...', '2018-01-16 23:10:27'),
(20, 4, 3, 'best of luck :)', '2018-01-16 23:30:14'),
(21, 4, 4, 'best of luck ..... :)', '2018-01-16 23:44:59'),
(22, 2, 3, 'thanks :)', '2018-01-16 23:47:18'),
(23, 10, 5, 'nice project.. you can update it if u wish...', '2018-01-23 19:58:57'),
(24, 9, 5, 'thanks for cmnt.. i will up date it as soon as possible', '2018-01-23 20:00:45'),
(25, 4, 5, 'nice project', '2018-01-23 20:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `eventcategory`
--

CREATE TABLE `eventcategory` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcategory`
--

INSERT INTO `eventcategory` (`id`, `category_name`, `event_id`) VALUES
(6, 'Android', 2),
(7, 'IOS', 2),
(8, 'Android App', 5),
(9, 'Ios App', 5),
(10, 'Web app', 5),
(11, 'Android', 8),
(12, 'Des', 8),
(13, 'Desktop', 8),
(14, 'Android', 9),
(15, 'Desktop', 9),
(16, 'Android', 10),
(17, 'Desktop', 10),
(18, 'IOS APP', 10);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `judgement_Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `short_desc`, `start_date`, `end_date`, `judgement_Datetime`) VALUES
(2, 'DIU App contest 2k18', 'short description goes here...', '2018-01-08 18:00:00', '2018-01-13 22:00:00', '2018-01-08 21:00:00'),
(5, 'Dhaka app contest', 'Short description will be here...........', '2018-01-13 15:18:00', '2018-01-13 15:20:00', '2018-01-11 10:00:00'),
(8, 'BD App Contest 2018', 'Description and terms of this event will be here........', '2018-01-15 12:00:00', '2018-01-17 12:00:00', '2018-01-16 23:43:00'),
(9, 'New event 2018', 'description will be here..', '2018-01-17 00:00:00', '2018-01-19 00:00:00', '2018-01-18 20:00:00'),
(10, 'Dhaka 24 Hour App contest', 'jsdfljsdlfk lkjsddflksjldfjslkdjf\r\nsdjfslkdjflsjflskdjfls dflkjsdlfkjasldkjflskjdflsdk\r\ndkkjfsldfkjlsdjflaskjd flksdjff\r\nsadffjsdlkfjalsjdfflskjdf  kjflfskjdlfksjdlfkjk ljl', '2018-01-23 19:50:00', '2018-01-25 22:00:00', '2018-01-23 20:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `video_path` varchar(500) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `avg_rate` double NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `short_desc`, `video_path`, `file_path`, `student_id`, `event_id`, `category_id`, `avg_rate`, `upload_date`) VALUES
(3, 'VAT Chacker Android App', 'Short description goes here.....................', '20180115181129Dil Diyan Gallan Song _ Tiger Zinda Hai _ Salman Khan _ Katrina Kaif _ Atif Aslam.mp4', '20180115181129151-15-4720.zip', 2, 8, 11, 4.25, '2018-01-15 18:11:29'),
(4, 'Library Management System', 'Project description in details will be here..', '20180115181516Happy Ukulele Royalty Free Music For Youtube Videos - YouTube.mp4', '2018011518151615-28808-1_Sec-F_labxm.zip', 6, 8, 13, 4.45, '2018-01-15 18:15:16'),
(5, 'E-votting android app', 'sjdlkfjslfd lj4', '20180123195344Happy Ukulele Royalty Free Music For Youtube Videos - YouTube.mp4', '20180123195344problem.zip', 9, 10, 16, 4.95, '2018-01-23 20:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `uid`, `project_id`, `rate`, `time`) VALUES
(6, 4, 3, 4.5, '2018-01-17 01:46:19'),
(7, 4, 4, 4.4, '2018-01-15 18:17:30'),
(8, 5, 3, 4, '2018-01-15 18:18:45'),
(9, 5, 4, 4.5, '2018-01-15 18:19:38'),
(10, 10, 5, 4.9, '2018-01-25 00:20:41'),
(11, 4, 5, 5, '2018-01-23 20:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `password`, `img_path`, `user_type_id`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'Male', '123456', '20180106180456index5.jpg', 1),
(2, 'Belal Khan', 'belal@gmail.com', 'Male', '123456', '2018011223522220171111124333index.jpg', 3),
(4, 'Jhon smith', 'jhon@gmail.com', 'Male', '123456789', '20180115155022images6.jpg', 2),
(5, 'Mr. Rock', 'rock@gmail.com', 'Male', '123456', NULL, 2),
(6, 'Mohona', 'mohona@gmail.com', 'Female', '123456', NULL, 3),
(7, 'Jhon Cena', 'jhon.cena@gmail.com', 'Male', '123456', NULL, 2),
(8, 'Anne', 'anne@gmail.com', 'Male', '123456', NULL, 2),
(9, 'Md Helal', 'helal@gmail.com', 'Male', '123456', '20180123194634index2.jpg', 3),
(10, 'Jack', 'jack@gmail.com', 'Male', '123456', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'judge'),
(3, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFk` (`uid`),
  ADD KEY `projectFk` (`project_id`);

--
-- Indexes for table `eventcategory`
--
ALTER TABLE `eventcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventFk` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryFk` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RatingUserFk` (`uid`),
  ADD KEY `RatingProjectFk` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTypeFK` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `eventcategory`
--
ALTER TABLE `eventcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `projectFk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userFk` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventcategory`
--
ALTER TABLE `eventcategory`
  ADD CONSTRAINT `eventFk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `CategoryFk` FOREIGN KEY (`category_id`) REFERENCES `eventcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `RatingProjectFk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RatingUserFk` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `userTypeFK` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
