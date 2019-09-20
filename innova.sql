-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 06:24 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innova`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `about_title` varchar(200) NOT NULL,
  `about_text` text NOT NULL,
  `about_subtitle` text NOT NULL,
  `about_list` varchar(500) NOT NULL,
  `about_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_title`, `about_text`, `about_subtitle`, `about_list`, `about_img`, `status`) VALUES
(2, 'asdf', 'asdf', 'asdf', 'as*asdf*ewqr*qwer', '2.jpg', 0),
(3, 'Wellcome to our aobut section', 'This is our about lorem ipsum is a good site i regularly use it and i also suggest you to use it', 'this is a sub title i think', 'we are good*we are very good *we are the goodest*So atlast we are best', '3.jpg', 0),
(4, 'Who We Are', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Why Choose Us?', 'Years of Experience*Fully Insured*Cost Control Experts*100% Satisfaction Guarantee', '4.jpg', 0),
(6, 'adsf', 'adsfdsaf', 'asdfadf', 'asdf*adfsdaf*asdfadsf*asdfadfs', '6.jpg', 0),
(7, 'asdfasd', 'fasdfsdfa', 'adsfasdf', 'asdfsadf*asdfsadfasdf', '7.jpg', 0),
(8, 'asdf', 'sdaf', 'asdf', 'asdf*asdfda*fdsadsaf*asdfasdf', '8.jpg', 0),
(9, 'asdfasd', 'sadfasdf', 'sadfsdaf', 'asdf*asdfsadfasdf*asdfasdfsdfdsa*sdasa', '9.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `banner_text` text NOT NULL,
  `banner_btn` text NOT NULL,
  `banner_img` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_text`, `banner_btn`, `banner_img`, `status`) VALUES
(11, 'This is a banner title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'read more', '11.jpg', 0),
(12, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'View More', '12.jpg', 1),
(14, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,', 'read more', '14.jpg', 0),
(15, 'This is a banner title', 'doesn\'t make any sence', 'read more', '15.jpg', 0),
(16, 'This is a banner title', '\"What\'s happened to you, my brother\"', 'read more', '16.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `footer_icons`
--

CREATE TABLE `footer_icons` (
  `id` int(11) NOT NULL,
  `icon_1` varchar(200) NOT NULL,
  `link_1` varchar(500) NOT NULL,
  `icon_2` varchar(200) NOT NULL,
  `link_2` varchar(500) NOT NULL,
  `icon_3` varchar(200) NOT NULL,
  `link_3` varchar(500) NOT NULL,
  `icon_4` varchar(200) NOT NULL,
  `link_4` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_icons`
--

INSERT INTO `footer_icons` (`id`, `icon_1`, `link_1`, `icon_2`, `link_2`, `icon_3`, `link_3`, `icon_4`, `link_4`) VALUES
(1, 'fa fa-facebook', 'facebook.com/rslahmed383', 'fa fa-twitter', 'twitter.com', 'fa fa-instagram', 'instagram.com', 'fa fa-linkedin', 'linked.in');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `logo_img` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo_img`, `status`) VALUES
(3, '3.png', 0),
(7, '7.png', 0),
(8, '8.png', 0),
(9, '9.png', 0),
(10, '10.png', 1),
(11, '11.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_name` varchar(100) NOT NULL,
  `msg_email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `times` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg_name`, `msg_email`, `message`, `times`, `status`) VALUES
(11, 'asdf', 'as@gmail.com', 'adfasdfsadf', '19-09-16 11:25:38pm', 1),
(12, 'asdf', 'asdfasdf@gmail.com', 'adsfsadfsdafdsf', '19-09-20 10:17:38pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_text` text NOT NULL,
  `service_img` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_text`, `service_img`, `status`) VALUES
(5, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '5.jpg', 1),
(6, 'Why do we use it?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '6.jpg', 1),
(7, ' Where does it come from?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '7.jpg', 1),
(8, 'Where can I get some?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '8.jpg', 1),
(9, 'What is Web Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '9.jpg', 1),
(10, 'What is UI/UX design', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '10.jpg', 1),
(11, '', '', '11.jpg', 0),
(12, 'asdfasdf', 'asdfasdfsdaf', '12.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testis`
--

CREATE TABLE `testis` (
  `id` int(11) NOT NULL,
  `testi_text` text NOT NULL,
  `testi_title` varchar(200) NOT NULL,
  `testi_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testis`
--

INSERT INTO `testis` (`id`, `testi_text`, `testi_title`, `testi_img`, `status`) VALUES
(2, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHN DOE', '2.jpg', 1),
(3, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHNATHAN DOE', '3.jpg', 1),
(4, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHNATHAN DOE', '4.jpg', 1),
(5, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHNATHAN DOE', '5.jpg', 1),
(6, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHNATHAN DOE', '6.jpg', 1),
(7, '\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.\"', '- JOHN DOE', '7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` text NOT NULL,
  `role` int(10) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `role`, `photo`) VALUES
(42, 'rasel', 'rsl.ahmed@gmail.com', '123', 'male', 1, '42.jpg'),
(43, 'Rasel Ahmed', 'rsl.ahmed383@gmail.com', '123', 'male', 1, '43.png'),
(44, 'Arshad ', 'imsopnil3@gmail.com', '123', 'male', 3, '44.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_icons`
--
ALTER TABLE `footer_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testis`
--
ALTER TABLE `testis`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `footer_icons`
--
ALTER TABLE `footer_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testis`
--
ALTER TABLE `testis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
