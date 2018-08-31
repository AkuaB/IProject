-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2018 at 08:17 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u15019773`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbproject`
--

CREATE TABLE `tbproject` (
  `proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproject`
--

INSERT INTO `tbproject` (`proj_id`, `user_id`, `title`, `description`, `type`, `date`) VALUES
(3, 5, 'Add residents', 'An experiment on estates', 'Science ', '2018-08-29'),
(5, 5, 'IMY Project', 'Website design', 'Science ', '2018-08-30'),
(6, 5, 'App2', 'Simple Android application ', 'IT ', '2018-08-30'),
(7, 5, 'App3', 'Simple IPhone application', 'IT ', '2018-08-30'),
(8, 5, 'COBOL', 'Learning COBOL for the first time', 'IT ', '2018-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `user_id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `surname` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`user_id`, `name`, `surname`, `password`, `email`, `birthday`) VALUES
(5, 'David', 'Hamming', 'pass', 'ham@gmail.com', '1997-01-23'),
(7, 'Annes', 'Jansen', 'pass', 'annes@gmail.com', '1996-10-17'),
(9, 'John', 'Doe', 'password', 'john.doe@gmail.com', '1975-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbproject`
--
ALTER TABLE `tbproject`
  ADD PRIMARY KEY (`proj_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbproject`
--
ALTER TABLE `tbproject`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproject`
--
ALTER TABLE `tbproject`
  ADD CONSTRAINT `tbproject_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbusers` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
