-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2018 at 11:49 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engeduca_engeducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `student` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mounth` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_by` int(255) NOT NULL,
  `updated_by` int(255) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`id`, `student`, `title`, `amount`, `status`, `mounth`, `session`, `created_by`, `updated_by`, `created_datetime`, `updated_datetime`) VALUES
(3, '0', 'fees', 400, '1', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '0', 'fee', 300, '1', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2', 'fee', 3000, '1', '9', '2015-2016', 0, 8, '0000-00-00 00:00:00', '2015-01-22 10:03:17'),
(7, '2', 'dgh', 4, '1', '9', '2015-2016', 0, 8, '0000-00-00 00:00:00', '2015-02-17 12:20:04'),
(8, '5', 'fee', 700, '1', '6', '4', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2', 'dfg', 600, '0', '10', '2014-2015', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '2', 'dsgfh', 45646, '1', '9', '2016-2017', 8, 0, '2015-01-22 11:35:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_market_cost`
--

CREATE TABLE `tbl_market_cost` (
  `market_cost_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `market_date` varchar(32) NOT NULL,
  `market_cost` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_market_cost`
--

INSERT INTO `tbl_market_cost` (`market_cost_id`, `member_id`, `market_date`, `market_cost`, `created_time`) VALUES
(1, 3, '04/06/2018', 500, '2018-04-06 14:02:51'),
(2, 1, '04/06/2018', 600, '2018-04-06 14:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meal`
--

CREATE TABLE `tbl_meal` (
  `meal_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `date` varchar(32) NOT NULL,
  `morning` int(3) NOT NULL,
  `lunch` int(3) NOT NULL,
  `dinner` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_meal`
--

INSERT INTO `tbl_meal` (`meal_id`, `member_id`, `date`, `morning`, `lunch`, `dinner`, `created_date`) VALUES
(1, 1, '04/07/2018', 1, 1, 1, '2018-04-06 18:51:41'),
(2, 1, '04/11/2018', 1, 2, 1, '2018-04-08 11:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gardian_name` varchar(50) NOT NULL,
  `gardian_contact` varchar(20) NOT NULL,
  `gardian_email` varchar(50) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `relation_with_gardian` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `first_name`, `last_name`, `mobile`, `email`, `gardian_name`, `gardian_contact`, `gardian_email`, `address`, `father_name`, `mother_name`, `password`, `photo`, `relation_with_gardian`, `created_datetime`) VALUES
(1, 'Ekramul ', 'Hoque', '8801766535513', 'akramul.haq5@gmail.com', 'Moksudur Rahman', '8801789456321', 'moksudur.rahman@gmail.com', 'Feni, Chittagong, Bangladesh', 'Shirajul Hoque', 'Shamsun Nehar', 'e10adc3949ba59abbe56e057f20f883e', 'assets/backend/uploads/29571317_426784331101963_4529298534892181206_n.jpg', 'Uncle', '2014-07-08 07:52:39'),
(3, 'Ahmed', 'Shagor', '123456', 'shagor@gmail.com', 'Sha alam', '123456', 'alam@gmail.com', 'feni', 'Md Babul', 'Shopna Akter', 'e10adc3949ba59abbe56e057f20f883e', './assets/backend/uploads/DSC_8024.jpg', 'brother', '2018-04-02 08:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notices`
--

CREATE TABLE `tbl_notices` (
  `notice_id` int(3) NOT NULL,
  `purpose_notice` varchar(100) NOT NULL,
  `notices` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notices`
--

INSERT INTO `tbl_notices` (`notice_id`, `purpose_notice`, `notices`, `status`, `created_date`) VALUES
(1, 'Notice for pay your payment', 'Dear all members please pay your payment.\r\nThanks', 1, '2018-04-07 12:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `payment_date` text NOT NULL,
  `total_payment` int(32) NOT NULL,
  `payment_for` varchar(32) NOT NULL,
  `payment_method` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `member_id`, `payment_date`, `total_payment`, `payment_for`, `payment_method`, `created_date`) VALUES
(1, 1, '04/07/2018', 5000, 'Seat,Meal,Internet', 2, '2018-04-07 11:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `group_id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `contact`, `address`, `photo`, `created_by`, `created_datetime`, `updated_by`, `updated_datetime`) VALUES
(7, 1, 'Tawhidur', 'Rahman', 'tawhid', 'e10adc3949ba59abbe56e057f20f883e', 'tawhidur.rahman@swapnoloke.com', '8801756167187', 'Mirpur-2, Dhaka', './assets/backend/uploads/8_54a8e2f9b014d.jpg', 8, '2014-06-24 01:11:30', 8, '2015-01-09 03:16:08'),
(8, 1, 'Akramul', 'Hoque', 'akram', 'e10adc3949ba59abbe56e057f20f883e', 'akramul.haq@gmail.com', '8801766542625', 'Mirpur-2,Dhaka', './assets/backend/uploads/8_53c6f3f51024c.jpg', 0, '0000-00-00 00:00:00', 8, '2015-03-17 11:30:15'),
(11, 1, 'sahadat', 'hossain', 'sahadat', 'e10adc3949ba59abbe56e057f20f883e', 'sahdadat@gmail.com', '885646545645', 'Hello ', './assets/backend/uploads/8_53c8330cc57fc.jpg', 8, '2014-07-19 10:15:58', 8, '2015-02-04 10:55:04'),
(13, 2, 'Shagor', 'Badsha', 'shagor', '6ff86cfdd91815c9e65cdf71db2f9ec0', 'cloudnumber0707@gmail.com', '8801682281374', 'dhanmondi', './assets/backend/uploads/DSC_8024.jpg', 8, '2015-02-25 12:49:54', 13, '2015-03-06 06:57:29'),
(14, 2, 'Tipu', 'Sultan', 'Tipu', '827ccb0eea8a706c4c34a16891f84e7b', 'tipu@gmail.com', '8812345', 'Fulgazi,Feni', './assets/backend/uploads/13_54edbf81956d2.png', 13, '2015-02-25 01:26:41', 13, '2015-02-25 01:26:41'),
(15, 5, 'Wesly ', 'Hardin', 'Hardin', 'e10adc3949ba59abbe56e057f20f883e', 'nahidahmed10@ymail.com', '8801670333021', 'Mirpur 2', './assets/backend/uploads/8_54f58434bed86.jpg', 8, '2015-03-03 10:51:48', 8, '2015-03-17 12:50:17'),
(17, 2, 'Tawfiqur', 'rahman', 'tawfiq', '827ccb0eea8a706c4c34a16891f84e7b', 't@g.com', '8812345', 'Dhaka', '', 13, '2015-03-05 07:44:08', 13, '2015-03-05 07:44:08'),
(18, 3, 'Tipu', 'Sultan', 'tipu', '827ccb0eea8a706c4c34a16891f84e7b', 't@g.com', '8812345', 'Dhaka', '', 8, '2015-03-05 08:48:28', 8, '2015-03-05 08:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `info`, `updated_by`, `updated_datetime`) VALUES
(1, 'Super Admin', 'Super Admin', 8, '2014-07-08 03:11:33'),
(2, 'Admin', 'Admin', 0, '0000-00-00 00:00:00'),
(3, 'Student', 'Student', 0, '0000-00-00 00:00:00'),
(4, 'Guardian', 'Guardian', 0, '0000-00-00 00:00:00'),
(5, 'Stuff', 'Stuff', 0, '0000-00-00 00:00:00'),
(6, 'Manager', '', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_market_cost`
--
ALTER TABLE `tbl_market_cost`
  ADD PRIMARY KEY (`market_cost_id`);

--
-- Indexes for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_market_cost`
--
ALTER TABLE `tbl_market_cost`
  MODIFY `market_cost_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  MODIFY `meal_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  MODIFY `notice_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
