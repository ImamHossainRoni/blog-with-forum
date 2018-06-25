-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 08:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `forummain`
--

CREATE TABLE `forummain` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forummain`
--

INSERT INTO `forummain` (`id`, `title`, `body`, `author`, `date`) VALUES
(1, 'RONI', 'I am Md.Imam Hossain Roni,a student of computer science and engineering department of IUBAT UNIVERSITY.I am unix fan, open source enthusiast and self motivated person.I love to think like a computer of every problem of my life.I am able to learn any technologies excluding Microsoft technologies. My favrouite programming language is PHP (Hypertext Preprocessor) but I know C,C++,Php,Mysql,HTML,CSS and Java script.My future goal is to develop a shiny career in programming sector.Where I will have the scope to utilize my potentiality and skills to do something innovative and opportunity along term career growth and advancement ', 'Tithi', '2018-04-05 21:52:51'),
(2, 'how to code?\r\n', 'So I think the permissions on either the /var/www/images folder are incorrect or the permissions on the tmp folder are root and the kernel of ubuntu is not letting the php script move from this root owned file to the images folder which has permissions of my user account to my knowledge and is in the group nobody.', 'Husna', '2018-04-05 21:52:51'),
(3, 'Linux zone', 'So I think the permissions on either the /var/www/images folder are incorrect or the permissions on the tmp folder are root and the kernel of ubuntu is not letting the php script move from this root owned file to the images folder which has permissions of my user account to my knowledge and is in the group nobody.', 'Imam', '2018-04-05 21:52:51'),
(14, 'DOCKER', 'yes ', 'imam roni', '2018-04-06 07:48:45'),
(30, '', '', 'The nomad', '2018-04-06 08:16:41'),
(31, '', '', 'The nomad', '2018-04-06 08:18:27'),
(32, '', '', 'The nomad', '2018-04-06 08:20:02'),
(33, '', '', 'The nomad', '2018-04-06 08:21:55'),
(34, '', '', 'The nomad', '2018-04-06 08:21:55'),
(39, 'uujujh', 'jnihuhy', 'The nomad', '2018-04-06 08:31:25'),
(40, '', '', 'imam roni', '2018-04-06 11:42:37'),
(41, '', '', 'imam roni', '2018-04-06 11:42:38'),
(42, '', '', 'imam roni', '2018-04-06 11:44:00'),
(43, '', '', 'imam roni', '2018-04-06 11:44:03'),
(44, '', '', 'imam roni', '2018-04-06 11:44:06'),
(45, 'dsfds', 'dfsa', 'imam roni', '2018-04-06 11:46:21'),
(46, '', '', 'imam roni', '2018-04-06 13:38:41'),
(47, '', '', 'imam roni', '2018-04-06 13:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `Name`, `adminUser`, `adminPass`, `email`, `details`, `role`) VALUES
(1, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'imamhossainroni95@gmail.com', 'sdfsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'dJango'),
(7, 'à¦­à§à¦°à¦®à¦£'),
(8, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `postId` int(255) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `postId`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(37, 1, 0, 'java', 'Imam', '2018-04-06 16:45:30'),
(38, 1, 37, 'java is good', 'Hossain', '2018-04-06 16:45:47'),
(39, 2, 0, 'php ', 'Roni', '2018-04-06 16:46:31'),
(40, 2, 39, 'fdfda', 'imam', '2018-04-06 16:46:49'),
(41, 1, 38, 'fasdfa', 'Saiful', '2018-04-06 16:58:38'),
(42, 2, 0, 'i love spring', 'Josim', '2018-04-06 17:03:06'),
(43, 2, 42, 'I love winter', 'Moon', '2018-04-06 17:03:32'),
(44, 6, 0, 'à¦ à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿ à¦•à§‹à¦¨ à¦•à¦¾à¦œà§‡à¦°à¦‡ à¦¨à¦¾', 'Roni', '2018-04-06 17:54:05'),
(45, 6, 44, 'what are you saying ?', 'Moon', '2018-04-06 17:54:28'),
(46, 8, 0, 'good', 'Tipu', '2018-04-07 04:29:32'),
(47, 8, 0, 'kfjf', 'Roni', '2018-04-07 04:30:10'),
(48, 8, 46, 'good', 'sujon', '2018-04-07 04:30:23'),
(49, 8, 48, 'good', 'Abd', '2018-04-07 04:31:03'),
(50, 8, 49, 'is  it good?', 'niam', '2018-04-07 04:31:28'),
(51, 8, 0, 'fdfd', 'Rabbi', '2018-04-07 04:34:17'),
(52, 8, 48, 'lol', 'lol', '2018-04-07 04:34:35'),
(53, 6, 0, 'yyghg', 'masum', '2018-04-07 04:57:24'),
(54, 6, 0, 'jjh', 'shimul', '2018-04-07 05:48:33'),
(55, 9, 0, 'good', 'Tithi', '2018-04-07 06:10:15'),
(56, 9, 0, 'it was good', 'Redoy', '2018-04-07 06:10:34'),
(57, 9, 55, 'good', 'Milon', '2018-04-07 06:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fname`, `lname`, `email`, `body`, `status`, `date`) VALUES
(5, 'asf', 'af', 'imamhossainroni95@gmail.com', 'a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf a fa asdf asdf asdfsdf', 0, '2017-01-10 21:03:08'),
(8, 'asdf', 'asdf', 'imamhossainroni95@gmail.com', 'a sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsda sdf asdfsdfasdfsad fsdafsd', 0, '2017-01-10 21:20:02'),
(10, 'asdf', 'a sdf', 'imamhossainroni95@gmail.com', 'fsdf dfsaf sdf sdf', 0, '2017-01-10 21:29:04'),
(14, 'Hossain', 'Rubel', 'rubel@iubat.edu', 'messege body', 1, '2018-04-07 09:51:58'),
(15, 'vai', 'Redoy', 'rezuenlos@gmail.com', 'fdsgfseg', 1, '2018-04-07 12:13:05'),
(16, 'redoy', 'Vai', 'rezuenlos@gmail.com', 'fdsaf', 0, '2018-04-07 12:14:30'),
(17, 'redoy', 'Vai', 'rezuenlos@gmail.com', 'fdsaf', 0, '2018-04-07 12:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `catName`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(6, 5, 'à¦ªà¦¾à¦¨à¦¾à¦® à¦¨à¦—à¦°', 'à¦ªà¦¾à¦¨à¦¾à¦® à¦¨à¦—à¦° à¦à¦¬à¦‚ à¦¸à§‹à¦¨à¦¾à¦°à¦—à¦¾à¦à¦“ à¦²à§‹à¦• à¦“ à¦•à¦¾à¦°à§à¦¶à¦¿à¦²à§à¦ª à¦¯à¦¾à¦¦à§à¦˜à¦°à§‡ à¦à¦•à¦¦à¦¿à¦¨', '<p><span>à¦ªà§à¦°à¦¾à¦šà§€à¦¨ à¦¬à¦¾à¦‚à¦²à¦¾à¦° à¦°à¦¾à¦œà¦§à¦¾à¦¨à§€ à¦›à¦¿à¦² à¦à¦‡ à¦ªà¦¾à¦¨à¦¾à¦® à¦¨à¦—à¦°à¥¤ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à§§à§¦à§¦à¦Ÿà¦¿ à¦§à§à¦¬à¦‚à¦¸à¦ªà§à¦°à¦¾à¦¯à¦¼ à¦à¦¤à¦¿à¦¹à¦¾à¦¸à¦¿à¦• à¦¶à¦¹à¦°à§‡à¦° à¦à¦•à¦Ÿà¦¿ à¦ªà¦¾à¦¨à¦¾à¦® à¦¨à¦—à¦°à¥¤ à¦à¦‡ à¦¶à¦¹à¦°à¦Ÿà¦¿ à¦¸à¦¤à§à¦¯à¦¿à¦•à¦¾à¦° à¦…à¦°à§à¦¥à§‡à¦‡à¦§à¦‚à¦¸ à¦¹à§Ÿà§‡ à¦¯à¦¾à¦šà§à¦›à§‡à¥¤ à§¬à§¦à§¦ à¦®à¦¿à¦Ÿà¦¾à¦° à¦œà§à§œà§‡ à¦à¦‡ à¦¶à¦¹à¦°à¥¤ à¦à¦° à¦­à§‡à¦¤à¦° à¦¦à¦¿à§Ÿà§‡ à¦°à¦¾à¦¸à§à¦¤à¦¾ à¦°à§Ÿà§‡à¦›à§‡ à¦¯à§‡à¦–à¦¾à¦¨ à¦¦à¦¿à§Ÿà§‡ à¦²à§‹à¦•à¦¾à¦² à¦®à¦¾à¦¨à§à¦· à¦¯à¦¾à¦¤à¦¾à§Ÿà¦¾à¦¤ à¦•à¦°à§‡à¥¤ à¦†à¦° à¦à¦¤à§‡ à¦¯à§‡ à¦•à§‡à¦‰à¦‡ à¦ªà§à¦°à¦¬à§‡à¦¶ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¥¤ à¦¯à§‡ à¦•à§‡à¦‰à¦‡ à¦ªà§à¦°à¦¬à§‡à¦¶ à¦•à¦°à§‡ à¦¨à¦·à§à¦Ÿ à¦•à¦°à§‡ à¦¦à¦¿à¦šà§à¦›à§‡ à¦à¦‡ à¦ªà§à¦°à¦¾à¦šà§€à¦¨ à¦¶à¦¹à¦°à¦Ÿà¦¿à¦•à§‡à¥¤ à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿ à¦¥à¦¾à¦•à¦²à§‡à¦“ à¦…à¦¤à¦Ÿà¦¾ à¦•à¦ à¦¿à¦¨ à¦¨à§Ÿà¥¤ à¦®à¦¨à§‡ à¦¹à§Ÿà§‡à¦›à§‡ à¦ à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿ à¦•à§‹à¦¨ à¦•à¦¾à¦œà§‡à¦°à¦‡ à¦¨à¦¾à¥¤</span></p>', 'upload/f44def4ce9.jpg', 'Roni', 'LOL', '2018-04-06 17:11:28'),
(8, 1, 'rr', 'rrr', '<p>fdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/0a5cf74976.jpg', 'fd', 'fd', '2018-04-06 19:29:34'),
(9, 0, 'gasdg', 'tech', '<p>à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦²à¦¾à¦¸ à¦­à§‡à¦—à¦¾à¦¸à§‡ à¦†à§Ÿà§‹à¦œà¦¿à¦¤ à¦•à¦¨à¦œà§à¦®à¦¾à¦° à¦‡à¦²à§‡à¦•à¦Ÿà§à¦°à¦¨à¦¿à¦•à¦¸ à¦¶à§‹à¦¤à§‡ (à¦¸à¦¿à¦‡à¦à¦¸) à¦šà§‹à¦– à¦§à¦¾à¦à¦§à¦¾à¦¨à§‹ à¦¸à¦¬ à¦ªà¦£à§à¦¯à§‡à¦° à¦ªà¦¸à¦°à¦¾ à¦¸à¦¾à¦œà¦¿à§Ÿà§‡ à¦¬à¦¸à§‡à¦›à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦–à§à¦¯à¦¾à¦¤à¦¨à¦¾à¦®à¦¾ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦ªà¦£à§à¦¯ à¦¨à¦¿à¦°à§à¦®à¦¾à¦¤à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨à¦—à§à¦²à§‹à¥¤ à¦•à§‹à¦¡à¦¾à¦• à¦à¦¨à§‡à¦›à§‡ &lsquo;à¦•à§‹à¦¡à¦¾à¦• à¦®à¦¿à¦¨à¦¿ à¦¶à¦Ÿ à¦‡à¦¨à¦¸à§à¦Ÿà§à¦¯à¦¾à¦¨à§à¦Ÿ à¦•à§à¦¯à¦¾à¦®à§‡à¦°à¦¾&rsquo;à¥¤ à§¯ à¦œà¦¾à¦¨à§à§Ÿà¦¾à¦°à¦¿à¥¤ à¦›à¦¬à¦¿: à¦°à§Ÿà¦Ÿà¦¾à¦°à§à¦¸</p>', 'upload/dc4d4c97f5.jpg', 'Redoy', 'ff', '2018-04-07 06:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '117151299558983619718', 'imam', 'roni', 'imamhossainroni95@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-u9s7X8fPnR4/AAAAAAAAAAI/AAAAAAAAABw/z9tLFvVaDN4/photo.jpg', 'https://plus.google.com/117151299558983619718', '2018-04-05 09:53:18', '2018-04-06 15:38:51'),
(2, 'google', '118267258933168849850', 'The', 'nomad', 'nomadthegreat95@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2018-04-06 10:31:25', '2018-04-06 10:31:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forummain`
--
ALTER TABLE `forummain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forummain`
--
ALTER TABLE `forummain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
