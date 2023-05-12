-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 05:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `blogid` int(11) NOT NULL,
  `blog_title` varchar(150) DEFAULT NULL,
  `blog_desc` text DEFAULT NULL,
  `blog_img` varchar(300) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on`) VALUES
(13, 'A', '<p>asdfghj</p>\r\n								', 'assets/uploads/blogImg/22_house021.jpeg', 1, '2023-05-07 17:35:20', '2023-05-11 04:53:49'),
(14, 'B', '<p>qwsdfvbsdfghbnjgbhjn</p>\r\n', 'assets/uploads/blogImg/deer01.jpeg', 0, '2023-05-09 14:54:56', '2023-05-09 16:55:07'),
(15, 'C', '<p>qwertyui</p>\r\n', 'assets/uploads/blogImg/beach016.jpg', 1, '2023-05-09 16:41:44', '2023-05-09 16:41:44'),
(16, 'D', '<p>edfjgbkjhlnjh;kl ;njbhlkvkg</p>\r\n', 'assets/uploads/blogImg/IMG_20210103_122217-01.jpg', 1, '2023-05-09 16:43:33', '2023-05-09 16:43:33'),
(20, 'E', 'fghijkmnop', 'assets/uploads/blogImg/ms_celerio023.jpeg', 1, '2023-05-10 14:04:08', '2023-05-10 14:04:08'),
(21, 'H', '<p>wedfgh</p>\r\n', 'assets/uploads/blogImg/tree01.jpg', 1, '2023-05-11 04:38:44', '2023-05-11 04:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `backend_users`
--

CREATE TABLE `backend_users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backend_users`
--

INSERT INTO `backend_users` (`userId`, `userName`, `password`, `status`) VALUES
(1, 'admin', '123', 1),
(2, 'user', '123', 1),
(6, 'wer', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blogid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blogid`, `userid`, `comment`) VALUES
(1, 13, 2, 'a'),
(2, 13, 2, 'aaa'),
(3, 13, 2, 'aaaa'),
(4, 13, 6, 'ffff'),
(5, 15, 6, 'c'),
(6, 13, 2, '										abcd');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `blogId` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`blogId`, `userid`, `liked`) VALUES
(13, 2, 1),
(13, 6, 1),
(16, 6, 1),
(15, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `backend_users`
--
ALTER TABLE `backend_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `backend_users`
--
ALTER TABLE `backend_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
