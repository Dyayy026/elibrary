-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_posted` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `heading`, `description`, `date_posted`, `photo`, `caption`) VALUES
(1, 'text heading', 'desc', '2022-02-05', '61fe8578243602.56075436.jpg', 'caption'),
(6, 'second post', 'my second post', '2022-02-05', '61fe8fc54c68e3.85891532.jpg', 'wala lang to'),
(9, 'TWICE CONCERT', 'TWICELAND 3', '2022-02-19', '6210f2ebbb37b6.76613857.jpg', 'Kim Da Hyun');

-- --------------------------------------------------------

--
-- Table structure for table `appr_sched`
--

CREATE TABLE `appr_sched` (
  `sc_id` int(7) NOT NULL,
  `u_id` int(7) NOT NULL,
  `sc_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appr_sched`
--

INSERT INTO `appr_sched` (`sc_id`, `u_id`, `sc_date`, `status`) VALUES
(1, 1, '2022-02-03', 'Approved'),
(2, 3, '2022-01-28', 'Approved'),
(3, 5, '2022-02-04', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `pub_year` year(4) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `copies_owned` int(6) NOT NULL,
  `copies_avlbl` int(6) NOT NULL,
  `date_added` date NOT NULL,
  `photo` text NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `title`, `author`, `pub_year`, `cat_id`, `serial_number`, `copies_owned`, `copies_avlbl`, `date_added`, `photo`, `qrcode`) VALUES
(33, 'cuteie', 'Loren cute', 0000, 1, '978-3-16-148410-1', 1, 0, '2022-01-11', '61dcf7605c2d64.28681630.png', ''),
(36, 'Jihyo', 'Park', 2022, 3, '879-3-16-148410-0', 1, 0, '2022-01-11', '61dd1d59951f79.86063759.png', ''),
(37, 'Loren Cute', 'Loren cute', 2022, 4, '123-3-16-148410-0', 1, 8, '2022-01-15', '61e2b45b199551.04779077.png', ''),
(38, 'Princess Loren', 'Dr. Seuss', 2022, 1, '978-3-16-148410-8', 10, 9, '2022-02-28', '61fbd41e883e33.92602195.png', ''),
(60, 'Arjays Adventure in Manila Zoo', 'Dr. Arjay Moldes Andal phDEF', 0000, 3, '1234323s', 2, 1, '2022-06-22', '62b2cce5773d78.75057017.jpg', '../../temp/testc65a1b17e8ea3733e02c9a0f51bb4126.png'),
(62, 'The Mystery of Walking Penguin', 'Mark Einstein III', 2022, 1, '978-3-16-178410-8', 2, 2, '2022-06-23', '62b3ec42ce9e20.14330465.jpg', '../../temp/test0d12f7b919cfed86d2d843ee92e8b359.png'),
(63, 'How To Cheer Up a Depressed Cat', 'J.J Johnson Parkinson', 2022, 3, '978-7-161484108', 5, 5, '2022-06-23', '62b3f9629a7fb6.33265208.jpg', '../../temp/testb95db49900572a30e02169df313a784a.png');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `bw_id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `sch_id` varchar(50) NOT NULL,
  `bw_date` date DEFAULT NULL,
  `bw_due` date DEFAULT NULL,
  `rtn_date` date DEFAULT NULL,
  `copies_avlbl` int(6) NOT NULL,
  `fine` int(6) NOT NULL,
  `dues` int(6) NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`bw_id`, `b_id`, `sch_id`, `bw_date`, `bw_due`, `rtn_date`, `copies_avlbl`, `fine`, `dues`, `time`) VALUES
