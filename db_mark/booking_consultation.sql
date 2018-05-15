-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 10:14 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_consultation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `reservation_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`reservation_id`, `title`, `start_event`, `end_event`) VALUES
(1, 'D''Workers', '2018-05-14 08:00:00', '2018-05-14 09:00:00'),
(5, 'bees', '2018-05-15 05:00:00', '2018-05-15 05:30:00'),
(6, 'Timbangan', '2018-05-16 12:00:00', '2018-05-17 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `school_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contactno` int(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