(10, 37, '246', '2022-01-17', '2022-03-18', '2022-01-17', 0, 0, -60, '18:14:38.000000'),
(13, 37, '246', NULL, NULL, NULL, 0, 0, 0, '12:49:27.000000'),
(14, 36, '246', '2022-02-04', '2022-04-05', NULL, 0, 0, 0, '21:13:07.000000'),
(15, 36, '246', '2022-02-04', '2022-04-05', NULL, 0, 0, 0, '20:46:16.000000'),
(16, 36, '246', '2022-02-04', '2022-04-05', NULL, 0, 0, 0, '14:26:48.000000'),
(17, 37, '246', NULL, NULL, NULL, 0, 0, 0, '10:47:45.000000'),
(18, 38, '888-888', '2022-02-20', '2022-04-21', NULL, 0, 0, 0, '07:53:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(1, 'Anatomy'),
(2, 'Business'),
(3, 'Computer Science'),
(4, 'Engineering'),
(5, 'Fisheries'),
(6, 'Gourmet'),
(7, 'Housing'),
(8, 'Industrial Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(6) NOT NULL,
  `sch_id` varchar(50) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `msg_date` date DEFAULT NULL,
  `time` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `sch_id`, `msg`, `msg_date`, `time`) VALUES
(15, '510', 'Hello Welcome', '2022-01-20', '12:22:08.000000'),
(18, '246', 'Your request to borrow book: Jihyo  has been accepted', '2022-02-02', '20:51:25.000000'),
(19, '246', 'Your request to borrow book: Jihyo  has been accepted', '2022-02-04', '14:32:05.000000'),
(20, '', 'Your request has been rejected!', '2022-02-05', '19:46:33.000000'),
(21, '25', 'Your request has been rejected!', '2022-02-05', '19:49:28.000000'),
(22, '888-888', 'Your request to borrow book: Princess Loren  has been accepted', '2022-02-20', '07:55:27.000000');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `sch_id` varchar(50) NOT NULL,
  `b_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`sch_id`, `b_id`) VALUES
('246', 36);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sched`
--

CREATE TABLE `tb_sched` (
  `id` int(11) NOT NULL,
  `v_name` varchar(50) NOT NULL,
  `schl_id` varchar(50) NOT NULL,
  `schl_name` varchar(50) NOT NULL,
  `sch_date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `form` varchar(100) NOT NULL,
  `date_rqsted` date NOT NULL,
  `status` varchar(11) NOT NULL,
  `sch_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sched`
--

INSERT INTO `tb_sched` (`id`, `v_name`, `schl_id`, `schl_name`, `sch_date`, `timein`, `timeout`, `form`, `date_rqsted`, `status`, `sch_id`) VALUES
(5, 'Loren Briz ', '0118-1234', 'LSPU', '2022-01-08', '09:16:31', '09:53:31', '', '0000-00-00', 'approved', ''),
(9, 'Maria Astrid Gaile Daya', '0116-7894', 'LSPU', '2022-01-05', '40:24:18', '68:24:18', '', '0000-00-00', 'approved', ''),
(12, 'test flow', '1346', 'LSPU', '2022-01-08', '10:26:00', '10:26:00', '', '2022-01-19', 'approved', ''),
(14, 'test approve', '1346', 'LSPU', '2022-01-09', '10:35:00', '10:35:00', '', '2022-01-19', 'Approved', ''),
(17, 'test 1234', '0119-2021', 'LSPU', '2022-01-09', '19:19:00', '19:19:00', '', '2022-01-19', 'Denied', ''),
(20, 'test show', '456', 'lspu', '2022-01-30', '07:53:00', '12:50:00', '', '2022-01-20', 'Pending', ''),
(21, 'test dessc', 'asdf', 'sdfa', '2022-01-16', '08:36:00', '08:35:00', '', '2022-01-20', 'Pending', ''),
(24, 'Loren Sched', '0119-2008', 'LSPU-SCC', '2022-02-22', '00:00:00', '00:00:00', '', '2022-02-05', 'Approved', ''),
(27, 'Loren', '123', 'LSPU', '2022-02-23', '00:00:00', '00:00:00', '', '2022-02-06', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `u_details`
--

CREATE TABLE `u_details` (
  `u_id` int(10) NOT NULL,
  `ut_id` int(10) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_in` varchar(2) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `sch_id` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `date_added` date DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_details`
--

INSERT INTO `u_details` (`u_id`, `ut_id`, `f_name`, `m_in`, `l_name`, `sch_id`, `school`, `email`, `pword`, `date_added`, `photo`) VALUES
(5, 3, 'Loren', 'M', 'Briz', '0119-3719', 'LSPU-SCC', 'lorencute@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '2022-01-18', '61e25022a96553.65618134.png'),
(7, 3, 'Loren', 'M', 'Briz', '123', 'LSPU-SCC', 'lorencute@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '2022-01-09', '61e2571ac84644.31296291.png'),
(10, 1, 'Loren ', 'M.', 'Briz', '01-28-01', 'LSPU-SCC', 'cute@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-01-09', '61e2b1f6323411.79671298.png'),
(14, 2, 'Armayne', 'L', 'Andal', '246', 'LSPU-SCC', 'panget@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-03', '61e410fb6ce8b2.68955368.png'),
(15, 2, 'Armayne', 'L', 'Andal', '2468', 'LSPU-SCC', 'tigness1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-18', '61e410fb6ce8b2.68955368.png'),
(38, 4, 'test adsf', 'as', 'asdf', '789', 'PLSP', 'asdf@asd', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-02-20', '62111254968443.79696765.jpg'),
(40, 4, 'test login faculty', 'as', 'sadf', '780', 'PLSP', 'email@fser', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-02-21', '62111430b9c7c4.80545474.jpg'),
(41, 1, 'Admin', 'ad', 'admin', '789-123', 'LSPU', 'admin@email', '21232f297a57a5a743894a0e4a801fc3', '2022-02-20', '62111b15474548.62293230.jpg'),
(42, 4, 'Michael', 'G', 'Dela Cruz', '888-888', 'PLSP', 'avatarteam4@gmail.com', 'd561c7c03c1f2831904823a95835ff5f', '2022-02-20', '6211818b9f75f6.33784658.png');

-- --------------------------------------------------------

--
-- Table structure for table `u_type`
--

CREATE TABLE `u_type` (
  `ut_id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_type`
--

INSERT INTO `u_type` (`ut_id`, `type`) VALUES
(1, 'librarian'),
(2, 'student'),
(3, 'visitor'),
(4, 'faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `appr_sched`
--
ALTER TABLE `appr_sched`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `serial_number_3` (`serial_number`),
  ADD KEY `serial_number` (`serial_number`),
  ADD KEY `serial_number_2` (`serial_number`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`bw_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `sch_id` (`sch_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`sch_id`,`b_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `tb_sched`
--
ALTER TABLE `tb_sched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_details`
--
ALTER TABLE `u_details`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `sch_id` (`sch_id`);

--
-- Indexes for table `u_type`
--
ALTER TABLE `u_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appr_sched`
--
ALTER TABLE `appr_sched`
  MODIFY `sc_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `bw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_sched`
--
ALTER TABLE `tb_sched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `u_details`
--
ALTER TABLE `u_details`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `u_type`
--
ALTER TABLE `u_type`
  MODIFY `ut_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
